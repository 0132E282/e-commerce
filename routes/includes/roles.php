<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;

Route::prefix('roles')->group(function () {
    Route::get('/', [RolesController::class, 'index'])->middleware('can:VIEW_ROLES')->name('roles');
    // create a new role 
    Route::get('/create', [RolesController::class, 'showForm'])->middleware('can:CREATE_ROLES')->name('create-role');
    Route::post('/create', [RolesController::class, 'store'])->middleware('can:CREATE_ROLES')->name('create-role');
    // 
    Route::get('/trash', [RolesController::class, 'trash'])->middleware('can:VIEW_TRASH_ROLES')->name('trash-role');
    // update a role
    Route::get('/{id}', [RolesController::class, 'showForm'])->middleware('can:UPDATE_ROLES')->name('update-role');
    Route::put('/{id}', [RolesController::class, 'edit'])->middleware('can:UPDATE_ROLES')->name('update-role');
    // delete a role
    Route::delete('/{id}', [RolesController::class, 'delete'])->middleware('can:DELETE_ROLES')->name('delete-role');

    Route::post('/trash/{id}', [RolesController::class, 'restore'])->middleware('can:RESTORE_ROLES')->name('restore-role');
    Route::delete('/trash/{id}', [RolesController::class, 'destroy'])->middleware('can:RESTORE_PRODUCT')->name('destroy-role');
});
