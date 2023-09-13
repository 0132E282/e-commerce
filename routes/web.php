<?php

use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('/admin')->group(function () {
    include_once('includes/auth.php');
    Route::post('editor/image_upload', [EditorController::class, 'upload'])->name('upload');
    Route::middleware(['auth'])->group(function () {
        include_once('includes/product.php');
        include_once('includes/admin.php');
        include_once('includes/category.php');
        include_once('includes/menus.php');
        include_once('includes/mail.php');
        include_once('includes/widgets.php');
        include_once('includes/slider.php');
    });
});
