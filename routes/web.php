<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hallo', function () {
    return 'Hallo, Selamat Datang di Tutorial Laravel';
});

Route::get('/myhome', [HomeController::class, 'myHome']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'contact']);

// Route::get('/login', [AuthPageController::class, 'login']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdministrator'])
    ->group(function () {
        Route::get('/admin', fn () => view('admin'));
    });

Route::middleware(['auth', 'role:1,2'])
    ->get('/nilai', fn () => view('nilai'));

Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::resource('mata-kuliah', MataKuliahController::class)
        ->only(['index']);
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('mata-kuliah', MataKuliahController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['mata-kuliah' => 'id']);
});

Route::middleware(['auth', 'role:1,2'])
    ->resource('prodi', ProdiController::class)
    ->only(['index']);

Route::middleware(['auth', 'role:1'])
    ->resource('prodi', ProdiController::class)
    ->except(['index', 'show']);
