<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al-Qur'an Digital</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --teal-primary: #14b8a6;
            --teal-dark: #0d9488;
            --teal-light: #99f6e4;
            --teal-gradient: linear-gradient(135deg, var(--teal-primary), var(--teal-dark));
            --bg-main: #f8fafc;
            --text-main: #1b1b18;
            --text-muted: #706f6c;
            --border-color: #e2e8f0;
        }

        [data-bs-theme="dark"] {
            --teal-primary: #2dd4bf;
            --teal-dark: #0d9488;
            --teal-light: #5eead4;
            --bg-main: #0f172a;
            --text-main: #ededec;
            --text-muted: #a1a09a;
            --border-color: #334155;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-main);
            min-height: 100vh;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .arabic-text {
            font-family: 'Amiri', serif;
        }

        /* NAVBAR */
        .navbar {
            padding: 1rem 0;
            background: rgba(248, 250, 252, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
        }

        [data-bs-theme="dark"] .navbar {
            background: rgba(15, 23, 42, 0.95);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--teal-primary) !important;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
        }

        .navbar-brand i {
            background: var(--teal-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .theme-toggle {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(20, 184, 166, 0.1);
            border: 2px solid var(--border-color);
            color: var(--teal-primary);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            background: var(--teal-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
        }

        /* HERO SECTION */
        .hero-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 1rem;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(20, 184, 166, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(20, 184, 166, 0.05) 0%, transparent 50%);
            z-index: -1;
        }

        .bismillah-text {
            font-size: 2.8rem;
            color: var(--teal-primary);
            margin-bottom: 2.5rem;
            font-weight: 400;
            text-shadow: 0 2px 10px rgba(20, 184, 166, 0.2);
            line-height: 1.4;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            max-width: 800px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--text-main) 0%, var(--teal-primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto 3rem;
            font-size: 1.2rem;
            line-height: 1.7;
            font-weight: 400;
        }

        /* CTA BUTTON */
        .btn-start {
            padding: 1.25rem 3rem;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 16px;
            background: var(--teal-gradient);
            border: none;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(20, 184, 166, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-start::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-start:hover::before {
            left: 100%;
        }

        .btn-start:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(20, 184, 166, 0.4);
        }

        .btn-start i {
            font-size: 1.2rem;
        }

        /* FEATURES */
        .features {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 4rem;
            flex-wrap: wrap;
        }

        .feature-item {
            background: rgba(20, 184, 166, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            width: 180px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-4px);
            border-color: var(--teal-primary);
            box-shadow: 0 8px 20px rgba(20, 184, 166, 0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--teal-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .feature-text {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }

            .bismillah-text {
                font-size: 2.2rem;
            }

            .features {
                gap: 1rem;
            }

            .feature-item {
                width: 160px;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .bismillah-text {
                font-size: 1.8rem;
            }

            .hero-description {
                font-size: 1.1rem;
            }

            .btn-start {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .features {
                flex-direction: column;
                align-items: center;
            }

            .feature-item {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }

            .bismillah-text {
                font-size: 1.5rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .navbar-brand {
                font-size: 1rem;
            }
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content > * {
            animation: fadeInUp 0.6s ease forwards;
        }

        .hero-title {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .hero-description {
            animation-delay: 0.4s;
            opacity: 0;
        }

        .btn-start {
            animation-delay: 0.6s;
            opacity: 0;
        }

        .features {
            animation-delay: 0.8s;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.8s forwards;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-book"></i> Al-Qur'an Digital
            </a>
            <div class="d-flex align-items-center">
                <button class="theme-toggle" id="themeToggler" aria-label="Toggle theme">
                    <i class="bi bi-moon-stars" id="themeIcon"></i>
                </button>
            </div>
        </div>
    </nav>

    <main class="hero-section">
        <div class="hero-bg"></div>
        <div class="container text-center hero-content">
            <div class="bismillah-text arabic-text">
                بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
            </div>

            <h1 class="hero-title">
                Tadabbur Al-Qur'an dengan Kedamaian dan Fokus
            </h1>

            <p class="hero-description">
                Pengalaman membaca yang menyeluruh dengan teks Arab yang jelas, terjemahan Indonesia yang akurat,
                audio murottal berkualitas, dan fitur hafalan yang terintegrasi.
            </p>

            <a href="{{ route('auth') }}" class="btn-start">
                <i class="bi bi-book-half"></i> Mulai Membaca Sekarang
            </a>

            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-text-paragraph"></i>
                    </div>
                    <div class="feature-text">
                        Teks Arab & Terjemahan
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-volume-up"></i>
                    </div>
                    <div class="feature-text">
                        Audio Murottal
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-bookmark-check"></i>
                    </div>
                    <div class="feature-text">
                        Penanda Hafalan
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="feature-text">
                        Pencarian Cepat
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const htmlElement = document.documentElement;
        const themeToggler = document.getElementById('themeToggler');
        const themeIcon = document.getElementById('themeIcon');

        function setTheme(theme) {
            htmlElement.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);
            themeIcon.className = theme === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';
        }

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);

        // Toggle theme
        themeToggler.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            setTheme(currentTheme === 'light' ? 'dark' : 'light');
        });

        // Add scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe feature items
            document.querySelectorAll('.feature-item').forEach(item => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'all 0.6s ease';
                observer.observe(item);
            });
        });
    </script>
</body>

</html>
