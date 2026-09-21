<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>History — LITERA</title>

    <meta
        name="description"
        content="{{ app()->isLocale('id')
            ? 'Riwayat analisis dan jejak literasi personal LITERA.'
            : 'LITERA analysis history and personal literacy trail.' }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>

        :root {
            --litera-red: #df252b;
            --litera-red-dark: #c91e25;
            --litera-black: #111111;
            --litera-cream: #f7f6f2;
            --litera-muted: rgba(17, 17, 17, .50);
            --litera-line: rgba(17, 17, 17, .10);
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


        .history-container {
            width: min(100% - 80px, 1440px);
            margin: 0 auto;
        }


        .litera-display {
            font-family: "Arial Black", Arial, sans-serif;
            font-weight: 900;
            letter-spacing: -0.075em;
        }


        /* =========================================================
           HERO
        ========================================================== */

        .history-hero {
            padding-top: 112px;
            padding-bottom: 62px;
        }


        .history-eyebrow {
            margin: 0 0 18px;
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .20em;
            text-transform: uppercase;
        }


        .history-title {
            max-width: 850px;
            margin: 0;
            font-size: clamp(54px, 5vw, 82px);
            line-height: .84;
        }


        .history-title-red {
            display: block;
            color: var(--litera-red);
        }


        .history-intro {
            max-width: 660px;
            margin: 25px 0 0;
            color: var(--litera-muted);
            font-size: 14px;
            line-height: 1.8;
        }


        /* =========================================================
           TRAIL SUMMARY
        ========================================================== */

        .trail-section {
            padding-bottom: 72px;
        }


        .trail-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--litera-line);
        }


        .trail-title {
            margin: 0;
            font-size: clamp(29px, 2.8vw, 42px);
            line-height: .95;
        }


        .prototype-badge {
            flex: 0 0 auto;
            padding: 8px 12px;
            border: 1px solid rgba(17, 17, 17, .12);
            border-radius: 999px;
            color: rgba(17, 17, 17, .42);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
        }


        .trail-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border-bottom: 1px solid var(--litera-line);
        }


        .trail-stat {
            padding: 27px 25px 25px 0;
        }


        .trail-stat + .trail-stat {
            padding-left: 25px;
            border-left: 1px solid var(--litera-line);
        }


        .trail-number {
            font-family: "Arial Black", Arial, sans-serif;
            font-size: clamp(32px, 3vw, 46px);
            line-height: 1;
            letter-spacing: -.06em;
        }


        .trail-label {
            margin-top: 8px;
            color: rgba(17, 17, 17, .42);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
        }


        /* =========================================================
           HISTORY LIST
        ========================================================== */

        .history-section {
            padding-bottom: 78px;
        }


        .section-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            margin-bottom: 20px;
        }


        .section-label {
            color: rgba(17, 17, 17, .40);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .15em;
            text-transform: uppercase;
        }


        .history-count {
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }


        .history-list {
            border-top: 1px solid var(--litera-line);
        }


        .history-item {
            display: grid;
            grid-template-columns: 82px minmax(0, 1.45fr) .75fr .85fr 38px;
            gap: 25px;
            align-items: center;
            padding: 23px 0;
            border-bottom: 1px solid var(--litera-line);
            transition: background .18s ease;
        }


        .history-item:hover {
            background: rgba(255, 255, 255, .38);
        }


        .history-date {
            color: rgba(17, 17, 17, .38);
            font-size: 10px;
            line-height: 1.5;
        }


        .history-content {
            min-width: 0;
        }


        .history-content-title {
            margin: 0;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.45;
        }


        .history-url {
            margin-top: 5px;
            overflow: hidden;
            color: rgba(17, 17, 17, .32);
            font-size: 9px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        .history-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }


        .history-tag {
            padding: 5px 8px;
            border: 1px solid rgba(17, 17, 17, .10);
            border-radius: 999px;
            color: rgba(17, 17, 17, .46);
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }


        .history-tag.red {
            border-color: rgba(223, 37, 43, .20);
            color: var(--litera-red);
        }


        .history-intent-label {
            color: rgba(17, 17, 17, .38);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
        }


        .history-intent-value {
            margin-top: 6px;
            font-size: 12px;
            font-weight: 800;
        }


        .verification {
            display: inline-flex;
            padding: 6px 9px;
            border-radius: 999px;
            background: rgba(223, 37, 43, .07);
            color: var(--litera-red);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
        }


        .verification.clear {
            background: rgba(17, 17, 17, .05);
            color: rgba(17, 17, 17, .45);
        }


        .history-arrow {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(17, 17, 17, .11);
            border-radius: 50%;
            background: transparent;
            color: rgba(17, 17, 17, .45);
            cursor: pointer;
            transition: .18s ease;
        }


        .history-item:hover .history-arrow {
            border-color: var(--litera-red);
            color: var(--litera-red);
            transform: translateX(2px);
        }


        /* =========================================================
           LITERAREASON
        ========================================================== */

        .reason-section {
            padding: 72px 0 80px;
            border-top: 1px solid var(--litera-line);
        }


        .reason-grid {
            display: grid;
            grid-template-columns: .76fr 1.24fr;
            gap: 70px;
            align-items: start;
        }


        .reason-title {
            max-width: 620px;
            margin: 0;
            font-size: clamp(39px, 3.8vw, 59px);
            line-height: .90;
        }


        .reason-description {
            max-width: 440px;
            margin: 20px 0 0;
            color: var(--litera-muted);
            font-size: 12.5px;
            line-height: 1.8;
        }


        .reason-list {
            border-top: 1px solid var(--litera-line);
        }


        .reason-row {
            display: grid;
            grid-template-columns: 165px 1fr;
            gap: 25px;
            padding: 19px 0;
            border-bottom: 1px solid var(--litera-line);
        }


        .reason-label {
            color: rgba(17, 17, 17, .38);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }


        .reason-value {
            color: rgba(17, 17, 17, .62);
            font-size: 12px;
            line-height: 1.75;
        }


        .reason-points {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }


        .reason-point {
            padding: 7px 10px;
            border: 1px solid rgba(17, 17, 17, .10);
            border-radius: 999px;
            color: rgba(17, 17, 17, .50);
            font-size: 9px;
            font-weight: 700;
        }


        .reason-note {
            margin-top: 16px;
            color: rgba(17, 17, 17, .30);
            font-size: 9px;
            line-height: 1.6;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1100px) {

            .history-container {
                width: min(100% - 64px, 1440px);
            }


            .history-item {
                grid-template-columns: 80px minmax(0, 1.5fr) .8fr 38px;
            }


            .history-verification {
                display: none;
            }


            .reason-grid {
                grid-template-columns: 1fr;
                gap: 42px;
            }

        }


        @media (max-width: 767px) {

            .history-container {
                width: min(100% - 40px, 1440px);
            }


            .history-hero {
                padding-top: 94px;
                padding-bottom: 48px;
            }


            .history-title {
                font-size: clamp(50px, 13vw, 68px);
            }


            .history-intro {
                font-size: 13px;
            }


            .trail-header {
                align-items: flex-start;
                flex-direction: column;
            }


            .trail-stats {
                grid-template-columns: 1fr;
            }


            .trail-stat {
                padding: 22px 0;
            }


            .trail-stat + .trail-stat {
                padding-left: 0;
                border-left: 0;
                border-top: 1px solid var(--litera-line);
            }


            .history-item {
                grid-template-columns: 1fr 34px;
                gap: 9px 18px;
                padding: 21px 0;
            }


            .history-date {
                grid-column: 1;
            }


            .history-content {
                grid-column: 1;
            }


            .history-intent {
                grid-column: 1;
            }


            .history-verification {
                display: block;
                grid-column: 1;
            }


            .history-arrow {
                grid-column: 2;
                grid-row: 1 / span 4;
            }


            .reason-section {
                padding-top: 58px;
                padding-bottom: 65px;
            }


            .reason-row {
                grid-template-columns: 1fr;
                gap: 7px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================================
        SHARED NAVBAR
    ========================================================== --}}
    <x-litera-navbar active="history" />


    <main>


        {{-- =====================================================
            HERO
        ====================================================== --}}
        <section class="history-hero">

            <div class="history-container">

                <p class="history-eyebrow">
                    {{ __('history') }}
                </p>


                <h1 class="litera-display history-title">

                    {{ app()->isLocale('id')
                        ? 'Jejak literasi'
                        : 'Your literacy' }}

                    <span class="history-title-red">

                        {{ app()->isLocale('id')
                            ? 'dari apa yang kamu periksa.'
                            : 'trail.' }}

                    </span>

                </h1>


                <p class="history-intro">

                    {{ app()->isLocale('id')
                        ? 'Lihat kembali konten yang pernah dianalisis dan kenali pola bahasa yang muncul sepanjang perjalananmu.'
                        : 'Revisit the content you have analyzed and recognize language patterns that appear along your journey.' }}

                </p>

            </div>

        </section>


        {{-- =====================================================
            LITERACY TRAIL SUMMARY
        ====================================================== --}}
        <section class="trail-section">

            <div class="history-container">

                <div class="trail-header">

                    <h2 class="litera-display trail-title">
                        Literacy Trail
                    </h2>


                    <span class="prototype-badge">
                        Prototype · Dummy Data
                    </span>

                </div>


                <div class="trail-stats">

                    <div class="trail-stat">

                        <div class="trail-number">
                            12
                        </div>

                        <div class="trail-label">

                            {{ app()->isLocale('id')
                                ? 'Konten diperiksa'
                                : 'Content checked' }}

                        </div>

                    </div>


                    <div class="trail-stat">

                        <div class="trail-number">
                            07
                        </div>

                        <div class="trail-label">

                            {{ app()->isLocale('id')
                                ? 'Klaim ditinjau'
                                : 'Claims reviewed' }}

                        </div>

                    </div>


                    <div class="trail-stat">

                        <div class="trail-number">
                            04
                        </div>

                        <div class="trail-label">

                            {{ app()->isLocale('id')
                                ? 'Pola bahasa ditemukan'
                                : 'Language patterns found' }}

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            RECENT ANALYSES
        ====================================================== --}}
        <section class="history-section">

            <div class="history-container">

                <div class="section-top">

                    <span class="section-label">

                        {{ app()->isLocale('id')
                            ? 'ANALISIS TERBARU'
                            : 'RECENT ANALYSES' }}

                    </span>


                    <span class="history-count">
                        04
                        {{ app()->isLocale('id')
                            ? 'riwayat'
                            : 'records' }}
                    </span>

                </div>


                <div class="history-list">


                    {{-- =================================================
                        ITEM 01
                    ================================================== --}}
                    <article class="history-item">

                        <div class="history-date">
                            21 Sep<br>
                            2026
                        </div>


                        <div class="history-content">

                            <h3 class="history-content-title">

                                {{ app()->isLocale('id')
                                    ? 'Konten promosi kesehatan di media sosial'
                                    : 'Health promotion content on social media' }}

                            </h3>


                            <div class="history-url">
                                example.com/post/health-123
                            </div>


                            <div class="history-tags">

                                <span class="history-tag red">
                                    Persuasive
                                </span>


                                <span class="history-tag">
                                    91% confidence
                                </span>

                            </div>

                        </div>


                        <div class="history-intent">

                            <div class="history-intent-label">
                                Intent
                            </div>

                            <div class="history-intent-value">

                                {{ app()->isLocale('id')
                                    ? 'Persuasif'
                                    : 'Persuasive' }}

                            </div>

                        </div>


                        <div>

                            <span class="verification">

                                {{ app()->isLocale('id')
                                    ? 'Perlu ditinjau'
                                    : 'Needs review' }}

                            </span>

                        </div>


                        <button
                            type="button"
                            class="history-arrow"
                            title="{{ app()->isLocale('id') ? 'Lihat detail' : 'View details' }}"
                        >

                            <svg
                                width="13"
                                height="13"
                                viewBox="0 0 24 24"
                                fill="none"
                            >

                                <path
                                    d="M5 12H19M13 6L19 12L13 18"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </button>

                    </article>


                    {{-- =================================================
                        ITEM 02
                    ================================================== --}}
                    <article class="history-item">

                        <div class="history-date">
                            20 Sep<br>
                            2026
                        </div>


                        <div class="history-content">

                            <h3 class="history-content-title">

                                {{ app()->isLocale('id')
                                    ? 'Informasi edukasi lingkungan'
                                    : 'Environmental education content' }}

                            </h3>


                            <div class="history-url">
                                example.com/video/environment-456
                            </div>


                            <div class="history-tags">

                                <span class="history-tag">
                                    Educative
                                </span>


                                <span class="history-tag">
                                    Audio-visual
                                </span>

                            </div>

                        </div>


                        <div class="history-intent">

                            <div class="history-intent-label">
                                Intent
                            </div>

                            <div class="history-intent-value">

                                {{ app()->isLocale('id')
                                    ? 'Edukatif'
                                    : 'Educative' }}

                            </div>

                        </div>


                        <div>

                            <span class="verification clear">

                                {{ app()->isLocale('id')
                                    ? 'Tersedia'
                                    : 'Available' }}

                            </span>

                        </div>


                        <button
                            type="button"
                            class="history-arrow"
                            title="{{ app()->isLocale('id') ? 'Lihat detail' : 'View details' }}"
                        >

                            <svg
                                width="13"
                                height="13"
                                viewBox="0 0 24 24"
                                fill="none"
                            >

                                <path
                                    d="M5 12H19M13 6L19 12L13 18"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </button>

                    </article>


                    {{-- =================================================
                        ITEM 03
                    ================================================== --}}
                    <article class="history-item">

                        <div class="history-date">
                            19 Sep<br>
                            2026
                        </div>


                        <div class="history-content">

                            <h3 class="history-content-title">

                                {{ app()->isLocale('id')
                                    ? 'Pernyataan tentang teknologi dan produktivitas'
                                    : 'Statement about technology and productivity' }}

                            </h3>


                            <div class="history-url">
                                example.com/article/technology-789
                            </div>


                            <div class="history-tags">

                                <span class="history-tag">
                                    Commercial
                                </span>

                            </div>

                        </div>


                        <div class="history-intent">

                            <div class="history-intent-label">
                                Intent
                            </div>

                            <div class="history-intent-value">

                                {{ app()->isLocale('id')
                                    ? 'Komersial'
                                    : 'Commercial' }}

                            </div>

                        </div>


                        <div>

                            <span class="verification">

                                {{ app()->isLocale('id')
                                    ? 'Perlu ditinjau'
                                    : 'Needs review' }}

                            </span>

                        </div>


                        <button
                            type="button"
                            class="history-arrow"
                            title="{{ app()->isLocale('id') ? 'Lihat detail' : 'View details' }}"
                        >

                            <svg
                                width="13"
                                height="13"
                                viewBox="0 0 24 24"
                                fill="none"
                            >

                                <path
                                    d="M5 12H19M13 6L19 12L13 18"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </button>

                    </article>


                    {{-- =================================================
                        ITEM 04
                    ================================================== --}}
                    <article class="history-item">

                        <div class="history-date">
                            18 Sep<br>
                            2026
                        </div>


                        <div class="history-content">

                            <h3 class="history-content-title">

                                {{ app()->isLocale('id')
                                    ? 'Unggahan dengan klaim tanpa sumber'
                                    : 'Post containing an unsupported claim' }}

                            </h3>


                            <div class="history-url">
                                example.com/post/claim-321
                            </div>


                            <div class="history-tags">

                                <span class="history-tag red">
                                    Provocative
                                </span>


                                <span class="history-tag">
                                    Audio-visual
                                </span>

                            </div>

                        </div>


                        <div class="history-intent">

                            <div class="history-intent-label">
                                Intent
                            </div>

                            <div class="history-intent-value">

                                {{ app()->isLocale('id')
                                    ? 'Provokatif'
                                    : 'Provocative' }}

                            </div>

                        </div>


                        <div>

                            <span class="verification">

                                {{ app()->isLocale('id')
                                    ? 'Perlu ditinjau'
                                    : 'Needs review' }}

                            </span>

                        </div>


                        <button
                            type="button"
                            class="history-arrow"
                            title="{{ app()->isLocale('id') ? 'Lihat detail' : 'View details' }}"
                        >

                            <svg
                                width="13"
                                height="13"
                                viewBox="0 0 24 24"
                                fill="none"
                            >

                                <path
                                    d="M5 12H19M13 6L19 12L13 18"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </button>

                    </article>

                </div>

            </div>

        </section>


        {{-- =====================================================
            LITERAREASON / LITERACY TRAIL
        ====================================================== --}}
        <section class="reason-section">

            <div class="history-container">

                <div class="reason-grid">


                    {{-- LEFT --}}
                    <div>

                        <p class="history-eyebrow">
                            LiteraReason
                        </p>


                        <h2 class="litera-display reason-title">

                            {{ app()->isLocale('id')
                                ? 'Belajar dari pola yang kamu temui.'
                                : 'Learn from the patterns you encounter.' }}

                        </h2>


                        <p class="reason-description">

                            {{ app()->isLocale('id')
                                ? 'Jejak literasi membantu pengguna mengenali pola bahasa yang muncul berulang kali dari konten yang dianalisis.'
                                : 'Your literacy trail helps you recognize language patterns that repeatedly appear across analyzed content.' }}

                        </p>

                    </div>


                    {{-- RIGHT --}}
                    <div class="reason-list">


                        {{-- COMMON --}}
                        <div class="reason-row">

                            <div class="reason-label">

                                {{ app()->isLocale('id')
                                    ? 'Sering ditemukan'
                                    : 'Common patterns' }}

                            </div>


                            <div class="reason-value">

                                <div class="reason-points">

                                    <span class="reason-point">

                                        {{ app()->isLocale('id')
                                            ? 'Diksi emosional'
                                            : 'Emotional wording' }}

                                    </span>


                                    <span class="reason-point">

                                        {{ app()->isLocale('id')
                                            ? 'Klaim tanpa sumber'
                                            : 'Unsupported claim' }}

                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- OTHER --}}
                        <div class="reason-row">

                            <div class="reason-label">

                                {{ app()->isLocale('id')
                                    ? 'Pola lainnya'
                                    : 'Other patterns' }}

                            </div>


                            <div class="reason-value">

                                <div class="reason-points">

                                    <span class="reason-point">

                                        {{ app()->isLocale('id')
                                            ? 'Generalisasi'
                                            : 'Generalization' }}

                                    </span>


                                    <span class="reason-point">

                                        {{ app()->isLocale('id')
                                            ? 'Bahasa persuasif'
                                            : 'Persuasive language' }}

                                    </span>


                                    <span class="reason-point">

                                        {{ app()->isLocale('id')
                                            ? 'Klaim absolut'
                                            : 'Absolute claim' }}

                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- PURPOSE --}}
                        <div class="reason-row">

                            <div class="reason-label">

                                {{ app()->isLocale('id')
                                    ? 'Tujuan'
                                    : 'Purpose' }}

                            </div>


                            <div class="reason-value">

                                {{ app()->isLocale('id')
                                    ? 'Membantu pengguna mengenali pola dan mempertimbangkan informasi secara lebih kritis.'
                                    : 'Help users recognize patterns and consider information more critically.' }}

                            </div>

                        </div>


                    </div>

                </div>


                <p class="reason-note">

                    {{ app()->isLocale('id')
                        ? 'Data yang ditampilkan merupakan data dummy untuk kebutuhan prototype.'
                        : 'The information shown is dummy data for prototype purposes.' }}

                </p>

            </div>

        </section>


    </main>


    {{-- =========================================================
        SHARED FOOTER
    ========================================================== --}}
    <x-litera-footer />


</body>

</html>