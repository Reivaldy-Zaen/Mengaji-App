<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat Tersimpan - Al-Qur'an Digital</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #00897B;
            --bg-color: #f8f9fa;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        .header-nav {
            background: #fff;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 2rem;
        }

        .page-title {
            font-weight: 700;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .bookmark-card {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            position: relative;
            transition: all 0.2s;
        }

        .bookmark-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border-color: #dee2e6;
        }

        .surah-badge {
            background-color: #00bcd4;
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 8px;
        }

        .verse-text {
            font-style: italic;
            color: #6c757d;
            line-height: 1.6;
            margin: 1rem 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn-action {
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            border: none;
        }

        .btn-read {
            background-color: #E0F2F1;
            color: var(--primary-color);
        }
        
        .btn-read:hover {
            background-color: #B2DFDB;
            color: #00695C;
        }

        .btn-delete {
            background: none;
            color: #ff5252;
            margin-left: 10px;
        }

        .btn-delete:hover {
            color: #d32f2f;
            background-color: #ffebee;
        }

        .bookmark-icon-top {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 1rem;
            color: #adb5bd;
        }
    </style>
</head>
<body>

    <div class="header-nav shadow-sm sticky-top">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between w-100">
                <a href="{{ route('surah.index') }}" class="text-decoration-none text-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                
                <a href="#" onclick="clearAllBookmarks()" class="text-secondary text-decoration-none small d-flex align-items-center gap-1">
                    <i class="bi bi-trash"></i> Hapus Semua
                </a>
            </div>
        </div>
    </div>

    <div class="container" style="max-width: 800px;">
        
        <div class="mb-5">
            <h2 class="page-title">Ayat Tersimpan</h2>
            <p class="text-muted small">Daftar ayat yang Anda tandai untuk dibaca nanti.</p>
        </div>

        <div id="bookmarkListContainer">
            <div class="text-center py-5">
                <div class="spinner-border text-teal" role="status"></div>
            </div>
        </div>

    </div>

    <template id="bookmarkTemplate">
        <div class="bookmark-card">
            <i class="bi bi-bookmark-fill bookmark-icon-top"></i>
            
            <div class="d-flex align-items-center mb-2">
                <span class="surah-badge">QS. <span class="surah-num"></span></span>
                <span class="fw-bold text-dark"><span class="surah-name"></span></span>
                <span class="text-muted ms-2 small">Ayat <span class="verse-num"></span></span>
            </div>

            <p class="verse-text">"..."</p>

            <div class="d-flex align-items-center">
                <a href="#" class="btn-action btn-read btn-link-read">
                    <i class="bi bi-book"></i> Baca Ayat
                </a>
                <button class="btn-action btn-delete" type="button">
                    Hapus
                </button>
            </div>
        </div>
    </template>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', loadBookmarks);

        function loadBookmarks() {
            const container = document.getElementById('bookmarkListContainer');
            const template = document.getElementById('bookmarkTemplate');
            const bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];

            container.innerHTML = '';

            if (bookmarks.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="bi bi-bookmark display-4 mb-3 d-block"></i>
                        <h5>Belum ada ayat tersimpan</h5>
                        <p>Simpan ayat favorit Anda saat membaca surah.</p>
                        <a href="{{ route('surah.index') }}" class="btn btn-outline-success mt-2 rounded-pill px-4">Mulai Membaca</a>
                    </div>
                `;
                return;
            }

            bookmarks.reverse().forEach((item) => {
                const clone = template.content.cloneNode(true);
                
                clone.querySelector('.surah-num').textContent = item.surahNumber;
                clone.querySelector('.surah-name').textContent = item.surahName;
                clone.querySelector('.verse-num').textContent = item.verseNumber;
                
                let text = item.translation;
                if(text.length > 150) text = text.substring(0, 150) + '...';
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
                title: 'Hapus ayat ini?',
                text: "Ayat akan dihapus dari daftar tersimpan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
                    bookmarks = bookmarks.filter(b => `${b.surahNumber}_${b.verseNumber}` !== id);
                    localStorage.setItem('quran_bookmarks', JSON.stringify(bookmarks));
                    
                    loadBookmarks();
                    
                    Swal.fire(
                        'Terhapus!',
                        'Ayat berhasil dihapus.',
                        'success'
                    )
                }
            })
        }

        function clearAllBookmarks() {
            const bookmarks = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
            if(bookmarks.length === 0) return;

            Swal.fire({
                title: 'Hapus SEMUA bookmark?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus Semua',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.removeItem('quran_bookmarks');
                    loadBookmarks();
                    
                    Swal.fire(
                        'Bersih!',
                        'Semua bookmark telah dihapus.',
                        'success'
                    )
                }
            })
        }
    </script>
</body>
</html>