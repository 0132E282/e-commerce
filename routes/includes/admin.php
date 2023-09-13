<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/admin/admin-page');
})->name('admin-home');
