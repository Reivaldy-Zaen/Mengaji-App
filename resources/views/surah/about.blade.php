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
            <h1 class="fw-bold mb-3 text-body">Tentang Aplikasi</h1>
            <p class="text-body-secondary mx-auto" style="max-width: 600px;">
                Aplikasi Al-Qur'an Digital ini dibuat sebagai proyek pembelajaran untuk menyediakan akses Al-Qur'an yang
                sederhana, cepat, dan bebas iklan.
            </p>
        </div>

        <!-- Sumber Data & API Section -->
        <section class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-database text-body-secondary fs-5 me-3"></i>
                    <h2 class="h5 fw-semibold mb-0 text-body">SUMBER DATA & API</h2>
                </div>

                <p class="text-muted mb-4">
                    Aplikasi ini menggunakan data Al-Qur'an yang disajikan melalui API publik berbasis JSON.
                    Endpoint API digunakan sebagai media distribusi data untuk keperluan pembelajaran dan
                    pengembangan aplikasi.
                </p>

                <p class="text-muted mb-4">
                    Konten ayat dan terjemahan merujuk pada sumber terbuka yang banyak digunakan dalam
                    pengembangan aplikasi Al-Qur'an digital. Aplikasi ini tidak berafiliasi secara resmi
                    dengan instansi pemerintah atau lembaga tertentu.
                </p>


                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="bg-light-teal rounded-3 p-3 d-flex align-items-center">
                            <i class="bi bi-cloud text-teal fs-4 me-3"></i>
                            <span class="text-body">Public JSON API (npoint.io)</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light-teal rounded-3 p-3 d-flex align-items-center">
                            <i class="bi bi-book text-teal fs-4 me-3"></i>
                            <span class="text-body">Teks & Terjemahan Al-Qur'an</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light-teal rounded-3 p-3 d-flex align-items-center">
                            <i class="bi bi-headphones text-teal fs-4 me-3"></i>
                            <span class="text-body">Audio Qari (opsional)</span>
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
                    <i class="bi bi-people text-muted fs-5 me-3"></i>
                    <h2 class="h5 fw-semibold mb-0">PENGEMBANG APLIKASI</h2>
                </div>

                <p class="text-muted mb-4">
                    Aplikasi ini dikembangkan secara kolaboratif sebagai proyek pembelajaran
                    dengan fokus pada performa, kenyamanan membaca, dan pengalaman pengguna.
                </p>

                <div class="row g-3">
                    <!-- Developer 1 -->
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <div class="fw-semibold">Panca Prasetia</div>
                            <small class="text-muted d-block mb-2">Fullstack Developer</small>

                            <a href="https://www.linkedin.com/in/panca-prasetia-75a65939a/" target="_blank"
                                class="btn btn-sm btn-outline-teal d-inline-flex align-items-center">
                                <i class="bi bi-linkedin me-2"></i> LinkedIn
                            </a>
                        </div>
                    </div>

                    <!-- Developer 2 -->
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <div class="fw-semibold">Reivaldy Zaen</div>
                            <small class="text-muted d-block mb-2">Fullstack Developer</small>

                            <a href="https://www.linkedin.com/in/mochamad-reivaldy-zaen/" target="_blank"
                                class="btn btn-sm btn-outline-teal d-inline-flex align-items-center">
                                <i class="bi bi-linkedin me-2"></i> LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer note -->
        <footer class="mt-5 pt-4 border-top text-center text-body-secondary small">
            <p>© 2025 Al-Qur'an Digital · Data dari API terbuka.</p>
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
        .card {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
        }

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

        .bg-light-teal {
            background-color: rgba(13, 148, 136, 0.1);
        }

        /* DARK MODE FIX */
        [data-bs-theme="dark"] .bg-light-teal {
            background-color: rgba(13, 148, 136, 0.2);
        }
    </style>
@endpush
