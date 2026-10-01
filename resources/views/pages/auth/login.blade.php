<x-layouts::auth :title="__('Log in')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="app()->isLocale('id') ? 'Masuk ke akunmu' : 'Log in to your account'" :description="app()->isLocale('id') ? 'Masukkan email dan kata sandi untuk melanjutkan.' : 'Enter your email and password to continue.'" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />


        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email address')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <div class="relative" x-data="{ showPassword: false }">
                <flux:input
                    id="password"
                    name="password"
                    :label="__('Password')"
                    type="password"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    class:input="pe-12"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                />

                <button
                    type="button"
                    class="absolute end-2 top-[2.1rem] inline-flex size-9 items-center justify-center rounded-md text-zinc-500 transition hover:text-zinc-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 dark:text-zinc-400 dark:hover:text-white"
                    aria-controls="password"
                    aria-label="Tampilkan kata sandi"
                    aria-pressed="false"
                    x-on:click="showPassword = !showPassword"
                    x-bind:aria-label="showPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'"
                    x-bind:aria-pressed="showPassword.toString()"
                >
                    <flux:icon.eye data-password-show-icon x-show="!showPassword" aria-hidden="true" />
                    <flux:icon.eye-slash data-password-hide-icon x-show="showPassword" aria-hidden="true" />
                </button>

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button type="submit" class="w-full" data-test="login-button">
                    {{ app()->isLocale('id') ? 'Masuk' : 'Log in' }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Don\'t have an account?') }}</span>
            <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
        </div>
    </div>
</x-layouts::auth>
