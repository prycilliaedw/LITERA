<footer class="bg-[#111111] text-white">

    <div
        class="mx-auto max-w-360 px-5 py-14 sm:px-8 lg:px-10"
    >

        <div
            class="grid gap-10 lg:grid-cols-[1.5fr_1fr_1fr_1.2fr]"
        >

            {{-- BRAND --}}
            <div>

                <div class="inline-flex rounded-lg bg-white">
                    <img
                        src="{{ asset('images/logo_litera.png') }}"
                        alt="LITERA"
                        class="h-auto w-[145px]"
                        loading="lazy"
                    >
                </div>


                <p
                    class="mt-6 max-w-82.5 text-sm leading-6 text-white/60"
                >
                    {{ __('footer_description') }}
                </p>


                <p
                    class="mt-6 text-xs font-bold uppercase tracking-[0.12em] text-(--litera-red)"
                >
                    {{ __('footer_tagline') }}
                </p>

            </div>


            {{-- PRODUCT --}}
            <div>

                <p
                    class="text-xs font-bold uppercase tracking-[0.12em] text-white/50"
                >
                    {{ __('footer_product') }}
                </p>

                <div class="mt-5 space-y-3">

                    <a
                        href="{{ route('analyze') }}"
                        class="footer-link block text-sm"
                    >
                        {{ __('analyze') }}
                    </a>

                    <a
                        href="{{ route('history') }}"
                        class="footer-link block text-sm"
                    >
                        {{ __('history') }}
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="footer-link block text-sm"
                    >
                        {{ __('about') }}
                    </a>

                </div>

            </div>


            {{-- INFORMATION --}}
            <div>

                <p
                    class="text-xs font-bold uppercase tracking-[0.12em] text-white/50"
                >
                    {{ __('footer_information') }}
                </p>

                <div class="mt-5 space-y-3">

                    <a
                        href="{{ route('about') }}#features"
                        class="footer-link block text-sm"
                    >
                        {{ app()->isLocale('id')
                            ? 'Fitur LITERA'
                            : 'LITERA Features' }}
                    </a>


                    <a
                        href="{{ route('about') }}#ethics"
                        class="footer-link block text-sm"
                    >
                        {{ app()->isLocale('id')
                            ? 'Etika & Privasi'
                            : 'Ethics & Privacy' }}
                    </a>


                    <a
                        href="{{ route('about') }}"
                        class="footer-link block text-sm"
                    >
                        {{ __('about') }}
                    </a>

                </div>

            </div>


            {{-- CONTACT --}}
            <div>

                <p
                    class="text-xs font-bold uppercase tracking-[0.12em] text-white/50"
                >
                    {{ __('footer_contact') }}
                </p>


                <p
                    class="mt-5 max-w-72.5 text-sm leading-6 text-white/60"
                >
                    {{ __('contact_description') }}
                </p>


                <a
                    href="{{ route('about') }}"
                    class="mt-4 inline-block text-sm font-semibold text-white/90 transition hover:text-(--litera-red)"
                >
                    {{ __('contact_placeholder') }}
                </a>

            </div>

        </div>


        {{-- DIVIDER --}}
        <div class="my-10 h-px bg-white/10"></div>


        {{-- BOTTOM --}}
        <div
            class="flex flex-col gap-3 text-xs text-white/50 sm:flex-row sm:items-center sm:justify-between"
        >

            <p>
                © {{ date('Y') }} LITERA · {{ __('footer_rights') }}
            </p>


            <p>
                {{ __('footer_tagline') }}
            </p>

        </div>

    </div>

</footer>
