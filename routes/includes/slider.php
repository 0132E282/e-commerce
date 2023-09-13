<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/e-commerce')->group(function () {
    Route::prefix('/products')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('slider');
        Route::get('/create', [SliderController::class, 'showForm'])->name('create-slider');
        Route::post('/create', [SliderController::class, 'create'])->name('create-slider');
    });
});
