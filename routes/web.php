<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyewaanController;

// Rute Umum
Route::get('/', function () {
    return view('home');
});

// Rute Autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Rute untuk Pengguna Biasa
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('metode_pembayaran', MetodePembayaranController::class);
    Route::resource('penyewaan', PenyewaanController::class);
    Route::get('/daftar-mobil/filter', [CarController::class, 'filter'])->name('car.filter');
    Route::get('/daftar-mobil', [CarController::class, 'index'])->name('car.list');
});

// Rute untuk Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/products', [HomeController::class, 'index'])->name('admin.products');
    Route::resource('admin/products', AdminController::class);
    
    // Rute Edit dan Update Produk
    Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [AdminController::class, 'update'])->name('products.update');
});

// Rute Pembayaran
Route::middleware(['auth'])->prefix('pembayaran')->name('pembayaran.')->group(function () {
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/create', [PembayaranController::class, 'create'])->name('create');
    Route::post('/', [PembayaranController::class, 'store'])->name('store');
});