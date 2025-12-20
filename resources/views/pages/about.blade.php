{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'Tentang Aplikasi - Al-Qur\'an Digital')

@section('content')
    <!-- Main Content -->
    <main class="container-fluid py-5">
        <!-- Icon & Title -->
        <div class="text-center mb-5">
            <div class="d-inline-flex align-items-center justify-content-center bg-teal rounded-circle mb-4"
                style="width: 80px; height: 80px;">
                <i class="bi bi-info-circle text-white fs-2"></i>
            </div>
            <h1 class="fw-bold text-dark mb-3">Tentang Aplikasi</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Proyek open source yang bertujuan menyediakan akses Al-Qur'an digital yang bersih, cepat, dan mudah
                dibaca tanpa gangguan iklan.
            </p>
        </div>

        <!-- Sumber Data & API Section -->
        <section class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-database text-muted fs-5 me-3"></i>
                    <h2 class="h5 fw-semibold mb-0">SUMBER DATA & API</h2>
                </div>

                <p class="text-muted mb-4">
                    Aplikasi ini menggunakan API publik untuk mengambil data ayat, terjemahan, dan audio. Data teks
                    Al-Qur'an dan terjemahan Bahasa Indonesia bersumber dari
                    <a href="https://kemenag.go.id" class="text-teal text-decoration-none">Kemenag RI</a> melalui API pihak
                    ketiga yang terpercaya.
                </p>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="bg-light-teal rounded-3 p-3 d-flex align-items-center">
                            <i class="bi bi-cloud text-teal fs-4 me-3"></i>
                            <span class="text-dark">Quran Cloud API</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light-teal rounded-3 p-3 d-flex align-items-center">
                            <i class="bi bi-headphones text-teal fs-4 me-3"></i>
                            <span class="text-dark">Audio Qari (Mishary Rashid)</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light-teal rounded-3 p-3 d-flex align-items-center">
                            <i class="bi bi-book text-teal fs-4 me-3"></i>
                            <span class="text-dark">Tafsir & Terjemahan ID</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lisensi & Privasi Section -->
        <section class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-shield-check text-muted fs-5 me-3"></i>
                    <h2 class="h5 fw-semibold mb-0">LISENSI & PRIVASI</h2>
                </div>

                <p class="text-muted mb-3">
                    MIT License. Kode sumber aplikasi ini bersifat terbuka dan gratis untuk digunakan atau dimodifikasi.
                </p>

                <p class="text-muted small">
                    Kami tidak menyimpan data pribadi pengguna. Penandaan ayat (bookmark) dan preferensi tema disimpan
                    secara lokal di browser Anda (LocalStorage).
                </p>
            </div>
        </section>

        <!-- Kontak & Kontribusi Section -->
        <section class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-envelope text-muted fs-5 me-3"></i>
                    <h2 class="h5 fw-semibold mb-0">KONTAK & KONTRIBUSI</h2>
                </div>

                <p class="text-muted mb-4">
                    Menemukan kesalahan pada teks ayat atau terjemahan? Silakan laporkan agar segera kami perbaiki.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="https://github.com/Reivaldy-Zaen/Mengaji-App.git" target="_blank"
                        class="btn btn-outline-teal d-flex align-items-center px-4 py-2">
                        <i class="bi bi-github fs-5 me-2"></i>
                        Repository GitHub
                    </a>
                    <a href="mailto:contact@example.com" class="btn btn-outline-teal d-flex align-items-center px-4 py-2">
                        <i class="bi bi-send fs-5 me-2"></i>
                        Hubungi Pengembang
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer note -->
        <footer class="mt-5 pt-4 border-top text-center text-muted small">
            <p>© 2024 Al-Qur'an Digital · Data dari API terbuka.</p>
        </footer>
    </main>
@endsection

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


@push('styles')
    <style>
        .bg-teal {
            background-color: var(--teal-primary) !important;
        }

        .bg-light-teal {
            background-color: rgba(13, 148, 136, 0.1) !important;
        }

        .btn-outline-teal {
            color: var(--teal-primary);
            border-color: var(--teal-primary);
        }

        .btn-outline-teal:hover {
            background-color: var(--teal-primary);
            color: white;
        }

        .text-teal {
            color: var(--teal-primary) !important;
        }
    </style>
@endpush
