<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::prefix('category')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('table-category');

    Route::get('/trash', [CategoriesController::class, 'showTrash'])->name('trash-category');
    Route::post('/trash/{id}', [CategoriesController::class, 'restore'])->name('restore-category');
    Route::delete('/trash/{id}', [CategoriesController::class, 'destroy'])->name('destroy-category');

    Route::get('/create', [CategoriesController::class, 'showForm'])->name('create-category');
    Route::post('/create', [CategoriesController::class, 'store'])->name('create-category');
    Route::delete('/{id}', [CategoriesController::class, 'delete'])->name('delete-category');
    Route::get('/{id}', [CategoriesController::class, 'showForm'])->name('update-category');
    Route::put('/{id}', [CategoriesController::class, 'edit'])->name('update-category');
});
