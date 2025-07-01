<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;


Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/footer', function () {
//     return view('footer');
// });


Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
