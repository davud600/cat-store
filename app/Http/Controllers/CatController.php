<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /*
     * Fetch data from db and return view with that data
     */
    public function cat($id): View
    {
        $cat = Cat::where('id', $id)
            ->first();

        return view('pages.cat', [
            'cat' => $cat
        ]);
    }

    /*
     * Fetch data from db and filter them based on the searchQuery param
     */
    public function cats(Request $request): View
    {
        $cats = Cat::where('breed', 'LIKE', $request->query('searchQuery'))->get();

        return view('pages.cats', [
            'cats' => $cats
        ]);
    }
}
