@extends('layouts.main')

@section('head')
<title>{{ $cat['name'] }}</title>
@endsection

@section('content')
<section id="cat-section" class="my-8 px-4 md:px-14 py-16">
    <div class="flex md:flex-row flex-col gap-4 bg-gray-200 px-4 md:px-6 py-8 rounded-lg">
        <!-- Cat's images slider (single image temporarily) -->
        <div class="md:mb-0 mb-4 w-full md:w-1/2 flex justify-center">
            <img class="object-cover rounded w-6/7 md:w-4/5" src="\cat-showcase-images\{{ $cat['id'] }}\0.jpg" alt="image of cat :)">
        </div>

        <!-- Cat's info -->
        <article class="w-full md:w-1/2">
            <div class="flex flex-col gap-4">
                <h1 class="text-4xl font-semibold">{{ $cat['name'] }}</h1>
                <h2 class="text-4xl font-semibold text-red-600">{{ $cat['price'] }}€</h2>
                <span class="text-base text-blue-400 my-5">{{ $cat['dob']->diff(new DateTime())->format('%y years %m months %d days') }} old</span>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl font-semibold">Description:</h3>
                <p class="text-gray-600">AirPods Pro •••Support wireless charging Contact: 0627468298 * 10 meters is not stuck & continuous. * Squeeze sensor * Call to listen to songs for 3+ hours , long battery life * Out of the box automatic boot/ automatic pairing * Perfectly compatible with IOS /Android and all mobile phones * Transparency mode * High speaker quality * HIFI stereo stereo super quality</p>
                <a class="button text-center cursor-pointer bg-red-600 w-48 py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-red-800 transition-all" href="/shipping">Adopt Now</a>
            </div>
        </article>
    </div>
</section>
@endsection