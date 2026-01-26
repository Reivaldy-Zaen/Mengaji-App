<div class="sidebar">
    <div class="sidebar-brand d-flex align-items-center mb-5 px-3">
        <i class="bi bi-book-half me-2 fs-4"></i>
        <h4 class="mb-0 fw-bold">Al-Qur'an</h4>
    </div>

    <nav class="nav flex-column px-2">
        <a href="{{ route('surah.index') }}" class="nav-link {{ request()->routeIs('surah.index') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Daftar Surah
        </a>

        <a href="{{ route('surah.bookmarks') }}"
            class="nav-link {{ request()->routeIs('surah.bookmarks') ? 'active' : '' }}">
            <i class="bi bi-bookmark"></i> Bookmark
        </a>

        <a href="{{ route('surah.riwayat') }}"
            class="nav-link {{ request()->routeIs('surah.riwayat') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i> Riwayat
        </a>

        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
            <i class="bi bi-info-circle"></i> Tentang
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link w-100 text-start">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>

        <button class="nav-link w-100 text-start" onclick="toggleTheme()">
            <i class="bi bi-moon-stars" id="themeIcon"></i> Tema Gelap
        </button>

    </nav>
</div>

<style>
    /* =====================
   DARK MODE SIDEBAR FIX
====================== */
    [data-bs-theme="dark"] .sidebar {
        background-color: #0f172a;
        border-right: 1px solid #1e293b;
    }

    [data-bs-theme="dark"] .sidebar-brand {
        color: #2dd4bf;
    }

    /* default link */
    [data-bs-theme="dark"] .sidebar .nav-link {
        color: #cbd5e1;
        /* lebih terang */
    }

    /* hover */
    [data-bs-theme="dark"] .sidebar .nav-link:hover {
        background-color: rgba(45, 212, 191, 0.15);
        color: #2dd4bf;
    }

    /* active */
    [data-bs-theme="dark"] .sidebar .nav-link.active {
        background: linear-gradient(90deg,
                rgba(45, 212, 191, 0.25),
                rgba(45, 212, 191, 0.05));
        color: #5eead4 !important;
        font-weight: 600;
    }

    /* icon follow text */
    [data-bs-theme="dark"] .sidebar .nav-link i {
        color: inherit;
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
        background-color: rgba(13, 148, 136, .1);
        color: var(--teal-primary);
    }

    .nav-link.active {
        background-color: var(--teal-light);
        color: var(--teal-primary) !important;
        font-weight: 600;
    }

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
</script>
