<?php

use Illuminate\Support\Facades\Route;

Route::get('/widgets', function () {
    return view('pages/admin/widgets');
});
