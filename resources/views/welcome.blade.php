<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'UjianPOS') }} — Sistem Point of Sale Modern</title>
    <meta name="description" content="UjianPOS — Sistem Point of Sale modern untuk kelola supplier dan penjualan dengan mudah dan efisien.">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0a0e1a;
            color: #e2e8f0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── Animated background ── */
        .bg-grid {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(99, 102, 241, .12) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, .1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(14, 165, 233, .06) 0%, transparent 60%);
        }
        .bg-grid::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(255,255,255,.02) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(255,255,255,.02) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* ── Glow orb ── */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }
        .orb-1 {
            width: 500px; height: 500px;
            background: rgba(99, 102, 241, .15);
            top: -100px; left: -100px;
            animation: orbFloat 8s ease-in-out infinite alternate;
        }
        .orb-2 {
            width: 400px; height: 400px;
            background: rgba(139, 92, 246, .12);
            bottom: -80px; right: -80px;
            animation: orbFloat 10s 2s ease-in-out infinite alternate-reverse;
        }
        @keyframes orbFloat {
            from { transform: translate(0, 0); }
            to   { transform: translate(30px, -30px); }
        }

        /* ── Layout ── */
        .page { position: relative; z-index: 1; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── Nav ── */
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            width: 100%;
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            text-decoration: none;
        }
        .nav-logo {
            width: 2.4rem;
            height: 2.4rem;
            border-radius: .6rem;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(99, 102, 241, .4);
        }
        .nav-brand-text {
            font-size: 1.3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c7d2fe, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -.5px;
        }
        .nav-links { display: flex; align-items: center; gap: .5rem; }
        .nav-link {
            padding: .5rem 1.2rem;
            border-radius: .5rem;
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all .15s;
        }
        .nav-link-ghost {
            color: #94a3b8;
        }
        .nav-link-ghost:hover { color: #e2e8f0; background: rgba(255,255,255,.06); }
        .nav-link-primary {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            box-shadow: 0 2px 10px rgba(99, 102, 241, .3);
        }
        .nav-link-primary:hover {
            box-shadow: 0 4px 20px rgba(99, 102, 241, .45);
            transform: translateY(-1px);
        }

        /* ── Hero ── */
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }
        .hero-inner { max-width: 720px; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: rgba(99, 102, 241, .12);
            border: 1px solid rgba(99, 102, 241, .25);
            color: #a5b4fc;
            font-size: .75rem;
            font-weight: 700;
            padding: .35rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
            letter-spacing: .04em;
            animation: fadeUp .5s ease both;
        }
        .badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #818cf8;
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: .4; }
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            letter-spacing: -1.5px;
            line-height: 1.1;
            margin-bottom: 1.25rem;
            animation: fadeUp .5s .1s ease both;
        }
        .hero-title .gradient {
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 50%, #f472b6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: 1.1rem;
            color: #94a3b8;
            line-height: 1.7;
            max-width: 520px;
            margin: 0 auto 2.5rem;
            animation: fadeUp .5s .2s ease both;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            animation: fadeUp .5s .3s ease both;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .75rem 1.8rem;
            border-radius: .65rem;
            font-size: .9rem;
            font-weight: 700;
            text-decoration: none;
            transition: all .15s;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }
        .btn-glow {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            box-shadow: 0 4px 20px rgba(99, 102, 241, .35), 0 0 0 1px rgba(99, 102, 241, .3);
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, .5), 0 0 0 1px rgba(99, 102, 241, .4);
        }
        .btn-outline {
            background: rgba(255,255,255,.04);
            color: #c7d2fe;
            border: 1.5px solid rgba(99, 102, 241, .3);
        }
        .btn-outline:hover {
            background: rgba(99, 102, 241, .1);
            border-color: rgba(99, 102, 241, .5);
            transform: translateY(-1px);
        }

        /* ── Features ── */
        .features {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 5rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }
        @media (max-width: 768px) {
            .features { grid-template-columns: 1fr; }
        }

        .feat-card {
            background: rgba(255,255,255,.03);
            border: 1px solid rgba(255,255,255,.06);
            border-radius: 1rem;
            padding: 1.75rem;
            transition: all .2s;
            animation: fadeUp .5s .4s ease both;
        }
        .feat-card:nth-child(2) { animation-delay: .5s; }
        .feat-card:nth-child(3) { animation-delay: .6s; }
        .feat-card:hover {
            background: rgba(255,255,255,.05);
            border-color: rgba(99, 102, 241, .2);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,.2);
        }

        .feat-icon {
            width: 2.75rem;
            height: 2.75rem;
            border-radius: .7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .feat-icon-purple { background: rgba(99, 102, 241, .15); color: #818cf8; }
        .feat-icon-cyan   { background: rgba(14, 165, 233, .15); color: #38bdf8; }
        .feat-icon-pink   { background: rgba(244, 114, 182, .15); color: #f472b6; }

        .feat-title {
            font-size: 1rem;
            font-weight: 700;
            color: #e2e8f0;
            margin-bottom: .4rem;
        }
        .feat-desc {
            font-size: .82rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* ── Footer ── */
        .footer {
            text-align: center;
            padding: 2rem;
            color: #475569;
            font-size: .78rem;
            border-top: 1px solid rgba(255,255,255,.04);
        }

        /* ── Animations ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="page">
        {{-- Navigation --}}
        <nav class="nav">
            <a href="/" class="nav-brand">
                <div class="nav-logo">
                    <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/></svg>
                </div>
                <span class="nav-brand-text">UjianPOS</span>
            </a>

            <div class="nav-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link nav-link-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link nav-link-ghost">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link nav-link-primary">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        {{-- Hero --}}
        <section class="hero">
            <div class="hero-inner">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Sistem POS Modern & Efisien
                </div>

                <h1 class="hero-title">
                    Kelola Bisnis<br>
                    <span class="gradient">Lebih Cerdas</span>
                </h1>

                <p class="hero-desc">
                    Platform Point of Sale yang memudahkan Anda mengelola supplier, 
                    mencatat penjualan, dan menganalisis performa bisnis dalam satu tempat.
                </p>

                <div class="hero-actions">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-glow">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5"/></svg>
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-glow">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
                                Mulai Sekarang
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline">
                                    Buat Akun
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section class="features">
            <div class="feat-card">
                <div class="feat-icon feat-icon-purple">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                </div>
                <div class="feat-title">Kelola Supplier</div>
                <div class="feat-desc">Tambah, edit, dan hapus data supplier dengan antarmuka yang intuitif. Semua data tersimpan rapi.</div>
            </div>

            <div class="feat-card">
                <div class="feat-icon feat-icon-cyan">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/></svg>
                </div>
                <div class="feat-title">Catat Penjualan</div>
                <div class="feat-desc">Pencatatan transaksi penjualan yang cepat dan akurat. Lacak setiap transaksi dengan mudah.</div>
            </div>

            <div class="feat-card">
                <div class="feat-icon feat-icon-pink">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                </div>
                <div class="feat-title">Laporan Real-time</div>
                <div class="feat-desc">Dashboard analytics yang menampilkan data penjualan dan performa bisnis secara real-time.</div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="footer">
            © {{ date('Y') }} UjianPOS. Sistem Point of Sale Modern.
        </footer>
    </div>
</body>
</html>
