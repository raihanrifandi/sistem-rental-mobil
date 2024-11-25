<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SyaratController;
use App\Http\Controllers\HubungiController;


// Route untuk halaman utama
Route::get('/', function () {
    return view('home');
});

// Route untuk autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Route untuk pengguna dengan middleware auth dan user-access:user
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('metode_pembayaran', MetodePembayaranController::class);
    Route::resource('penyewaan', PenyewaanController::class);
    Route::get('/daftar-mobil/filter', [CarController::class, 'filter'])->name('car.filter');
    Route::get('/daftar-mobil', [CarController::class, 'index'])->name('car.list');
    Route::get('/sewa/create', [SewaController::class, 'create'])->name('sewa-mobil.create');
    Route::post('/sewa', [SewaController::class, 'store'])->name('sewa-mobil.store');
    Route::get('/tentang-kami', [AboutController::class, 'index'])->name('tentangkami');
    Route::get('/syarat', [SyaratController::class, 'index'])->name('syarat');
    Route::get('/hubungi-kami', [HubungiController::class, 'index'])->name('hubungi-kami');
});

// Route untuk admin dengan middleware auth dan user-access:admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/admin/products', [HomeController::class, 'index'])->name('admin/products');
    Route::resource('admin/products', AdminController::class);
    Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [AdminController::class, 'update'])->name('products.update');
    Route::get('admin/penyewaan', [AdminController::class, 'index'])->name('admin.penyewaan.index');
});

// Route untuk pembayaran
Route::prefix('pembayaran')->name('pembayaran.')->group(function () {
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/create', [PembayaranController::class, 'create'])->name('create');
    Route::post('/', [PembayaranController::class, 'store'])->name('store');
});
