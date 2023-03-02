@extends('layouts.main')

@section('content')
<section id="cats-section" class="my-8 px-4 md:px-14 py-12">
    <!-- Search bar -->
    <form action="/cats" method="get">
        <input id="searchQuery" name="searchQuery" type="text" placeholder="Search..." class="nosubmit border-red-600 bg-transparent border-solid border-2 rounded-2xl py-3 md:py-4 md:w-80 w-64 text-sm md:text-base md:pl-9 pl-7 pr-2 md:pr-3">
    </form>

    @if (empty($cats))
    <div class="flex justify-center my-24 p-4">
        <span class="text-2xl md:text-3xl font-semibold">There were no results</span>
    </div>
    @endif
    @if (!empty($cats))
    <!-- Items (cats) -->
    <div class="justify-between text-center grid my-24 lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5">
        @foreach($cats as $cat)
        <a href="/cat/{{ $cat['id'] }}" class="block drop-shadow-xl h-96 bg-white p-2 cursor-pointer hover:scale-105 hover:z-10 transition-all">
            <img src="\cat-showcase-images\{{ $cat['id'] }}\0.jpg" alt="image of cat :)" class="w-full h-72 object-cover mb-1">
            <div class="flex flex-col gap-1">
                <span class="text-lg">{{ $cat['name'] }}</span>
                <span class="text-md text-red-600 font-bold">{{ $cat['price'] }}€</span>
                <span class="text-sm text-gray-500">{{ $cat['dob']->diff(new DateTime())->format('%y years %m months %d days') }} old</span>
            </div>
        </a>
        @endforeach
    </div>
    @endif
</section>
@endsection