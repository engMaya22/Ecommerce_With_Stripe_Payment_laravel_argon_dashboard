<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/dashboard', 'Admin\DashboardController@index')->middleware('role:admin');
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
     Route::resource('users', App\Http\Controllers\Admin\usersController::class);//i conect users word with userscontroller
   Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('userInfo', App\Http\Controllers\Admin\UserInfo::class);
    Route::resource('orders', App\Http\Controllers\Admin\orderController::class);
    Route::resource('orderProduct', App\Http\Controllers\Admin\OrderProductsController::class);
});




Route::group(
    ['middleware' => 'role:user'],
    // ['middleware' => 'role:user,admin'],
    function () {
        Route::get('/', [App\Http\Controllers\User\ProductController::class, 'productList'])->name('products.list');
        Route::get('cart', [App\Http\Controllers\User\CartController::class, 'cartList'])->name('cart.list');
        Route::post('cart', [App\Http\Controllers\User\CartController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [App\Http\Controllers\User\CartController::class, 'updateCart'])->name('cart.update');
        Route::post('remove', [App\Http\Controllers\User\CartController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [App\Http\Controllers\User\CartController::class, 'clearAllCart'])->name('cart.clear');
        Route::post('stripe', [App\Http\Controllers\Admin\StripeController::class, 'stripePost'])->name('stripe.post');
        Route::get('stripe', [App\Http\Controllers\Admin\StripeController::class, 'checkout'])->name('stripe.checkout');
        Route::resource('profile', App\Http\Controllers\User\profile::class);
        Route::resource('order', App\Http\Controllers\User\orderController::class);
       
    }



);




