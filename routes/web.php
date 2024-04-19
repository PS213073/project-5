<?php

use App\Http\Controllers\Admin\KuinApiController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\WinkelProductController;
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

//User Routes
require __DIR__ . '/front_auth.php';
Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');


Route::middleware('auth:front')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('front.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('front.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('front.profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/winkel', [WinkelProductController::class, 'index'])->name('winkel.index');

//Admin Routes
require __DIR__ . '/auth.php';
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('users', 'UserController');
        // Route::resource('posts', 'PostController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        // Kuin API
        Route::get('kuin/products', [KuinApiController::class, 'products'])->name('kuin.products');
        Route::get('kuin/product/{productId}', [KuinApiController::class, 'product'])->name('kuin.product');
        Route::get('kuin/orders', [KuinApiController::class, 'orders'])->name('kuin.orders');
        Route::get('kuin/orderItem/{orderId}', [KuinApiController::class, 'order'])->name('kuin.order');
        Route::post('kuin/add-product', [KuinApiController::class, 'addToDatabase'])->name('kuin.add-product');

        // Admin Users
        Route::resource('/profile', AdminProfileController::class);
        // Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');

    });
