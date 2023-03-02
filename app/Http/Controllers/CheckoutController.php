<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPaymentRequest;
use App\Http\Requests\ShippingInfoRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    public function shipping()
    {
        return view('pages.shipping');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function thankYou()
    {
        return view('pages.thank-you');
    }

    public function saveShippingInfo(ShippingInfoRequest $request): RedirectResponse
    {
        // save shipping info to session
        session()->put('shippingInfo', $request->all());

        return redirect('/checkout');
    }

    public function processPayment(CheckoutPaymentRequest $request): void
    {
        // save order to db

        // clear session data
        session()->forget(['shippingInfo', 'catInfo']);
    }
}
