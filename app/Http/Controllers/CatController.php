<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function cat($id)
    {
        $cats = array(
            [
                'id' => 0,
                'name' => 'Tom',
                'breed' => 'persian',
                'price' => 100,
                'dob' => new DateTime('19-11-2022')
            ],
            [
                'id' => 1,
                'name' => 'Jerry',
                'breed' => 'brown idk',
                'price' => 200,
                'dob' => new DateTime('19-11-2021')
            ]
        );

        $cat = $cats[$id];

        return view('pages.cat', [
            'cat' => $cat
        ]);
    }
}
