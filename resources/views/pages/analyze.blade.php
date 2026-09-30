<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }} — LITERA</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Periksa informasi sebelum percaya atau membagikannya.' : 'Check information before you trust or share it.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --litera-red: #df252b; --litera-black: #111; --litera-cream: #f7f6f2; --litera-muted: #5d5b58; --litera-line: rgba(17,17,17,.12); }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--litera-cream); color: var(--litera-black); font-family: "Manrope", "Inter", Arial, sans-serif; }
        .page { width: calc(100% - 40px); max-width: 1000px; margin: 0 auto; padding: 132px 0 88px; }
        h1, h2, h3, p { margin-top: 0; }
        h1 { margin-bottom: 10px; font-size: clamp(30px, 4vw, 38px); line-height: 1.2; letter-spacing: -.035em; }
        h2 { margin-bottom: 16px; font-size: clamp(21px, 2.5vw, 25px); line-height: 1.3; letter-spacing: -.02em; }
        h3 { margin-bottom: 10px; font-size: 18px; }
        p { font-size: 15px; line-height: 1.7; }
        .muted { color: var(--litera-muted); }
        .content-header { margin-bottom: 26px; }
        .eyebrow, .tech-label { color: var(--litera-muted); font-size: 12px; font-weight: 600; letter-spacing: .045em; }
        .eyebrow { display: inline-block; margin-bottom: 10px; }
        .metadata { margin: 0; font-size: 14px; }
        .journey { display: grid; gap: 18px; }
        .card { padding: clamp(22px, 3.5vw, 34px); border: 1px solid var(--litera-line); border-radius: 26px; background: #fff; box-shadow: 0 8px 26px rgba(17,17,17,.035); }
        .trust-card { display: grid; grid-template-columns: minmax(145px, .6fr) minmax(0, 1.4fr); gap: 12px 28px; align-items: center; }
        .trust-title { margin-bottom: 8px; }
        .confidence { color: var(--litera-red); font-size: clamp(52px, 8vw, 72px); font-weight: 800; line-height: 1; letter-spacing: -.06em; }
        .status { display: inline-flex; margin-bottom: 12px; padding: 8px 13px; border-radius: 999px; background: #fff0ee; color: #982128; font-size: 13px; font-weight: 800; letter-spacing: .025em; }
        .trust-summary { margin: 0; max-width: 600px; }
        .two-up { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
        .category { margin: 0 0 10px; font-size: 22px; font-weight: 700; }
        .result-title { margin-bottom: 18px; font-size: 14px; font-weight: 700; color: var(--litera-red); }
        .age-list { display: grid; gap: 8px; margin: 18px 0 0; padding: 0; list-style: none; }
        .age-list li { display: flex; justify-content: space-between; gap: 12px; padding: 11px 13px; border-radius: 12px; background: #f8f7f4; font-size: 14px; }
        .age-list strong { text-align: right; }
        .reference { display: flex; flex-wrap: wrap; gap: 5px 12px; align-items: baseline; }
        .tech-label { display: block; margin-top: 18px; }
        .fact-block { padding: 18px 20px; border-radius: 18px; background: #f8f7f4; }
        .fact-block + .fact-block { margin-top: 12px; }
        .fact-block p:last-child { margin-bottom: 0; }
        .field-label { margin-bottom: 6px; color: var(--litera-muted); font-size: 13px; font-weight: 700; }
        .claim { font-size: 17px; font-weight: 600; }
        .indicators { display: flex; flex-wrap: wrap; gap: 10px; margin: 0 0 18px; padding: 0; list-style: none; }
        .indicators li { padding: 10px 14px; border: 1px solid var(--litera-line); border-radius: 999px; background: #faf9f7; font-size: 14px; }
        .why-copy { max-width: 820px; margin-bottom: 0; }
        .recommendation { border-color: rgba(223,37,43,.12); background: #fff7f5; }
        .recommendation p { max-width: 820px; margin-bottom: 0; }
        .human { margin: 8px 0 0; color: #4f4b46; font-size: 15px; text-align: center; }
        .form-card { padding: clamp(22px, 4vw, 36px); }
        .field { display: block; width: 100%; min-height: 58px; margin-top: 14px; padding: 14px 18px; border: 1px solid var(--litera-line); border-radius: 18px; background: #fff; color: var(--litera-black); font: inherit; font-size: 16px; }
        .button { display: inline-flex; min-height: 50px; align-items: center; justify-content: center; margin-top: 18px; padding: 12px 24px; border: 0; border-radius: 999px; background: var(--litera-red); color: white; font: inherit; font-size: 16px; font-weight: 750; cursor: pointer; }
        .button:disabled { opacity: .7; cursor: wait; }
        .privacy, .error, .progress { margin: 12px 0 0; font-size: 13px; }
        .error { color: #a21e23; }
        .progress { color: var(--litera-muted); }
        [hidden] { display: none !important; }
        @media (max-width: 680px) {
            .page { width: calc(100% - 32px); padding-top: 112px; }
            .trust-card { grid-template-columns: 1fr; gap: 14px; }
            .two-up { grid-template-columns: 1fr; }
            .indicators { gap: 8px; }
            .indicators li { font-size: 13px; }
        }
        @media (max-width: 1023px) { body { padding-bottom: 82px; } }
    </style>
</head>
<body>
    <x-litera-navbar active="analyze" />
    <main class="page">
        @if ($analysis)
            @php
                $isIndonesian = app()->isLocale('id');
                $intentLabels = ['Edukatif' => 'Educational', 'Persuasif' => 'Persuasive', 'Provokatif' => 'Provocative', 'Komersial' => 'Commercial'];
                $statusLabel = $analysis->fact_status === 'DUKUNGAN SUMBER TERSEDIA'
                    ? ($isIndonesian ? $analysis->fact_status : 'SOURCE SUPPORT INDICATED')
                    : ($isIndonesian ? $analysis->fact_status : 'NEEDS REVIEW');
                $mainClaims = [
                    'Edukatif' => 'The content explains ways to recognize unverified information on social media.',
                    'Persuasif' => 'Drinking lemon water every morning is guaranteed to cleanse all toxins from the body.',
                    'Provokatif' => 'Lemon water every morning removes toxins, and anyone who questions it does not care about your health.',
                    'Komersial' => 'This product is guaranteed to make skin look brighter in three days.',
                ];
                $intentDescriptions = [
                    'Edukatif' => 'The content explains ways to recognize information instead of encouraging a purchase or action.',
                    'Persuasif' => 'The content uses language that encourages readers to accept a claim without enough supporting basis.',
                    'Provokatif' => 'A forceful health claim is paired with distrustful wording, encouraging an emotional response before readers check its evidence and sources.',
                    'Komersial' => 'The content uses promotional wording and confident benefit claims to encourage a purchase.',
                ];
                $explanations = [
                    'Edukatif' => 'The content focuses on explanations and steps for recognizing information, rather than encouraging users to buy or follow an action.',
                    'Persuasif' => "The word “guaranteed” makes the claim sound certain, while no source is shown to support it.",
                    'Provokatif' => 'A forceful health claim is paired with distrustful wording, encouraging an emotional response before readers check its evidence and sources.',
                    'Komersial' => 'Promotional language and highly confident benefit claims are used to encourage a purchase.',
                ];
                $recommendations = [
                    'Edukatif' => 'Use this information as an initial guide and check the original sources.',
                    'Persuasif' => 'Do not share this content right away. Check the original source and supporting evidence first.',
                    'Provokatif' => 'Check the full context and sources before drawing a conclusion.',
                    'Komersial' => 'Check evidence of benefits, the source of the claim, and product details before buying.',
                ];
                $indicatorLabels = [
                    'Bahasa informatif' => 'Informative language',
                    'Penjelasan berbasis langkah' => 'Step-by-step explanation',
                    'Tidak ditemukan ajakan berlebihan' => 'No excessive call to action',
                    'Diksi emosional' => 'Emotional wording',
                    'Klaim tanpa sumber' => 'Claim without a source',
                    'Generalisasi berlebihan' => 'Overgeneralization',
                    'Bahasa emosional' => 'Emotional language',
                    'Framing berlebihan' => 'Exaggerated framing',
                    'Ajakan membentuk reaksi' => 'Prompts a reaction',
                    'Bahasa promosi' => 'Promotional language',
                    'Klaim manfaat sangat pasti' => 'Highly certain benefit claim',
                    'Ajakan membeli' => 'Encourages a purchase',
                ];
            @endphp

            @php
                $contentTypeLabels = [
                    'Artikel / Media Sosial' => 'Article / Social Media',
                    'Video / Media Sosial' => 'Video / Social Media',
                    'Unggahan / Media Sosial' => 'Social Media Post',
                    'Konten Promosi / Media Sosial' => 'Promotional Content / Social Media',
                ];
            @endphp
            <header class="content-header">
                <p class="result-title">{{ $isIndonesian ? 'Hasil Analisis' : 'Analysis Results' }}</p>
                <h1>{{ $analysis->title }}</h1>
                <p class="metadata muted">{{ $analysis->source }} · {{ $isIndonesian ? $analysis->content_type : ($contentTypeLabels[$analysis->content_type] ?? $analysis->content_type) }} · {{ $analysis->analyzed_at->format('d M Y') }}</p>
            </header>

            <div class="journey">
                <section class="card trust-card" aria-labelledby="trust-title">
                    <div>
                        <h2 id="trust-title" class="trust-title">{{ $isIndonesian ? 'Tingkat keyakinan fakta' : 'Fact confidence' }}</h2>
                        <div class="confidence">{{ $analysis->fact_confidence }}%</div>
                    </div>
                    <div>
                        <span class="status">{{ $statusLabel }}</span>
                        <p class="trust-summary">{{ $isIndonesian
                            ? ($analysis->fact_status === 'DUKUNGAN SUMBER TERSEDIA' ? 'Sejumlah rujukan mendukung informasi ini. Tetap periksa sumber utama dan konteksnya.' : 'Dukungan sumber yang ditampilkan belum cukup untuk memastikan klaim ini.')
                            : ($analysis->fact_status === 'DUKUNGAN SUMBER TERSEDIA' ? 'Some references support this information. Check the original sources and context as well.' : 'The displayed source support is not sufficient to confirm this claim.') }}</p>
                    </div>
                </section>

                <div class="two-up">
                    <section class="card" aria-labelledby="intent-title">
                        <h2 id="intent-title">{{ $isIndonesian ? 'Maksud konten' : 'What is the content trying to do?' }}</h2>
                        <p class="category">{{ $isIndonesian ? $analysis->intent : $intentLabels[$analysis->intent] }}</p>
                        <p>{{ $isIndonesian
                            ? ($analysis->intent === 'Persuasif' ? 'Konten menggunakan bahasa yang mendorong pembaca untuk menerima klaim tanpa memberikan dasar yang cukup.' : $analysis->explanation)
                            : $intentDescriptions[$analysis->intent] }}</p>
                        <span class="tech-label">IntentScope</span>
                    </section>
                    <section class="card" aria-labelledby="age-title">
                        <h2 id="age-title">{{ $isIndonesian ? 'Kelayakan usia' : 'Age suitability' }}</h2>
                        <ul class="age-list">
                            @foreach ($analysis->age_suitability as $age)
                                <li><span>{{ $age['band'] }}</span><strong>{{ $isIndonesian ? $age['status'] : (['Sesuai' => 'Suitable', 'Tidak disarankan' => 'Not recommended', 'Perlu pertimbangan' => 'Consider guidance'][$age['status']] ?? $age['status']) }}</strong></li>
                            @endforeach
                        </ul>
                        <p class="privacy muted">{{ $isIndonesian ? 'Rekomendasi berdasarkan karakteristik bahasa dan tahap perkembangan.' : 'Recommendations reflect language and developmental considerations.' }}</p>
                        <span class="tech-label">IntentScope</span>
                    </section>
                </div>

                <section class="card" aria-labelledby="facts-title">
                    <h2 id="facts-title">{{ $isIndonesian ? 'Fakta & sumber' : 'Facts & sources' }}</h2>
                    <div class="fact-block">
                        <p class="field-label">{{ $isIndonesian ? 'Klaim utama' : 'Main claim' }}</p>
                        <p class="claim">{{ $isIndonesian ? $analysis->main_claim : $mainClaims[$analysis->intent] }}</p>
                    </div>
                    <div class="fact-block">
                        <p class="field-label">{{ $isIndonesian ? 'Status' : 'Status' }}</p>
                        <p>{{ $isIndonesian
                            ? ($analysis->fact_status === 'DUKUNGAN SUMBER TERSEDIA' ? 'Rujukan yang tercantum memberi konteks untuk peninjauan klaim; periksa dokumen sumber secara langsung.' : 'Informasi ini masih memerlukan pemeriksaan sumber dan bukti pendukung.')
                            : ($analysis->fact_status === 'DUKUNGAN SUMBER TERSEDIA' ? 'The listed references provide context for reviewing this claim; consult source documents directly.' : 'This information still needs source and evidence review.') }}</p>
                    </div>
                    <div class="fact-block">
                        <p class="field-label">{{ $isIndonesian ? 'Rujukan' : 'References' }}</p>
                        @foreach ($analysis->source_references as $reference)
                            <p class="reference"><strong>{{ $reference['name'] }}</strong><span>{{ $reference['title'] }}</span><span>{{ $reference['reference'] }}</span></p>
                        @endforeach
                    </div>
                    <span class="tech-label">FactLens</span>
                </section>

                <section class="card" aria-labelledby="reason-title">
                    <h2 id="reason-title">{{ $isIndonesian ? 'Kenapa hasilnya seperti ini?' : 'Why this result?' }}</h2>
                    <ul class="indicators">
                        @foreach ($analysis->language_indicators as $indicator)
                            <li>{{ $isIndonesian ? $indicator : ($indicatorLabels[$indicator] ?? $indicator) }}</li>
                        @endforeach
                    </ul>
                    <p class="why-copy">{{ $isIndonesian ? $analysis->explanation : $explanations[$analysis->intent] }}</p>
                    <span class="tech-label">LiteraReason</span>
                </section>

                <section class="card recommendation" aria-labelledby="recommendation-title">
                    <h2 id="recommendation-title">{{ $isIndonesian ? 'Rekomendasi' : 'Recommendation' }}</h2>
                    <p>{{ $isIndonesian ? $analysis->recommendation : $recommendations[$analysis->intent] }}</p>
                </section>

                <p class="human">{{ $isIndonesian ? 'AI membantu kamu memahami. Keputusan akhir tetap di tangan pengguna.' : 'AI helps you understand. The final decision remains with the user.' }}</p>
            </div>
        @else
            <h1>{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }}</h1>
            <p class="muted">{{ app()->isLocale('id') ? 'Tempel satu tautan untuk memahami klaim, sumber, dan maksudnya.' : 'Paste one link to understand its claims, sources, and intent.' }}</p>
            <form class="card form-card" id="analysisForm" method="POST" action="{{ route('analyze.store') }}">
                @csrf
                <label for="url"><strong>{{ app()->isLocale('id') ? 'Tautan konten' : 'Content link' }}</strong></label>
                <input class="field" id="url" name="url" type="url" required maxlength="2048" value="{{ old('url') }}" placeholder="https://" autocomplete="url">
                @error('url') <p class="error">{{ $message }}</p> @enderror
                @if (session('demo_message')) <p class="error" role="alert">{{ session('demo_message') }}</p> @endif
                <button class="button" id="analyzeButton" type="submit">{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }}</button>
                <p class="progress" id="analysisProgress" role="status" hidden>{{ app()->isLocale('id') ? 'Menganalisis konten…' : 'Analyzing content…' }}</p>
            </form>
        @endif
    </main>
    <x-litera-footer />
    @if (! $analysis)
        <script>
            document.getElementById('analysisForm').addEventListener('submit', function (event) {
                event.preventDefault();
                const form = this;
                const button = document.getElementById('analyzeButton');
                const progress = document.getElementById('analysisProgress');
                button.disabled = true;
                progress.hidden = false;
                window.setTimeout(function () {
                    form.submit();
                }, 550);
            });
        </script>
    @endif
</body>
</html>
