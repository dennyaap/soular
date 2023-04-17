<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketController;


use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\admin\AdminController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'checkLogin')->name('login.check');
    Route::get('/logout', 'logout')->name('logout');

});

Route::middleware('auth:admin')->group(function() {
    Route::controller(\App\Http\Controllers\admin\PaintingController::class)->group(function() {
        Route::get('/paintings', 'index')->name('paintings.index');
        // Route::get('/paintings/category/{category}', 'getPaintingCategory')->name('paintings.category');
        Route::get('/paintings/create', 'create')->name('paintings.create');
        Route::post('/paintings', 'store')->name('paintings.store');
        
        Route::get('/paintings/edit/{painting}', 'edit')->name('paintings.edit');
        Route::patch('/paintings/update/{painting}', 'update')->name('paintings.update');
        
        Route::delete('/paintings/{painting}', 'destroy')->name('paintings.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\ArtistController::class)->group(function() {
        Route::get('/artists', 'index')->name('artists.index');
        Route::get('/artists/create', 'create')->name('artists.create');
        Route::post('/artists', 'store')->name('artists.store');
        
        Route::get('/artists/edit/{artist}', 'edit')->name('artists.edit');
        Route::patch('/artists/update/{artist}', 'update')->name('artists.update');
        
        Route::delete('/artists/{artist}', 'destroy')->name('artists.destroy');
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

    Route::controller(\App\Http\Controllers\admin\StatusController::class)->group(function() {
        Route::get('/statuses', 'index')->name('statuses.index');
        Route::get('/statuses/create', 'create')->name('statuses.create');
        Route::post('/statuses', 'store')->name('statuses.store');

        Route::get('/statuses/edit/{status}', 'edit')->name('statuses.edit');
        Route::patch('/statuses/update/{status}', 'update')->name('statuses.update');

        Route::delete('/statuses/{status}', 'destroy')->name('statuses.destroy');
    });

    Route::controller(\App\Http\Controllers\admin\OrderController::class)->group(function() {
        Route::get('/orders', 'orders')->name('orders.index');
        Route::patch('/orders/updateStatus/{order}', 'updateStatus')->name('orders.updateStatus');
        Route::get('/orders/content/{order}', 'show')->name('orders.show');
    });

});