<?php

namespace Route\Include;

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


Route::controller(PermissionController::class)->name('admin.permissions.')->group(function () {
    Route::get('create',  'form')->name('create');
    Route::post('create',  'store')->name('create');
});
