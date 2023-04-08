<?php

use App\Http\Controllers\PaintingController;
use App\Http\Controllers\UserController;

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
        Route::controller(UserController::class)->group(function() {
            Route::get('/orders', 'orders')->name('orders.index');
        });
    });
});