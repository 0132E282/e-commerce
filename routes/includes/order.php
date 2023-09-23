<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::prefix('/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders');
    Route::get('/{id}', [OrderController::class, 'detailBill'])->name('detail-bill');
});
