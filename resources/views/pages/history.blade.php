<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->isLocale('id') ? 'Riwayat' : 'History' }} — LITERA</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Lihat kembali konten yang telah kamu periksa.' : 'Review the content you have checked.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --red: #df252b; --ink: #111; --muted: #5d5b58; --line: rgba(17,17,17,.12); --cream: #f7f6f2; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--cream); color: var(--ink); font-family: "Manrope", "Inter", Arial, sans-serif; }
        .page { width: calc(100% - 40px); max-width: 900px; margin: 0 auto; padding: 132px 0 88px; }
        h1 { margin: 0 0 12px; font-size: clamp(34px, 4vw, 44px); letter-spacing: -.04em; }
        .intro { color: var(--muted); font-size: 15px; line-height: 1.6; }
        .list { display: grid; gap: 12px; margin-top: 24px; }
        .card { display: grid; grid-template-columns: minmax(0, 1fr) auto 24px; gap: 16px; align-items: center; padding: 20px; border: 1px solid var(--line); border-radius: 24px; background: #fff; color: inherit; text-decoration: none; }
        .card:hover { border-color: rgba(17,17,17,.3); }
        .title { margin: 0 0 7px; font-size: 17px; line-height: 1.4; }
        .date { margin: 0; color: var(--muted); font-size: 14px; }
        .meta { display: flex; flex-wrap: wrap; gap: 8px; }
        .tag { display: inline-flex; padding: 8px 12px; border-radius: 99px; background: #fff1ef; color: #a21e23; font-size: 13px; font-weight: 700; }
        .tag.neutral { background: #f2f0ec; color: #4f4b46; }
        .empty { margin-top: 24px; padding: 32px; border: 1px solid var(--line); border-radius: 24px; background: white; text-align: center; color: var(--muted); }
        @media (max-width: 640px) { .page { width: calc(100% - 32px); padding-top: 112px; } .card { grid-template-columns: minmax(0, 1fr) 20px; gap: 10px 12px; padding: 16px; } .meta { grid-column: 1; } }
        @media (max-width: 1023px) { body { padding-bottom: 82px; } }
    </style>
</head>
<body>
    <x-litera-navbar active="history" />
    <main class="page">
        <h1>{{ app()->isLocale('id') ? 'Jejak Litera' : 'Litera History' }}</h1>
        <p class="intro">{{ app()->isLocale('id') ? 'Jejak literasi personal. Lihat kembali konten yang telah kamu periksa.' : 'Your personal literacy trail. Review the content you have checked.' }}</p>
        @php
            $intentLabels = ['Edukatif' => 'Educational', 'Persuasif' => 'Persuasive', 'Provokatif' => 'Provocative', 'Komersial' => 'Commercial'];
        @endphp
        <div class="list">
            @forelse ($analyses as $analysis)
                <a class="card" href="{{ route('analyze.result', $analysis) }}">
                    <div>
                        <h2 class="title">{{ $analysis->title }}</h2>
                        <p class="date">{{ $analysis->analyzed_at->format('d M Y') }} · {{ $analysis->content_type }}</p>
                    </div>
                    <div class="meta">
                        <span class="tag">{{ app()->isLocale('id') || $analysis->fact_status === 'DUKUNGAN SUMBER TERSEDIA' ? $analysis->fact_status : 'NEEDS REVIEW' }}</span>
                        <span class="tag neutral">{{ app()->isLocale('id') ? $analysis->intent : $intentLabels[$analysis->intent] }}</span>
                    </div>
                    <span aria-hidden="true" style="font-size:24px">&rsaquo;</span>
                </a>
            @empty
                <div class="empty">{{ app()->isLocale('id') ? 'Belum ada analisis di riwayatmu.' : 'There are no analyses in your history yet.' }}</div>
            @endforelse
        </div>
    </main>
    <x-litera-footer />
</body>
</html>
