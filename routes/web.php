<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Routes\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$route = new RouteGroup();
Route::prefix('login')->controller(AuthController::class)->name('auth.')->group(function () {
    Route::prefix('{driver}')->group(function () {
        Route::get('redirect', 'redirectToDriver')->name('driver');
        Route::get('callback', 'handleDriverCallback');
    });
});
Route::prefix('/')->group(function () use ($route) {
    $route->client();
});

Route::prefix('/admin')->group(function () use ($route) {
    $route->admin();
});
