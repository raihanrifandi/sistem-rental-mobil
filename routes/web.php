<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('home');
});



Route::controller(AuthController::class)->group(function() {
    Route::get('register','register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth', 'user-access:user'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
});

Route::resource('admin/products', AdminController::class);
Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [AdminController::class, 'update']);
Route::resource('metode_pembayaran', MetodePembayaranController::class);

Route::prefix('pembayaran')->name('pembayaran.')->group(function() {
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/create', [PembayaranController::class, 'create'])->name('create');
    Route::post('/', [PembayaranController::class, 'store'])->name('store');
});

