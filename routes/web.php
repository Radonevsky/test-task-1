<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/products')->name('products.redirect');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::prefix('admin')->middleware('auth', 'active', 'admin')->group(function () {
    Route::redirect('/', '/admin/products')->name('admin');

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);

    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::get('/products/add', [ProductController::class, 'create']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'delete']);
});

