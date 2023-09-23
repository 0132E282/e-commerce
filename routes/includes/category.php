<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::prefix('category')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->middleware('can:VIEW_CATEGORY')->name('table-category');

    Route::get('/trash', [CategoriesController::class, 'showTrash'])->middleware('can:VIEW_TRASH_CATEGORY')->name('trash-category');
    Route::post('/trash/{id}', [CategoriesController::class, 'restore'])->middleware('can:RESTORE_CATEGORY')->name('restore-category');
    Route::delete('/trash/{id}', [CategoriesController::class, 'destroy'])->middleware('can:DESTROY_CATEGORY')->name('destroy-category');

    Route::get('/create', [CategoriesController::class, 'showForm'])->middleware('can:CREATE_CATEGORY')->name('create-category');
    Route::post('/create', [CategoriesController::class, 'store'])->middleware('can:CREATE_CATEGORY')->name('create-category');
    Route::delete('/{id}', [CategoriesController::class, 'delete'])->middleware('can:DELETE_CATEGORY')->name('delete-category');
    Route::get('/{id}', [CategoriesController::class, 'showForm'])->middleware('can:UPDATE_CATEGORY')->name('update-category');
    Route::put('/{id}', [CategoriesController::class, 'edit'])->middleware('can:UPDATE_CATEGORY')->name('update-category');
});
