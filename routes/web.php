<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController; // untuk user biasa
use App\Http\Controllers\PrabotanController; // jika tetap dipakai user

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// -------------------------
// AUTHENTICATION
// -------------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// -------------------------
// ADMIN AREA
// -------------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // CRUD user dari admin
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);

    // CRUD barang/produk dari admin
    Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
});

// -------------------------
// USER AREA
// -------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Jika prabotan dipakai untuk user
    Route::resource('/prabotan', PrabotanController::class);
});
