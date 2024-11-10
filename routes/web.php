<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
