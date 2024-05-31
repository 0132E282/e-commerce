<?php

namespace App\Routes;

use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

class RouteGroup
{
    function client()
    {
        Route::name('client.')->group(function () {
            Route::prefix('/')->group(base_path('routes/includes/site.php'));
            Route::prefix('shop')->group(base_path('routes/includes/shop.php'));
        });
    }
    function admin()
    {
        Route::prefix('/')->group(base_path('routes/includes/auth.php'));
        Route::post('editor/image_upload', [EditorController::class, 'upload'])->name('upload');
        Route::middleware(['auth'])->group(function () {
            Route::prefix('/')->group(base_path('routes/includes/admin.php'));
            Route::prefix('category')->group(base_path('routes/includes/categoryRoute.php'));
            Route::prefix('brands')->group(base_path('routes/includes/brandsRoute.php'));
            Route::prefix('users')->group(base_path('routes/includes/usersRoute.php'));
            Route::prefix('reviews')->group(base_path('routes/includes/reviewsRoute.php'));
            Route::prefix('order')->group(base_path('routes/includes/orderRoute.php'));
            Route::prefix('permission')->group(base_path('routes/includes/permissionRoute.php'));
            Route::prefix('products')->group(base_path('routes/includes/productRoute.php'));
            Route::prefix('menus')->group(base_path('routes/includes/menusRoute.php'));
            Route::prefix('roles')->group(base_path('routes/includes/rolesRoute.php'));
            Route::prefix('mail')->group(base_path('routes/includes/mail.php'));
            Route::prefix('widgets')->group(base_path('routes/includes/widgets.php'));
            Route::prefix('slider')->group(base_path('routes/includes/sliderRoute.php'));
            Route::prefix('setting')->group(base_path('routes/includes/setting.php'));
        });
    }
}
