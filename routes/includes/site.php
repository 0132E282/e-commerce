<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/404', [SiteController::class, 'page404'])->name('404-page');
