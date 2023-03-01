<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingInfoRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    public function shipping(): View
    {
        return view('pages.shipping');
    }

    public function checkout(): View
    {
        return view('pages.checkout');
    }

    public function saveShippingInfo(ShippingInfoRequest $request): RedirectResponse
    {
        // save shipping info to session
        session()->put('shippingInfo', $request->all());

        return redirect('/checkout');
    }
}
