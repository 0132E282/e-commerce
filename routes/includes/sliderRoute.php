<?php

use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;


Route::controller(SliderController::class)->name('admin.slider.')->group(function () {

    Route::middleware('can:VIEW_SLIDER')->group(function () {
        Route::get('/',  'index')->name('index');
        Route::get('demo',  'demo')->name('demo');
    });

    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/',  'trash')->middleware('can:VIEW_TRASH_SLIDER')->name('index');
        Route::post('{id}',  'restore')->middleware('can:RESTORE_SLIDER')->name('restore');
        Route::delete('{id}',  'destroy')->middleware('can:DESTROY_SLIDER')->name('destroy');
    });

    Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'create' : 'showForm')->middleware('can:CREATE_SLIDER')->name('create');
    Route::match(['get', 'put'], '{id}', request()->isMethod('put') ? 'update' : 'showForm')->middleware('can:UPDATE_SLIDER')->name('update');

    Route::delete('{id}',  'delete')->middleware('can:DELETE_SLIDER')->name('delete');
});
