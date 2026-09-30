<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->isLocale('id') ? 'Tentang LITERA' : 'About LITERA' }}</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Kenali cara LITERA membantu memahami informasi.' : 'Learn how LITERA helps people understand information.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --red:#df252b; --ink:#111; --muted:#5d5b58; --line:rgba(17,17,17,.12); --cream:#f7f6f2; }
        * { box-sizing:border-box; }
        body { margin:0; background:var(--cream); color:var(--ink); font-family:"Manrope","Inter",Arial,sans-serif; }
        .page { width:calc(100% - 40px); max-width:1120px; margin:0 auto; padding:128px 0 88px; }
        .hero { display:grid; grid-template-columns:1.1fr .9fr; gap:40px; align-items:center; padding:36px 0 54px; }
        .section { padding:48px 0; border-bottom:1px solid var(--line); scroll-margin-top:24px; }
        h1,h2,h3,p { margin-top:0; }
        h1 { max-width:700px; margin-bottom:16px; font-size:clamp(36px,5vw,58px); line-height:1.08; letter-spacing:-.05em; }
        h2 { margin-bottom:12px; font-size:clamp(27px,3.5vw,38px); line-height:1.15; letter-spacing:-.035em; }
        h3 { margin-bottom:8px; font-size:18px; }
        .copy { max-width:700px; margin:0; color:var(--muted); font-size:16px; line-height:1.7; }
        .flow,.cards { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:24px; }
        .card,.flow-step { padding:22px; border:1px solid var(--line); border-radius:22px; background:#fff; }
        .card p,.flow-step p { margin:0; color:var(--muted); font-size:15px; line-height:1.65; }
        .number { display:grid; width:40px; height:40px; margin-bottom:15px; place-items:center; border-radius:50%; background:#fff1ef; color:var(--red); font-weight:800; }
        .decision { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; padding:22px; border-radius:24px; background:#fff; text-align:center; }
        .decision span { padding:14px 8px; border-radius:14px; background:var(--cream); font-weight:700; }
        .decision span:last-child { color:var(--red); }
        .button { display:inline-flex; min-height:50px; align-items:center; margin-top:25px; padding:12px 24px; border-radius:999px; background:var(--red); color:white; font-weight:800; text-decoration:none; }
        @media(max-width:760px) { .page { width:calc(100% - 32px); padding-top:108px; } .hero { grid-template-columns:1fr; gap:24px; } .flow,.cards { grid-template-columns:repeat(2,minmax(0,1fr)); } .section { padding:38px 0; } }
        @media(max-width:480px) { .flow,.cards { grid-template-columns:1fr; } }
        @media(max-width:1023px) { body { padding-bottom:82px; } }
    </style>
</head>
<body>
    <x-litera-navbar active="about" />
    <main class="page">
        <section class="hero">
            <div>
                <h1>{{ app()->isLocale('id') ? 'Pahami informasi dengan lebih utuh.' : 'Understand information more fully.' }}</h1>
                <p class="copy">{{ app()->isLocale('id') ? 'LITERA membantu kamu memahami klaim, sumber, maksud, dan bahasa dalam konten sebelum mempercayai atau membagikannya.' : 'LITERA helps you understand claims, sources, intent, and language before you trust or share content.' }}</p>
                <a class="button" href="{{ route('analyze') }}">{{ __('analyze_content') }}</a>
            </div>
            <div class="decision" aria-label="{{ app()->isLocale('id') ? 'Konten, penjelasan, keputusan pengguna' : 'Content, explanation, user decision' }}">
                <span>{{ app()->isLocale('id') ? 'Konten' : 'Content' }}</span><span>{{ app()->isLocale('id') ? 'Penjelasan' : 'Explanation' }}</span><span>{{ app()->isLocale('id') ? 'Keputusanmu' : 'Your decision' }}</span>
            </div>
        </section>
        <section id="features" class="section">
            <h2>{{ app()->isLocale('id') ? 'Empat bagian yang saling terhubung' : 'Four connected parts' }}</h2>
            <p class="copy">{{ app()->isLocale('id') ? 'Setiap bagian memberi sudut pandang berbeda agar kamu dapat menilai informasi dengan lebih utuh.' : 'Each part adds a different perspective so you can assess information more fully.' }}</p>
            <div class="cards">
                <article class="card"><span class="number">01</span><h3>FactLens</h3><p>{{ app()->isLocale('id') ? 'Menguraikan klaim, tingkat keyakinan, dan rujukan yang relevan.' : 'Breaks down claims, confidence, and relevant references.' }}</p></article>
                <article class="card"><span class="number">02</span><h3>IntentScope</h3><p>{{ app()->isLocale('id') ? 'Membaca maksud konten dan kesesuaiannya berdasarkan usia.' : 'Identifies content intent and age suitability.' }}</p></article>
                <article class="card"><span class="number">03</span><h3>LiteraReason</h3><p>{{ app()->isLocale('id') ? 'Menjelaskan indikator bahasa yang memengaruhi pembaca.' : 'Explains language signals that may influence readers.' }}</p></article>
                <article class="card"><span class="number">04</span><h3>{{ app()->isLocale('id') ? 'Keputusan manusia' : 'Human decision' }}</h3><p>{{ app()->isLocale('id') ? 'Pengguna mempertimbangkan hasil dan menentukan langkahnya sendiri.' : 'People consider the result and choose what to do themselves.' }}</p></article>
            </div>
        </section>
        <section id="how-it-works" class="section">
            <h2>{{ app()->isLocale('id') ? 'Cara kerjanya' : 'How it works' }}</h2>
            <p class="copy">{{ app()->isLocale('id') ? 'Alur satu tautan menghubungkan pemeriksaan teknis dengan keputusan pengguna.' : 'A one-link workflow connects technical checks with the user’s decision.' }}</p>
            <div class="flow">
                <article class="flow-step"><span class="number">01</span><h3>One-Link Check</h3><p>{{ app()->isLocale('id') ? 'Mulai dengan satu tautan konten.' : 'Start with one content link.' }}</p></article>
                <article class="flow-step"><span class="number">02</span><h3>{{ app()->isLocale('id') ? 'Ekstraksi & Whisper' : 'Extraction & Whisper' }}</h3><p>{{ app()->isLocale('id') ? 'Teks dan ucapan yang relevan diekstrak untuk ditinjau.' : 'Relevant text and speech are extracted for review.' }}</p></article>
                <article class="flow-step"><span class="number">03</span><h3>FactLens + IntentScope</h3><p>{{ app()->isLocale('id') ? 'Klaim, sumber, maksud, dan usia ditelaah.' : 'Claims, sources, intent, and age suitability are reviewed.' }}</p></article>
                <article class="flow-step"><span class="number">04</span><h3>LiteraReason</h3><p>{{ app()->isLocale('id') ? 'Hasil dijelaskan agar pengguna dapat mengambil keputusan sendiri.' : 'Results are explained so people can decide for themselves.' }}</p></article>
            </div>
        </section>
        <section id="ethics" class="section">
            <h2>{{ app()->isLocale('id') ? 'AI membantu. Kamu yang memutuskan.' : 'AI helps. You decide.' }}</h2>
            <p class="copy">{{ app()->isLocale('id') ? 'AI membantu kamu memahami; keputusan akhir tetap di tangan pengguna. Hasil LITERA adalah bahan pertimbangan, bukan keputusan akhir.' : 'AI helps you understand; the final decision remains with the user. LITERA’s result offers context, not a final decision.' }}</p>
            <div class="cards">
                <article class="card"><h3>{{ app()->isLocale('id') ? 'Penjelasan yang terbuka' : 'Clear explanations' }}</h3><p>{{ app()->isLocale('id') ? 'Hasil menunjukkan klaim dan indikator yang perlu diperiksa.' : 'Results show claims and signals that may need review.' }}</p></article>
                <article class="card"><h3>{{ app()->isLocale('id') ? 'Privasi' : 'Privacy' }}</h3><p>{{ app()->isLocale('id') ? 'Berkas yang diproses tidak dirancang untuk disimpan secara permanen.' : 'Processed files are not designed to be stored permanently.' }}</p></article>
                <article class="card"><h3>{{ app()->isLocale('id') ? 'Kamu tetap memutuskan' : 'You stay in control' }}</h3><p>{{ app()->isLocale('id') ? 'Gunakan analisis sebagai konteks, lalu tentukan sendiri.' : 'Use the analysis as context, then make your own choice.' }}</p></article>
                <article class="card"><h3>{{ app()->isLocale('id') ? 'Kesesuaian usia' : 'Age suitability' }}</h3><p>{{ app()->isLocale('id') ? 'Panduan berdasarkan bahasa dan perkembangan, bukan klasifikasi hukum.' : 'Guidance based on language and development, not a legal rating.' }}</p></article>
            </div>
        </section>
    </main>
    <x-litera-footer />
</body>
</html>
