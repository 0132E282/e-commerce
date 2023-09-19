<?php

use App\Http\Controllers\AdminUserController;

use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('user');
    Route::get('/create', [AdminUserController::class, 'form'])->name('create-user');
    Route::post('/create', [AdminUserController::class, 'store'])->name('create-user');
    Route::get('/trash', [AdminUserController::class, 'trash'])->name('trash-user');
    Route::get('/{id}', [AdminUserController::class, 'form'])->name('update-user');
    Route::put('/{id}', [AdminUserController::class, 'edit'])->name('update-user');
    Route::delete('/{id}', [AdminUserController::class, 'delete'])->name('delete-user');
    Route::post('/trash/{id}', [AdminUserController::class, 'restore'])->name('restore-user');
    Route::delete('/trash/{id}', [AdminUserController::class, 'destroy'])->name('destroy-user');
});
