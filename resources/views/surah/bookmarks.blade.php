@extends('layouts.app')

@php
    $hideSidebar = true;
@endphp

@push('styles')
<style>
    /* ===== PAGE STYLE ===== */
    .header-nav {
        background: var(--bg-card);
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 2rem;
    }

    .bookmark-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        position: relative;
        transition: .2s;
    }

    .bookmark-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0,0,0,.05);
    }

    .bookmark-icon-top {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        color: var(--teal-primary);
    }

    .verse-text {
        color: var(--text-muted);
        font-style: italic;
        line-height: 1.6;
        margin: 1rem 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

@section('content')
{{-- NAVIGATION --}}
<div class="header-nav sticky-top">
    <div class="container-fluid px-4 d-flex justify-content-between">
        <a href="{{ route('surah.index') }}" class="text-teal fw-medium text-decoration-none">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <button onclick="clearAllBookmarks()" class="btn btn-sm text-danger">
            <i class="bi bi-trash"></i> Hapus Semua
        </button>
    </div>
</div>

<div class="container" style="max-width: 850px">
    <h2 class="fw-bold mb-1">Ayat Tersimpan</h2>
    <p class="text-muted mb-4">Daftar ayat favorit yang Anda tandai</p>

    <div id="bookmarkListContainer" class="py-5 text-center">
        <div class="spinner-border text-teal"></div>
        <p class="mt-2 text-muted">Memuat data...</p>
    </div>
</div>

<template id="bookmarkTemplate">
    <div class="bookmark-card">
        <i class="bi bi-bookmark-fill bookmark-icon-top"></i>

        <h6 class="fw-bold">
            QS. <span class="surah-num"></span> –
            <span class="surah-name"></span>
            <small class="text-muted">Ayat <span class="verse-num"></span></small>
        </h6>

        <p class="verse-text"></p>

        <div class="d-flex gap-2">
            <a class="btn btn-sm btn-outline-teal btn-link-read">
                <i class="bi bi-book"></i> Baca
            </a>
            <button class="btn btn-sm btn-outline-danger btn-delete">
                <i class="bi bi-x-circle"></i> Hapus
            </button>
        </div>
    </div>
</template>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', loadBookmarks);

function loadBookmarks() {
    const container = document.getElementById('bookmarkListContainer');
    const template = document.getElementById('bookmarkTemplate');
    const data = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];

    container.innerHTML = '';

    if (!data.length) {
        container.innerHTML = `
            <div class="text-muted">
                <i class="bi bi-bookmark-x display-4"></i>
                <p class="mt-3">Belum ada ayat tersimpan</p>
            </div>`;
        return;
    }

    data.reverse().forEach(item => {
        const el = template.content.cloneNode(true);
        el.querySelector('.surah-num').textContent = item.surahNumber;
        el.querySelector('.surah-name').textContent = item.surahName;
        el.querySelector('.verse-num').textContent = item.verseNumber;
        el.querySelector('.verse-text').textContent = `"${item.translation}"`;
        el.querySelector('.btn-link-read').href = item.url;
        el.querySelector('.btn-delete').onclick = () => deleteBookmark(item);
        container.appendChild(el);
    });
}

function deleteBookmark(item) {
    let data = JSON.parse(localStorage.getItem('quran_bookmarks')) || [];
    data = data.filter(b => !(b.surahNumber === item.surahNumber && b.verseNumber === item.verseNumber));
    localStorage.setItem('quran_bookmarks', JSON.stringify(data));
    loadBookmarks();
}

function clearAllBookmarks() {
    localStorage.removeItem('quran_bookmarks');
    loadBookmarks();
}
</script>
@endpush
