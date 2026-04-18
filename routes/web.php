<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\http\controllers\ProductLineController;
use App\Http\Controllers\DasbordController;


Route::get('/', [DasbordController::class, 'ShowDasbord'])->name('Show.Dasbord');
Route::get('/SaveData', [MainController::class, 'SaveDate'])->name('Save.Information');
Route::post('/SaveItem',[MainController::class,'SaveData'])->name('Save.Data');
Route::get('/ShowProduct',[ProductController::class,'ShowProduct'])->name('Show.Product');
Route::get('/ShowSaveProduct',[ProductController::class,'ShowSaveProduct'])->name('Show.SaveProduct');
Route::resource('products',ProductController::class);

Route::get('/ShowProductLine',[ProductLineController::class,'ShowProductLine'])->name('Show.ProductLine');
Route::get('/ShowProductLineEdit',[ProductLineController::class,'ShowProductLineEdit'])->name('Show.ProductLineEdit');
Route::post('/SaveProductLine',[ProductLineController::class,'SaveProductLine'])->name('Save.ProductLine');
Route::resource('productsLine',ProductLineController::class);

// Route::get('/ShowDasbord',[DasbordController::class,'ShowDasbord'])->name('Show.Dasbord');
?>
