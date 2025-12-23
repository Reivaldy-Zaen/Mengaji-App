<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat Tersimpan - Al-Qur'an Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        /* =====================
           COLOR SYSTEM (Sync with Layout)
        ====================== */
        :root {
            --primary-teal: #0d9488;
            --bg-body: #f8fafb;
            --bg-card: #ffffff;
            --text-main: #1b1b18;
            --text-muted: #706f6c;
            --border-color: #eeeeec;
        }

        [data-bs-theme="dark"] {
            --bg-body: #0a0a0a;
            --bg-card: #161615;
            --text-main: #ededec;
            --text-muted: #a1a09a;
            --border-color: #3e3e3a;
        }

        /* =====================
           BASE STYLE
        ====================== */
        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            transition: background-color .3s ease, color .3s ease;
            min-height: 100vh;
        }

        .header-nav {
            background: var(--bg-card);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }

        .page-title {
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        /* =====================
           BOOKMARK CARDS
        ====================== */
        .bookmark-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .bookmark-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        }

        .surah-badge {
            background-color: var(--primary-teal);
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 8px;
        }

        .verse-text {
            font-style: italic;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 1.2rem 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .bookmark-icon-top {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            color: var(--primary-teal);
            font-size: 1.2rem;
            opacity: 0.8;
        }

        /* =====================
           BUTTONS
        ====================== */
        .btn-action {
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-read {
            background-color: rgba(13, 148, 136, 0.1);
            color: var(--primary-teal);
        }

        .btn-read:hover {
            background-color: var(--primary-teal);
            color: white;
        }

        .btn-delete {
            background: transparent;
            color: #ef4444;
            border: 1px solid transparent;
        }

        .btn-delete:hover {
            background-color: #fef2f2;
            color: #dc2626;
        }

        [data-bs-theme="dark"] .btn-delete:hover {
            background-color: rgba(239, 68, 68, 0.1);
        }

        .empty-state {
            text-align: center;
            padding: 5rem 1rem;
            color: var(--text-muted);
        }

        .text-teal {
            color: var(--primary-teal) !important;
        }
    </style>
</head>

<body>

    {{-- NAVIGATION --}}
    <div class="header-nav shadow-sm sticky-top">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between w-100">
                <a href="{{ route('surah.index') }}"
                    class="text-decoration-none text-teal fw-medium d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Surah
                </a>

                <a href="#" onclick="clearAllBookmarks()"
                    class="btn btn-sm btn-outline-danger border-0 d-flex align-items-center gap-1">
                    <i class="bi bi-trash"></i> Hapus Semua
                </a>
            </div>
        </div>
    </div>

    <div class="container" style="max-width: 850px;">

        {{-- PAGE HEADER --}}
        <div class="mb-4">
            <h2 class="page-title">Ayat Tersimpan</h2>
            <p class="text-muted">Daftar ayat favorit yang Anda tandai.</p>
        </div>

        {{-- CONTAINER LIST --}}
        <div id="bookmarkListContainer">
            <div class="text-center py-5">
                <div class="spinner-border text-teal" role="status"></div>
                <p class="mt-2 text-muted">Memuat data...</p>
            </div>
        </div>

    </div>

    {{-- TEMPLATE CARD (HIDDEN) --}}
    <template id="bookmarkTemplate">
        <div class="bookmark-card">
            <i class="bi bi-bookmark-fill bookmark-icon-top"></i>

            <div class="d-flex align-items-center mb-2">
                <span class="surah-badge">QS. <span class="surah-num"></span></span>
                <span class="fw-bold fs-5 surah-name" style="color: var(--text-main);"></span>
                <span class="text-muted ms-2 small">Ayat <span class="verse-num"></span></span>
            </div>

            <p class="verse-text"></p>

            <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="d-flex gap-2">
                    <a href="#" class="btn-action btn-read btn-link-read">
                        <i class="bi bi-book"></i> Baca Ayat
                    </a>
                    <button class="btn-action btn-delete" type="button">
                        <i class="bi bi-x-circle"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    </template>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // SINKRONISASI TEMA SAAT LOADING
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            loadBookmarks();
        });

        function loadBookmarks() {
            const container = document.getElementById('bookmarkListContainer');
            const template = document.getElementById('bookmarkTemplate');
            const bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];

            container.innerHTML = '';

            if (bookmarks.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="bi bi-bookmark-x display-1 mb-4 text-teal opacity-25"></i>
                        <h5>Belum Ada Ayat Tersimpan</h5>
                        <p class="text-muted">Klik ikon bookmark pada ayat saat membaca Al-Qur'an.</p>
                        <a href="{{ route('surah.index') }}" class="btn btn-teal text-white mt-3 rounded-pill px-4" style="background-color: var(--primary-teal)">Mulai Membaca</a>
                    </div>
                `;
                return;
            }

            // Render data (Terbaru di atas)
            bookmarks.slice().reverse().forEach((item) => {
                const clone = template.content.cloneNode(true);

                clone.querySelector('.surah-num').textContent = item.surahNumber;
                clone.querySelector('.surah-name').textContent = item.surahName;
                clone.querySelector('.verse-num').textContent = item.verseNumber;

                let text = item.translation;
                if (text.length > 200) text = text.substring(0, 200) + '...';
                clone.querySelector('.verse-text').textContent = `"${text}"`;

                clone.querySelector('.btn-link-read').href = item.url;

                const uniqueId = `${item.surahNumber}_${item.verseNumber}`;
                const deleteBtn = clone.querySelector('.btn-delete');
                deleteBtn.onclick = () => deleteBookmark(uniqueId);

                container.appendChild(clone);
            });
        }

        function deleteBookmark(id) {
            Swal.fire({
                title: 'Hapus bookmark?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                background: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#161615' : '#fff',
                color: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#000'
            }).then((result) => {
                if (result.isConfirmed) {
                    let bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
                    bookmarks = bookmarks.filter(b => `${b.surahNumber}_${b.verseNumber}` !== id);
                    localStorage.setItem('quran_bookmarks', JSON.stringify(bookmarks));
                    loadBookmarks();
                }
            })
        }

        function clearAllBookmarks() {
            const bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
            if (bookmarks.length === 0) return;

            Swal.fire({
                title: 'Hapus Semua?',
                text: "Semua daftar ayat tersimpan akan dihapus permanen!",
                icon: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'Hapus Semua',
                background: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#161615' : '#fff',
                color: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#000'
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.removeItem('quran_bookmarks');
                    loadBookmarks();
                }
            })
        }
    </script>
</body>

</html>
