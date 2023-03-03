<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPaymentRequest;
use App\Http\Requests\ShippingInfoRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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

    public function thankYou(): View
    {
        return view('pages.thank-you');
    }

    public function saveShippingInfo(ShippingInfoRequest $request): RedirectResponse
    {
        // save shipping info to session
        session()->put('shippingInfo', $request->all());

        return redirect('/checkout');
    }

    public function processPayment(CheckoutPaymentRequest $request): JsonResponse
    {
        try {
            // return response
            if ($request->validated()) {
                // save order to db

                // clear session data
                session()->forget(['shippingInfo', 'catInfo']);

                return new JsonResponse(['message' => 'validation was successful!'], 200);
            }
        } catch (\Exception $e) {
            error_log('An exception occurred: ' . $e->getMessage());
        }
    }
}
