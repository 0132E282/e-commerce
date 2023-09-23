<?php

namespace Route\Include;

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


Route::prefix('permission')->group(function () {
    Route::get('/create', [PermissionController::class, 'form'])->name('create-permissions');
    Route::post('/create', [PermissionController::class, 'store'])->name('create-permissions');
    Route::get('/{id}', [PermissionController::class, 'form'])->name('update-permissions');
    Route::put('/{id}', [PermissionController::class, 'edit'])->name('update-permissions');
});
