<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>LITERA</title>

    <meta
        name="description"
        content="{{ __('hero_description') }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --litera-red: #df252b;
            --litera-red-dark: #c91e25;
            --litera-black: #111111;
            --litera-cream: #f7f6f2;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--litera-cream);
            color: var(--litera-black);
            font-family: "Manrope", "Inter", Arial, sans-serif;
            overflow-x: hidden;
        }

        ::selection {
            background: var(--litera-red);
            color: #fff;
        }

        /* =========================================================
           TYPOGRAPHY
        ========================================================== */

        .litera-display {
            font-family: "Arial Black", Arial, sans-serif;
            font-weight: 900;
            letter-spacing: -0.075em;
        }

        /* =========================================================
           BUTTON
        ========================================================== */

        .red-button {
            background: var(--litera-red);
            transition:
                transform .2s ease,
                background .2s ease,
                box-shadow .2s ease;
        }

        .red-button:hover {
            background: var(--litera-red-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(223, 37, 43, .18);
        }

        /* =========================================================
           HERO
        ========================================================== */

        .hero-section {
            padding-top: 104px;
            padding-bottom: 48px;
        }

        .hero-grid {
            min-height: clamp(550px, 68vh, 640px);
        }

        .hero-copy {
            padding-top: clamp(55px, 6vh, 78px);
            padding-bottom: 40px;
        }

        .hero-title {
            font-size: clamp(38px, 4vw, 62px);
            line-height: .95;
        }

        .hero-description {
            max-width: 500px;
            font-size: 16px;
            line-height: 1.65;
        }

        .hero-art {
            width: min(100%, 780px);
        }

        .hero-art img {
            display: block;
            width: 100%;
            height: auto;
        }

        /* =========================================================
           HERO MINI FEATURES
        ========================================================== */

        .hero-features {
            max-width: 640px;
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-top: 1px solid rgba(17, 17, 17, .10);
        }

        .hero-feature {
            padding: 15px 16px 12px 0;
        }

        .hero-feature + .hero-feature {
            padding-left: 16px;
            border-left: 1px solid rgba(17, 17, 17, .10);
        }

        .hero-feature-number {
            font-size: 18px;
            font-weight: 800;
            line-height: 1;
        }

        .hero-feature-name {
            margin-top: 7px;
            color: rgba(17, 17, 17, .46);
            font-size: 9px;
            line-height: 1.5;
        }

        /* =========================================================
           ONE-LINK SECTION
        ========================================================== */

        .content-section {
            padding: 32px 0 82px;
        }

        .content-panel {
            padding: clamp(28px, 3vw, 46px);
            border: 1px solid rgba(17, 17, 17, .10);
            border-radius: 28px;
            background: #fff;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 37% 63%;
            gap: 46px;
            align-items: center;
        }

        .content-label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .content-label::before {
            content: "";
            width: 28px;
            height: 1px;
            background: var(--litera-red);
        }

        .content-heading {
            max-width: 440px;
            margin-top: 19px;
            font-size: clamp(37px, 3.3vw, 55px);
            line-height: .88;
        }

        .content-description {
            max-width: 470px;
            margin-top: 20px;
            color: rgba(17, 17, 17, .50);
            font-size: 12px;
            line-height: 1.75;
        }

        .signal-list {
            border-top: 1px solid rgba(17, 17, 17, .10);
        }

        .signal-row {
            display: grid;
            grid-template-columns: 48px 1fr 8px;
            gap: 18px;
            align-items: center;
            padding: 17px 0;
            border-bottom: 1px solid rgba(17, 17, 17, .10);
        }

        .home-analysis-card {
            max-width: 620px;
            margin-top: 26px;
            padding: 20px;
            border: 1px solid rgba(17, 17, 17, .10);
            border-radius: 26px;
            background: #fff;
        }

        .home-analysis-tabs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 14px;
        }

        .home-analysis-tab {
            min-height: 44px;
            border: 0;
            border-radius: 999px;
            background: var(--litera-cream);
            color: var(--litera-black);
            font: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .home-analysis-tab[aria-pressed="true"] {
            background: var(--litera-black);
            color: #fff;
        }

        .home-analysis-input {
            display: block;
            width: 100%;
            min-height: 92px;
            padding: 14px;
            border: 1px solid rgba(17, 17, 17, .14);
            border-radius: 18px;
            background: #fdfdfc;
            color: var(--litera-black);
            font: inherit;
            font-size: 15px;
            line-height: 1.5;
            resize: vertical;
        }

        .home-analysis-submit {
            width: 100%;
            min-height: 50px;
            margin-top: 12px;
            border: 0;
            border-radius: 999px;
            background: var(--litera-red);
            color: #fff;
            font: inherit;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
        }

        .home-learn-link {
            display: inline-block;
            margin-top: 14px;
            font-size: 15px;
            font-weight: 700;
        }

        .content-label { font-size: 13px; letter-spacing: .08em; }
        .content-heading { margin-top: 16px; font-size: clamp(30px, 3vw, 42px); line-height: 1.05; }
        .content-description, .signal-description, .human-copy, .human-note { font-size: 15px; line-height: 1.65; }
        .signal-row { grid-template-columns: 36px 1fr 8px; gap: 16px; padding: 18px 0; }
        .signal-name { font-size: 17px; }
        .signal-description { color: rgba(17, 17, 17, .62); }
        .human-label { font-size: 13px; }
        .cta-button { font-size: 16px; }

        .signal-number {
            color: rgba(17, 17, 17, .28);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .12em;
        }

        .signal-name {
            font-size: 14px;
            font-weight: 800;
        }

        .signal-description {
            max-width: 540px;
            margin-top: 4px;
            color: rgba(17, 17, 17, .43);
            font-size: 10px;
            line-height: 1.6;
        }

        .signal-mark {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(17, 17, 17, .20);
        }

        .signal-row.active .signal-number {
            color: var(--litera-red);
        }

        .signal-row.active .signal-mark {
            background: var(--litera-red);
        }

        /* =========================================================
           HUMAN CENTERED
        ========================================================== */

        .human-section {
            padding: 82px 0 88px;
            border-top: 1px solid rgba(17, 17, 17, .10);
        }

        .human-grid {
            display: grid;
            grid-template-columns: .92fr 1.08fr;
            gap: 70px;
            align-items: end;
        }

        .human-label {
            margin-bottom: 18px;
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .human-title {
            max-width: 720px;
            font-size: clamp(39px, 3.8vw, 60px);
            line-height: .90;
        }

        .human-copy {
            max-width: 610px;
            color: rgba(17, 17, 17, .50);
            font-size: 13px;
            line-height: 1.8;
        }

        .human-note {
            max-width: 500px;
            margin-top: 23px;
            padding-left: 20px;
            border-left: 2px solid var(--litera-red);
            color: rgba(17, 17, 17, .72);
            font-size: 12px;
            font-weight: 700;
            line-height: 1.7;
        }

        /* =========================================================
           CTA
        ========================================================== */

        .cta-section {
            padding: 90px 20px;
            background: var(--litera-red);
            color: #fff;
        }

        .cta-small {
            color: rgba(255, 255, 255, .65);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .20em;
            text-transform: uppercase;
        }

        .cta-title {
            max-width: 1000px;
            margin: 22px auto 0;
            font-size: clamp(42px, 4vw, 68px);
            line-height: .88;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 35px;
            padding: 15px 27px;
            border-radius: 999px;
            background: #fff;
            color: var(--litera-black);
            font-size: 13px;
            font-weight: 800;
            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease;
        }

        .cta-button:hover {
            background: var(--litera-black);
            color: #fff;
            transform: translateY(-2px);
        }

        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (min-width: 1600px) {

            .hero-grid {
                min-height: 600px;
            }

            .hero-art {
                width: 760px;
            }
        }

        @media (max-width: 1100px) {

            .hero-grid {
                min-height: auto;
            }

            .hero-copy {
                padding-top: 48px;
                padding-bottom: 25px;
            }

            .hero-title {
                font-size: clamp(52px, 7.5vw, 76px);
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .human-grid {
                grid-template-columns: 1fr;
                gap: 38px;
            }
        }

        @media (max-width: 767px) {

            .hero-section {
                padding-top: 94px;
                padding-bottom: 42px;
            }

            .hero-copy {
                padding-top: 38px;
                padding-bottom: 25px;
            }

            .hero-title {
                font-size: clamp(50px, 14vw, 64px);
            }

            .hero-description {
                font-size: 13px;
            }

            .hero-art {
                width: 112%;
                margin-left: -6%;
            }

            .hero-features {
                grid-template-columns: repeat(2, 1fr);
                margin-top: 27px;
            }

            .hero-feature:nth-child(3) {
                border-left: 0;
                border-top: 1px solid rgba(17, 17, 17, .10);
            }

            .hero-feature:nth-child(4) {
                border-top: 1px solid rgba(17, 17, 17, .10);
            }

            .hero-feature:nth-child(n + 3) {
                padding-top: 14px;
            }

            .content-section {
                padding-bottom: 62px;
            }

            .content-panel {
                padding: 24px;
                border-radius: 22px;
            }

            .signal-row {
                grid-template-columns: 35px 1fr 8px;
                gap: 13px;
                padding: 15px 0;
            }

            .signal-name {
                font-size: 13px;
            }

            .signal-description {
                font-size: 9px;
            }

            .human-section {
                padding: 65px 0;
            }

            .cta-section {
                padding: 70px 20px;
            }
        }

        .hero-title { font-size: clamp(38px, 4vw, 62px); line-height: .98; }
        .hero-features { display: none; }
        .signal-row:nth-child(n + 4) { display: none; }
        .signal-description { font-size: 15px; }
        .signal-name { font-size: 16px; }

        @media (max-width: 767px) {
            .hero-title { font-size: clamp(34px, 10vw, 44px); }
            .hero-description { font-size: 15px; }
        }

        @media (max-width: 1023px) {
            body { padding-bottom: 82px; }
            .hero-grid { grid-template-columns: minmax(0, 1fr); }
        }

        @media (max-width: 500px) {

            .signal-row {
                padding: 14px 0;
            }
        }
    </style>
</head>


<body>

    {{-- =========================================================
        SHARED NAVBAR
    ========================================================== --}}
    <x-litera-navbar active="home" />


    <main>

        {{-- =====================================================
            HERO
        ====================================================== --}}
        <section class="hero-section">

            <div class="mx-auto max-w-360 px-5 sm:px-8 lg:px-10">

                <div
                    class="hero-grid grid items-start lg:grid-cols-[46%_54%]"
                >

                    {{-- LEFT --}}
                    <div class="hero-copy relative z-10">

                        <h1 class="litera-display hero-title max-w-162.5">

                            <span class="block">
                                {{ __('hero_1') }}
                            </span>

                            <span class="block">
                                {{ __('hero_2') }}
                            </span>

                            <span class="block text-(--litera-red)">
                                {{ __('hero_3') }}
                            </span>

                        </h1>


                        <p class="hero-description mt-5 text-black/55">
                            {{ app()->isLocale('id')
                                ? 'Periksa informasi sebelum percaya atau membagikannya.'
                                : 'Check information before you trust or share it.' }}
                        </p>


                        <form id="homeAnalyzer" action="{{ route('analyze') }}" method="GET" class="home-analysis-card">
                            <input type="hidden" id="homeContentType" name="type" value="text">
                            <div class="home-analysis-tabs" role="group" aria-label="{{ app()->isLocale('id') ? 'Pilih jenis konten' : 'Choose content type' }}">
                                <button class="home-analysis-tab" type="button" aria-pressed="true" data-home-mode="text">{{ app()->isLocale('id') ? 'Teks' : 'Text' }}</button>
                                <button class="home-analysis-tab" type="button" aria-pressed="false" data-home-mode="video">Video</button>
                                <button class="home-analysis-tab" type="button" aria-pressed="false" data-home-mode="audio">Audio</button>
                            </div>
                            <label class="sr-only" for="homeContent">{{ app()->isLocale('id') ? 'Teks atau tautan konten' : 'Text or content link' }}</label>
                            <textarea id="homeContent" class="home-analysis-input" placeholder="{{ app()->isLocale('id') ? 'Tempel tautan atau masukkan konten' : 'Paste a link or enter content' }}"></textarea>
                            <button type="submit" class="home-analysis-submit">{{ __('analyze_content') }}</button>
                        </form>

                        <a href="{{ route('about') }}#how-it-works" class="home-learn-link">
                            {{ app()->isLocale('id') ? 'Lihat cara kerjanya' : 'See how it works' }}
                        </a>

                    </div>


                    {{-- RIGHT / HERO IMAGE --}}
                    <div
                        class="relative flex items-start justify-center pt-6 lg:pt-10"
                    >

                        <div class="hero-art">

                            <img
                                src="{{ asset('images/litera-hero-collage.png') }}"
                                alt="LITERA editorial content analysis visual"
                            >

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            ONE-LINK CHECK
        ====================================================== --}}
        <section class="content-section">

            <div class="mx-auto max-w-360 px-5 sm:px-8 lg:px-10">

                <div class="content-panel">

                    <div class="content-grid">

                        {{-- LEFT --}}
                        <div>

                            <div class="content-label">
                                {{ app()->isLocale('id') ? 'Yang kami temukan' : 'What we found' }}
                            </div>


                            <h2 class="litera-display content-heading">

                                {{ app()->isLocale('id')
                                    ? 'Pahami klaim, sumber, dan pilihan katanya.'
                                    : 'Understand the claim, sources, and wording.' }}

                            </h2>


                            <p class="content-description">

                                {{ app()->isLocale('id')
                                    ? 'Lihat hal penting dalam konten tanpa istilah teknis.'
                                    : 'See the important parts without technical terms.' }}

                            </p>

                        </div>


                        {{-- RIGHT --}}
                        <div class="signal-list">

                            {{-- CONTENT --}}
                        <div class="signal-row active">

                                <div class="signal-number">
                                    01
                                </div>

                                <div>

                                    <div class="signal-name">
                                        {{ app()->isLocale('id') ? 'Klaim utama' : 'Main claim' }}
                                    </div>

                                    <div class="signal-description">

                                        {{ app()->isLocale('id')
                                            ? 'Pernyataan penting dalam konten ditampilkan.'
                                            : 'Important statements in the content are surfaced.' }}

                                    </div>

                                </div>

                                <div class="signal-mark"></div>

                            </div>


                            {{-- INTENT --}}
                            <div class="signal-row">

                                <div class="signal-number">
                                    02
                                </div>

                                <div>

                                    <div class="signal-name">
                                        {{ app()->isLocale('id') ? 'Sumber pendukung' : 'Supporting sources' }}
                                    </div>

                                    <div class="signal-description">

                                        {{ app()->isLocale('id')
                                            ? 'Rujukan yang tersedia membantu memberi konteks.'
                                            : 'Available references add helpful context.' }}

                                    </div>

                                </div>

                                <div class="signal-mark"></div>

                            </div>


                            {{-- CLAIM --}}
                            <div class="signal-row active">

                                <div class="signal-number">
                                    03
                                </div>

                                <div>

                                    <div class="signal-name">
                                        {{ app()->isLocale('id') ? 'Pola bahasa' : 'Language patterns' }}
                                    </div>

                                    <div class="signal-description">

                                        {{ app()->isLocale('id')
                                            ? 'Pilihan kata yang perlu diperhatikan dijelaskan.'
                                            : 'Wording that may need a closer look is explained.' }}

                                    </div>

                                </div>

                                <div class="signal-mark"></div>

                            </div>


                            {{-- EVIDENCE --}}
                            <div class="signal-row">

                                <div class="signal-number">
                                    04
                                </div>

                                <div>

                                    <div class="signal-name">
                                        Evidence
                                    </div>

                                    <div class="signal-description">

                                        {{ app()->isLocale('id')
                                            ? 'Informasi pemeriksaan fakta dan rujukan yang tersedia ditampilkan.'
                                            : 'Available fact-checking information and references are surfaced.' }}

                                    </div>

                                </div>

                                <div class="signal-mark"></div>

                            </div>


                            {{-- LITERAREASON --}}
                            <div class="signal-row active">

                                <div class="signal-number">
                                    05
                                </div>

                                <div>

                                    <div class="signal-name">
                                        LiteraReason
                                    </div>

                                    <div class="signal-description">

                                        {{ app()->isLocale('id')
                                            ? 'Alasan dan indikator bahasa membantu pengguna memahami hasil.'
                                            : 'Reasons and language indicators help users understand the result.' }}

                                    </div>

                                </div>

                                <div class="signal-mark"></div>

                            </div>


                            {{-- HUMAN DECISION --}}
                            <div class="signal-row">

                                <div class="signal-number">
                                    06
                                </div>

                                <div>

                                    <div class="signal-name">
                                        Human Decision
                                    </div>

                                    <div class="signal-description">

                                        {{ app()->isLocale('id')
                                            ? 'Pengguna tetap menjadi pengambil keputusan akhir.'
                                            : 'The user remains the final decision-maker.' }}

                                    </div>

                                </div>

                                <div class="signal-mark"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            HUMAN-CENTERED AI
        ====================================================== --}}
        <section class="human-section">

            <div class="mx-auto max-w-360 px-5 sm:px-8 lg:px-10">

                <div class="human-grid">

                    {{-- LEFT --}}
                    <div>

                        <p class="human-label">
                            {{ app()->isLocale('id') ? 'Keputusan tetap milikmu' : 'Your decision comes first' }}
                        </p>


                        <h2 class="litera-display human-title">

                            {{ app()->isLocale('id')
                                ? 'AI membantu kamu memahami.'
                                : 'AI helps you understand.' }}

                            <span class="block text-(--litera-red)">

                                {{ app()->isLocale('id')
                                    ? 'Kamu tetap memutuskan.'
                                    : 'You still decide.' }}

                            </span>

                        </h2>

                    </div>


                    {{-- RIGHT --}}
                    <div>

                        <p class="human-copy">

                            {{ app()->isLocale('id')
                                ? 'LITERA membantu memeriksa informasi. Keputusan akhir tetap di tanganmu.'
                                : 'LITERA helps you check information. The final decision is yours.' }}

                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            CTA
        ====================================================== --}}
        <section class="cta-section">

        <div class="mx-auto max-w-262.5 text-center">
                <p class="cta-small">
                    {{ __('cta_small') }}
                </p>


                <h2 class="litera-display cta-title">

                    {{ __('cta_title') }}

                </h2>


                <a
                    href="{{ route('analyze') }}"
                    class="cta-button"
                >
                    {{ __('analyze_content') }}
                </a>

            </div>

        </section>

    </main>


    {{-- =========================================================
        SHARED FOOTER
    ========================================================== --}}
    <x-litera-footer />

    <script>
        document.querySelectorAll('[data-home-mode]').forEach(function (tab) {
            tab.addEventListener('click', function () {
                document.querySelectorAll('[data-home-mode]').forEach(function (item) {
                    item.setAttribute('aria-pressed', item === tab ? 'true' : 'false');
                });

                document.getElementById('homeContentType').value = tab.dataset.homeMode;
                document.getElementById('homeContent').placeholder = {
                    text: @js(app()->isLocale('id') ? 'Tempel tautan atau masukkan konten' : 'Paste a link or enter content'),
                    video: @js(app()->isLocale('id') ? 'Tempel tautan video di sini' : 'Paste a video link here'),
                    audio: @js(app()->isLocale('id') ? 'Tempel tautan audio di sini' : 'Paste an audio link here'),
                }[tab.dataset.homeMode];
            });
        });

        document.getElementById('homeAnalyzer').addEventListener('submit', function () {
            sessionStorage.setItem('litera-analysis-content', document.getElementById('homeContent').value);
        });
    </script>

</body>

</html>
