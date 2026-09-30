<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'LITERA' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --red: #df252b; --cream: #f7f6f2; --ink: #111; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; color: var(--ink); font-family: "Manrope", "Inter", Arial, sans-serif; background: var(--cream); }
        .auth-scene { position: relative; display: grid; min-height: 100vh; min-height: 100svh; place-items: center; overflow: hidden; padding: 32px 18px; isolation: isolate; }
        .auth-scene::before, .auth-scene::after { position: absolute; z-index: -1; content: ""; inset: 0; pointer-events: none; }
        .auth-scene::before { background: url('{{ asset('images/litera-hero-collage.png') }}') center / cover no-repeat; filter: blur(22px); opacity: .24; transform: scale(1.08); }
        .auth-scene::after { background: rgba(247,246,242,.74); }
        .auth-panel { width: min(100%, 480px); padding: clamp(26px, 5vw, 42px); border: 1px solid rgba(17,17,17,.12); border-radius: 28px; background: rgba(255,255,255,.78); box-shadow: 0 20px 70px rgba(17,17,17,.08); backdrop-filter: blur(12px); }
        .auth-logo { display: block; width: 148px; max-height: 60px; object-fit: contain; margin: 0 auto 26px; }
        .auth-panel h1 { margin: 0; font-size: clamp(27px, 5vw, 34px); line-height: 1.2; text-align: center; letter-spacing: -.035em; }
        .auth-panel .auth-description { margin: 10px 0 24px; color: #66615d; text-align: center; line-height: 1.55; }
        .auth-panel form { display: flex; flex-direction: column; gap: 18px; }
        .auth-panel input:not([type=checkbox]) { border-radius: 14px !important; }
        .auth-panel button[type=submit] { min-height: 50px; border: 0; border-radius: 999px; background: var(--red); color: #fff; font-weight: 750; }
        .auth-panel a { color: #a51b21; }
        @media (max-width: 500px) { .auth-scene { padding: 18px 14px; } .auth-panel { padding: 26px 20px; border-radius: 22px; } }
    </style>
</head>
<body>
    <main class="auth-scene">
        <section class="auth-panel">
            <a href="{{ route('home') }}" aria-label="LITERA home"><img class="auth-logo" src="{{ asset('images/logo_litera.png') }}" alt="LITERA"></a>
            {{ $slot }}
        </section>
    </main>
</body>
</html>
