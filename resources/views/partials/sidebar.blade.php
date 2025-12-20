<div class="sidebar">
    <div class="sidebar-brand d-flex align-items-center mb-5 px-3">
        <i class="bi bi-book-half me-2 fs-4"></i>
        <h4 class="mb-0 fw-bold">Al-Qur'an</h4>
    </div>

    <nav class="nav flex-column px-2">
        <a href="{{ route('surah.index') }}"
           class="nav-link {{ request()->routeIs('surah.*') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Daftar Surah
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-bookmark"></i> Bookmark
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-clock-history"></i> Riwayat
        </a>

        <a href="{{ route('about') }}"
           class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
            <i class="bi bi-info-circle"></i> Tentang
        </a>

        <div class="mt-auto pt-4 px-2">
            <button class="nav-link w-100 text-start" onclick="toggleTheme()">
                <i class="bi bi-moon-stars" id="themeIcon"></i> Tema Gelap
            </button>
        </div>
    </nav>
</div>
