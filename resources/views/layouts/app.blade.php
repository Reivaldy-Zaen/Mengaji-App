<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "Al-Qur'an Digital")</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Amiri:wght@700&display=swap"
          rel="stylesheet">

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- GLOBAL STYLE --}}
    <style>
        /* =====================
           COLOR SYSTEM
        ====================== */
        :root {
            --bg-body: #f8fafb;
            --bg-card: #ffffff;
            --sidebar-bg: #ffffff;

            --text-main: #1b1b18;
            --text-muted: #706f6c;

            --border-color: #eeeeec;

            --teal-primary: #0d9488;
            --teal-light: #e6f6f4;
        }

        [data-bs-theme="dark"] {
            --bg-body: #0a0a0a;
            --bg-card: #161615;
            --sidebar-bg: #161615;

            --text-main: #ededec;
            --text-muted: #a1a09a;

            --border-color: #3e3e3a;
            --teal-light: #1a2e2c;
        }

        /* =====================
           BASE
        ====================== */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: background-color .3s ease, color .3s ease;
        }

        /* =====================
           HEADER
        ====================== */
        .header-sticky {
            position: sticky;
            top: 0;
            z-index: 100;
            background: color-mix(in srgb, var(--bg-body) 95%, transparent);
            backdrop-filter: blur(8px);
        }

        /* =====================
           SIDEBAR
        ====================== */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 260px;
            padding: 2rem 1rem;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            transition: transform .3s ease;
            z-index: 1000;
        }

        .sidebar-brand {
            font-weight: 700;
            color: var(--teal-primary);
            margin-bottom: 2rem;
            padding: 0 .5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: .8rem 1rem;
            margin-bottom: .5rem;
            border-radius: 8px;
            color: var(--text-muted);
            font-weight: 500;
            text-decoration: none;
            transition: .2s ease;
        }

        .nav-link:hover {
            background-color: rgba(13,148,136,.1);
            color: var(--teal-primary);
        }

        .nav-link.active {
            background-color: var(--teal-light);
            color: var(--teal-primary) !important;
            font-weight: 600;
        }

        /* =====================
           MAIN CONTENT
        ====================== */
        .main-content {
            margin-left: 260px;
            padding: 2rem 3rem;
            min-height: 100vh;
        }

        /* =====================
           UTILITIES
        ====================== */
        .bg-teal { background: var(--teal-primary) !important; }
        .text-teal { color: var(--teal-primary) !important; }

        /* =====================
           RESPONSIVE
        ====================== */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }

            .mobile-menu-btn {
                display: block !important;
            }
        }

        @media (min-width: 993px) {
            .mobile-menu-btn {
                display: none !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    {{-- MOBILE MENU --}}
    <button class="mobile-menu-btn btn bg-teal text-white position-fixed bottom-0 end-0 m-3 rounded-circle shadow-lg"
            style="width:56px;height:56px;display:none;z-index:999"
            onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- CONTENT --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /* =====================
           SIDEBAR MOBILE
        ====================== */
        function toggleSidebar() {
            document.querySelector('.sidebar')?.classList.toggle('show');
        }

        document.addEventListener('click', e => {
            const sidebar = document.querySelector('.sidebar');
            const btn = document.querySelector('.mobile-menu-btn');
            if (!sidebar || !btn) return;

            if (window.innerWidth <= 992 &&
                !sidebar.contains(e.target) &&
                !btn.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });

        /* =====================
           THEME (PERSISTENT)
        ====================== */
        function toggleTheme() {
            const html = document.documentElement;
            const next = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', next);
            localStorage.setItem('theme', next);
            updateThemeIcon(next);
        }

        function updateThemeIcon(theme) {
            const icon = document.getElementById('themeIcon');
            if (!icon) return;
            icon.className = theme === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', saved);
            updateThemeIcon(saved);
        });
    </script>

    @stack('scripts')
</body>
</html>
