<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/slider')->group(function () {
    // view 
    Route::get('/', [SliderController::class, 'index'])->middleware('can:VIEW_SLIDER')->name('slider');
    Route::get('/trash', [SliderController::class, 'trash'])->middleware('can:VIEW_TRASH_SLIDER')->name('trash-slider');
    // create a new slider
    Route::get('/create', [SliderController::class, 'showForm'])->middleware('can:CREATE_SLIDER')->name('create-slider');
    Route::post('/create', [SliderController::class, 'create'])->middleware('can:CREATE_SLIDER')->name('create-slider');

    Route::post('/trash/{id}', [SliderController::class, 'restore'])->middleware('can:RESTORE_SLIDER')->name('restore-slider');
    Route::delete('/trash/{id}', [SliderController::class, 'destroy'])->middleware('can:DESTROY_SLIDER')->name('destroy-slider');
    // update the slider
    Route::get('/{id}', [SliderController::class, 'showForm'])->middleware('can:UPDATE_SLIDER')->name('update-slider');
    Route::put('/{id}', [SliderController::class, 'update'])->middleware('can:UPDATE_SLIDER')->name('update-slider');
    // delete slider
    Route::delete('/{id}', [SliderController::class, 'delete'])->middleware('can:DELETE_SLIDER')->name('delete-slider');
});
