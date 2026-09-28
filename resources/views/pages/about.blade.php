<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->isLocale('id') ? 'Tentang LITERA' : 'About LITERA' }}</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Kenali cara LITERA membantu memahami informasi.' : 'Learn how LITERA helps people understand information.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --red: #df252b; --ink: #111; --muted: #5d5b58; --line: rgba(17,17,17,.12); --cream: #f7f6f2; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--cream); color: var(--ink); font-family: "Manrope", "Inter", Arial, sans-serif; }
        .about-page { width: calc(100% - 40px); max-width: 1120px; margin: 0 auto; padding: 128px 0 88px; }
        .about-section { padding: 54px 0; border-bottom: 1px solid var(--line); scroll-margin-top: 24px; }
        .about-hero { display: grid; grid-template-columns: 1.15fr .85fr; gap: 40px; align-items: center; padding: 40px 0 56px; }
        h1, h2, h3, p { margin-top: 0; }
        h1 { max-width: 650px; margin-bottom: 16px; font-size: clamp(36px, 5vw, 56px); line-height: 1.08; letter-spacing: -.05em; }
        h2 { margin-bottom: 12px; font-size: clamp(28px, 3.5vw, 38px); line-height: 1.15; letter-spacing: -.035em; }
        h3 { margin-bottom: 8px; font-size: 19px; line-height: 1.35; }
        .about-copy, .section-copy { max-width: 650px; margin: 0; color: var(--muted); font-size: 16px; line-height: 1.7; }
        .overview-visual { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; padding: 18px; border: 1px solid var(--line); border-radius: 26px; background: #fff; }
        .overview-visual span { display: grid; min-height: 96px; place-items: center; padding: 10px; border-radius: 18px; background: var(--cream); font-size: 15px; font-weight: 700; text-align: center; }
        .human-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; }
        .decision-visual { display: grid; grid-template-columns: 1fr auto 1fr auto 1fr; gap: 10px; align-items: center; padding: 20px; border-radius: 22px; background: #fff; text-align: center; }
        .decision-step { padding: 12px 6px; color: var(--muted); font-size: 14px; font-weight: 700; }
        .decision-step:last-of-type { color: var(--red); }
        .decision-arrow { color: #918e89; font-size: 20px; }
        .capability-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-top: 24px; }
        .capability-card, .ethics-card { padding: 22px; border: 1px solid var(--line); border-radius: 24px; background: #fff; }
        .capability-card p, .ethics-card p { margin: 0; color: var(--muted); font-size: 15px; line-height: 1.65; }
        .capability-icon { display: grid; width: 42px; height: 42px; margin-bottom: 16px; place-items: center; border-radius: 50%; background: #fff1ef; color: var(--red); font-size: 20px; font-weight: 800; }
        .process-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-top: 24px; }
        .process-step { padding: 22px; border-radius: 24px; background: #fff; }
        .process-number { display: grid; width: 40px; height: 40px; margin-bottom: 16px; place-items: center; border-radius: 50%; background: var(--ink); color: #fff; font-size: 15px; font-weight: 800; }
        .ethics-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-top: 24px; }
        .about-action { display: inline-flex; min-height: 50px; align-items: center; margin-top: 28px; padding: 12px 24px; border-radius: 999px; background: var(--red); color: #fff; font-size: 16px; font-weight: 800; text-decoration: none; }
        @media (max-width: 700px) {
            .about-page { width: calc(100% - 32px); padding-top: 110px; }
            .about-hero, .human-layout { grid-template-columns: 1fr; gap: 24px; }
            .about-hero { padding-top: 28px; }
            .about-section { padding: 38px 0; }
            .capability-grid, .process-grid, .ethics-grid { grid-template-columns: 1fr; }
            .overview-visual { padding: 12px; gap: 8px; }
            .overview-visual span { min-height: 74px; font-size: 14px; }
            .decision-visual { gap: 4px; padding: 14px 8px; }
            .decision-step { font-size: 13px; }
        }
        @media (max-width: 1023px) { body { padding-bottom: 82px; } }
    </style>
</head>

<body>
    <x-litera-navbar active="about" />

    <main class="about-page">
        <section class="about-hero">
            <div>
                <h1>{{ app()->isLocale('id') ? 'Apa itu LITERA?' : 'What is LITERA?' }}</h1>
                <p class="about-copy">{{ app()->isLocale('id') ? 'LITERA membantu kamu memahami isi, sumber, dan bahasa dalam konten sebelum mempercayai atau membagikannya.' : 'LITERA helps you understand the claims, sources, and wording in content before you trust or share it.' }}</p>
                <a class="about-action" href="{{ route('analyze') }}">{{ __('analyze_content') }}</a>
            </div>
            <div class="overview-visual" aria-label="{{ app()->isLocale('id') ? 'Klaim, sumber, dan bahasa' : 'Claims, sources, and wording' }}">
                <span>{{ app()->isLocale('id') ? 'Klaim' : 'Claims' }}</span>
                <span>{{ app()->isLocale('id') ? 'Sumber' : 'Sources' }}</span>
                <span>{{ app()->isLocale('id') ? 'Bahasa' : 'Wording' }}</span>
            </div>
        </section>

        <section class="about-section human-layout">
            <div>
                <h2>{{ app()->isLocale('id') ? 'AI membantu. Kamu yang memutuskan.' : 'AI helps. You decide.' }}</h2>
                <p class="section-copy">{{ app()->isLocale('id') ? 'LITERA memberi penjelasan untuk mendukung penilaianmu, bukan menggantikannya.' : 'LITERA offers explanations to support your judgment, not replace it.' }}</p>
            </div>
            <div class="decision-visual" aria-label="{{ app()->isLocale('id') ? 'Konten, penjelasan, keputusanmu' : 'Content, explanation, your decision' }}">
                <span class="decision-step">{{ app()->isLocale('id') ? 'Konten' : 'Content' }}</span><span class="decision-arrow" aria-hidden="true">›</span>
                <span class="decision-step">{{ app()->isLocale('id') ? 'Penjelasan' : 'Explanation' }}</span><span class="decision-arrow" aria-hidden="true">›</span>
                <span class="decision-step">{{ app()->isLocale('id') ? 'Keputusanmu' : 'Your choice' }}</span>
            </div>
        </section>

        <section id="features" class="about-section">
            <h2>{{ app()->isLocale('id') ? 'Hal penting yang kami periksa' : 'What we look at' }}</h2>
            <p class="section-copy">{{ app()->isLocale('id') ? 'Beberapa petunjuk sederhana membantu kamu melihat konteks informasi.' : 'A few clear signals help you understand the context around a claim.' }}</p>
            <div class="capability-grid">
                <article class="capability-card"><span class="capability-icon" aria-hidden="true">✓</span><h3>{{ app()->isLocale('id') ? 'Fakta & sumber' : 'Facts & sources' }}</h3><p>{{ app()->isLocale('id') ? 'Lihat klaim utama dan rujukan pendukung yang tersedia.' : 'Review the main claim and any available supporting sources.' }}</p></article>
                <article class="capability-card"><span class="capability-icon" aria-hidden="true">◎</span><h3>{{ app()->isLocale('id') ? 'Maksud konten' : 'Content intent' }}</h3><p>{{ app()->isLocale('id') ? 'Pahami apakah konten memberi informasi, mengajak, atau menjual.' : 'See whether content informs, persuades, or promotes.' }}</p></article>
                <article class="capability-card"><span class="capability-icon" aria-hidden="true">Aa</span><h3>{{ app()->isLocale('id') ? 'Pola bahasa' : 'Language patterns' }}</h3><p>{{ app()->isLocale('id') ? 'Kenali pilihan kata yang mungkin memengaruhi pembaca.' : 'Notice wording that may influence how a message feels.' }}</p></article>
            </div>
        </section>

        <section id="how-it-works" class="about-section">
            <h2>{{ app()->isLocale('id') ? 'Cara kerjanya' : 'How it works' }}</h2>
            <p class="section-copy">{{ app()->isLocale('id') ? 'Tiga langkah untuk memahami informasi dengan lebih baik.' : 'Three simple steps to understand information more clearly.' }}</p>
            <div class="process-grid">
                <article class="process-step"><span class="process-number">1</span><h3>{{ app()->isLocale('id') ? 'Masukkan konten' : 'Add content' }}</h3><p class="section-copy">{{ app()->isLocale('id') ? 'Tempel teks atau tautan yang ingin kamu periksa.' : 'Paste the text or link you want to check.' }}</p></article>
                <article class="process-step"><span class="process-number">2</span><h3>{{ app()->isLocale('id') ? 'LITERA meninjau' : 'LITERA reviews it' }}</h3><p class="section-copy">{{ app()->isLocale('id') ? 'Klaim, sumber, dan pilihan kata ditelaah.' : 'Claims, sources, and wording are reviewed.' }}</p></article>
                <article class="process-step"><span class="process-number">3</span><h3>{{ app()->isLocale('id') ? 'Pahami hasilnya' : 'Understand the result' }}</h3><p class="section-copy">{{ app()->isLocale('id') ? 'Baca alasannya, lalu tentukan sendiri.' : 'Read the reasons, then make your own decision.' }}</p></article>
            </div>
        </section>

        <section id="ethics" class="about-section">
            <h2>{{ app()->isLocale('id') ? 'Etika & privasi' : 'Ethics & privacy' }}</h2>
            <p class="section-copy">{{ app()->isLocale('id') ? 'Informasi yang jelas membantu kamu mengambil keputusan dengan tenang.' : 'Clear information helps you make your own decisions with confidence.' }}</p>
            <div class="ethics-grid">
                <article class="ethics-card"><h3>{{ app()->isLocale('id') ? 'Kamu tetap memutuskan' : 'You stay in control' }}</h3><p>{{ app()->isLocale('id') ? 'Hasil LITERA adalah bahan pertimbangan, bukan keputusan akhir.' : 'LITERA provides context; it does not make the final decision.' }}</p></article>
                <article class="ethics-card"><h3>{{ app()->isLocale('id') ? 'Alasan yang jelas' : 'Clear reasons' }}</h3><p>{{ app()->isLocale('id') ? 'Hasil menunjukkan hal yang perlu diperiksa lebih lanjut.' : 'Results explain what may need a closer look.' }}</p></article>
                <article class="ethics-card"><h3>{{ app()->isLocale('id') ? 'Privasi' : 'Privacy' }}</h3><p>{{ app()->isLocale('id') ? 'Berkas yang diproses tidak dirancang untuk disimpan secara permanen.' : 'Processed files are not designed to be stored permanently.' }}</p></article>
            </div>
        </section>
    </main>

    <x-litera-footer />
</body>

</html>
