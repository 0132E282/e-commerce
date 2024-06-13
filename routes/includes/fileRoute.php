<?php

namespace Route\Include;

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;



Route::controller(FileController::class)->name('admin.file.')->group(function () {
    Route::get('download-backup/{filename}', 'downloadBackup')->name('download-backup');
    Route::get('create-backup', 'createBackup')->name('create-backup');
});
