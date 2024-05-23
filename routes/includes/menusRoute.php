<?php

namespace Route\Include;

use App\Http\Controllers\MenuItem;
use App\Http\Controllers\MenuItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;


Route::controller(MenusController::class)->name('admin.menus.')->group(function () {
    Route::get('/', 'index')->middleware('can:VIEW_MENUS')->name('index');

    Route::prefix('menu-item/{id}')->name('item.')->controller(MenuItemController::class)->group(function () {
        Route::get('/', 'index')->middleware('can:VIEW_MENUS')->name('index');
        Route::post('create/{type}', 'create')->middleware('can:CREATE_MENUS')->name('create');
        Route::delete('delete/{menu_item_id}', 'delete')->middleware('can:DELETE_MENUS')->name('delete');
        Route::patch('update-parent/{id_parent}', 'updateParent')->middleware('can:UPDATE_MENUS')->name('update-parent');
        Route::put('update/{menu_item_id}', 'update')->middleware('can:UPDATE_MENUS')->name('update');
    });


    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', 'showTrash')->middleware('can:VIEW_TRASH_MENUS')->name('index');
        Route::post('{id}', 'restore')->middleware('can:RESTORE_MENUS')->name('restore');
        Route::delete('{id}', 'destroy')->middleware('can:DESTROY_MENUS')->name('destroy');
    });
    Route::match(['get', 'post'], 'create', request()->isMethod('post') ? 'store' : 'showForm')->middleware('can:CREATE_MENUS')->name('create');
    Route::match(['get', 'put'], '{id}', request()->isMethod('put') ? 'edit' : 'showForm')->middleware('can:UPDATE_MENUS')->name('update');
    Route::delete('{id}', 'delete')->middleware('can:DELETE_MENUS')->name('delete');
});
