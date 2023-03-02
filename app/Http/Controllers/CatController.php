<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Contracts\View\View;

class CatController extends Controller
{
    public function cat($id): View
    {
        $cats = array(
            [
                'id' => 0,
                'name' => 'Tom',
                'breed' => 'persian',
                'description' => 'Very Cool Cat!!! He can do tricks too.',
                'price' => 100,
                'dob' => new DateTime('19-11-2022')
            ],
            [
                'id' => 1,
                'name' => 'Jerry',
                'breed' => 'brown idk',
                'description' => 'Very Cool Cat!!! He can do tricks too.',
                'price' => 200,
                'dob' => new DateTime('19-11-2021')
            ]
        );

        $cat = $cats[$id];

        return view('pages.cat', [
            'cat' => $cat
        ]);
    }

    public function cats(): View
    {
        $cats = array(
            [
                'id' => 0,
                'name' => 'Tom',
                'breed' => 'persian',
                'description' => 'Very Cool Cat!!! He can do tricks too.',
                'price' => 100,
                'dob' => new DateTime('19-11-2022')
            ],
            [
                'id' => 1,
                'name' => 'Jerry',
                'breed' => 'brown idk',
                'description' => 'Very Cool Cat!!! He can do tricks too.',
                'price' => 200,
                'dob' => new DateTime('19-11-2021')
            ]
        );

        return view('pages.cats', [
            'cats' => $cats
        ]);
    }
}
