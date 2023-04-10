<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketController;


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
Route::get('/about', function () {
    return view('about.index');
})->name('about.index');


Route::controller(PaintingController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/paintings', 'paintings')->name('paintings.index');
    Route::post('/paintings/getAll', 'getAll')->name('paintings.getAll');
    
    Route::get('/painting/', 'painting')->name('painting.index');
});

Route::middleware('guest')->group(function() {
    Route::controller(UserController::class)->group(function () {
        Route::get('/registration', 'create')->name('users.create');
        Route::post('/registration', 'store')->name('users.store');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginCheck')->name('login.check');
    });
});

Route::middleware('auth')->group(function() {
    Route::controller(UserController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
    
    Route::prefix('user')->name('user.')->group(function () {
        Route::controller(OrderController::class)->group(function() {
            Route::get('/orders', 'orders')->name('orders.index');
            Route::post('/orders', 'orders')->name('orders.index');
            Route::get('/orders/content/{order}', 'show')->name('orders.show');
            Route::get('/orders/cancel/{order}', 'cancel')->name('orders.cancel');
        });
    });

    Route::controller(BasketController::class)->group(function() {
        Route::get('/basket', 'index')->name('basket.index');
        Route::get('/basket/getPaintings', 'getUserPaintings')->name('basket.paintings');
        Route::post('/basket/add/', 'add')->name('basket.add');
        Route::post('/basket/destroy', 'destroy')->name('basket.destroy');

        Route::post('/basket/checkout', 'checkout')->name('basket.checkout');

        Route::patch('/basket/decrease', 'decrease')->name('basket.decrease');

        Route::post('/basket/checkPassword', 'checkPassword')->name('basket.checkPassword');

    });
});