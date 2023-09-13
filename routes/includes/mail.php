<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/mail')->group(function () {
    Route::get('/', function () {
        return view('pages/mailbox/inbox');
    })->name('mail');
    Route::get('/compose', function () {
        return view('pages/mailbox/compose');
    });
    Route::get('/compose/{id}', function () {
        return view('pages/mailbox/read-mail');
    });
});
