<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
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
                'breed' => 'cat idk',
                'description' => 'Very Cool Cat!!! He can do tricks too.',
                'price' => 200,
                'dob' => new DateTime('19-11-2021')
            ]
        );

        // $this->downloadCatImages();

        return view('pages.home', [
            'cats' => $cats
        ]);
    }

    private function downloadCatImages(): void
    {
        for ($i = 0; $i < env('TOTAL_HOMEPAGE_CATS'); $i++) {
            $img = public_path('hero-cat-images\cat' . $i . '.jpg');
            $fileContents = @file_get_contents(env('CAT_API_URL'));

            if ($fileContents) file_put_contents($img, $fileContents);
            else session()->flash('status', 'Could not connect to Cataas api!');
        }
    }
}
