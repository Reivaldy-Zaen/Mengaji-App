@extends('layouts.app')

@section('title', 'Daftar Surah - Al-Qur\'an Digital')

@section('content')
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
            <div class="dropdown mobile-dropdown">
                <button class="filter-btn {{ $juz ?? '' ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-journal-text"></i>
                    <span class="d-inline d-sm-none">{{ $juz ?? '' ? $juz : 'Juz' }}</span>
                    <span class="d-none d-sm-inline">{{ $juz ?? '' ? 'Juz ' . ($juz ?? '') : 'Juz' }}</span>
                </button>
                <ul class="dropdown-menu shadow-sm mobile-dropdown-menu">
                    <li>
                        <h6 class="dropdown-header d-sm-none">Pilih Juz</h6>
                    </li>
                    <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item"
                            href="{{ route('surah.index', ['juz' => '30', 'search' => $search ?? '']) }}">
                            <span class="fw-medium">Juz 30</span>
                            <span class="text-muted small">(Amma)</span>
                        </a></li>
                </ul>
            </div>
        </div>

        <div class="text-muted small">
            <span class="fw-medium text-main">{{ count($surahs ?? []) }}</span> surah ditemukan
        </div>
    </div>

    <div class="surah-list">
        @forelse ($surahs ?? [] as $surah)
            <a href="{{ route('surah.show', $surah['nomor']) }}" class="surah-item shadow-sm mb-3">
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
        <p>© 2025 Al-Qur'an Digital · Data dari API terbuka.</p>
    </footer>
@endsection

@push('styles')
    <style>
        /* CSS KHUSUS UNTUK HALAMAN INI */
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

        /* mobile responsive */
        @media (max-width: 576px) {

            /* dropdown juz mobile */
            .dropdown {
                position: static !important;
                /* Penting untuk mobile full-width */
            }

            .dropdown-menu {
                position: fixed !important;
                left: 1rem !important;
                right: 1rem !important;
                bottom: 1rem !important;
                top: auto !important;
                max-height: 50vh !important;
                overflow-y: auto !important;
                border-radius: 14px !important;
                z-index: 1055 !important;
                transform: none !important;
                margin: 0 !important;
                width: auto !important;
                box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1) !important;
            }

            /* Hapus arrow dropdown */
            .dropdown-menu::before {
                display: none;
            }

            /* Make dropdown items more touch-friendly */
            .dropdown-item {
                padding: 0.75rem 1.25rem !important;
                font-size: 0.95rem;
                border-bottom: 1px solid var(--border-color);
            }

            .dropdown-item:last-child {
                border-bottom: none;
            }

            /* Mobile overlay background */
            .dropdown-backdrop {
                background-color: rgba(0, 0, 0, 0.5) !important;
            }

            /* filter bar */

            .filter-row {
                overflow-x: auto;
                padding-bottom: .5rem;
                scrollbar-width: none;
            }

            .filter-row::-webkit-scrollbar {
                display: none;
            }

            .filter-btn {
                font-size: .75rem;
                padding: 6px 14px;
                white-space: nowrap;
            }

            /* dropdown mobile = bottom sheet */
            .dropdown-menu {
                position: fixed;
                left: 1rem;
                right: 1rem;
                bottom: 1rem;
                top: auto;
                max-height: 50vh;
                overflow-y: auto;
                border-radius: 14px;
                z-index: 1055;
            }

            /* surah card */

            .surah-item {
                display: flex;
                align-items: center;
                gap: .75rem;
                padding: 1rem;
                border-radius: 14px;
            }

            .surah-item>div {
                padding: 0 !important;
            }

            /* number */
            .surah-number {
                width: 38px;
                height: 38px;
                font-size: .85rem;
                flex-shrink: 0;
            }

            /* text area */
            .surah-item .col {
                flex: 1;
                min-width: 0;
            }

            .surah-item h6 {
                font-size: .95rem;
                line-height: 1.2;
                margin-bottom: 2px;
            }

            .surah-item small {
                font-size: .75rem;
            }

            /* arabic accent */
            .arabic-text {
                font-size: 1.15rem;
                opacity: .75;
                text-align: right;
            }

            /* meta */
            .badge-type {
                font-size: .55rem;
                padding: 3px 7px;
            }

            /* hide desktop action */
            .surah-item .d-none.d-md-block {
                display: none !important;
            }

            /* header */
            header h2 {
                font-size: 1.4rem;
            }

            header p {
                font-size: .85rem;
            }

            /* footer */
            footer {
                font-size: .75rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // JS KHUSUS UNTUK HALAMAN INI
        document.addEventListener('DOMContentLoaded', function() {
            // Theme icon dari layout
            const themeIcon = document.getElementById('themeIcon');
            const html = document.documentElement;

            // Set initial icon
            const savedTheme = localStorage.getItem('theme') || 'light';
            themeIcon.className = savedTheme === 'light' ? 'bi bi-moon-stars' : 'bi bi-sun';

            // Theme toggle function
            window.toggleTheme = function() {
                const current = html.getAttribute('data-bs-theme');
                const target = current === 'light' ? 'dark' : 'light';
                html.setAttribute('data-bs-theme', target);
                localStorage.setItem('theme', target);
                themeIcon.className = target === 'light' ? 'bi bi-moon-stars' : 'bi bi-sun';
            };

            // Remove old theme toggler jika ada
            const oldToggler = document.getElementById('themeToggler');
            if (oldToggler) {
                oldToggler.remove();
            }
        });
    </script>
@endpush
