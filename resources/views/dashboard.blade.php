<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
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

        /* Override untuk Dark Mode */
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

        .text-teal { color: #0d9488; }
        .bg-teal { background-color: #0d9488; border-color: #0d9488; }
        .bg-teal:hover { background-color: #0f766e; border-color: #0f766e; }
        
        .navbar { padding: 1.5rem 0; }
        .navbar-brand {
            font-weight: 700;
            color: #0d9488 !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-link {
            color: var(--text-muted) !important;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
        }

        .hero-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 5rem;
        }

        .bismillah-badge {
            display: inline-block;
            background-color: #00bcd4;
            color: white;
            padding: 6px 20px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            max-width: 700px;
            margin: 0 auto 1.5rem;
        }

        .hero-description {
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto 2.5rem;
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .btn-main {
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .link-about {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            margin-left: 20px;
        }

        .shortcut-text {
            margin-top: 2rem;
            font-size: 0.8rem;
            color: #a1a09a;
        }

        footer {
            padding: 1.5rem 0;
            border-top: 1px solid var(--border-color);
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* Animasi Transisi Halus */
        * { transition: background-color 0.2s ease, border-color 0.2s ease; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-book"></i> Al-Qur'an Digital
            </a>
            
            <div class="ms-auto d-flex align-items-center">
                <ul class="navbar-nav d-none d-md-flex flex-row me-4">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" id="themeToggler">
                            <i class="bi bi-moon-stars" id="themeIcon"></i> 
                            <span id="themeText">Tema</span>
                        </a>
                    </li>
                </ul>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark btn-sm px-3">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn bg-teal text-white btn-sm px-3 rounded-pill">
                            <i class="bi bi-list-ul me-1"></i> Buka Daftar Surah
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="hero-container">
        <div class="container text-center">
            <div class="bismillah-badge">
                Bismillah, mulai membaca
            </div>
            
            <h1 class="hero-title">
                Al-Qur'an digital yang fokus ke satu hal: pengalaman baca yang tenang.
            </h1>
            
            <p class="hero-description">
                Masuk ke Dashboard Daftar Surah, pilih surah, lalu lanjutkan membaca dengan teks Arab, terjemahan, dan audio yang sederhana tanpa gangguan.
            </p>
            
            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                <a href="{{ route('surah.index') }}" class="btn btn-main bg-teal text-white border-0">
                    <i class="bi bi-list-ul"></i> Mulai dari Daftar Surah
                </a>
                <a href="#" class="link-about mt-3 mt-sm-0">Tentang aplikasi ini</a>
            </div>

            <p class="shortcut-text">
                Shortcut: spasi untuk play/pause · panah kiri/kanan untuk surah sebelumnya/berikutnya
            </p>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    © 2024 Al-Qur'an Digital · Fokus pada pengalaman baca yang sederhana dan tenang.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-decoration-none text-muted me-3">Daftar Surah</a>
                    <a href="#" class="text-decoration-none text-muted">Tentang</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Logika Pengubah Tema (Dark/Light Mode)
        const htmlElement = document.documentElement;
        const themeToggler = document.getElementById('themeToggler');
        const themeIcon = document.getElementById('themeIcon');
        const themeText = document.getElementById('themeText');

        // Fungsi untuk mengatur tema
        function setTheme(theme) {
            htmlElement.setAttribute('data-bs-theme', theme);
            localStorage.setItem('theme', theme);
            
            // Update Icon dan Teks
            if (theme === 'dark') {
                themeIcon.classList.replace('bi-moon-stars', 'bi-sun');
                themeText.innerText = 'Terang';
            } else {
                themeIcon.classList.replace('bi-sun', 'bi-moon-stars');
                themeText.innerText = 'Gelap';
            }
        }

        // Cek tema yang tersimpan di LocalStorage saat halaman dimuat
        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);

        // Event listener saat tombol tema diklik
        themeToggler.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
        });
    </script>
</body>
</html>