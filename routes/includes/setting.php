<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingController;

Route::controller(SettingController::class)->name('admin.settings.')->group(function () {
    Route::get('/', 'index')->name('system');
    Route::post('/', 'createSystem')->name('create-system');
    Route::get('info', 'info')->name('info');
    Route::post('info',  'UpdateInfo')->name('info');
});
