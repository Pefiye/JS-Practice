<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/add-product', [ProductController::class, 'storeProductPage'])->name('add-produk');
Route::post('/add-product', [ProductController::class, 'StoreProduct'])->name('add-produk-post');
Route::get('/edit-product/{product}', [ProductController::class, 'updateProductPage'])->name('edit-produk');
Route::put('/edit-product/{product}', [ProductController::class, 'updateProduct'])->name('edit-produk-post');
Route::delete('/delete-product/{product}', [ProductController::class, 'deleteProduct'])->name('delete-produk-delete');
