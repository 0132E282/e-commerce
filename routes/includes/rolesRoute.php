<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;


Route::controller(RolesController::class)->name('admin.roles.')->group(function () {
    Route::get('/', 'index')->middleware('can:VIEW_ROLES')->name('index');
    // create a new role 
    Route::get('create', 'showForm')->middleware('can:CREATE_ROLES')->name('create');
    Route::post('create', 'store')->middleware('can:CREATE_ROLES')->name('create');
    // 
    Route::get('trash', 'trash')->middleware('can:VIEW_TRASH_ROLES')->name('trash');
    // update a role
    Route::get('{id}', 'showForm')->middleware('can:UPDATE_ROLES')->name('update');
    Route::put('{id}', 'edit')->middleware('can:UPDATE_ROLES')->name('update');
    // delete a role
    Route::delete('{id}', 'delete')->middleware('can:DELETE_ROLES')->name('delete');

    Route::post('trash/{id}', 'restore')->middleware('can:RESTORE_ROLES')->name('restore');
    Route::delete('trash/{id}', 'destroy')->middleware('can:RESTORE_PRODUCT')->name('destroy');
});
