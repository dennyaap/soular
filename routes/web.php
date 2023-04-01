<?php

use App\Http\Controllers\PaintingController;
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
    Route::get('/getAllProducts', 'getAllProducts')->name('getAllProducts');

});