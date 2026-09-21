<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Analyze — LITERA</title>

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


        .analyze-container {
            width: min(100% - 80px, 1440px);
            margin: 0 auto;
        }


        .analyze-eyebrow {
            margin: 0 0 18px;
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .20em;
            text-transform: uppercase;
        }


        /* =========================================================
           BUTTON
        ========================================================== */

        .analyze-button {
            border: 0;
            border-radius: 999px;
            background: var(--litera-red);
            color: #fff;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition:
                background .2s ease,
                transform .2s ease,
                opacity .2s ease;
        }


        .analyze-button:hover {
            background: var(--litera-red-dark);
            transform: translateY(-1px);
        }


        .analyze-button.loading {
            opacity: .65;
            cursor: wait;
            transform: none;
        }


        /* =========================================================
           HERO
        ========================================================== */

        .analyze-hero {
            padding-top: 112px;
            padding-bottom: 55px;
        }


        .hero-title {
            max-width: 850px;
            margin: 0;
            font-size: clamp(54px, 5vw, 82px);
            line-height: .84;
        }


        .hero-title-red {
            display: block;
            color: var(--litera-red);
        }


        .hero-description {
            max-width: 650px;
            margin: 25px 0 0;
            color: var(--litera-muted);
            font-size: 14px;
            line-height: 1.8;
        }


        /* =========================================================
           ANALYZE INPUT
        ========================================================== */

        .analyze-box {
            margin-top: 47px;
            border-top: 1px solid var(--litera-line);
            border-bottom: 1px solid var(--litera-line);
        }


        .analyze-box-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 17px 0;
            border-bottom: 1px solid var(--litera-line);
        }


        .analyze-box-label {
            color: rgba(17, 17, 17, .38);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .15em;
            text-transform: uppercase;
        }


        .analyze-box-method {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--litera-red);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
        }


        .method-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--litera-red);
        }


        .input-grid {
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 65px;
            padding: 46px 0 50px;
        }


        .input-title {
            max-width: 600px;
            margin: 0;
            font-size: clamp(33px, 3vw, 46px);
            line-height: .92;
        }


        .input-title-red {
            color: var(--litera-red);
        }


        .input-description {
            max-width: 620px;
            margin: 17px 0 0;
            color: var(--litera-muted);
            font-size: 12px;
            line-height: 1.75;
        }


        /* =========================================================
           LINK INPUT
        ========================================================== */

        .link-box {
            margin-top: 28px;
            padding: 8px;
            border: 1px solid rgba(17, 17, 17, .12);
            background: #fff;
        }


        .link-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .link-prefix {
            padding-left: 15px;
            color: rgba(17, 17, 17, .28);
            font-size: 12px;
        }


        .link-input {
            min-width: 0;
            flex: 1;
            height: 55px;
            border: 0;
            outline: none;
            background: transparent;
            color: var(--litera-black);
            font-family: inherit;
            font-size: 13px;
        }


        .link-input::placeholder {
            color: rgba(17, 17, 17, .28);
        }


        .link-submit {
            min-width: 96px;
            padding: 14px 21px;
        }


        .privacy-note {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 13px;
            color: rgba(17, 17, 17, .32);
            font-size: 9px;
            line-height: 1.6;
        }


        .privacy-dot {
            flex: 0 0 auto;
            width: 6px;
            height: 6px;
            margin-top: 5px;
            border-radius: 50%;
            background: var(--litera-red);
        }


        /* =========================================================
           SIDE INFORMATION
        ========================================================== */

        .input-side {
            padding-top: 3px;
        }


        .prototype-label {
            display: inline-flex;
            padding: 6px 10px;
            border: 1px solid rgba(223, 37, 43, .20);
            border-radius: 999px;
            color: var(--litera-red);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
        }


        .side-title {
            margin: 17px 0 0;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: -.025em;
        }


        .side-text {
            max-width: 380px;
            margin: 11px 0 0;
            color: rgba(17, 17, 17, .46);
            font-size: 12px;
            line-height: 1.75;
        }


        .side-line {
            height: 1px;
            margin: 23px 0;
            background: var(--litera-line);
        }


        .side-flow {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }


        .side-flow span {
            color: rgba(17, 17, 17, .42);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }


        .side-flow i {
            width: 15px;
            height: 1px;
            background: rgba(17, 17, 17, .16);
        }


        /* =========================================================
           RESULTS
        ========================================================== */

        .result-section {
            padding: 76px 0 82px;
            border-top: 1px solid transparent;
        }


        .result-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
        }


        .result-title {
            max-width: 760px;
            margin: 0;
            font-size: clamp(42px, 4vw, 61px);
            line-height: .90;
        }


        .result-description {
            max-width: 650px;
            margin: 19px 0 0;
            color: var(--litera-muted);
            font-size: 12.5px;
            line-height: 1.8;
        }


        .dummy-badge {
            flex: 0 0 auto;
            padding: 8px 12px;
            border: 1px solid rgba(17, 17, 17, .12);
            border-radius: 999px;
            color: rgba(17, 17, 17, .40);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
        }


        .result-grid {
            display: grid;
            grid-template-columns: .65fr 1.35fr;
            gap: 70px;
            margin-top: 48px;
        }


        /* =========================================================
           HUMAN DECISION NOTE
        ========================================================== */

        .human-note {
            padding-left: 20px;
            border-left: 2px solid var(--litera-red);
        }


        .human-note-title {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 800;
        }


        .human-note-text {
            max-width: 400px;
            margin: 0;
            color: var(--litera-muted);
            font-size: 12px;
            line-height: 1.8;
        }


        /* =========================================================
           RESULT LIST
        ========================================================== */

        .result-list {
            border-top: 1px solid var(--litera-line);
        }


        .result-item {
            display: grid;
            grid-template-columns: 155px 1fr;
            gap: 24px;
            align-items: start;
            padding: 20px 0;
            border-bottom: 1px solid var(--litera-line);
        }


        .result-label {
            color: rgba(17, 17, 17, .37);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }


        .result-content {
            color: rgba(17, 17, 17, .68);
            font-size: 12px;
            line-height: 1.7;
        }


        .result-main {
            color: var(--litera-black);
            font-size: 16px;
            font-weight: 800;
        }


        .confidence {
            margin-left: 8px;
            color: var(--litera-red);
            font-size: 10px;
            font-weight: 800;
        }


        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(223, 37, 43, .07);
            color: var(--litera-red);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
        }


        .status-neutral {
            background: rgba(17, 17, 17, .05);
            color: rgba(17, 17, 17, .47);
        }


        .claim-text {
            max-width: 700px;
            color: rgba(17, 17, 17, .72);
            font-size: 12px;
            line-height: 1.8;
        }


        .source-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-top: 9px;
        }


        .source {
            color: rgba(17, 17, 17, .48);
            font-size: 10px;
        }


        .source::before {
            content: "↗";
            margin-right: 6px;
            color: var(--litera-red);
        }


        .indicator-list {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }


        .indicator {
            padding: 7px 10px;
            border: 1px solid rgba(17, 17, 17, .10);
            border-radius: 999px;
            color: rgba(17, 17, 17, .50);
            font-size: 9px;
            font-weight: 700;
        }


        .result-note {
            margin: 16px 0 0;
            color: rgba(17, 17, 17, .28);
            font-size: 9px;
            line-height: 1.6;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1100px) {

            .analyze-container {
                width: min(100% - 64px, 1440px);
            }


            .input-grid,
            .result-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }


            .input-side {
                max-width: 620px;
            }


            .result-header {
                align-items: flex-start;
                flex-direction: column;
            }

        }


        @media (max-width: 767px) {

            .analyze-container {
                width: min(100% - 40px, 1440px);
            }


            .analyze-hero {
                padding-top: 94px;
                padding-bottom: 45px;
            }


            .hero-title {
                font-size: clamp(50px, 13vw, 68px);
            }


            .hero-description {
                font-size: 13px;
            }


            .analyze-box-header {
                align-items: flex-start;
                flex-direction: column;
            }


            .input-grid {
                padding-top: 38px;
                padding-bottom: 42px;
            }


            .link-row {
                flex-wrap: wrap;
            }


            .link-prefix {
                padding-left: 10px;
            }


            .link-input {
                width: calc(100% - 75px);
            }


            .link-submit {
                width: 100%;
            }


            .result-section {
                padding-top: 58px;
                padding-bottom: 65px;
            }


            .result-item {
                grid-template-columns: 1fr;
                gap: 8px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================================
        SHARED NAVBAR
    ========================================================== --}}
    <x-litera-navbar active="analyze" />


    <main>


        {{-- =====================================================
            HERO + INPUT
        ====================================================== --}}
        <section class="analyze-hero">

            <div class="analyze-container">


                <p class="analyze-eyebrow">
                    {{ __('analyze') }}
                </p>


                <h1 class="litera-display hero-title">

                    {{ app()->isLocale('id')
                        ? 'Pahami sebelum'
                        : 'Understand before' }}

                    <span class="hero-title-red">

                        {{ app()->isLocale('id')
                            ? 'kamu membagikan.'
                            : 'you share.' }}

                    </span>

                </h1>


                <p class="hero-description">

                    {{ app()->isLocale('id')
                        ? 'Tempel satu tautan. LITERA membantu mengekstraksi konten, memahami intensi, memeriksa klaim, dan menjelaskan hasilnya.'
                        : 'Paste one link. LITERA helps extract the content, understand its intent, check claims, and explain the result.' }}

                </p>


                {{-- =================================================
                    INPUT AREA
                ================================================== --}}
                <div class="analyze-box">


                    <div class="analyze-box-header">

                        <span class="analyze-box-label">

                            {{ app()->isLocale('id')
                                ? 'PERIKSA KONTEN'
                                : 'CHECK CONTENT' }}

                        </span>


                        <span class="analyze-box-method">

                            <span class="method-dot"></span>

                            One-Link Check

                        </span>

                    </div>


                    <div class="input-grid">


                        {{-- INPUT --}}
                        <div>

                            <h2 class="litera-display input-title">

                                {{ app()->isLocale('id')
                                    ? 'Tempel tautanmu'
                                    : 'Paste your link' }}

                                <span class="input-title-red">
                                    .
                                </span>

                            </h2>


                            <p class="input-description">

                                {{ app()->isLocale('id')
                                    ? 'Masukkan satu tautan dari konten digital yang ingin kamu pahami. Untuk prototype ini, hasil analisis menggunakan data dummy.'
                                    : 'Enter one link to the digital content you want to understand. For this prototype, the analysis result uses dummy data.' }}

                            </p>


                            <div class="link-box">

                                <div class="link-row">


                                    <span class="link-prefix">
                                        https://
                                    </span>


                                    <input
                                        id="contentLink"
                                        class="link-input"
                                        type="url"
                                        value="example.com/post/123"
                                        placeholder="{{ app()->isLocale('id')
                                            ? 'tempel tautan konten di sini...'
                                            : 'paste your content link here...' }}"
                                        aria-label="{{ app()->isLocale('id')
                                            ? 'Tautan konten'
                                            : 'Content link' }}"
                                    >


                                    <button
                                        id="analyzeButton"
                                        class="analyze-button link-submit"
                                        type="button"
                                    >
                                        {{ __('analyze') }}
                                    </button>

                                </div>

                            </div>


                            <div class="privacy-note">

                                <span class="privacy-dot"></span>


                                <span>

                                    {{ app()->isLocale('id')
                                        ? 'Prototype: data hasil di bawah hanya digunakan untuk demonstrasi alur.'
                                        : 'Prototype: the result below uses dummy data for demonstration.' }}

                                </span>

                            </div>

                        </div>


                        {{-- SIDE --}}
                        <div class="input-side">

                            <span class="prototype-label">
                                Prototype
                            </span>


                            <h3 class="side-title">

                                {{ app()->isLocale('id')
                                    ? 'Satu tautan. Satu alur.'
                                    : 'One link. One workflow.' }}

                            </h3>


                            <p class="side-text">

                                {{ app()->isLocale('id')
                                    ? 'Konten diproses dari ekstraksi hingga hasil analisis, sehingga pengguna dapat fokus pada informasi yang dihasilkan.'
                                    : 'Content moves from extraction to analysis so users can focus on the information produced.' }}

                            </p>


                            <div class="side-line"></div>


                            <div class="side-flow">

                                <span>
                                    Extract
                                </span>


                                <i></i>


                                <span>
                                    Intent
                                </span>


                                <i></i>


                                <span>
                                    FactLens
                                </span>


                                <i></i>


                                <span>
                                    Reason
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
            RESULT
        ====================================================== --}}
        <section
            id="analysis-result"
            class="result-section"
        >

            <div class="analyze-container">


                <div class="result-header">

                    <div>

                        <p class="analyze-eyebrow">

                            {{ app()->isLocale('id')
                                ? 'HASIL ANALISIS'
                                : 'ANALYSIS RESULT' }}

                        </p>


                        <h2 class="litera-display result-title">

                            {{ app()->isLocale('id')
                                ? 'Bukan sekadar benar atau salah.'
                                : 'More than right or wrong.' }}

                        </h2>


                        <p class="result-description">

                            {{ app()->isLocale('id')
                                ? 'LITERA menyajikan konteks, bukti, rekomendasi, dan alasan yang membantu pengguna memahami informasi sebelum mengambil keputusan.'
                                : 'LITERA presents context, evidence, recommendations, and reasons to help users understand information before making a decision.' }}

                        </p>

                    </div>


                    <span class="dummy-badge">
                        Prototype · Dummy Data
                    </span>

                </div>


                <div class="result-grid">


                    {{-- HUMAN SIDE --}}
                    <div class="human-note">

                        <strong class="human-note-title">

                            {{ app()->isLocale('id')
                                ? 'Kamu tetap memutuskan.'
                                : 'You still decide.' }}

                        </strong>


                        <p class="human-note-text">

                            {{ app()->isLocale('id')
                                ? 'Hasil LITERA adalah bantuan penilaian. AI membantu menganalisis dan menjelaskan, tetapi keputusan akhir tetap berada pada pengguna.'
                                : 'LITERA is decision support. AI helps analyze and explain, while the final decision remains with the user.' }}

                        </p>

                    </div>


                    {{-- RESULT --}}
                    <div class="result-list">


                        {{-- INTENT --}}
                        <div class="result-item">

                            <div class="result-label">
                                IntentScope
                            </div>


                            <div class="result-content">

                                <span class="result-main">

                                    {{ app()->isLocale('id')
                                        ? 'Persuasif'
                                        : 'Persuasive' }}

                                </span>


                                <span class="confidence">
                                    91% confidence
                                </span>

                            </div>

                        </div>


                        {{-- CLAIM --}}
                        <div class="result-item">

                            <div class="result-label">
                                Main Claim
                            </div>


                            <div class="result-content">

                                <div class="claim-text">

                                    “{{ app()->isLocale('id')
                                        ? 'Produk ini terbukti aman dan cocok untuk semua orang.'
                                        : 'This product is proven to be safe and suitable for everyone.' }}”

                                </div>

                            </div>

                        </div>


                        {{-- FACTLENS --}}
                        <div class="result-item">

                            <div class="result-label">
                                FactLens
                            </div>


                            <div class="result-content">

                                <span class="status">
                                    {{ app()->isLocale('id')
                                        ? 'Perlu ditinjau'
                                        : 'Needs review' }}
                                </span>


                                <span class="confidence">
                                    78% confidence
                                </span>


                                <div class="source-list">

                                    <span class="source">

                                        {{ app()->isLocale('id')
                                            ? 'Sumber pemeriksaan fakta A'
                                            : 'Fact-check source A' }}

                                    </span>


                                    <span class="source">

                                        {{ app()->isLocale('id')
                                            ? 'Sumber pemeriksaan fakta B'
                                            : 'Fact-check source B' }}

                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- AGE SUITABILITY --}}
                        <div class="result-item">

                            <div class="result-label">

                                {{ app()->isLocale('id')
                                    ? 'Kelayakan Usia'
                                    : 'Age Suitability' }}

                            </div>


                            <div class="result-content">

                                <span class="status status-neutral">
                                    13+
                                </span>


                                <div style="margin-top: 8px;">

                                    {{ app()->isLocale('id')
                                        ? 'Rekomendasi berdasarkan karakteristik bahasa pada konten.'
                                        : 'Recommendation based on language characteristics in the content.' }}

                                </div>

                            </div>

                        </div>


                        {{-- LITERAREASON --}}
                        <div class="result-item">

                            <div class="result-label">
                                LiteraReason
                            </div>


                            <div class="result-content">


                                <div class="indicator-list">

                                    <span class="indicator">

                                        {{ app()->isLocale('id')
                                            ? 'Diksi emosional'
                                            : 'Emotional wording' }}

                                    </span>


                                    <span class="indicator">

                                        {{ app()->isLocale('id')
                                            ? 'Klaim tanpa sumber'
                                            : 'Unsupported claim' }}

                                    </span>


                                    <span class="indicator">

                                        {{ app()->isLocale('id')
                                            ? 'Generalisasi berlebihan'
                                            : 'Overgeneralization' }}

                                    </span>

                                </div>


                                <div style="margin-top: 10px;">

                                    {{ app()->isLocale('id')
                                        ? 'Indikator ini membantu pengguna memahami alasan yang perlu diperhatikan saat menilai konten.'
                                        : 'These indicators help users understand the reasons to consider when assessing the content.' }}

                                </div>

                            </div>

                        </div>


                        {{-- RECOMMENDATION --}}
                        <div class="result-item">

                            <div class="result-label">

                                {{ app()->isLocale('id')
                                    ? 'Rekomendasi'
                                    : 'Recommendation' }}

                            </div>


                            <div class="result-content">

                                {{ app()->isLocale('id')
                                    ? 'Periksa sumber pendukung sebelum mempercayai atau membagikan klaim.'
                                    : 'Review supporting evidence before trusting or sharing the claim.' }}

                            </div>

                        </div>


                    </div>

                </div>


                <p class="result-note">

                    {{ app()->isLocale('id')
                        ? 'Semua nilai dan isi hasil merupakan data dummy untuk kebutuhan prototype.'
                        : 'All values and result content are dummy data for the prototype.' }}

                </p>

            </div>

        </section>


    </main>


    {{-- =========================================================
        SHARED FOOTER
    ========================================================== --}}
    <x-litera-footer />


    {{-- =========================================================
        PROTOTYPE INTERACTION
    ========================================================== --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const button = document.getElementById('analyzeButton');
            const input = document.getElementById('contentLink');
            const result = document.getElementById('analysis-result');

            if (!button || !input || !result) {
                return;
            }


            button.addEventListener('click', function () {

                const originalText = button.textContent.trim();


                if (!input.value.trim()) {
                    input.focus();
                    return;
                }


                button.disabled = true;
                button.classList.add('loading');
                button.textContent = '...';


                setTimeout(function () {

                    button.disabled = false;
                    button.classList.remove('loading');
                    button.textContent = originalText;


                    result.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                }, 800);

            });

        });

    </script>


</body>

</html>