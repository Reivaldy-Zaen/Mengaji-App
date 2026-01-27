@extends('layouts.app')

@php
    $hideSidebar = true;
@endphp


@push('styles')
    <style>
        /* =====================
                            PAGE LAYOUT
                        ===================== */
        .main-layout {
            display: flex;
            min-height: 100vh;
        }

        .content-area {
            flex: 1;
            background: var(--bg-body);
            padding: 2rem 3rem;
        }

        .header-sticky {
            position: sticky;
            top: 0;
            background: color-mix(in srgb, var(--bg-body) 90%, transparent);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 2rem;
            z-index: 100;
        }

        .scrollable-content {
            padding: 2rem 4rem;
        }

        /* =====================
                               SURAH HEADER
                            ===================== */
        .surah-title-box {
            text-align: center;
            margin-bottom: 3rem;
        }

        .arabic-title-header {
            font-family: 'Amiri', serif;
            font-size: 3rem;
            color: var(--text-main);
        }

        .latin-title-header {
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* =====================
                               AYAT
                            ===================== */
        .ayat-item {
            display: flex;
            gap: 1.5rem;
            padding: 2rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .ayat-number-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            color: var(--teal-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .ayat-arabic {
            font-family: 'Amiri', serif;
            font-size: 2rem;
            text-align: right;
            color: var(--text-main);
        }

        .ayat-translation {
            color: var(--text-muted);
            margin-top: .75rem;
        }

        /* =====================
                               ACTIONS
                            ===================== */
        .action-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: .2s;
        }

        .action-btn:hover {
            color: var(--teal-primary);
        }

        /* =====================
                               SIDEBAR RIGHT
                            ===================== */
        .sidebar-right {
            width: 320px;
            border-left: 1px solid var(--border-color);
            background: var(--sidebar-bg);
            padding: 2rem 1.5rem;
        }

        .bookmark-card {
            display: block;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            padding: 1rem;
            border-radius: 8px;
            text-decoration: none;
            transition: .2s;
        }

        .bookmark-card:hover {
            border-color: var(--teal-primary);
        }

        /* =====================
               HEADER BACK BUTTON
            ===================== */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
        }

        .btn-back:hover {
            color: var(--teal-primary);
        }

        /* =====================
               AYAT CONTENT
            ===================== */
        .ayat-content {
            flex: 1;
        }

        .ayat-actions {
            display: flex;
            gap: 1rem;
            margin-top: .75rem;
        }

        /* =====================
               NAVIGATION BOTTOM
            ===================== */
        .nav-bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .nav-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: .75rem 1.25rem;
            border: 1px solid var(--border-color);
            border-radius: 999px;
            text-decoration: none;
            color: var(--text-main);
            transition: .2s;
            max-width: 48%;
        }

        .nav-btn:hover {
            background: var(--bg-card);
            border-color: var(--teal-primary);
            color: var(--teal-primary);
        }

        /* =====================
               SIDEBAR RIGHT
            ===================== */
        .sidebar-section {
            margin-bottom: 2.5rem;
        }

        .sidebar-label {
            font-size: .75rem;
            font-weight: 600;
            color: var(--text-muted);
            letter-spacing: .05em;
            margin-bottom: .75rem;
            display: block;
        }

        /* =====================
               AUDIO
            ===================== */
        .audio-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
        }

        audio {
            width: 100%;
            max-width: 420px;
        }

        /* =====================
               MOBILE IMPROVEMENT
            ===================== */
        @media (max-width: 576px) {
            .ayat-item {
                gap: 1rem;
            }

            .ayat-number-box {
                width: 36px;
                height: 36px;
                font-size: .85rem;
            }

            .ayat-arabic {
                font-size: 1.8rem;
            }

            .nav-bottom {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-btn {
                max-width: 100%;
                justify-content: space-between;
            }
        }


        /* =====================
                               RESPONSIVE
                            ===================== */
        @media (max-width: 992px) {
            .main-layout {
                flex-direction: column;
            }

            .sidebar-right {
                width: 100%;
                border-left: none;
                border-top: 1px solid var(--border-color);
            }

            .scrollable-content {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="main-layout">
        <main class="content-area">
            <div class="header-sticky">
                <a href="{{ route('surah.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>

            <div class="scrollable-content">

                <div class="surah-title-box">
                    <h1 class="arabic-title-header">{{ $surah['nama'] }}</h1>
                    <div class="latin-title-header">{{ $surah['namaLatin'] }}</div>
                    <div class="d-flex justify-content-center gap-2 align-items-center mt-2">
                        <span class="text-muted small">Surah ke-{{ $surah['nomor'] }}</span>
                        <span class="surah-info-badge">{{ $surah['tempatTurun'] }}</span>
                        <span class="text-muted small">{{ $surah['jumlahAyat'] }} Ayat</span>
                    </div>
                </div>

                <div class="audio-wrapper">
                    <audio controls>
                        <source src="{{ $surah['audioFull']['05'] }}" type="audio/mp3">
                        Browser Anda tidak mendukung audio player.
                    </audio>
                </div>

                @if ($surah['nomor'] != 9)
                    <div class="text-center mb-5">
                        <div class="ayat-arabic" style="text-align: center; font-size: 2.2rem;">
                            بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم
                        </div>
                    </div>
                @endif

                <div id="ayat-container">
                    @foreach ($surah['ayat'] as $ayat)
                        <div class="ayat-item" id="ayat-{{ $ayat['nomorAyat'] }}">
                            <div class="ayat-number-box">
                                {{ $ayat['nomorAyat'] }}
                            </div>
                            <div class="ayat-content">
                                <div class="ayat-arabic js-arabic-text">
                                    {{ $ayat['teksArab'] }}
                                </div>
                                <div class="ayat-translation js-translation-text">
                                    {{ $ayat['teksIndonesia'] }}
                                </div>

                                <div class="ayat-actions">
                                    <button class="action-btn btn-bookmark-toggle" data-surah-num="{{ $surah['nomor'] }}"
                                        data-surah-name="{{ $surah['namaLatin'] }}"
                                        data-verse-num="{{ $ayat['nomorAyat'] }}"
                                        data-translation="{{ $ayat['teksIndonesia'] }}"
                                        data-url="{{ route('surah.show', $surah['nomor']) }}#ayat-{{ $ayat['nomorAyat'] }}"
                                        onclick="handleBookmarkClick(this)">
                                        <i class="bi bi-bookmark"></i>
                                        <span class="d-none d-md-inline" style="font-size: 12px;">Simpan</span>
                                    </button>

                                    <button class="action-btn"
                                        data-text="{{ $ayat['teksArab'] }} {{ $ayat['teksIndonesia'] }} ({{ $surah['namaLatin'] }}:{{ $ayat['nomorAyat'] }})"
                                        onclick="copyToClipboard(this)">
                                        <i class="bi bi-copy"></i>
                                        <span class="d-none d-md-inline" style="font-size: 12px;">Salin</span>
                                    </button>

                                    <button class="action-btn"
                                        onclick="shareAyat('{{ $surah['namaLatin'] }} Ayat {{ $ayat['nomorAyat'] }}', '{{ route('surah.show', $surah['nomor']) }}')">
                                        <i class="bi bi-share"></i>
                                        <span class="d-none d-md-inline" style="font-size: 12px;">Bagikan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="nav-bottom">
                    @if ($surah['suratSebelumnya'])
                        <a href="{{ route('surah.show', $surah['suratSebelumnya']['nomor']) }}" class="nav-btn">
                            <i class="bi bi-arrow-left"></i>
                            <div>
                                <small class="d-block text-muted" style="font-size: 10px;">SEBELUMNYA</small>
                                {{ $surah['suratSebelumnya']['namaLatin'] }}
                            </div>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if ($surah['suratSelanjutnya'])
                        <a href="{{ route('surah.show', $surah['suratSelanjutnya']['nomor']) }}" class="nav-btn text-end">
                            <div>
                                <small class="d-block text-muted" style="font-size: 10px;">SELANJUTNYA</small>
                                {{ $surah['suratSelanjutnya']['namaLatin'] }}
                            </div>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </main>

        <aside class="sidebar-right">
            <div class="sidebar-section">
                <span class="sidebar-label"><i class="bi bi-sliders me-1"></i> TAMPILAN</span>
                <div class="range-group">
                    <div class="range-header">
                        <span>Ukuran Arab</span>
                        <span class="text-muted">Aa</span>
                    </div>
                    <input type="range" class="form-range" id="arabicSize" min="1" max="5" step="1"
                        value="3">
                </div>
                <div class="range-group">
                    <div class="range-header">
                        <span>Ukuran Terjemahan</span>
                        <span class="text-muted">Aa</span>
                    </div>
                    <input type="range" class="form-range" id="translationSize" min="1" max="5"
                        step="1" value="3">
                </div>
            </div>

            <div class="sidebar-section">
                <span class="sidebar-label"><i class="bi bi-bookmark-fill me-1"></i> BOOKMARK TERSIMPAN</span>
                <div id="sidebarBookmarkList">
                    <small class="text-muted">Memuat...</small>
                </div>
            </div>
        </aside>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const arabicSlider = document.getElementById('arabicSize');
            const translationSlider = document.getElementById('translationSize');
            const arabicTexts = document.querySelectorAll('.js-arabic-text');
            const translationTexts = document.querySelectorAll('.js-translation-text');
            const arabicSizes = ['1.5rem', '1.8rem', '2.2rem', '2.8rem', '3.5rem'];
            const translationSizes = ['0.85rem', '0.95rem', '1rem', '1.2rem', '1.4rem'];

            if (arabicSlider) {
                arabicSlider.addEventListener('input', function() {
                    const size = arabicSizes[this.value - 1];
                    arabicTexts.forEach(el => el.style.fontSize = size);
                });
            }
            if (translationSlider) {
                translationSlider.addEventListener('input', function() {
                    const size = translationSizes[this.value - 1];
                    translationTexts.forEach(el => el.style.fontSize = size);
                });
            }

            checkBookmarkStatus();
            renderSidebarBookmarks();
        });

        function handleBookmarkClick(btn) {
            const surahNum = btn.getAttribute('data-surah-num');
            const surahName = btn.getAttribute('data-surah-name');
            const verseNum = btn.getAttribute('data-verse-num');
            const translation = btn.getAttribute('data-translation');
            const url = btn.getAttribute('data-url');

            toggleBookmark(btn, surahNum, surahName, verseNum, translation, url);
        }

        function toggleBookmark(btn, surahNum, surahName, verseNum, translation, url) {
            const icon = btn.querySelector('i');
            const uniqueId = `${surahNum}_${verseNum}`;

            let bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
            const index = bookmarks.findIndex(b => `${b.surahNumber}_${b.verseNumber}` === uniqueId);

            if (index !== -1) {
                bookmarks.splice(index, 1);
                icon.classList.remove('bi-bookmark-fill');
                icon.classList.add('bi-bookmark');
            } else {
                const newItem = {
                    surahNumber: surahNum,
                    surahName: surahName,
                    verseNumber: verseNum,
                    translation: translation,
                    url: url,
                    timestamp: new Date().getTime()
                };
                bookmarks.push(newItem);

                icon.classList.remove('bi-bookmark');
                icon.classList.add('bi-bookmark-fill');
            }

            localStorage.setItem('quran_bookmarks', JSON.stringify(bookmarks));
            renderSidebarBookmarks();
        }

        function checkBookmarkStatus() {
            let bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];

            document.querySelectorAll('.btn-bookmark-toggle').forEach(btn => {
                const sNum = btn.getAttribute('data-surah-num');
                const vNum = btn.getAttribute('data-verse-num');
                const uniqueId = `${sNum}_${vNum}`;

                const exists = bookmarks.some(b => `${b.surahNumber}_${b.verseNumber}` === uniqueId);
                const icon = btn.querySelector('i');

                if (exists) {
                    icon.classList.remove('bi-bookmark');
                    icon.classList.add('bi-bookmark-fill');
                } else {
                    icon.classList.remove('bi-bookmark-fill');
                    icon.classList.add('bi-bookmark');
                }
            });
        }

        function renderSidebarBookmarks() {
            const container = document.getElementById('sidebarBookmarkList');
            if (!container) return;

            let bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
            container.innerHTML = '';

            if (bookmarks.length === 0) {
                container.innerHTML = '<small class="text-muted d-block py-2">Belum ada bookmark.</small>';
                return;
            }

            const recent = bookmarks.slice(-5).reverse();

            recent.forEach(item => {
                let shortText = item.translation.length > 50 ? item.translation.substring(0, 50) + '...' : item
                    .translation;

                const html = `
                <a href="${item.url}" class="bookmark-card">
                    <div class="fw-bold mb-1">${item.surahName}: ${item.verseNumber}</div>
                    <small class="text-muted d-block" style="font-size: 0.8rem; line-height: 1.4;">
                        "${shortText}"
                    </small>
                </a>`;
                container.innerHTML += html;
            });

            if (bookmarks.length > 0) {
                container.innerHTML += `
                    <div class="mt-3">
                        <a href="{{ route('surah.bookmarks') }}" class="btn btn-sm btn-outline-secondary w-100 rounded-pill">
                            Lihat Semua (${bookmarks.length})
                        </a>
                    </div>
                `;
            }
        }

        function copyToClipboard(btn) {
            const text = btn.getAttribute('data-text');
            navigator.clipboard.writeText(text).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Disalin',
                    text: 'Ayat telah disalin ke clipboard',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                    position: 'top-end'
                });
            });
        }

        function shareAyat(title, url) {
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: 'Baca ayat ini di Al-Quran Digital',
                    url: url
                });
            } else {
                navigator.clipboard.writeText(url).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Link Disalin',
                        text: 'Link ayat telah disalin ke clipboard',
                        showConfirmButton: false,
                        timer: 1500,
                        toast: true,
                        position: 'top-end'
                    });
                });
            }
        }

        let lastSavedAyat = null;

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const ayatNum = entry.target.id.replace('ayat-', '');

                    if (ayatNum !== lastSavedAyat) {
                        lastSavedAyat = ayatNum;
                        saveHistory(ayatNum);
                    }
                }
            });
        }, {
            threshold: 0.6
        });

        document.querySelectorAll('.ayat-item').forEach(el => observer.observe(el));

        function saveHistory(lastAyat) {
            fetch("{{ route('surah.history') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        surah_number: {{ $surah['nomor'] }},
                        last_ayat: lastAyat
                    })
                })
                .then(res => res.json())
                .then(data => console.log('Riwayat disimpan:', data))
                .catch(err => console.error('Error:', err));
        }
    </script>
@endpush
