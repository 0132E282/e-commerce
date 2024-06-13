<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::controller(NotificationController::class)->name('notification.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::delete('delete/{id}', 'delete')->name('delete');
    Route::delete('delete-all', 'deleteAll')->name('delete-all');
    Route::patch('real-all', 'realAll')->name('real-all');
});
