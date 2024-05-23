<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::controller(CategoriesController::class)->name('admin.category.')->group(function () {
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', 'showTrash')->middleware('can:VIEW_TRASH_CATEGORY')->name('show');
        Route::post('{id}', 'restore')->middleware('can:RESTORE_CATEGORY')->name('restore');
        Route::delete('{id}',  'destroy')->middleware('can:DESTROY_CATEGORY')->name('destroy');
    });
    Route::post('update-status/{id}', 'updateStatus')->middleware('can:UPDATE_CATEGORY')->name('update-status');
    Route::match(['get', 'put'], 'update/{id}', request()->isMethod('put') ?  'edit'  : 'showForm')->middleware('can:UPDATE_CATEGORY')->name('update');

    Route::middleware('can:CREATE_CATEGORY')->group(function () {
        Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'store' :  'showForm')->name('create');
        Route::post('import', 'import_file')->name('import');
    });


    Route::delete('delete/{id}',  'delete')->middleware('can:DELETE_CATEGORY')->name('delete');
    Route::middleware('can:VIEW_CATEGORY')->group(function () {
        Route::get('/', 'index')->name('table');
        Route::get('details/{id}', 'details')->name('details');
        Route::post('export', 'export')->name('export');
        Route::get('{status}', 'index')->name('status');
    });
});
