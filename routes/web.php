<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\AuthController;

// HOME (public)
Route::get('/', function () {
    return view('home');
})->name('home');

// AUTH PAGE (login + register satu halaman)
Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');

// AUTH ACTION
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// PROTECTED
Route::middleware('auth')->group(function () {
    Route::view('/about', 'pages.about')->name('about');
    Route::get('/surah', [SurahController::class, 'index'])->name('surah.index');
});
