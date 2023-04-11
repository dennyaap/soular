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


Route::prefix('admin')->name('admin.')->group(function () {
    // Route::get('/paintings', [\App\Http\Controllers\admin\ProductController::class, 'index'])->name('products.index');
    // Route::get('/products/create', [\App\Http\Controllers\admin\ProductController::class, 'create'])->name('products.create');
    // Route::post('/products', [\App\Http\Controllers\admin\ProductController::class, 'store'])->name('products.store');

    Route::controller(\App\Http\Controllers\admin\PaintingController::class)->group(function() {
        Route::get('/paintings', 'index')->name('paintings.index');
        // Route::get('/paintings/category/{category}', 'getPaintingCategory')->name('paintings.category');
        Route::get('/paintings/create', 'create')->name('paintings.create');
        Route::post('/paintings', 'store')->name('paintings.store');
        
        Route::get('/paintings/edit/{painting}', 'edit')->name('paintings.edit');
        Route::patch('/paintings/update/{painting}', 'update')->name('paintings.update');
        
        Route::delete('/paintings/{painting}', 'destroy')->name('paintings.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\AdminController::class)->group(function() {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'checkLogin')->name('login.check');
    });

    Route::controller(\App\Http\Controllers\admin\StyleController::class)->group(function() {
        Route::get('/styles', 'index')->name('styles.index');
        Route::get('/styles/create', 'create')->name('styles.create');
        Route::post('/styles', 'store')->name('styles.store');

        Route::get('/styles/edit/{style}', 'edit')->name('styles.edit');
        Route::patch('/styles/update/{style}', 'update')->name('styles.update');

        Route::delete('/styles/{style}', 'destroy')->name('styles.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\PlotController::class)->group(function() {
        Route::get('/plots', 'index')->name('plots.index');
        Route::get('/plots/create', 'create')->name('plots.create');
        Route::post('/plots', 'store')->name('plots.store');

        Route::get('/plots/edit/{plot}', 'edit')->name('plots.edit');
        Route::patch('/plots/update/{plot}', 'update')->name('plots.update');

        Route::delete('/plots/{plot}', 'destroy')->name('plots.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\MaterialController::class)->group(function() {
        Route::get('/materials', 'index')->name('materials.index');
        Route::get('/materials/create', 'create')->name('materials.create');
        Route::post('/materials', 'store')->name('materials.store');

        Route::get('/materials/edit/{material}', 'edit')->name('materials.edit');
        Route::patch('/materials/update/{material}', 'update')->name('materials.update');

        Route::delete('/materials/{material}', 'destroy')->name('materials.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\TechniqueController::class)->group(function() {
        Route::get('/techniques', 'index')->name('techniques.index');
        Route::get('/techniques/create', 'create')->name('techniques.create');
        Route::post('/techniques', 'store')->name('techniques.store');

        Route::get('/techniques/edit/{technique}', 'edit')->name('techniques.edit');
        Route::patch('/techniques/update/{technique}', 'update')->name('techniques.update');

        Route::delete('/techniques/{technique}', 'destroy')->name('techniques.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\OrderController::class)->group(function() {
        Route::get('/orders', 'orders')->name('orders.index');
        Route::patch('/orders/updateStatus/{order}', 'updateStatus')->name('orders.updateStatus');
        Route::get('/orders/content/{order}', 'show')->name('orders.show');
    });

});