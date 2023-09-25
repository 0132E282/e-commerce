<?php

use App\Http\Controllers\AdminMessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminMessageController::class, 'index'])->name('admin-home');
