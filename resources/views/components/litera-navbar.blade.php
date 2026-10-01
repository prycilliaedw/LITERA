<style>
    .litera-navbar-logo {
        display: block;
        width: 132px !important;
        height: auto !important;
        max-width: 132px !important;
        min-width: 0 !important;
        object-fit: contain;
        flex: 0 0 auto;
    }

    @media (max-width: 768px) {
        .litera-navbar-logo {
            width: 100px !important;
            max-width: 100px !important;
        }
    }
</style>

<header class="absolute inset-x-0 top-0 z-50">

    <div class="mx-auto max-w-[1440px] px-4 pt-4 sm:px-6 lg:px-8">

        <nav
            class="flex min-h-[72px] items-center justify-between rounded-[24px] border border-black/10 bg-[#f7f6f2]/95 px-3 backdrop-blur-xl sm:px-7"
        >

            {{-- BRAND --}}
            <a href="{{ route('home') }}" class="flex shrink-0 items-center" aria-label="LITERA home">
                <img
                    src="{{ asset('images/logo_litera.png') }}"
                    alt="LITERA"
                    class="litera-navbar-logo"
                    fetchpriority="high"
                >
            </a>


            {{-- NAVIGATION --}}
            <div class="hidden items-center gap-8 lg:flex">

                <a
                    href="{{ route('home') }}"
                    class="
                        text-sm
                        transition
                        hover:text-black
                        {{ ($active ?? '') === 'home'
                            ? 'font-semibold text-[var(--litera-red)]'
                            : 'font-medium text-black/55' }}
                    "
                >
                    {{ __('home') }}
                </a>


                <a
                    href="{{ route('analyze') }}"
                    class="
                        text-sm
                        transition
                        hover:text-black
                        {{ ($active ?? '') === 'analyze'
                            ? 'font-semibold text-[var(--litera-red)]'
                            : 'font-medium text-black/55' }}
                    "
                >
                    {{ __('analyze') }}
                </a>


                <a
                    href="{{ route('history') }}"
                    class="
                        text-sm
                        transition
                        hover:text-black
                        {{ ($active ?? '') === 'history'
                            ? 'font-semibold text-[var(--litera-red)]'
                            : 'font-medium text-black/55' }}
                    "
                >
                    {{ __('history') }}
                </a>


                <a
                    href="{{ route('about') }}"
                    class="
                        text-sm
                        transition
                        hover:text-black
                        {{ ($active ?? '') === 'about'
                            ? 'font-semibold text-[var(--litera-red)]'
                            : 'font-medium text-black/55' }}
                    "
                >
                    {{ __('about') }}
                </a>

            </div>


            {{-- RIGHT --}}
            <div class="flex items-center gap-2 sm:gap-3">

                {{-- LANGUAGE --}}
                <div
                    class="navbar-language flex items-center rounded-full border border-black/10 bg-white p-1 text-[13px] font-bold"
                >

                    <a
                        href="{{ route('language.switch', 'en') }}"
                        class="rounded-full px-3 py-1.5 transition
                        {{ app()->isLocale('en')
                            ? 'bg-black text-white'
                            : 'text-black/40 hover:text-black' }}"
                    >
                        EN
                    </a>

                    <a
                        href="{{ route('language.switch', 'id') }}"
                        class="rounded-full px-3 py-1.5 transition
                        {{ app()->isLocale('id')
                            ? 'bg-black text-white'
                            : 'text-black/40 hover:text-black' }}"
                    >
                        ID
                    </a>

                </div>


                @guest

                    {{-- LOGIN --}}
                    <a
                        href="{{ route('login') }}"
                        class="hidden px-2 text-sm font-medium text-black/65 sm:block"
                    >
                        {{ __('login') }}
                    </a>


                    {{-- GET STARTED --}}
                    <a
                        href="{{ route('register') }}"
                        class="red-button inline-flex items-center rounded-full px-3 py-3 text-sm font-bold text-white sm:px-5"
                    >
                        {{ __('get_started') }}
                    </a>

                @endguest


                @auth

                    <a
                        href="{{ route('dashboard') }}"
                        class="red-button inline-flex items-center rounded-full px-3 py-3 text-sm font-bold text-white sm:px-5"
                    >
                        {{ __('dashboard') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" data-logout-form>
                        @csrf
                        <button type="button" data-logout-trigger aria-haspopup="dialog" aria-controls="logout-confirmation" class="px-1 text-xs font-medium text-black/65 hover:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#DF252B] sm:px-2 sm:text-sm">
                            {{ app()->isLocale('id') ? 'Keluar' : 'Log out' }}
                        </button>
                    </form>

                @endauth

            </div>

        </nav>

    </div>

</header>

@auth
    <dialog
        id="logout-confirmation"
        aria-labelledby="logout-confirmation-title"
        aria-describedby="logout-confirmation-description"
        class="litera-logout-dialog"
        data-logout-dialog
    >
        <div class="litera-logout-dialog__content">
            <h2 id="logout-confirmation-title">{{ __('logout_confirmation_title') }}</h2>
            <p id="logout-confirmation-description">{{ __('logout_confirmation_message') }}</p>
            <div class="litera-logout-dialog__actions">
                <button type="button" data-logout-cancel class="litera-logout-dialog__cancel">
                    {{ __('cancel') }}
                </button>
                <button type="button" data-logout-confirm class="litera-logout-dialog__confirm">
                    {{ __('confirm_logout') }}
                </button>
            </div>
        </div>
    </dialog>

    <style>
        .litera-logout-dialog {
            position: fixed;
            inset: 0;
            width: 100%;
            max-width: none;
            height: 100%;
            max-height: 100%;
            margin: 0;
            padding: 16px;
            place-items: center;
            overflow-y: auto;
            border: 0;
            background: transparent;
            color: #111;
        }

        .litera-logout-dialog[open] { display: grid; }
        .litera-logout-dialog::backdrop { background: rgba(0, 0, 0, .35); }
        .litera-logout-dialog__content {
            box-sizing: border-box;
            width: min(92vw, 480px);
            padding: clamp(24px, 6vw, 36px);
            border: 1px solid rgba(17, 17, 17, .12);
            border-radius: 26px;
            background: #f7f6f2;
            box-shadow: 0 18px 60px rgba(17, 17, 17, .14);
        }

        .litera-logout-dialog h2 { margin: 0; font-size: clamp(21px, 5vw, 25px); font-weight: 750; line-height: 1.25; letter-spacing: -.025em; }
        .litera-logout-dialog p { margin: 12px 0 26px; color: rgba(17, 17, 17, .68); font-size: 15px; line-height: 1.6; }
        .litera-logout-dialog__actions { display: flex; justify-content: flex-end; gap: 10px; }
        .litera-logout-dialog button { min-height: 46px; padding: 11px 18px; border: 1px solid rgba(17, 17, 17, .12); border-radius: 999px; font: inherit; font-size: 14px; font-weight: 700; cursor: pointer; }
        .litera-logout-dialog button:focus-visible { outline: 3px solid rgba(223, 37, 43, .35); outline-offset: 3px; }
        .litera-logout-dialog__cancel { background: #fff; color: #111; }
        .litera-logout-dialog__confirm { border-color: #DF252B !important; background: #DF252B; color: #fff; }
        @media (max-width: 420px) {
            .litera-logout-dialog__actions { flex-direction: column-reverse; }
            .litera-logout-dialog button { width: 100%; }
        }
    </style>

    <script>
        (() => {
            const dialog = document.querySelector('[data-logout-dialog]');
            const form = document.querySelector('[data-logout-form]');

            if (!dialog || !form) {
                return;
            }

            form.querySelector('[data-logout-trigger]')?.addEventListener('click', () => dialog.showModal());
            dialog.querySelector('[data-logout-cancel]')?.addEventListener('click', () => dialog.close());
            dialog.querySelector('[data-logout-confirm]')?.addEventListener('click', () => form.submit());
        })();
    </script>
@endauth

<style>
    .litera-mobile-nav {
        display: none;
    }

    @media (max-width: 1023px) {
        .litera-mobile-nav {
            position: fixed;
            z-index: 60;
            inset: auto 0 0;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            padding: 8px 8px max(8px, env(safe-area-inset-bottom));
            border-top: 1px solid rgba(17, 17, 17, .12);
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(16px);
        }

        .litera-mobile-nav a {
            display: flex;
            min-height: 54px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            color: rgba(17, 17, 17, .60);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .litera-mobile-nav a[aria-current="page"] {
            color: var(--litera-red, #df252b);
        }

        .litera-mobile-nav svg {
            width: 20px;
            height: 20px;
        }
    }

    @media (max-width: 400px) {
        header nav { gap: 8px; padding-left: 10px !important; padding-right: 10px !important; }
        header nav > div:last-child { min-width: 0; gap: 4px; }
        header nav .navbar-language a { padding-left: 8px !important; padding-right: 8px !important; }
        header nav .red-button { padding-left: 8px !important; padding-right: 8px !important; font-size: 13px !important; }
    }
</style>

<nav class="litera-mobile-nav" aria-label="{{ app()->isLocale('id') ? 'Navigasi utama' : 'Main navigation' }}">
    @foreach ([
        'home' => ['route' => 'home', 'label' => app()->isLocale('id') ? 'Beranda' : 'Home', 'path' => 'M3 10.5 12 3l9 7.5M5.5 9v11h13V9M9.5 20v-6h5v6'],
        'analyze' => ['route' => 'analyze', 'label' => app()->isLocale('id') ? 'Analisis' : 'Analyze', 'path' => 'M4 5h16v11H7l-3 3V5zM8 9h8M8 12h5'],
        'history' => ['route' => 'history', 'label' => app()->isLocale('id') ? 'Riwayat' : 'History', 'path' => 'M4 6v5h5M5 11a7 7 0 1 1 1.7 5M12 8v4l3 2'],
        'about' => ['route' => 'about', 'label' => app()->isLocale('id') ? 'Tentang' : 'About', 'path' => 'M12 17v.01M12 14a4 4 0 1 0-4-4M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z'],
    ] as $key => $item)
        <a href="{{ route($item['route']) }}" @if (($active ?? '') === $key) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="{{ $item['path'] }}" /></svg>
            <span>{{ $item['label'] }}</span>
        </a>
    @endforeach
</nav>
