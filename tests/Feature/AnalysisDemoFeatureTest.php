<?php

use App\Models\Analysis;
use App\Models\User;
use Database\Seeders\DemoUserSeeder;
use Illuminate\Support\Facades\Hash;

test('analysis and history require authentication while about stays public', function () {
    $home = $this->get(route('home'))->assertOk();
    $home->assertSee('Pahami sebelum percaya.')
        ->assertDontSee('litera-hero-collage.png')
        ->assertDontSee('hero-bg-image')
        ->assertDontSee('hero-overlay');
    $this->get(route('analyze'))->assertRedirect(route('login'));
    $this->get(route('history'))->assertRedirect(route('login'));
    $this->get(route('about'))->assertOk();
});

test('landing page language switching still works', function () {
    $this->get(route('language.switch', 'id'))->assertRedirect(route('home'));
    $this->get(route('home'))->assertOk()->assertSee('Pahami sebelum percaya.');

    $this->get(route('language.switch', 'en'))->assertRedirect(route('home'));
    $this->get(route('home'))->assertOk()->assertSee('Understand before you trust.');
});

test('login returns a user to the analyze page they originally requested', function () {
    $user = User::factory()->create();

    $this->get(route('analyze'))->assertRedirect(route('login'));
    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertRedirect(route('analyze'));
});

test('all prepared demo URLs create their configured saved results', function () {
    $user = User::factory()->create();
    $scenarios = Analysis::demoScenarios();

    foreach ($scenarios as $url => $attributes) {
        $response = $this->actingAs($user)->post(route('analyze.store'), ['url' => $url]);
        $analysis = Analysis::where('url', $url)->sole();

        $response->assertRedirect(route('analyze.result', $analysis));
        $result = $this->get(route('analyze.result', $analysis))
            ->assertOk()
            ->assertSee('Hasil Analisis')
            ->assertSee('Tingkat keyakinan fakta')
            ->assertSee('Kelayakan usia')
            ->assertDontSee('aria-label="Kembali ke Analisis"', false)
            ->assertDontSee('class="back-icon"', false)
            ->assertDontSee('<span aria-hidden="true">←</span>', false)
            ->assertDontSee('Kode rujukan merupakan data sintetis')
            ->assertDontSee('Ini bukan rating resmi')
            ->assertDontSee('hasil konsultasi eksternal')
            ->assertDontSee('Contoh Analisis')
            ->assertSee('IntentScope')
            ->assertSee('FactLens')
            ->assertSee('LiteraReason')
            ->assertSee('Rekomendasi');
        $result->assertSee($attributes['title'])->assertSee($attributes['fact_confidence'].'%');
    }

    expect(Analysis::query()->count())->toBe(count($scenarios));

    $history = $this->get(route('history'))->assertOk();
    foreach ($scenarios as $attributes) {
        $history->assertSee($attributes['title'])->assertDontSee('Contoh');
    }
});

test('analysis result copy follows the selected language', function () {
    $user = User::factory()->create();
    $url = 'https://example.com/litera-demo-persuasive-health';
    $this->actingAs($user)->post(route('analyze.store'), ['url' => $url]);
    $analysis = Analysis::where('url', $url)->sole();

    $this->get(route('language.switch', 'en'));
    $this->get(route('analyze.result', $analysis))
        ->assertOk()
        ->assertSee('Fact confidence')
        ->assertSee('What is the content trying to do?')
        ->assertSee('Why this result?');

    $this->get(route('language.switch', 'id'));
    $this->get(route('analyze.result', $analysis))
        ->assertOk()
        ->assertSee('Tingkat keyakinan fakta')
        ->assertSee('Maksud konten')
        ->assertSee('Kenapa hasilnya seperti ini?');
});

test('unsupported URLs show prototype guidance without saving fake analysis', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('analyze'))
        ->post(route('analyze.store'), ['url' => 'https://example.org/another-article'])
        ->assertRedirect(route('analyze'))
        ->assertSessionHas('demo_message');

    expect(Analysis::query()->count())->toBe(0);
});

test('users cannot view analyses owned by another account', function () {
    $owner = User::factory()->create();
    $otherUser = User::factory()->create();
    $url = array_key_first(Analysis::demoScenarios());
    $analysis = $owner->analyses()->create(['url' => $url, ...Analysis::demoAttributesFor($url)]);

    $this->actingAs($otherUser)->get(route('analyze.result', $analysis))->assertNotFound();
    $this->actingAs($otherUser)->get(route('history'))->assertDontSee($analysis->title);
});

test('demo seeder can be run repeatedly with the same account and analysis', function () {
    $this->seed(DemoUserSeeder::class);
    $this->seed(DemoUserSeeder::class);

    $user = User::where('email', 'demo@litera.test')->sole();

    expect(Hash::check('LiteraDemo123!', $user->password))->toBeTrue()
        ->and($user->email_verified_at)->not->toBeNull()
        ->and($user->analyses()->count())->toBe(4);

    $this->post(route('login'), [
        'email' => 'demo@litera.test',
        'password' => 'LiteraDemo123!',
    ])->assertRedirect(route('analyze'));
});
