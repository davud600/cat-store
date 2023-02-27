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
    $error = '';

    for ($i = 0; $i < $total_cats; $i++) {
        $img = public_path('hero-cat-images\cat' . $i . '.jpg');
        $fileContents = @file_get_contents($url);
        if ($fileContents) file_put_contents($img, $fileContents);
        else $error = "Could not connect to Cataas api, so images of cats won't be showing :(";
    }

    return view('pages.home', ['total_cats' => $total_cats, 'error' => $error]);
});
