<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasbordController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLineController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('Show.Dasbord')
        : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DasbordController::class, 'ShowDasbord'])->name('Show.Dasbord');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/SaveData', [MainController::class, 'SaveDate'])->name('Save.Information');
    Route::post('/SaveItem', [MainController::class, 'SaveData'])->name('Save.Data');
    Route::get('/ShowProduct', [ProductController::class, 'ShowProduct'])->name('Show.Product');
    Route::get('/ShowSaveProduct', [ProductController::class, 'ShowSaveProduct'])->name('Show.SaveProduct');
    Route::resource('products', ProductController::class);

    Route::get('/ShowProductLine', [ProductLineController::class, 'ShowProductLine'])->name('Show.ProductLine');
    Route::get('/ShowProductLineEdit', [ProductLineController::class, 'ShowProductLineEdit'])->name('Show.ProductLineEdit');
    Route::post('/SaveProductLine', [ProductLineController::class, 'SaveProductLine'])->name('Save.ProductLine');
    Route::resource('productsLine', ProductLineController::class);
});


Route::get('/forgot-password', fn() => view('AuthLogin.ForgotPassword'))->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('Send-LinkPassword');
Route::get('/reset-passwordd/{token}', [ForgotPasswordController::class, 'showResetForm']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
