<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/slider')->group(function () {
    Route::get('/', [SliderController::class, 'index'])->name('slider');
    Route::get('/trash', [SliderController::class, 'trash'])->name('trash-slider');
    Route::get('/create', [SliderController::class, 'showForm'])->name('create-slider');
    Route::post('/create', [SliderController::class, 'create'])->name('create-slider');
    Route::post('/trash/{id}', [SliderController::class, 'restore'])->name('restore-slider');
    Route::delete('/trash/{id}', [SliderController::class, 'destroy'])->name('destroy-slider');
    Route::get('/{id}', [SliderController::class, 'showForm'])->name('update-slider');
    Route::put('/{id}', [SliderController::class, 'update'])->name('update-slider');
    Route::delete('/{id}', [SliderController::class, 'delete'])->name('delete-slider');
});
