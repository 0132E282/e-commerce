<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop');
    Route::get('/cart', [ShopController::class, 'cart'])->name('cart-shop');
    Route::get('/category/{slug}_{id}', [ShopController::class, 'index'])->name('category-shop');
    Route::get('/{slug}_{id}', [ShopController::class, 'detail'])->name('single-shop');
    Route::post('/{slug}_{id}', [ShopController::class, 'addToCart'])->name('add-cart-shop');
    Route::delete('/{slug}_{id}', [ShopController::class, 'deleteProductCart'])->name('delete-product-cart');
    Route::get('check-out', [ShopController::class, 'checkout'])->name('check-out');
    Route::post('/create-order', [ShopController::class, 'createOrder'])->name('create-order');
});
