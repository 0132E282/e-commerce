<?php

use App\Http\Controllers\OrderController;
use App\Http\Middleware\ReadNotifyMiddleware;
use Illuminate\Support\Facades\Route;


Route::name('admin.order.')->controller(OrderController::class)->group(function () {
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', 'trash')->name('index');
        Route::patch('{order:id}', 'restore')->name('restore');
        Route::delete('{order:id}', 'destroy')->name('destroy');
    });

    Route::prefix('detail/{id}')->middleware(ReadNotifyMiddleware::class)->group(function () {
        Route::get('/', 'detailBill')->name('detail');
        Route::delete('/', 'delete')->name('delete');
        Route::get('download', 'exportBillDetail')->name('export-bill-detail');
        Route::patch('update-status/{status}', 'updateStatus')->name('update-status');
        Route::match(['get', 'put'], 'add-product', request()->isMethod('put') ? 'addProduct' : 'addProductForm')->name('add-product');
        Route::put('update-order-item', 'updateOrderItem')->name('update-item');
        Route::delete('delete-order-item/{id_order_item}', 'deleteOrderItem')->name('delete-order-item');
    });
    Route::post('/export-excel', 'exportExcel')->name('export-excel');
    Route::match(['get', 'put'], 'update/{id}', request()->isMethod('put') ? 'updateCustomer' : 'formCU')->name('update-customer');
    Route::match('get', '/{status?}', 'index')->name('index');
});
