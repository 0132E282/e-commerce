<?php

use App\Http\Controllers\AdminUserController;

use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('user');
    Route::get('/trash', [AdminUserController::class, 'trash'])->middleware('can:VIEW_TRASH_USER')->name('trash-user');

    Route::get('/create', [AdminUserController::class, 'form'])->middleware('can:CREATE_USER')->name('create-user');
    Route::post('/create', [AdminUserController::class, 'store'])->middleware('can:CREATE_USER')->name('create-user');

    Route::get('/{id}', [AdminUserController::class, 'form'])->middleware('can:UPDATE_USER')->name('update-user');
    Route::put('/{id}', [AdminUserController::class, 'edit'])->middleware('can:UPDATE_USER')->name('update-user');
    Route::delete('/{id}', [AdminUserController::class, 'delete'])->middleware('can:DELETE_USER')->name('delete-user');
    Route::post('/trash/{id}', [AdminUserController::class, 'restore'])->middleware('can:RESTORE_USER')->name('restore-user');
    Route::delete('/trash/{id}', [AdminUserController::class, 'destroy'])->middleware('can:DESTROY_USER')->name('destroy-user');
});
