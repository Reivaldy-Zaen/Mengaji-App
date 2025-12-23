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
