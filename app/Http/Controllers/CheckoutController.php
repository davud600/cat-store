<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function shipping()
    {
        return view('pages.shipping');
    }
}
