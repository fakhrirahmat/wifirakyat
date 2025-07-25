<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pelanggan\AuthController;
use App\Http\Controllers\Pelanggan\DashboardController;
use App\Http\Controllers\PengaduanController;

// Halaman publik
Route::get('/', fn() => view('index'));
Route::get('/index', fn() => view('index'))->name('index');
Route::get('/pricing', fn() => view('pricing'));
Route::get('/faq', fn() => view('faq'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));

// Auth Pelanggan
Route::get('/daftar', [AuthController::class, 'registerForm'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Pelanggan (akses hanya jika login sebagai pelanggan)
Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Pengaduan publik
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
