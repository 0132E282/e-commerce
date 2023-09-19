<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;

Route::prefix('roles')->group(function () {
    Route::get('/', [RolesController::class, 'index'])->name('roles');
    Route::get('/create', [RolesController::class, 'showForm'])->name('create-role');
    Route::post('/create', [RolesController::class, 'store'])->name('create-role');
    Route::get('/{id}', [RolesController::class, 'showForm'])->name('update-role');
    Route::put('/{id}', [RolesController::class, 'edit'])->name('update-role');
});
