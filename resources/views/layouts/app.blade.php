<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', "Al-Qur'an Digital")</title>

    {{-- Fonts & CSS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Amiri:wght@700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- STYLE GLOBAL --}}
    <style>
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

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* SIDEBAR STYLES */
        .sidebar {
            height: 100vh;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            position: fixed;
            left: 0;
            top: 0;
            padding: 2rem 1rem;
            width: 260px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            color: var(--teal-primary);
            font-weight: 700;
            margin-bottom: 2rem;
            padding: 0 0.5rem;
        }

        .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background-color: rgba(13, 148, 136, 0.1);
            color: var(--teal-primary);
        }

        .nav-link.active {
            background-color: var(--teal-light);
            color: var(--teal-primary) !important;
            font-weight: 600;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 260px;
            padding: 2rem 3rem;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        /* UTILITIES */
        .text-teal {
            color: var(--teal-primary) !important;
        }

        .bg-teal {
            background-color: var(--teal-primary) !important;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                display: block;
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
    {{-- MOBILE MENU BUTTON --}}
    <button class="mobile-menu-btn btn bg-teal text-white position-fixed bottom-0 end-0 m-3 rounded-circle shadow-lg"
            style="width: 56px; height: 56px; z-index: 999; display: none;"
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
        // Mobile Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const mobileBtn = document.querySelector('.mobile-menu-btn');

            if (window.innerWidth <= 992 &&
                !sidebar.contains(event.target) &&
                !mobileBtn.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
