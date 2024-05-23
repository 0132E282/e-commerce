<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->name('admin.users.')->group(function () {
    Route::get('/',  'index')->name('index');
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/',  'trash')->middleware('can:VIEW_TRASH_USER')->name('index');
        Route::post('{id}',  'restore')->middleware('can:RESTORE_USER')->name('restore');
        Route::delete('{id}',  'destroy')->middleware('can:DESTROY_USER')->name('destroy');
    });
    Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'store' : 'form')->middleware('can:CREATE_USER')->name('create');
    Route::match(['get', 'put'], 'update/{id}', request()->isMethod('put') ? 'edit' : 'form')->middleware('can:UPDATE_USER')->name('update');
    Route::get('profile/{id}',  'profile')->name('profile');
    Route::patch('{id}/{status}',  'updateStatus')->middleware('can:UPDATE_USER')->name('update-status');

    Route::delete('{id}',  'delete')->middleware('can:DELETE_USER')->name('delete');
});
