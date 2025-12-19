<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Surah - Al-Qur'an Digital</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Amiri:wght@700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --bg-body: #f8fafb;
            --bg-card: #ffffff;
            --sidebar-bg: #ffffff;
            --text-main: #1b1b18;
            --text-muted: #706f6c;
            --border-color: #eeeeec;
            --teal-primary: #0d9488;
        }

        [data-bs-theme="dark"] {
            --bg-body: #0a0a0a;
            --bg-card: #161615;
            --sidebar-bg: #161615;
            --text-main: #ededec;
            --text-muted: #a1a09a;
            --border-color: #3e3e3a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: all 0.3s ease;
        }

        .sidebar {
            height: 100vh;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            position: fixed;
            padding: 2rem 1rem;
            width: 260px;
            z-index: 1000;
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
        }

        .nav-link.active {
            background-color: #e6f6f4;
            color: var(--teal-primary) !important;
        }

        [data-bs-theme="dark"] .nav-link.active {
            background-color: #1a2e2c;
        }

        .main-content {
            margin-left: 260px;
            padding: 2rem 3rem;
            min-height: 100vh;
        }

        .search-box {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.5rem 1rem;
        }

        .filter-btn {
            border-radius: 50px;
            padding: 6px 18px;
            font-size: 0.85rem;
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-main);
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }

        .filter-btn.active {
            background-color: var(--teal-primary);
            color: white !important;
            border-color: var(--teal-primary);
        }

        .surah-item {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
        }

        .surah-item:hover {
            transform: translateY(-2px);
            border-color: var(--teal-primary);
        }

        .surah-number {
            color: var(--text-muted);
            font-weight: 600;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.03);
            border-radius: 10px;
        }

        .arabic-text {
            font-family: 'Amiri', serif;
            font-size: 1.6rem;
            color: var(--teal-primary);
        }

        .badge-type {
            font-size: 0.65rem;
            font-weight: 700;
            background-color: rgba(0, 0, 0, 0.05);
            color: var(--text-muted);
            padding: 4px 10px;
            border-radius: 6px;
        }

        .empty-state {
            padding: 5rem 0;
            text-align: center;
            color: var(--text-muted);
        }

        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar d-none d-lg-block">
        <div class="d-flex align-items-center mb-5 px-3">
            <h4 class="mb-0 fw-bold" style="color: var(--teal-primary)"><i class="bi bi-book-half me-2"></i> Al-Qur'an
            </h4>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="{{ route('surah.index') }}"><i class="bi bi-grid-fill"></i> Daftar
                Surah</a>
            <a class="nav-link" href="#"><i class="bi bi-bookmark"></i> Bookmark</a>
            <a class="nav-link" href="#"><i class="bi bi-clock-history"></i> Riwayat</a>
            <a class="nav-link" href="#"><i class="bi bi-gear"></i> Tentang</a>
        </nav>
    </div>

    <div class="main-content">
        <header class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-4">
            <div>
                <h2 class="fw-bold mb-1">Daftar Surah</h2>
                <p class="text-muted small mb-0">Cari surah berdasarkan nama atau nomor.</p>
            </div>

            <div class="d-flex gap-3 align-items-center">
                <form action="{{ route('surah.index') }}" method="GET" class="search-container">
                    <input type="hidden" name="type" value="{{ $type ?? '' }}">
                    <input type="hidden" name="juz" value="{{ $juz ?? '' }}">

                    <div class="search-box d-flex align-items-center">
                        <i class="bi bi-search text-muted me-2"></i>
                        <input type="text" name="search" class="border-0 bg-transparent w-100" placeholder="Cari..."
                            style="outline: none;" value="{{ $search ?? '' }}">
                        @if (!empty($search ?? ''))
                            <a href="{{ route('surah.index', ['type' => $type ?? '', 'juz' => $juz ?? '']) }}"
                                class="text-muted ms-2">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <button class="btn border shadow-sm" id="themeToggler"><i class="bi bi-moon-stars"
                        id="themeIcon"></i></button>
            </div>
        </header>

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">
            <div class="d-flex gap-2">
                <a href="{{ route('surah.index', ['search' => $search ?? '']) }}"
                    class="filter-btn {{ !($type ?? '') && !($juz ?? '') ? 'active' : '' }}">Semua</a>

                <a href="{{ route('surah.index', ['type' => 'mekah', 'search' => $search ?? '']) }}"
                    class="filter-btn {{ ($type ?? '') === 'mekah' ? 'active' : '' }}">Mekah</a>

                <a href="{{ route('surah.index', ['type' => 'madinah', 'search' => $search ?? '']) }}"
                    class="filter-btn {{ ($type ?? '') === 'madinah' ? 'active' : '' }}">Madinah</a>

                <div class="dropdown">
                    <button class="filter-btn {{ $juz ?? '' ? 'active' : '' }} dropdown-toggle"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-journal-text"></i> {{ $juz ?? '' ? 'Juz ' . ($juz ?? '') : 'Juz' }}
                    </button>
                    <ul class="dropdown-menu shadow-sm">
                        <li><a class="dropdown-item"
                                href="{{ route('surah.index', ['juz' => '30', 'search' => $search ?? '']) }}">Juz 30
                                (Amma)</a></li>
                    </ul>
                </div>
            </div>

            <div class="text-muted small">
                <span class="fw-medium text-main">{{ count($surahs ?? []) }}</span> surah ditemukan
            </div>
        </div>

        <div class="surah-list">
            @forelse ($surahs ?? [] as $surah)
                <a href="#" class="surah-item row align-items-center mx-0 shadow-sm mb-3">
                    <div class="col-auto">
                        <div class="surah-number">{{ $surah['nomor'] }}</div>
                    </div>
                    <div class="col px-3">
                        <h6 class="mb-0 fw-bold">{{ $surah['nama'] }}</h6>
                        <small class="text-muted">{{ $surah['arti'] }}</small>
                    </div>
                    <div class="col-auto text-end me-md-4">
                        <div class="arabic-text mb-1">{{ $surah['asma'] }}</div>
                        <div class="d-flex gap-2 justify-content-end align-items-center">
                            <span class="badge-type text-uppercase">
                                {{ ($surah['type'] ?? '') === 'mekah' ? 'MEKAH' : 'MADINAH' }}
                            </span>
                            <small class="text-muted">{{ $surah['ayat'] }} ayat</small>
                        </div>
                    </div>
                    <div class="col-auto d-none d-md-block">
                        <div class="btn btn-sm border px-3">Lihat detail <i class="bi bi-arrow-right"></i></div>
                    </div>
                </a>
            @empty
                <div class="empty-state">
                    <i class="bi bi-search display-1 opacity-25"></i>
                    <h4 class="mt-4 fw-bold">Tidak ada surah ditemukan</h4>
                    <p>Maaf, kriteria "{{ $search ?? '' }}" tidak ditemukan.</p>
                    <a href="{{ route('surah.index') }}" class="btn btn-teal text-white px-4 rounded-pill mt-2">Reset
                        Filter</a>
                </div>
            @endforelse
        </div>

        <footer class="mt-5 pt-4 border-top text-center text-muted small">
            <p>© 2024 Al-Qur'an Digital · Data dari API terbuka.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const themeToggler = document.getElementById('themeToggler');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        const savedTheme = localStorage.getItem('theme') || 'light';
        html.setAttribute('data-bs-theme', savedTheme);
        themeIcon.className = savedTheme === 'light' ? 'bi bi-moon-stars' : 'bi bi-sun';

        themeToggler.addEventListener('click', () => {
            const current = html.getAttribute('data-bs-theme');
            const target = current === 'light' ? 'dark' : 'light';
            html.setAttribute('data-bs-theme', target);
            localStorage.setItem('theme', target);
            themeIcon.className = target === 'light' ? 'bi bi-moon-stars' : 'bi bi-sun';
        });
    </script>
</body>

</html>
