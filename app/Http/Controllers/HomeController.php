<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use DateTime;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $cats = Cat::limit(8)->get();

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
            else session()->flash('status', 'Could not connect to Cataas api, their service is down!');
        }
    }
}
