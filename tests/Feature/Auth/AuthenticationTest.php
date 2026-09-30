<?php

use App\Models\User;
use Laravel\Fortify\Features;

test('login screen can be rendered', function () {
    $response = $this->get(route('login'));

    $response->assertOk()
        ->assertDontSee('Demo email')
        ->assertDontSee('demo@litera.test')
        ->assertSee('action="http://localhost:8000/login"', false);
});

test('login form action uses the forwarded HTTPS scheme', function () {
    $response = $this->withHeaders([
        'X-Forwarded-Proto' => 'https',
    ])->get(route('login', absolute: false));

    $response->assertOk()
        ->assertSee('action="https://localhost:8000/login"', false)
        ->assertSee('href="https://localhost:8000/forgot-password"', false);

    $this->get('/forgot-password')
        ->assertOk()
        ->assertSee('action="https://localhost:8000/forgot-password"', false);

    $this->get('/reset-password/test-token?email=demo%40litera.test')
        ->assertOk()
        ->assertSee('action="https://localhost:8000/reset-password"', false);

    $user = User::factory()->create();

    $this->actingAs($user)->get('/analyze')
        ->assertOk()
        ->assertSee('action="https://localhost:8000/analyze"', false)
        ->assertSee('action="https://localhost:8000/logout"', false);

    $this->get('/history')->assertOk();
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('analyze', absolute: false));

    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrorsIn('email');

    $this->assertGuest();
});

test('users with a stale dashboard intended URL land on analyze after login', function () {
    $user = User::factory()->create();

    $this->withSession(['url.intended' => route('dashboard')])
        ->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertRedirect(route('analyze', absolute: false));
});

test('users with two factor enabled are redirected to two factor challenge', function () {
    $this->skipUnlessFortifyHas(Features::twoFactorAuthentication());

    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
    ]);

    $user = User::factory()->withTwoFactor()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('two-factor.login'));
    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect(route('home'));

    $this->assertGuest();
});
