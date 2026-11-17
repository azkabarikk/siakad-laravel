<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hallo', function () {
    return 'Hallo, Selamat Datang di Tutorial Laravel';
});

Route::get('/myhome', [HomeController::class, 'myHome']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/login', [AuthPageController::class, 'login']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
