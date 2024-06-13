<?php

namespace Route\Include;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

Route::controller(SettingController::class)->name('admin.settings.')->middleware('can:VIEW_ANY_SETTING')->group(function () {
    Route::get('/', 'index')->middleware('can:SYSTEM_SETTING')->name('system');
    Route::post('/', 'createSystem')->middleware('can:SYSTEM_SETTING')->name('create-system');
    Route::get('info', 'info')->middleware('can:CONTACT_SETTING')->name('info');
    Route::post('info',  'UpdateInfo')->middleware('can:CONTACT_SETTING')->name('info');
    Route::get('payment',  'payment')->middleware('can:PAYMENT_SETTING')->name('payment');
    Route::post('payment',  'savePayment')->middleware('can:PAYMENT_SETTING')->name('payment');
    Route::get('backup',  'backup')->middleware('can:PAYMENT_SETTING')->name('backup');
});
