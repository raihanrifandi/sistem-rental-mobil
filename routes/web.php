<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;

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
    Route::get('/admin/products', [HomeController::class, 'index'])->name('admin/products');
    Route::resource('admin/products', AdminController::class);
    Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [AdminController::class, 'update'])->name('products.update');
});

Route::get('/daftar-mobil/filter', [CarController::class, 'filter'])->name('car.filter');
Route::get('/daftar-mobil', [CarController::class, 'index'])->name('car.list');



