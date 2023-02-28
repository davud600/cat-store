@extends('layouts.main')

@section('head')
<title>Shipping</title>
@endsection

@section('content')
<section id="shipping-section" class="my-8 px-4 md:px-14 py-16">
    <article class="flex flex-col items-center text-center gap-4 bg-gray-200 px-4 md:px-6 py-8 rounded-lg">
        <h1 class="text-2xl md:text-3xl font-semibold my-4">Shipping Information</h1>
        <form class="w-6/7 md:w-2/3 my-4 flex flex-col gap-6" action="/save-shipping-info" method="post">
            <label class="text-xl my-3">Customer details: </label>
            <div class="flex flex-col md:flex-row gap-4">
                <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" placeholder="Full Name">
                <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="email" placeholder="E-mail">
            </div>
            <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" placeholder="Street Address">
            <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" placeholder="Street Address Line 2">
            <div class="flex flex-col md:flex-row gap-4">
                <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" placeholder="City">
                <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" placeholder="State / Province">
            </div>
            <div class="flex gap-2">
                <input class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="number" placeholder="Postal / Zip Code">
                <select class="w-2/3 md:w-1/3 text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700">
                    <option class="text-gray-700" value="" disabled selected>Country</option>
                    <option class="text-gray-700" value="aa">Albania</option>
                    <option class="text-gray-700" value="xk">Kosovo</option>
                </select>
            </div>
        </form>
    </article>
</section>
@endsection