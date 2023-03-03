<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CatInfoExists;
use App\Http\Middleware\ShippingInfoExists;
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
Route::get('/cats', [CatController::class, 'cats']);

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/shipping', 'shipping')
        ->middleware(CatInfoExists::class);
    Route::get('/checkout', 'checkout')
        ->middleware(CatInfoExists::class)
        ->middleware(ShippingInfoExists::class);
    Route::get('/payment-success', 'thankYou')
        ->middleware(CatInfoExists::class)
        ->middleware(ShippingInfoExists::class);

    Route::post('/save-shipping-info', 'saveShippingInfo');
});
