<header class="absolute inset-x-0 top-0 z-50">

    <div class="mx-auto max-w-[1440px] px-4 pt-4 sm:px-6 lg:px-8">

        <nav
            class="flex min-h-[72px] items-center justify-between rounded-[24px] border border-black/10 bg-[#f7f6f2]/95 px-5 backdrop-blur-xl sm:px-7"
        >

            {{-- BRAND --}}
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-4"
            >

                <span
                    class="litera-display text-[28px] leading-none sm:text-[30px]"
                >
                    LITERA
                </span>

                <span class="hidden h-8 w-px bg-black/20 sm:block"></span>

                <span
                    class="hidden max-w-[120px] text-[7px] font-bold uppercase leading-[1.05] tracking-[0.08em] sm:block"
                >
                    Literacy Intelligence<br>
                    for Trusted &amp; Ethical<br>
                    Reasoning Analysis
                </span>

            </a>


            {{-- NAVIGATION --}}
            <div class="hidden items-center gap-8 lg:flex">

                <a
                    href="{{ route('home') }}"
                    class="
                        text-[13px]
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
                        text-[13px]
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
                        text-[13px]
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
                        text-[13px]
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
                    class="flex items-center rounded-full border border-black/10 bg-white p-1 text-[11px] font-bold"
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
                        class="hidden px-2 text-[13px] font-medium text-black/65 sm:block"
                    >
                        {{ __('login') }}
                    </a>


                    {{-- GET STARTED --}}
                    <a
                        href="{{ route('register') }}"
                        class="red-button inline-flex items-center rounded-full px-5 py-3 text-[12px] font-bold text-white"
                    >
                        {{ __('get_started') }}
                    </a>

                @endguest


                @auth

                    <a
                        href="{{ route('dashboard') }}"
                        class="red-button inline-flex items-center rounded-full px-5 py-3 text-[12px] font-bold text-white"
                    >
                        {{ __('dashboard') }}
                    </a>

                @endauth

            </div>

        </nav>

    </div>

</header>