<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LITERA</title>
    <meta name="description" content="{{ app()->isLocale('id') ? 'Periksa informasi sebelum percaya atau membagikannya.' : 'Check information before you trust or share it.' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --litera-red: #df252b; --litera-cream: #f7f6f2; --litera-ink: #111; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--litera-cream); color: var(--litera-ink); font-family: "Manrope", "Inter", Arial, sans-serif; }
        .hero { display: grid; min-height: 100vh; min-height: 100svh; place-items: center; padding: 120px 24px 72px; text-align: center; }
        .hero-inner { width: min(100%, 900px); }
        h1 { margin: 0; font-size: clamp(40px, 5.5vw, 66px); font-weight: 800; line-height: 1.08; letter-spacing: -.055em; }
        .description { max-width: 560px; margin: 22px auto 0; font-size: clamp(16px, 2vw, 19px); font-weight: 400; line-height: 1.7; color: #5d5b58; }
        .actions { display: flex; flex-direction: column; align-items: center; gap: 18px; margin-top: 34px; }
        .cta { display: inline-flex; min-height: 52px; align-items: center; justify-content: center; padding: 14px 25px; border-radius: 999px; background: var(--litera-red); color: white; font-size: 15px; font-weight: 700; text-decoration: none; transition: transform .2s ease, background .2s ease; }
        .cta:hover { transform: translateY(-2px); background: #c91e25; }
        .learn { color: var(--litera-ink); font-size: 15px; font-weight: 500; text-decoration: none; }
        .learn:hover { text-decoration: underline; text-underline-offset: 4px; }
        @media (max-width: 1023px) { body { padding-bottom: 82px; } }
    </style>
</head>
<body>
    <x-litera-navbar active="home" />
    <main>
        <section class="hero">
            <div class="hero-inner">
                <h1>{{ app()->isLocale('id') ? 'Pahami sebelum percaya.' : 'Understand before you trust.' }}</h1>
                <p class="description">{{ app()->isLocale('id') ? 'Periksa informasi sebelum percaya atau membagikannya.' : 'Check information before you trust or share it.' }}</p>
                <div class="actions">
                    <a href="{{ route('analyze') }}" class="cta">{{ app()->isLocale('id') ? 'Analisis Konten' : 'Analyze Content' }}</a>
                    <a href="{{ route('about') }}#how-it-works" class="learn">{{ app()->isLocale('id') ? 'Lihat cara kerjanya' : 'See how it works' }}</a>
                </div>
            </div>
        </section>
    </main>
    <x-litera-footer />
</body>
</html>
