<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class);

Route::get('/cat/{id}', [CatController::class, 'cat']);

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/shipping', 'shipping');
    Route::get('/checkout', 'checkout');
    Route::post('/save-shipping-info', 'saveShippingInfo');
});
