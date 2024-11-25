<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\TransaksiController;


Route::get('/', function () {
    return view('home');
});

// Login & Register
Route::controller(AuthController::class)->group(function() {
    Route::get('register','register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Lupa Password
Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/forgot-password', 'showForgotPasswordForm')->name('password.request');
    Route::post('/forgot-password', 'sendResetLink')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetPasswordForm')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
});

// Multi-authentication (Penyewa)
Route::middleware(['auth', 'user-access:user'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// 1. Daftar Mobil
Route::get('/daftar-mobil/filter', [CarController::class, 'filter'])->name('car.filter');
Route::get('/daftar-mobil', [CarController::class, 'index'])->name('car.list');

// 2. Transaksi Mobil
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
// Route::get('/transaksi/konfirmasi/{id}', [TransaksiController::class, 'showConfirmation'])->name('transaksi.konfirmasi');
// Route::get('/transaksi/pembayaran/{id}', [TransaksiController::class, 'showPayment'])->name('transaksi.pembayaran');

// Multi-authentication (Admin)
Route::middleware(['auth', 'user-access:admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/admin/products', [HomeController::class, 'index'])->name('admin/products');
    Route::resource('admin/products', AdminController::class);
    Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [AdminController::class, 'update'])->name('products.update');
});

Route::resource('admin/products', AdminController::class);
Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [AdminController::class, 'update']);
Route::resource('metode_pembayaran', MetodePembayaranController::class);
Route::resource('penyewaan', PenyewaanController::class);

Route::prefix('pembayaran')->name('pembayaran.')->group(function() {
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/create', [PembayaranController::class, 'create'])->name('create');
    Route::post('/', [PembayaranController::class, 'store'])->name('store');
});




