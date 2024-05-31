<?php

use App\Http\Controllers\brandsController;
use Illuminate\Support\Facades\Route;

Route::controller(brandsController::class)->name('admin.brands.')->group(function () {
    Route::get('/', 'index')->middleware('can:VIEW_BRANDS')->name('index');
    Route::get('status/{status}', 'status')->middleware('can:VIEW_BRANDS')->name('status');
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', 'trash')->middleware('can:VIEW_TRASH_BRANDS ')->name('show');
        Route::post('{id}', 'restore')->middleware('can:RESTORE_BRANDS')->name('restore');
        Route::delete('{id}',  'destroy')->middleware('can:DESTROY_BRANDS')->name('destroy');
    });
    Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'store' : 'form')->middleware('can:CREATE_BRANDS')->name('create');
    Route::match(['get', 'put'], '{id}', request()->isMethod('put') ? 'edit' : 'form')->middleware('can:UPDATE_BRANDS')->name('update');
    Route::delete('{id}', 'delete')->middleware('can:DELETE_BRANDS')->name('delete');
    Route::patch('update-status/{id}/{status}', 'updateStatus')->middleware('can:UPDATE_BRANDS')->name('update-status');
});
