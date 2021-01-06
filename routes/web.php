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

Route::get('/', \App\Http\Controllers\HomeController::class);

Route::resource('boutique', \App\Http\Controllers\SellerController::class)
    ->only(['index', 'show']);

Route::resource('article', \App\Http\Controllers\ProductController::class);

Route::middleware('auth')->group(function () {
    Route::prefix('cart')->group(function () {
        Route::get('/', [\App\Http\Controllers\CartController::class, 'view'])->name('cart');
        Route::get('add/{product}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
        Route::get('remove/{product}', [\App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::get('empty', [\App\Http\Controllers\CartController::class, 'emptyCart'])->name('cart.empty');
    });

    Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');

    Route::get('orders', \App\Http\Controllers\OrdersController::class)->name('orders');

    Route::get('logout', function() {
        \Illuminate\Support\Facades\Auth::logout();

        return redirect(url('/'));
    });
});

require __DIR__.'/auth.php';
