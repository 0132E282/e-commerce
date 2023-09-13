<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('product-page');
    Route::get('/trash', [ProductsController::class, 'trash'])->name('trash-product');
    Route::get('/create', [ProductsController::class, 'showForm'])->name('create-product');
    Route::get('/{id}', [ProductsController::class, 'showForm'])->name('update-product');
    Route::put('/{id}', [ProductsController::class, 'edit'])->name('update-product');
    Route::delete('/{id}', [ProductsController::class, 'delete'])->name('delete-product');
    Route::post('/trash/{id}', [ProductsController::class, 'restore'])->name('restore-product');
    Route::delete('/trash/{id}', [ProductsController::class, 'destroy'])->name('destroy-product');
    Route::post('/create', [ProductsController::class, 'store'])->name('create-product');
});
