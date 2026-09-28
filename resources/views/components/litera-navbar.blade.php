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

                @endauth

            </div>

        </nav>

    </div>

</header>

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
