<?php

use Illuminate\Routing\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AkunController; 

// Rute Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk Admin
Route::group(['name' => 'admin.'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/admin/products', ProductController::class);  // Rute untuk produk
    Route::resource('/admin/users', AkunController::class);        // Rute untuk mengelola pengguna (akun)
});

// Rute untuk User
Route::group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    
    // Melihat daftar produk
    Route::get('/user/products', [UserController::class, 'showProducts'])->name('user.products.index');

    // Melihat detail produk
    Route::get('/user/products/{id}', [UserController::class, 'showProduct'])->name('user.products.show');
    
    // Mengelola keranjang belanja
    Route::get('/user/cart', [UserController::class, 'showCart'])->name('user.cart.index');
    Route::post('/user/cart/{productId}', [UserController::class, 'addToCart'])->name('user.cart.add');
    Route::delete('/user/cart/{cartId}', [UserController::class, 'removeFromCart'])->name('user.cart.remove');

    // Menyelesaikan pesanan (Checkout)
    Route::post('/user/checkout', [OrderController::class, 'checkout'])->name('user.checkout');

    // Riwayat pesanan
    Route::get('/user/orders', [UserController::class, 'showOrders'])->name('user.orders.index');
});
