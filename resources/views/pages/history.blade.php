<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->isLocale('id') ? 'Riwayat Analisis' : 'Analysis History' }} — LITERA</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Lihat kembali contoh riwayat analisis LITERA.' : 'Review sample LITERA analysis history.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --red: #df252b; --ink: #111; --muted: #5d5b58; --line: rgba(17,17,17,.12); --cream: #f7f6f2; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--cream); color: var(--ink); font-family: "Manrope", "Inter", Arial, sans-serif; }
        .history-page { width: calc(100% - 40px); max-width: 900px; margin: 0 auto; padding: 132px 0 88px; }
        h1 { margin: 0 0 28px; font-size: clamp(34px, 4vw, 44px); letter-spacing: -.04em; }
        .history-tools { display: flex; gap: 12px; align-items: center; }
        .history-search { flex: 1; min-width: 0; min-height: 52px; padding: 12px 18px; border: 1px solid var(--line); border-radius: 18px; background: #fff; color: var(--ink); font: inherit; font-size: 16px; }
        .filter-toggle { min-height: 52px; padding: 12px 20px; border: 1px solid var(--line); border-radius: 999px; background: #fff; color: var(--ink); font: inherit; font-size: 15px; font-weight: 700; cursor: pointer; }
        .filter-pills { display: flex; flex-wrap: wrap; gap: 8px; margin: 16px 0 22px; }
        .filter-pill { min-height: 42px; padding: 9px 18px; border: 1px solid var(--line); border-radius: 999px; background: transparent; color: var(--ink); font: inherit; font-size: 14px; font-weight: 700; cursor: pointer; }
        .filter-pill[aria-pressed="true"] { border-color: var(--ink); background: var(--ink); color: #fff; }
        .history-note { margin: 8px 0 20px; color: var(--muted); font-size: 14px; line-height: 1.6; }
        .history-list { display: grid; gap: 12px; }
        .history-card { display: grid; grid-template-columns: 48px minmax(0, 1fr) auto 24px; gap: 16px; align-items: center; padding: 20px; border: 1px solid var(--line); border-radius: 24px; background: #fff; color: inherit; text-decoration: none; transition: border-color .15s ease, transform .15s ease; }
        .history-card:hover { border-color: rgba(17,17,17,.28); transform: translateY(-1px); }
        .type-icon { display: grid; width: 46px; height: 46px; place-items: center; border-radius: 50%; background: #f7f6f2; color: var(--red); font-size: 18px; font-weight: 800; }
        .history-title { margin: 0 0 6px; font-size: 17px; line-height: 1.4; overflow-wrap: anywhere; }
        .history-card > div { min-width: 0; }
        .history-date { margin: 0; color: var(--muted); font-size: 14px; }
        .history-status { padding: 8px 12px; border-radius: 999px; background: #fff1ef; color: #a21e23; font-size: 14px; font-weight: 700; white-space: nowrap; }
        .history-status.clear { background: #eef7f0; color: #27663a; }
        .history-arrow { color: #555; font-size: 22px; }
        .no-results { padding: 28px 12px; color: var(--muted); font-size: 16px; text-align: center; }
        @media (max-width: 640px) {
            .history-page { width: calc(100% - 32px); padding-top: 112px; }
            .history-tools { align-items: stretch; }
            .filter-toggle { padding-inline: 16px; }
            .history-card { grid-template-columns: 42px minmax(0, 1fr) 20px; gap: 12px; padding: 16px; }
            .type-icon { width: 42px; height: 42px; }
            .history-status { grid-column: 2; justify-self: start; font-size: 14px; }
            .history-arrow { grid-column: 3; grid-row: 1 / span 2; }
        }
        @media (max-width: 1023px) { body { padding-bottom: 82px; } }
    </style>
</head>

<body>
    <x-litera-navbar active="history" />
    <main class="history-page">
        <h1>{{ app()->isLocale('id') ? 'Riwayat Analisis' : 'Analysis History' }}</h1>

        <div class="history-tools">
            <label class="sr-only" for="historySearch">{{ app()->isLocale('id') ? 'Cari riwayat' : 'Search history' }}</label>
            <input id="historySearch" class="history-search" type="search" placeholder="{{ app()->isLocale('id') ? 'Cari konten' : 'Search content' }}">
            <button id="filterToggle" class="filter-toggle" type="button" aria-expanded="true" aria-controls="filterPills">{{ app()->isLocale('id') ? 'Filter' : 'Filter' }}</button>
        </div>

        <div id="filterPills" class="filter-pills" aria-label="{{ app()->isLocale('id') ? 'Filter jenis konten' : 'Filter by content type' }}">
            @foreach (['all' => app()->isLocale('id') ? 'Semua' : 'All', 'video' => 'Video', 'link' => app()->isLocale('id') ? 'Tautan' : 'Links', 'text' => app()->isLocale('id') ? 'Teks' : 'Text'] as $filter => $label)
                <button class="filter-pill" type="button" data-filter="{{ $filter }}" aria-pressed="{{ $filter === 'all' ? 'true' : 'false' }}">{{ $label }}</button>
            @endforeach
        </div>

        <p class="history-note">{{ app()->isLocale('id') ? 'Contoh riwayat untuk pratinjau. Analisis ini belum disimpan.' : 'Sample history preview. These analyses have not been saved.' }}</p>

        <div id="historyList" class="history-list" aria-live="polite">
            <a class="history-card" data-type="video" data-title="{{ app()->isLocale('id') ? 'Konten promosi kesehatan di media sosial' : 'Health promotion content on social media' }}" href="{{ route('analyze', ['type' => 'video', 'content' => 'https://example.com/post/health-123']) }}">
                <span class="type-icon" aria-hidden="true">▶</span>
                <div>
                    <h2 class="history-title">{{ app()->isLocale('id') ? 'Konten promosi kesehatan di media sosial' : 'Health promotion content on social media' }}</h2>
                    <p class="history-date">{{ app()->isLocale('id') ? '21 Sep 2026' : 'Sep 21, 2026' }}</p>
                </div>
                <span class="history-status">{{ app()->isLocale('id') ? 'Perlu ditinjau' : 'Needs review' }}</span>
                <span class="history-arrow" aria-hidden="true">›</span>
            </a>

            <a class="history-card" data-type="video" data-title="{{ app()->isLocale('id') ? 'Informasi edukasi lingkungan' : 'Environmental education content' }}" href="{{ route('analyze', ['type' => 'video', 'content' => 'https://example.com/video/environment-456']) }}">
                <span class="type-icon" aria-hidden="true">▶</span>
                <div>
                    <h2 class="history-title">{{ app()->isLocale('id') ? 'Informasi edukasi lingkungan' : 'Environmental education content' }}</h2>
                    <p class="history-date">{{ app()->isLocale('id') ? '20 Sep 2026' : 'Sep 20, 2026' }}</p>
                </div>
                <span class="history-status clear">{{ app()->isLocale('id') ? 'Sumber tersedia' : 'Sources available' }}</span>
                <span class="history-arrow" aria-hidden="true">›</span>
            </a>

            <a class="history-card" data-type="link" data-title="{{ app()->isLocale('id') ? 'Pernyataan tentang teknologi dan produktivitas' : 'Statement about technology and productivity' }}" href="{{ route('analyze', ['type' => 'link', 'content' => 'https://example.com/article/technology-789']) }}">
                <span class="type-icon" aria-hidden="true">↗</span>
                <div>
                    <h2 class="history-title">{{ app()->isLocale('id') ? 'Pernyataan tentang teknologi dan produktivitas' : 'Statement about technology and productivity' }}</h2>
                    <p class="history-date">{{ app()->isLocale('id') ? '19 Sep 2026' : 'Sep 19, 2026' }}</p>
                </div>
                <span class="history-status">{{ app()->isLocale('id') ? 'Perlu ditinjau' : 'Needs review' }}</span>
                <span class="history-arrow" aria-hidden="true">›</span>
            </a>

            <a class="history-card" data-type="text" data-title="{{ app()->isLocale('id') ? 'Unggahan dengan klaim tanpa sumber' : 'Post containing an unsupported claim' }}" href="{{ route('analyze', ['type' => 'text', 'content' => 'https://example.com/post/claim-321']) }}">
                <span class="type-icon" aria-hidden="true">T</span>
                <div>
                    <h2 class="history-title">{{ app()->isLocale('id') ? 'Unggahan dengan klaim tanpa sumber' : 'Post containing an unsupported claim' }}</h2>
                    <p class="history-date">{{ app()->isLocale('id') ? '18 Sep 2026' : 'Sep 18, 2026' }}</p>
                </div>
                <span class="history-status">{{ app()->isLocale('id') ? 'Perlu ditinjau' : 'Needs review' }}</span>
                <span class="history-arrow" aria-hidden="true">›</span>
            </a>
        </div>
        <p id="historyEmpty" class="no-results" hidden>{{ app()->isLocale('id') ? 'Tidak ada konten yang cocok.' : 'No matching content.' }}</p>
    </main>
    <x-litera-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const search = document.getElementById('historySearch');
            const cards = Array.from(document.querySelectorAll('.history-card'));
            const filters = Array.from(document.querySelectorAll('[data-filter]'));
            const pills = document.getElementById('filterPills');
            const toggle = document.getElementById('filterToggle');
            const emptyState = document.getElementById('historyEmpty');
            let activeFilter = 'all';

            function updateHistory() {
                const query = search.value.trim().toLocaleLowerCase();
                let visibleCount = 0;

                cards.forEach(function (card) {
                    const matchesFilter = activeFilter === 'all' || card.dataset.type === activeFilter;
                    const matchesSearch = card.dataset.title.toLocaleLowerCase().includes(query);
                    card.hidden = !(matchesFilter && matchesSearch);
                    if (!card.hidden) visibleCount += 1;
                });

                emptyState.hidden = visibleCount !== 0;
            }

            filters.forEach(function (filter) {
                filter.addEventListener('click', function () {
                    activeFilter = filter.dataset.filter;
                    filters.forEach(function (item) {
                        item.setAttribute('aria-pressed', item === filter ? 'true' : 'false');
                    });
                    updateHistory();
                });
            });

            search.addEventListener('input', updateHistory);
            toggle.addEventListener('click', function () {
                const expanded = toggle.getAttribute('aria-expanded') === 'true';
                toggle.setAttribute('aria-expanded', String(!expanded));
                pills.hidden = expanded;
            });
        });
    </script>
</body>

</html>
