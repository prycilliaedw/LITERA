<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }} — LITERA</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Periksa informasi sebelum percaya atau membagikannya.' : 'Check information before you trust or share it.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { --litera-red: #df252b; --litera-black: #111; --litera-cream: #f7f6f2; --litera-muted: #5d5b58; --litera-line: rgba(17, 17, 17, .12); }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--litera-cream); color: var(--litera-black); font-family: "Manrope", "Inter", Arial, sans-serif; }
        .analyze-page { width: calc(100% - 40px); max-width: 920px; margin: 0 auto; padding: 132px 0 88px; }
        h1, h2, p { margin-top: 0; }
        h1 { margin-bottom: 12px; font-size: clamp(34px, 4vw, 44px); line-height: 1.12; letter-spacing: -.04em; }
        .page-intro { margin-bottom: 28px; color: var(--litera-muted); font-size: 16px; line-height: 1.6; }
        .input-card, .result-card { border: 1px solid var(--litera-line); border-radius: 28px; background: #fff; }
        .input-card { width: 100%; min-width: 0; padding: clamp(20px, 4vw, 36px); }
        .mode-tabs { display: flex; min-width: 0; gap: 8px; margin-bottom: 20px; }
        .mode-tab { min-width: 0; min-height: 46px; padding: 10px 22px; border: 1px solid var(--litera-line); border-radius: 999px; background: #fff; color: var(--litera-black); font: inherit; font-size: 15px; font-weight: 700; cursor: pointer; }
        .mode-tab[aria-pressed="true"] { border-color: var(--litera-black); background: var(--litera-black); color: #fff; }
        .content-input { display: block; width: 100%; max-width: 100%; min-width: 0; min-height: 142px; padding: 18px; border: 1px solid var(--litera-line); border-radius: 20px; background: #fdfdfc; color: var(--litera-black); font: inherit; font-size: 16px; line-height: 1.6; resize: vertical; }
        .content-input::placeholder { color: #77736e; }
        .analyze-submit, .share-button { display: inline-flex; min-height: 50px; align-items: center; justify-content: center; padding: 12px 24px; border: 0; border-radius: 999px; font: inherit; font-size: 16px; font-weight: 800; cursor: pointer; }
        .analyze-submit { margin-top: 18px; background: var(--litera-red); color: #fff; }
        .analyze-submit:disabled { opacity: .65; cursor: wait; }
        .result-section { margin-top: 52px; scroll-margin-top: 32px; }
        .result-card { padding: clamp(22px, 4vw, 40px); }
        .result-heading { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 28px; }
        .result-heading h2 { margin: 0; font-size: 30px; letter-spacing: -.03em; }
        .sample-badge, .status-badge { display: inline-flex; align-items: center; min-height: 36px; padding: 7px 14px; border-radius: 999px; background: #fff1ef; color: #a21e23; font-size: 14px; font-weight: 700; }
        .score-area { display: flex; flex-wrap: wrap; align-items: center; gap: 20px; padding-bottom: 26px; border-bottom: 1px solid var(--litera-line); }
        .score { color: var(--litera-red); font-size: clamp(48px, 8vw, 72px); font-weight: 800; line-height: 1; letter-spacing: -.06em; }
        .score-label { margin-bottom: 8px; color: var(--litera-muted); font-size: 15px; }
        .findings { display: grid; grid-template-columns: 1fr 1fr; gap: 24px 36px; padding: 28px 0; }
        .findings h3 { margin-bottom: 14px; font-size: 21px; }
        .finding-list { display: grid; gap: 12px; margin: 0; padding: 0; list-style: none; }
        .finding-list li, .explanation { color: var(--litera-muted); font-size: 15px; line-height: 1.65; }
        .recommendation { padding: 18px; border-radius: 18px; background: #f7f6f2; }
        .recommendation strong { display: block; margin-bottom: 6px; font-size: 16px; }
        .recommendation p { margin: 0; color: var(--litera-muted); font-size: 15px; line-height: 1.6; }
        .share-button { margin-top: 22px; background: var(--litera-black); color: #fff; }
        @media (max-width: 640px) {
            .analyze-page { width: calc(100% - 32px); padding-top: 112px; }
            .page-intro { font-size: 15px; }
            .mode-tabs { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .mode-tab { padding-inline: 8px; }
            .findings { grid-template-columns: 1fr; gap: 22px; }
            .result-heading h2 { font-size: 26px; }
            .analyze-submit, .share-button { width: 100%; }
        }
        @media (max-width: 1023px) { body { padding-bottom: 82px; } }
    </style>
</head>

<body>
    <x-litera-navbar active="analyze" />

    <main class="analyze-page">
        <h1>{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }}</h1>
        <p class="page-intro">{{ app()->isLocale('id') ? 'Periksa informasi sebelum percaya atau membagikannya.' : 'Check information before you trust or share it.' }}</p>

        <section class="input-card" aria-label="{{ app()->isLocale('id') ? 'Masukkan konten' : 'Enter content' }}">
            <div class="mode-tabs" role="group" aria-label="{{ app()->isLocale('id') ? 'Jenis konten' : 'Content type' }}">
                @foreach (['text' => app()->isLocale('id') ? 'Teks' : 'Text', 'video' => 'Video', 'audio' => 'Audio'] as $mode => $label)
                    <button class="mode-tab" type="button" aria-pressed="{{ request('type', 'text') === $mode || ($mode === 'text' && request('type') === 'link') ? 'true' : 'false' }}" data-mode="{{ $mode }}">{{ $label }}</button>
                @endforeach
            </div>

            <label class="sr-only" for="contentLink">{{ app()->isLocale('id') ? 'Teks atau tautan konten' : 'Text or content link' }}</label>
            <textarea id="contentLink" class="content-input" placeholder="{{ app()->isLocale('id') ? 'Tempel tautan atau masukkan konten' : 'Paste a link or enter content' }}">{{ request('content') }}</textarea>
            <button id="analyzeButton" class="analyze-submit" type="button">{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }}</button>
        </section>

        <section id="analysis-result" class="result-section" aria-labelledby="resultTitle" hidden>
            <div class="result-card">
                <div class="result-heading">
                    <h2 id="resultTitle">{{ app()->isLocale('id') ? 'Hasil Analisis' : 'Analysis Result' }}</h2>
                    <span class="sample-badge">{{ app()->isLocale('id') ? 'Hasil contoh' : 'Sample result' }}</span>
                </div>

                <div class="score-area">
                    <div class="score">78%</div>
                    <div>
                        <div class="score-label">{{ app()->isLocale('id') ? 'Kepercayaan informasi' : 'Information trust' }}</div>
                        <span class="status-badge">{{ app()->isLocale('id') ? 'Perlu ditinjau' : 'Needs review' }}</span>
                    </div>
                </div>

                <div class="findings">
                    <div>
                        <h3>{{ app()->isLocale('id') ? 'Yang kami temukan' : 'What we found' }}</h3>
                        <ul class="finding-list">
                            <li>✓ {{ app()->isLocale('id') ? 'Klaim utama ditemukan' : 'A main claim was found' }}</li>
                            <li>✓ {{ app()->isLocale('id') ? 'Sumber pendukung perlu diperiksa' : 'Supporting sources need checking' }}</li>
                            <li>✓ {{ app()->isLocale('id') ? 'Ada bahasa yang meyakinkan pembaca' : 'Some wording is persuasive' }}</li>
                        </ul>
                    </div>
                    <div>
                        <h3>{{ app()->isLocale('id') ? 'Kenapa?' : 'Why?' }}</h3>
                        <p class="explanation">{{ app()->isLocale('id') ? 'Klaimnya luas, tetapi sumber yang mendukung belum cukup jelas.' : 'The claim is broad, but its supporting sources are not yet clear.' }}</p>
                    </div>
                </div>

                <div class="recommendation">
                    <strong>{{ app()->isLocale('id') ? 'Rekomendasi' : 'Recommendation' }}</strong>
                    <p>{{ app()->isLocale('id') ? 'Cari sumber lain yang tepercaya sebelum membagikan informasi ini.' : 'Check another trusted source before sharing this information.' }}</p>
                </div>

                <button class="share-button" id="shareResult" type="button">{{ app()->isLocale('id') ? 'Bagikan Hasil' : 'Share Result' }}</button>
            </div>
        </section>
    </main>

    <x-litera-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = Array.from(document.querySelectorAll('[data-mode]'));
            const input = document.getElementById('contentLink');
            const button = document.getElementById('analyzeButton');
            const result = document.getElementById('analysis-result');
            const shareButton = document.getElementById('shareResult');
            const isIndonesian = document.documentElement.lang === 'id';
            const placeholders = {
                text: isIndonesian ? 'Tempel tautan atau masukkan konten' : 'Paste a link or enter content',
                video: isIndonesian ? 'Tempel tautan video di sini' : 'Paste a video link here',
                audio: isIndonesian ? 'Tempel tautan audio di sini' : 'Paste an audio link here',
            };
            const requestedMode = new URLSearchParams(window.location.search).get('type');
            const initialMode = ['video', 'audio'].includes(requestedMode) ? requestedMode : 'text';
            const storedContent = sessionStorage.getItem('litera-analysis-content');

            if (storedContent) {
                if (!input.value) {
                    input.value = storedContent;
                }

                sessionStorage.removeItem('litera-analysis-content');
            }

            tabs.forEach(function (tab) {
                tab.setAttribute('aria-pressed', tab.dataset.mode === initialMode ? 'true' : 'false');
            });
            input.placeholder = placeholders[initialMode];

            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    tabs.forEach(function (item) {
                        item.setAttribute('aria-pressed', item === tab ? 'true' : 'false');
                    });
                    input.placeholder = placeholders[tab.dataset.mode];
                });
            });

            button.addEventListener('click', function () {
                if (!input.value.trim()) {
                    input.focus();
                    return;
                }

                button.disabled = true;
                button.textContent = isIndonesian ? 'Menyiapkan hasil…' : 'Preparing result…';

                window.setTimeout(function () {
                    button.disabled = false;
                    button.textContent = isIndonesian ? 'Analisis Konten' : 'Analyze Content';
                    result.hidden = false;
                    result.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 500);
            });

            shareButton.addEventListener('click', async function () {
                const shareData = {
                    title: isIndonesian ? 'Hasil contoh LITERA' : 'LITERA sample result',
                    text: isIndonesian ? 'Informasi ini perlu ditinjau lebih lanjut.' : 'This information needs further review.',
                    url: window.location.href,
                };

                if (navigator.share) {
                    await navigator.share(shareData);
                } else if (navigator.clipboard) {
                    await navigator.clipboard.writeText(shareData.text + ' ' + shareData.url);
                    shareButton.textContent = isIndonesian ? 'Tautan disalin' : 'Link copied';
                }
            });
        });
    </script>
</body>

</html>
