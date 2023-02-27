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
    $cats = array(
        [
            'id' => 1,
            'name' => 'Tom',
            'breed' => 'persian',
            'price' => 100,
            'dob' => new DateTime('19-11-2022')
        ],
        [
            'id' => 2,
            'name' => 'Jerry',
            'breed' => 'brown idk',
            'price' => 200,
            'dob' => new DateTime('19-11-2021')
        ]
    );

    for ($i = 0; $i < $total_cats; $i++) {
        $img = public_path('hero-cat-images\cat' . $i . '.jpg');
        $fileContents = @file_get_contents($url);
        if ($fileContents) file_put_contents($img, $fileContents);
        else $error = "Could not connect to Cataas api, so images of cats won't be showing :(";
    }

    return view('pages.home', [
        'error' => $error,
        'total_cats' => $total_cats,
        'cats' => $cats
    ]);
});
