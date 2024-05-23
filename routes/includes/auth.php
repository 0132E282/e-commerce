<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login',  'index')->name('login-page');
    Route::post('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout');
});
