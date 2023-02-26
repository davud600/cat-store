<?php

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

Route::get('/', function () {
    $total_cats = 3;
    $url = 'https://cataas.com/cat';

    for ($i = 0; $i < $total_cats; $i++) {
        $img = public_path('hero-cat-images\cat' . $i . '.jpg');
        file_put_contents($img, file_get_contents($url));
    }

    return view('pages.home', ['total_cats' => $total_cats]);
});
