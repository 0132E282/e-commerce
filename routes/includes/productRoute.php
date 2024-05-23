<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::name('admin.products.')->controller(ProductsController::class)->group(function () {
    Route::prefix('trash')->group(function () {
        Route::get('/', 'trash')->middleware('can:VIEW_TRASH_PRODUCT')->name('trash');
        Route::delete('{id}', 'destroy')->middleware('can:DESTROY_PRODUCT')->name('destroy');
        Route::post('{id}', 'restore')->middleware('can:DESTROY_PRODUCT')->name('restore');
    });

    Route::post('update/{id}_{status}', 'updateStatus')->middleware('can:UPDATE_PRODUCT')->name('update-status');
    Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'store' : 'showForm')->middleware('can:CREATE_PRODUCT')->name('create');
    Route::match(['get', 'put'], 'update/{id}', request()->isMethod('put') ? 'edit' : 'showForm')->middleware('can:UPDATE_PRODUCT')->name('update');
    Route::get('variations-admin/{id}', 'variationsAdmin')->name('variations-admin');
    Route::delete('{id}', 'delete')->middleware('can:DELETE_PRODUCT')->name('delete');

    Route::middleware('can:VIEW_PRODUCT')->group(function () {
        Route::get('details/{id}', 'details')->name('details');
        Route::post('export', 'export')->name('export');
        Route::get('{status?}', 'index')->name('index');
    });
});
