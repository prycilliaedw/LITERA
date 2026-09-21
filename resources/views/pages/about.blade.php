<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>About — LITERA</title>

    <meta
        name="description"
        content="{{ __('about_meta') }}"
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


        /* =========================================================
           TYPOGRAPHY
        ========================================================== */

        .litera-display {
            font-family: "Arial Black", Arial, sans-serif;
            font-weight: 900;
            letter-spacing: -0.075em;
        }


        .about-container {
            width: min(100% - 80px, 1440px);
            margin: 0 auto;
        }


        .about-eyebrow {
            margin: 0 0 17px;
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .20em;
            text-transform: uppercase;
        }


        .about-section {
            padding: 68px 0;
            border-top: 1px solid var(--litera-line);
        }


        /* =========================================================
           HERO
        ========================================================== */

        .about-hero {
            padding-top: 112px;
            padding-bottom: 42px;
        }


        .about-hero-grid {
            display: grid;
            grid-template-columns: 47% 53%;
            align-items: start;
            gap: 20px;
        }


        .about-hero-copy {
            padding-top: 0;
            padding-bottom: 20px;
        }


        .about-title {
            max-width: 700px;
            margin: 0;
            font-size: clamp(54px, 5vw, 82px);
            line-height: .84;
        }


        .about-title-red {
            display: block;
            color: var(--litera-red);
        }


        .about-intro {
            max-width: 560px;
            margin: 23px 0 0;
            color: var(--litera-muted);
            font-size: 14px;
            line-height: 1.8;
        }


        /* =========================================================
           FOCUS LENS
        ========================================================== */

        .lens-area {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 8px;
        }


        .lens-visual {
            position: relative;
            width: min(100%, 520px);
            height: 350px;
        }


        .lens-frame {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 250px;
            height: 250px;
            border: 1px solid rgba(17, 17, 17, .18);
            transform: translate(-50%, -50%);
        }


        .lens-frame::before {
            content: "";
            position: absolute;
            inset: 27px;
            border: 1px solid rgba(17, 17, 17, .10);
        }


        .lens-circle {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 205px;
            height: 205px;
            border: 1px solid rgba(17, 17, 17, .28);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }


        .lens-circle-red {
            position: absolute;
            top: 50%;
            left: calc(50% + 18px);
            width: 155px;
            height: 155px;
            border: 2px solid var(--litera-red);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }


        .lens-core {
            position: absolute;
            top: 50%;
            left: calc(50% + 18px);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: var(--litera-black);
            transform: translate(-50%, -50%);
        }


        .lens-core::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--litera-red);
            transform: translate(-50%, -50%);
        }


        .lens-block {
            position: absolute;
            top: 49%;
            left: 10%;
            width: 92px;
            height: 92px;
            border: 1px solid rgba(17, 17, 17, .15);
            background: rgba(255, 255, 255, .34);
            transform: rotate(-9deg) translateY(-50%);
        }


        .lens-block::before {
            content: "";
            position: absolute;
            top: 17px;
            left: 17px;
            width: 57px;
            height: 3px;
            background: var(--litera-black);
            box-shadow:
                0 13px 0 rgba(17, 17, 17, .20),
                0 26px 0 rgba(17, 17, 17, .11);
        }


        .lens-accent {
            position: absolute;
            right: 9%;
            bottom: 14%;
            width: 60px;
            height: 60px;
            background: var(--litera-red);
            transform: rotate(12deg);
        }


        .lens-accent::before {
            content: "";
            position: absolute;
            inset: 11px;
            background: var(--litera-cream);
        }


        .lens-dot {
            position: absolute;
            top: 14%;
            right: 17%;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--litera-black);
        }


        .lens-cross {
            position: absolute;
            left: 4%;
            bottom: 20%;
            width: 26px;
            height: 26px;
        }


        .lens-cross::before,
        .lens-cross::after {
            content: "";
            position: absolute;
            background: var(--litera-red);
        }


        .lens-cross::before {
            top: 12px;
            left: 0;
            width: 26px;
            height: 1px;
        }


        .lens-cross::after {
            top: 0;
            left: 12px;
            width: 1px;
            height: 26px;
        }


        /* =========================================================
           HUMAN CENTERED
        ========================================================== */

        .human-grid {
            display: grid;
            grid-template-columns: 56% 44%;
            gap: 65px;
            align-items: end;
        }


        .section-title {
            max-width: 850px;
            margin: 0;
            font-size: clamp(40px, 4vw, 64px);
            line-height: .90;
        }


        .section-title-red {
            display: block;
            color: var(--litera-red);
        }


        .human-note {
            max-width: 490px;
            padding-left: 22px;
            border-left: 2px solid var(--litera-red);
        }


        .human-note p {
            margin: 0;
            color: var(--litera-muted);
            font-size: 13px;
            line-height: 1.8;
        }


        .human-note p + p {
            margin-top: 17px;
        }


        /* =========================================================
           CORE CAPABILITIES
        ========================================================== */

        .capabilities-grid {
            display: grid;
            grid-template-columns: 34% 66%;
            gap: 55px;
        }


        .capabilities-list {
            border-top: 1px solid var(--litera-line);
        }


        .capability {
            display: grid;
            grid-template-columns: 58px 1fr;
            gap: 20px;
            padding: 22px 0;
            border-bottom: 1px solid var(--litera-line);
        }


        .capability-number {
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .12em;
        }


        .capability-name {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.025em;
        }


        .capability-description {
            max-width: 640px;
            margin: 7px 0 0;
            color: var(--litera-muted);
            font-size: 12px;
            line-height: 1.75;
        }


        /* =========================================================
           HOW LITERA WORKS
        ========================================================== */

        .process-intro {
            max-width: 650px;
            margin-top: 18px;
            color: var(--litera-muted);
            font-size: 12.5px;
            line-height: 1.8;
        }


        .process {
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            margin-top: 45px;
        }


        .process::before {
            content: "";
            position: absolute;
            top: 19px;
            left: 2%;
            right: 2%;
            height: 1px;
            background: rgba(17, 17, 17, .16);
        }


        .process-step {
            position: relative;
            padding-right: 20px;
        }


        .process-number {
            position: relative;
            z-index: 2;
            width: 39px;
            height: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(17, 17, 17, .15);
            border-radius: 50%;
            background: var(--litera-cream);
            color: rgba(17, 17, 17, .58);
            font-size: 10px;
            font-weight: 800;
        }


        .process-step.active .process-number {
            border-color: var(--litera-red);
            background: var(--litera-red);
            color: #fff;
        }


        .process-name {
            margin: 17px 0 7px;
            font-size: 15px;
            font-weight: 800;
        }


        .process-description {
            max-width: 190px;
            margin: 0;
            color: rgba(17, 17, 17, .46);
            font-size: 10.5px;
            line-height: 1.65;
        }


        /* =========================================================
           TECHNOLOGY
        ========================================================== */

        .technology-header {
            display: grid;
            grid-template-columns: 40% 60%;
            gap: 55px;
            align-items: end;
        }


        .technology-intro {
            max-width: 650px;
            margin: 0;
            color: var(--litera-muted);
            font-size: 12.5px;
            line-height: 1.8;
        }


        .tech-list {
            margin-top: 42px;
            border-top: 1px solid var(--litera-line);
        }


        .tech-item {
            display: grid;
            grid-template-columns: 58px 1fr 1.25fr;
            gap: 24px;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid var(--litera-line);
        }


        .tech-number {
            color: rgba(17, 17, 17, .32);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .14em;
        }


        .tech-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.02em;
        }


        .tech-description {
            color: rgba(17, 17, 17, .49);
            font-size: 11px;
            line-height: 1.65;
        }


        /* =========================================================
           ETHICS & PRIVACY
        ========================================================== */

        .ethics-grid {
            display: grid;
            grid-template-columns: 40% 60%;
            gap: 55px;
        }


        .ethics-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0 42px;
            border-top: 1px solid var(--litera-line);
        }


        .ethics-item {
            padding: 21px 0;
            border-bottom: 1px solid var(--litera-line);
        }


        .ethics-number {
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .13em;
        }


        .ethics-name {
            margin: 10px 0 0;
            font-size: 16px;
            font-weight: 800;
        }


        .ethics-description {
            max-width: 340px;
            margin: 7px 0 0;
            color: var(--litera-muted);
            font-size: 11px;
            line-height: 1.7;
        }


        /* =========================================================
           IDENTITY
        ========================================================== */

        .identity-grid {
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            gap: 70px;
            align-items: end;
        }


        .identity-title {
            max-width: 850px;
            margin: 0;
            font-size: clamp(32px, 3.5vw, 55px);
            line-height: .95;
        }


        .identity-description {
            max-width: 720px;
            margin: 22px 0 0;
            color: var(--litera-muted);
            font-size: 12.5px;
            line-height: 1.8;
        }


        .identity-tags {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 8px;
        }


        .identity-tag {
            padding: 9px 13px;
            border: 1px solid rgba(17, 17, 17, .13);
            border-radius: 999px;
            color: rgba(17, 17, 17, .55);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
        }


        .identity-tag.red {
            border-color: var(--litera-red);
            color: var(--litera-red);
        }


        /* =========================================================
           CTA
        ========================================================== */

        .about-cta {
            padding: 84px 20px;
            background: var(--litera-red);
            color: #fff;
            text-align: center;
        }


        .about-cta-small {
            color: rgba(255, 255, 255, .68);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .20em;
            text-transform: uppercase;
        }


        .about-cta-title {
            max-width: 920px;
            margin: 22px auto 0;
            font-size: clamp(42px, 4vw, 66px);
            line-height: .88;
        }


        .about-cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 34px;
            padding: 15px 26px;
            border-radius: 999px;
            background: #fff;
            color: var(--litera-black);
            font-size: 13px;
            font-weight: 800;
            transition: .2s ease;
        }


        .about-cta-button:hover {
            background: var(--litera-black);
            color: #fff;
            transform: translateY(-2px);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1100px) {

            .about-container {
                width: min(100% - 64px, 1440px);
            }


            .about-hero-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }


            .about-hero-copy {
                padding-bottom: 0;
            }


            .lens-area {
                justify-content: flex-start;
                padding-top: 0;
            }


            .human-grid,
            .capabilities-grid,
            .technology-header,
            .ethics-grid,
            .identity-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }


            .identity-tags {
                justify-content: flex-start;
            }


            .process {
                grid-template-columns: repeat(3, 1fr);
                gap: 35px 10px;
            }


            .process::before {
                display: none;
            }

        }


        @media (max-width: 767px) {

            .about-container {
                width: min(100% - 40px, 1440px);
            }


            .about-hero {
                padding-top: 94px;
                padding-bottom: 35px;
            }


            .about-title {
                font-size: clamp(50px, 13vw, 68px);
            }


            .about-intro {
                font-size: 13px;
            }


            .lens-visual {
                height: 290px;
            }


            .lens-frame {
                width: 210px;
                height: 210px;
            }


            .lens-frame::before {
                inset: 23px;
            }


            .lens-circle {
                width: 175px;
                height: 175px;
            }


            .lens-circle-red {
                width: 130px;
                height: 130px;
            }


            .lens-core {
                width: 58px;
                height: 58px;
            }


            .lens-block {
                width: 70px;
                height: 70px;
            }


            .lens-block::before {
                top: 14px;
                left: 14px;
                width: 43px;
                height: 2px;
                box-shadow:
                    0 10px 0 rgba(17, 17, 17, .20),
                    0 20px 0 rgba(17, 17, 17, .11);
            }


            .lens-accent {
                width: 48px;
                height: 48px;
            }


            .lens-cross {
                left: 2%;
                bottom: 18%;
            }


            .about-section {
                padding: 58px 0;
            }


            .capability {
                grid-template-columns: 40px 1fr;
                gap: 13px;
            }


            .capability-name {
                font-size: 17px;
            }


            .process {
                grid-template-columns: 1fr;
                gap: 27px;
            }


            .process-step {
                display: grid;
                grid-template-columns: 39px 1fr;
                column-gap: 17px;
                padding-right: 0;
            }


            .process-step .process-number {
                grid-row: 1 / span 2;
            }


            .process-name {
                margin-top: 1px;
            }


            .process-description {
                grid-column: 2;
                max-width: 100%;
            }


            .tech-item {
                grid-template-columns: 45px 1fr;
                gap: 12px;
            }


            .tech-description {
                grid-column: 2;
            }


            .ethics-list {
                grid-template-columns: 1fr;
            }


            .identity-tags {
                justify-content: flex-start;
            }


            .about-cta {
                padding: 68px 20px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================================
        SHARED NAVBAR
    ========================================================== --}}
    <x-litera-navbar active="about" />


    <main>


        {{-- =====================================================
            HERO
        ====================================================== --}}
        <section class="about-hero">

            <div class="about-container">

                <div class="about-hero-grid">


                    {{-- LEFT --}}
                    <div class="about-hero-copy">

                        <p class="about-eyebrow">
                            {{ __('about_label') }}
                        </p>


                        <h1 class="litera-display about-title">

                            {{ __('about_title_1') }}

                            <span class="about-title-red">
                                {{ __('about_title_2') }}
                            </span>

                        </h1>


                        <p class="about-intro">
                            {{ __('about_intro') }}
                        </p>

                    </div>


                    {{-- RIGHT --}}
                    <div class="lens-area">

                        <div class="lens-visual">

                            <div class="lens-frame"></div>

                            <div class="lens-circle"></div>

                            <div class="lens-circle-red"></div>

                            <div class="lens-core"></div>

                            <div class="lens-block"></div>

                            <div class="lens-accent"></div>

                            <div class="lens-dot"></div>

                            <div class="lens-cross"></div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            HUMAN CENTERED AI
        ====================================================== --}}
        <section class="about-section">

            <div class="about-container">

                <div class="human-grid">

                    <div>

                        <p class="about-eyebrow">
                            {{ __('human_centered_label') }}
                        </p>


                        <h2 class="litera-display section-title">

                            {{ __('human_title') }}

                            <span class="section-title-red">
                                {{ __('human_title_2') }}
                            </span>

                        </h2>

                    </div>


                    <div class="human-note">

                        <p>
                            {{ __('human_description_1') }}
                        </p>


                        <p>
                            {{ __('human_description_2') }}
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            CORE CAPABILITIES
        ====================================================== --}}
        <section
            id="features"
            class="about-section"
        >

            <div class="about-container">

                <div class="capabilities-grid">


                    <div>

                        <p class="about-eyebrow">

                            {{ app()->isLocale('id')
                                ? 'KEMAMPUAN UTAMA'
                                : 'CORE CAPABILITIES' }}

                        </p>


                        <h2 class="litera-display section-title">

                            {{ app()->isLocale('id')
                                ? 'Empat cara LITERA membantu kamu memahami.'
                                : 'Four ways LITERA helps you understand.' }}

                        </h2>

                    </div>


                    <div class="capabilities-list">


                        {{-- 01 --}}
                        <div class="capability">

                            <div class="capability-number">
                                01
                            </div>


                            <div>

                                <h3 class="capability-name">
                                    One-Link Check
                                </h3>


                                <p class="capability-description">

                                    {{ app()->isLocale('id')
                                        ? 'Satu tautan dari platform digital diurai menjadi konten yang siap dianalisis.'
                                        : 'A single link from a digital platform is extracted into content ready for analysis.' }}

                                </p>

                            </div>

                        </div>


                        {{-- 02 --}}
                        <div class="capability">

                            <div class="capability-number">
                                02
                            </div>


                            <div>

                                <h3 class="capability-name">
                                    FactLens
                                </h3>


                                <p class="capability-description">

                                    {{ app()->isLocale('id')
                                        ? 'Klaim utama dicocokkan dengan informasi pemeriksaan fakta dan rujukan yang tersedia.'
                                        : 'Main claims are matched against available fact-checking information and references.' }}

                                </p>

                            </div>

                        </div>


                        {{-- 03 --}}
                        <div class="capability">

                            <div class="capability-number">
                                03
                            </div>


                            <div>

                                <h3 class="capability-name">
                                    IntentScope
                                </h3>


                                <p class="capability-description">

                                    {{ app()->isLocale('id')
                                        ? 'Menganalisis intensi pesan dan memberikan rekomendasi kelayakan usia berdasarkan pendekatan psikolinguistik perkembangan.'
                                        : 'Analyzes message intent and provides age suitability recommendations based on developmental psycholinguistic considerations.' }}

                                </p>

                            </div>

                        </div>


                        {{-- 04 --}}
                        <div class="capability">

                            <div class="capability-number">
                                04
                            </div>


                            <div>

                                <h3 class="capability-name">
                                    LiteraReason
                                </h3>


                                <p class="capability-description">

                                    {{ app()->isLocale('id')
                                        ? 'Menjelaskan indikator bahasa seperti diksi emosional, klaim tanpa sumber, dan generalisasi berlebihan.'
                                        : 'Explains language indicators such as emotional wording, unsupported claims, and overgeneralization.' }}

                                </p>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            HOW LITERA WORKS
        ====================================================== --}}
        <section
            id="how-it-works"
            class="about-section"
        >

            <div class="about-container">

                <p class="about-eyebrow">
                    {{ __('how_litera_works') }}
                </p>


                <h2 class="litera-display section-title">
                    {{ __('how_title') }}
                </h2>


                <p class="process-intro">
                    {{ __('how_description') }}
                </p>


                <div class="process">


                    <div class="process-step active">

                        <div class="process-number">
                            01
                        </div>


                        <div>

                            <h3 class="process-name">
                                {{ __('input') }}
                            </h3>


                            <p class="process-description">
                                {{ __('input_description') }}
                            </p>

                        </div>

                    </div>


                    <div class="process-step">

                        <div class="process-number">
                            02
                        </div>


                        <div>

                            <h3 class="process-name">
                                {{ __('extract') }}
                            </h3>


                            <p class="process-description">
                                {{ __('extract_description') }}
                            </p>

                        </div>

                    </div>


                    <div class="process-step">

                        <div class="process-number">
                            03
                        </div>


                        <div>

                            <h3 class="process-name">
                                {{ __('analyze_step') }}
                            </h3>


                            <p class="process-description">
                                {{ __('analyze_description') }}
                            </p>

                        </div>

                    </div>


                    <div class="process-step">

                        <div class="process-number">
                            04
                        </div>


                        <div>

                            <h3 class="process-name">
                                {{ __('verify') }}
                            </h3>


                            <p class="process-description">
                                {{ __('verify_description') }}
                            </p>

                        </div>

                    </div>


                    <div class="process-step active">

                        <div class="process-number">
                            05
                        </div>


                        <div>

                            <h3 class="process-name">
                                {{ __('understand') }}
                            </h3>


                            <p class="process-description">
                                {{ __('understand_description') }}
                            </p>

                        </div>

                    </div>


                </div>

            </div>

        </section>


        {{-- =====================================================
            TECHNOLOGY
        ====================================================== --}}
        <section class="about-section">

            <div class="about-container">

                <div class="technology-header">


                    <div>

                        <p class="about-eyebrow">
                            {{ __('technology_label') }}
                        </p>


                        <h2 class="litera-display section-title">
                            {{ __('technology_title') }}
                        </h2>

                    </div>


                    <p class="technology-intro">
                        {{ __('technology_description') }}
                    </p>

                </div>


                <div class="tech-list">


                    <div class="tech-item">

                        <div class="tech-number">
                            01
                        </div>


                        <div class="tech-name">
                            Whisper
                        </div>


                        <div class="tech-description">
                            {{ __('whisper_description') }}
                        </div>

                    </div>


                    <div class="tech-item">

                        <div class="tech-number">
                            02
                        </div>


                        <div class="tech-name">
                            IndoBERT
                        </div>


                        <div class="tech-description">
                            {{ __('indobert_description') }}
                        </div>

                    </div>


                    <div class="tech-item">

                        <div class="tech-number">
                            03
                        </div>


                        <div class="tech-name">
                            Google Fact Check Tools API
                        </div>


                        <div class="tech-description">
                            {{ __('factcheck_description') }}
                        </div>

                    </div>


                    <div class="tech-item">

                        <div class="tech-number">
                            04
                        </div>


                        <div class="tech-name">
                            FastAPI
                        </div>


                        <div class="tech-description">
                            {{ __('fastapi_description') }}
                        </div>

                    </div>


                </div>

            </div>

        </section>


        {{-- =====================================================
            ETHICS & PRIVACY
        ====================================================== --}}
        <section
            id="ethics"
            class="about-section"
        >

            <div class="about-container">

                <div class="ethics-grid">


                    <div>

                        <p class="about-eyebrow">

                            {{ app()->isLocale('id')
                                ? 'ETIKA & PRIVASI'
                                : 'ETHICS & PRIVACY' }}

                        </p>


                        <h2 class="litera-display section-title">

                            {{ app()->isLocale('id')
                                ? 'Tetap menempatkan manusia di pusat.'
                                : 'Keeping people at the center.' }}

                        </h2>

                    </div>


                    <div class="ethics-list">


                        <div class="ethics-item">

                            <div class="ethics-number">
                                01
                            </div>


                            <h3 class="ethics-name">

                                {{ app()->isLocale('id')
                                    ? 'Bukan pemblokiran'
                                    : 'No automatic blocking' }}

                            </h3>


                            <p class="ethics-description">

                                {{ app()->isLocale('id')
                                    ? 'LITERA memberikan rekomendasi untuk membantu penilaian, bukan keputusan pemblokiran otomatis.'
                                    : 'LITERA provides recommendations to support assessment, rather than automatic blocking decisions.' }}

                            </p>

                        </div>


                        <div class="ethics-item">

                            <div class="ethics-number">
                                02
                            </div>


                            <h3 class="ethics-name">

                                {{ app()->isLocale('id')
                                    ? 'Privasi'
                                    : 'Privacy' }}

                            </h3>


                            <p class="ethics-description">

                                {{ app()->isLocale('id')
                                    ? 'Berkas yang diproses tidak dirancang untuk disimpan secara permanen.'
                                    : 'Processed files are not designed to be permanently stored.' }}

                            </p>

                        </div>


                        <div class="ethics-item">

                            <div class="ethics-number">
                                03
                            </div>


                            <h3 class="ethics-name">

                                {{ app()->isLocale('id')
                                    ? 'Dapat dijelaskan'
                                    : 'Explainable' }}

                            </h3>


                            <p class="ethics-description">

                                {{ app()->isLocale('id')
                                    ? 'Hasil dilengkapi alasan dan indikator yang membantu pengguna memahami proses analisis.'
                                    : 'Results include reasons and indicators that help users understand the analysis.' }}

                            </p>

                        </div>


                        <div class="ethics-item">

                            <div class="ethics-number">
                                04
                            </div>


                            <h3 class="ethics-name">

                                {{ app()->isLocale('id')
                                    ? 'Manusia tetap memutuskan'
                                    : 'Humans still decide' }}

                            </h3>


                            <p class="ethics-description">

                                {{ app()->isLocale('id')
                                    ? 'AI berfungsi sebagai pendamping penilaian, bukan pengganti keputusan manusia.'
                                    : 'AI acts as decision support, not as a replacement for human decisions.' }}

                            </p>

                        </div>


                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            INNOVATION IDENTITY
        ====================================================== --}}
        <section class="about-section">

            <div class="about-container">

                <div class="identity-grid">


                    <div>

                        <p class="about-eyebrow">
                            {{ __('project_label') }}
                        </p>


                        <h2 class="litera-display identity-title">
                            {{ __('project_title') }}
                        </h2>


                        <p class="identity-description">
                            {{ __('project_description') }}
                        </p>

                    </div>


                    <div class="identity-tags">

                        <span class="identity-tag red">
                            Human-Centered AI
                        </span>


                        <span class="identity-tag">
                            Trusted
                        </span>


                        <span class="identity-tag">
                            Ethical
                        </span>


                        <span class="identity-tag">
                            Sustainable
                        </span>

                    </div>


                </div>

            </div>

        </section>


        {{-- =====================================================
            CTA
        ====================================================== --}}
        <section class="about-cta">

            <div>

                <p class="about-cta-small">
                    {{ __('cta_small') }}
                </p>


                <h2 class="litera-display about-cta-title">
                    {{ __('about_cta_title') }}
                </h2>


                <a
                    href="{{ route('analyze') }}"
                    class="about-cta-button"
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


</body>

</html>