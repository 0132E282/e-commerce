<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->middleware('can:VIEW_PRODUCT')->name('product-page');
    Route::get('/demo', [ProductsController::class, 'demo'])->middleware('can:VIEW_PRODUCT')->name('demo-product');
    // show a trash product
    Route::get('/trash', [ProductsController::class, 'trash'])->middleware('can:VIEW_TRASH_PRODUCT')->name('trash-product');
    // create a new product 
    Route::get('/create', [ProductsController::class, 'showForm'])->middleware('can:CREATE_PRODUCT')->name('create-product');
    Route::post('/create', [ProductsController::class, 'store'])->middleware('can:CREATE_PRODUCT')->name('create-product');
    // update a product
    Route::get('/{id}', [ProductsController::class, 'showForm'])->middleware('can:UPDATE_PRODUCT')->name('update-product');
    Route::put('/{id}', [ProductsController::class, 'edit'])->middleware('can:UPDATE_PRODUCT')->name('update-product');
    // delete a product
    Route::delete('/{id}', [ProductsController::class, 'delete'])->middleware('can:DELETE_PRODUCT')->name('delete-product');

    // remove a product from the trash
    Route::delete('/trash/{id}', [ProductsController::class, 'destroy'])->middleware('can:DESTROY_PRODUCT')->name('destroy-product');
    // restore a product from the trash
    Route::post('/trash/{id}', [ProductsController::class, 'restore'])->middleware('can:DESTROY_PRODUCT')->name('restore-product');
});
