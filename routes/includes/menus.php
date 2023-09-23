<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;


Route::prefix('menus')->group(function () {
    Route::get('/', [MenusController::class, 'index'])->middleware('can:VIEW_MENUS')->name('table-menus');
    //    create a new menu
    Route::get('/create', [MenusController::class, 'showForm'])->middleware('can:CREATE_MENUS')->name('create-menus');
    Route::post('/create', [MenusController::class, 'store'])->middleware('can:CREATE_MENUS')->name('create-menus');
    Route::get('/trash', [MenusController::class, 'showTrash'])->middleware('can:VIEW_TRASH_MENUS')->name('trash-menus');
    // update the menu
    Route::get('/{id}', [MenusController::class, 'showForm'])->middleware('can:UPDATE_MENUS')->name('update-menus');
    Route::put('/{id}', [MenusController::class, 'edit'])->middleware('can:UPDATE_MENUS')->name('update-menus');

    Route::delete('/{id}', [MenusController::class, 'delete'])->middleware('can:DELETE_MENUS')->name('delete-menus');

    Route::post('/trash/{id}', [MenusController::class, 'restore'])->middleware('can:RESTORE_MENUS')->name('restore-menus');
    Route::delete('/trash/{id}', [MenusController::class, 'destroy'])->middleware('can:DESTROY_MENUS')->name('destroy-menus');
});
