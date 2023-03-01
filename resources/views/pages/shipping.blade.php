@extends('layouts.main')

@section('head')
<title>Shipping</title>
@endsection

@section('content')
<a class="button ml-5 mt-5 md:ml-14 md:mt-14 px-6 py-2 md:text-xl text-lg rounded-lg hover:bg-blue-400 transition-all text-white bg-blue-300" href="/cat/{{ session()->get('catInfo')['id'] }}">Back</a>

<section id="shipping-section" class="px-4 md:px-14 py-12">
    <article class="flex flex-col items-center text-center gap-4 bg-gray-200 px-4 md:px-6 py-8 rounded-lg">
        <h1 class="text-2xl md:text-3xl font-semibold my-4">Shipping Information</h1>

        <form class="w-5/6 md:w-2/3 my-4 flex flex-col gap-6" action="/save-shipping-info" method="post">
            {{ csrf_field() }}

            <label class="text-lg md:text-xl my-3">Customer details: </label>
            <div class="flex flex-col md:flex-row gap-4">
                <input id="fullName" name="fullName" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="Full Name" value="{{ isset(session()->get('shippingInfo')['fullName']) ? session()->get('shippingInfo')['fullName']:'' }}">
                <input id="email" name="email" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="email" required placeholder="E-mail" value="{{ isset(session()->get('shippingInfo')['email']) ? session()->get('shippingInfo')['email']:'' }}">
            </div>
            <input id="address" name="address" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="Street Address" value="{{ isset(session()->get('shippingInfo')['address']) ? session()->get('shippingInfo')['address']:'' }}">
            <input id="address2" name="address2" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" placeholder="Street Address Line 2 (optional)" value="{{ isset(session()->get('shippingInfo')['address2']) ? session()->get('shippingInfo')['address2']:'' }}">
            <div class="flex flex-col md:flex-row gap-4">
                <input id="city" name="city" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="City" value="{{ isset(session()->get('shippingInfo')['city']) ? session()->get('shippingInfo')['city']:'' }}">
                <input id="province" name="province" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="State / Province" value="{{ isset(session()->get('shippingInfo')['province']) ? session()->get('shippingInfo')['province']:'' }}">
            </div>
            <div class="flex gap-2">
                <input id="zipCode" name="zipCode" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="number" required placeholder="Postal / Zip Code" value="{{ isset(session()->get('shippingInfo')['zipCode']) ? session()->get('shippingInfo')['zipCode']:'' }}">
                <select id="country" name="country" class="w-2/3 md:w-1/3 text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700">
                    <option class="text-gray-700" value="" disabled>Country</option>
                    <option class="text-gray-700" value="aa" {{ isset(session()->get('shippingInfo')['country']) ? (session()->get('shippingInfo')['country'] == "aa" ? "selected":""):"" }}>Albania</option>
                    <option class="text-gray-700" value="xk" {{ isset(session()->get('shippingInfo')['country']) ? (session()->get('shippingInfo')['country'] == "xk" ? "selected":""):"" }}>Kosovo</option>
                </select>
            </div>
            <input class="text-center cursor-pointer bg-red-500 w-full md:w-48 py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-red-700 transition-all" type="submit">
        </form>
    </article>
</section>
@endsection