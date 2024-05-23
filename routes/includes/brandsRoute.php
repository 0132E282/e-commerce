

<?php

use App\Http\Controllers\brandsController;
use Illuminate\Support\Facades\Route;


Route::controller(brandsController::class)->name('admin.brands.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('status/{status}', 'status')->name('status');
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', 'trash')->name('show');
        Route::post('{id}', 'restore')->name('restore');
        Route::delete('{id}',  'destroy')->name('destroy');
    });
    Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'store' : 'form')->name('create');
    Route::match(['get', 'put'], '{id}', request()->isMethod('put') ? 'edit' : 'form')->name('update');
    Route::delete('{id}', 'delete')->name('delete');
    Route::patch('update-status/{id}/{status}', 'updateStatus')->name('update-status');
});
