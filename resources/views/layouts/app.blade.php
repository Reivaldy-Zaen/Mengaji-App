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
            --teal-primary: #14b8a6;
            --teal-dark: #0d9488;
            --teal-light: #99f6e4;
            --teal-gradient: linear-gradient(135deg, var(--teal-primary), var(--teal-dark));
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --sidebar-bg: #ffffff;
            --text-main: #1b1b18;
            --text-muted: #706f6c;
            --border-color: #e2e8f0;
        }

        [data-bs-theme="dark"] {
            --teal-primary: #2dd4bf;
            --teal-dark: #0d9488;
            --teal-light: #5eead4;
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --sidebar-bg: #1e293b;

            --text-main: #ededec;
            --text-muted: #a1a09a;

            --border-color: #334155;
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
        .bg-teal {
            background: var(--teal-primary) !important;
        }

        .text-teal {
            color: var(--teal-primary) !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    {{-- MOBILE MENU --}}
    <button class="mobile-menu-btn btn bg-teal text-white position-fixed bottom-0 end-0 m-3 rounded-circle shadow-lg"
        style="width:56px;height:56px;display:none;z-index:999" onclick="toggleSidebar()">
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
