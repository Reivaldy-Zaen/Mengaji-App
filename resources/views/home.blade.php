<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al-Qur'an Digital</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --hero-bg: radial-gradient(circle at center, #ffffff 0%, #f8fafb 100%);
            --text-main: #1b1b18;
            --text-muted: #706f6c;
            --border-color: #eeeeec;
        }

        [data-bs-theme="dark"] {
            --hero-bg: radial-gradient(circle at center, #1a1a1a 0%, #0a0a0a 100%);
            --text-main: #ededec;
            --text-muted: #a1a09a;
            --border-color: #3e3e3a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--hero-bg);
            min-height: 100vh;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .navbar {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            font-weight: 700;
            color: #0d9488 !important;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.1rem;
        }

        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .theme-toggle:hover {
            background: var(--border-color);
        }

        .hero-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
        }

        .bismillah-text {
            font-size: 2rem;
            color: #0d9488;
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .hero-description {
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto 3rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .btn-start {
            padding: 16px 40px;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 12px;
            background-color: #0d9488;
            border: none;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-start:hover {
            background-color: #0f766e;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        .shortcut-hint {
            margin-top: 4rem;
            padding: 1rem 1.5rem;
            background: var(--border-color);
            border-radius: 10px;
            font-size: 0.85rem;
            color: var(--text-muted);
            display: inline-block;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .bismillah-text {
                font-size: 1.5rem;
            }
        }

        * {
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-book"></i> Al-Qur'an Digital
            </a>
            <button class="theme-toggle" id="themeToggler" aria-label="Toggle theme">
                <i class="bi bi-moon-stars" id="themeIcon"></i>
            </button>
        </div>
    </nav>

    <div class="hero-container">
        <div class="container text-center">
            <div class="bismillah-text">
                بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
            </div>

            <h1 class="hero-title">
                Baca Al-Qur'an dengan tenang dan fokus
            </h1>

            <p class="hero-description">
                Pengalaman membaca yang sederhana dengan teks Arab, terjemahan Indonesia, dan audio berkualitas tanpa
                gangguan.
            </p>
            @auth
                <a href="{{ route('auth') }}" class="btn-start">
                    <i class="bi bi-book-half"></i> Login / Register Untuk Membaca
                </a>
            @endauth

            <div class="shortcut-hint">
                <i class="bi bi-keyboard"></i> Spasi: play/pause • ← →: navigasi surah
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const htmlElement = document.documentElement;
        const themeToggler = document.getElementById('themeToggler');
        const themeIcon = document.getElementById('themeIcon');

        function setTheme(theme) {
            htmlElement.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);

            themeIcon.className = theme === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';
        }

        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);

        themeToggler.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            setTheme(currentTheme === 'light' ? 'dark' : 'light');
        });
    </script>
</body>

</html>
