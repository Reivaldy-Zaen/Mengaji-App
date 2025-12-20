<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('home');

// route about page
Route::view('/about', 'pages.about')->name('about');

Route::get('/surah',[SurahController::class, 'index'])->name('surah.index');

