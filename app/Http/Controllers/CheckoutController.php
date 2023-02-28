<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingInfoRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shipping(): View
    {
        return view('pages.shipping');
    }

    public function saveShippingInfo(ShippingInfoRequest $request): RedirectResponse
    {
        return redirect('/checkout');
    }
}
