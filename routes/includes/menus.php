<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;


Route::prefix('menus')->group(function () {
    Route::get('/', [MenusController::class, 'index'])->name('table-menus');

    Route::get('/create', [MenusController::class, 'showForm'])->name('create-menus');
    Route::post('/create', [MenusController::class, 'store'])->name('create-menus');
    Route::get('/trash', [MenusController::class, 'showTrash'])->name('trash-menus');
    Route::get('/{id}', [MenusController::class, 'showForm'])->name('update-menus');
    Route::delete('/{id}', [MenusController::class, 'delete'])->name('delete-menus');
    Route::put('/{id}', [MenusController::class, 'edit'])->name('update-menus');
    Route::post('/trash/{id}', [MenusController::class, 'restore'])->name('restore-menus');
    Route::delete('/trash/{id}', [MenusController::class, 'destroy'])->name('destroy-menus');
});
