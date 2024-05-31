<?php

use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

Route::controller(ReviewsController::class)->name('admin.reviews.')->group(function () {
    Route::get('/', 'index')->middleware('can:VIEW_REVIEWS')->name('index');
    Route::get('detail/{reviews:id}', 'detail')->middleware('can:REPLY_REVIEWS')->name('details');
    Route::post('detail/{reviews:id}/reply', 'reply')->middleware('can:REPLY_REVIEWS')->name('reply');
    Route::delete('delete/{reviews:id}', 'delete')->middleware('can:DELETE_REVIEWS')->name('delete');
});
