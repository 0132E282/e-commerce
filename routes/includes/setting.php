<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingController;

Route::prefix('setting')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('setting');
});
