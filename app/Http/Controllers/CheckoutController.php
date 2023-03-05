<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPaymentRequest;
use App\Http\Requests\ShippingInfoRequest;
use App\Models\Cat;
use App\Models\Order;
use App\Models\ShippingAddress;
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
        // clear session data
        session()->forget(['shippingInfo', 'catInfo']);

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
            // save order and shipping address to db if cat not sold already
            if (Cat::where('id', session()->get('catInfo')['id'])->first()['sold'])
                return new JsonResponse(['message' => 'Cat is not available!'], 400);

            $shippingAddress = ShippingAddress::create(session()->get('shippingInfo'));
            Order::create(array('shipping_address_id' => $shippingAddress->id, ...$request->all()));
            Cat::where('id', session()->get('catInfo')['id'])->update(array('sold' => true));

            // return json response
            return new JsonResponse(['message' => 'Your order has been received!'], 200);
        } catch (\Exception $e) {
            error_log('An exception occurred: ' . $e->getMessage());
        }
    }
}
