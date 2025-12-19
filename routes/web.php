<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/surah',[SurahController::class, 'index'])->name('surah.index');