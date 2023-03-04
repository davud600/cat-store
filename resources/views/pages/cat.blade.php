@extends('layouts.main')

@section('head')
<title>{{ $cat['name'] }}</title>
@endsection

@section('content')
<a class="button ml-5 mt-5 md:ml-14 md:mt-14 px-6 py-2 md:text-xl text-lg rounded-lg hover:bg-blue-400 transition-all text-white bg-blue-300" href="/">Back</a>

<section id="cat-section" class="my-8 px-4 md:px-14 py-12">
    <div class="flex md:flex-row flex-col gap-4 bg-gray-200 px-4 md:px-6 py-8 rounded-lg">
        <!-- Cat's showcase image -->
        <div class="md:mb-0 mb-4 w-full md:w-1/2 flex justify-center">
            <img class="object-cover rounded w-6/7 md:w-4/5" src="\cat-showcase-images\{{ $cat['id'] }}\0.jpg" alt="image of cat :)">
        </div>

        <!-- Cat's info -->
        <article class="w-full md:w-1/2">
            <div class="flex flex-col gap-4">
                <h1 class="text-4xl font-semibold">{{ $cat['name'] }}</h1>
                <h2 class="text-4xl font-semibold text-red-600">{{ $cat['price'] }}€</h2>
                @php
                $catDob = new DateTime($cat['dob']);
                @endphp
                <span class="text-base text-blue-400 my-5">{{ $catDob->diff(new DateTime())->format('%y years %m months %d days') }} old</span>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl font-semibold">Description:</h3>
                <p class="text-gray-600">{{ $cat['description'] }}</p>
                <button class="button text-center cursor-pointer bg-red-500 w-48 py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-red-700 transition-all" onclick="adoptButtonOnClick()">Adopt Now</button>
            </div>
        </article>
    </div>
</section>

<script defer>
    function adoptButtonOnClick() {
        // save cat data to session with php
        "{{ session()->put('catInfo', $cat) }}";

        window.location.href = "/shipping";
    }
</script>
@endsection