<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/surah', [SurahController::class, 'index'])->name('surah.index');
    Route::get('/surah/{nomor}', [SurahController::class, 'show'])->name('surah.show');

    Route::get('/riwayat', [SurahController::class, 'riwayat'])->name('surah.riwayat');
    Route::get('/bookmarks', [SurahController::class, 'bookmarks'])->name('surah.bookmarks');

    Route::post('/surah/history', [SurahController::class, 'saveHistory'])->name('surah.history');

    Route::view('/about', 'pages.about')->name('about');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});