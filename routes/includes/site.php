<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->name('site.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/404', 'page404')->name('404-page');
});
