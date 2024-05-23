<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::controller(ShopController::class)->name('shop.')->group(function () {
    Route::get('/', 'index')->name('view');
    Route::get('cart', 'cart')->name('cart');
    Route::get('category/{slug}', 'index')->name('category');
    Route::get('{slug}_{id}', 'detail')->name('single');

    Route::get('find-variants/{id}', 'findVariants')->name('find-variant');

    Route::post('add-cart/{slug}_{id}', 'addToCart')->name('add-cart');
    Route::delete('delete/{slug}_{id}', 'deleteProductCart')->name('delete-cart');
    Route::get('check-out', 'checkout')->name('checkout');
});


Route::controller(OrderController::class)->name('order.')->group(function () {
    Route::post('create', 'createOrderClient')->name('create');
    Route::get('rel-checkout/{id}', 'relCheckout')->name('rel-checkout');
});
