@extends('layouts.main')

@section('content')
<section id="cats-section" class="my-8 px-4 md:px-14 py-12">
    <!-- Search bar -->
    <form action="/cats" method="get">
        <input id="searchQuery" name="searchQuery" type="text" placeholder="Search..." class="text-white nosubmit border-red-600 bg-transparent border-solid border-2 rounded-2xl py-3 md:py-4 md:w-80 w-full text-sm md:text-base md:pl-9 pl-7 pr-2 md:pr-3">
    </form>

    @if (isset($_GET['searchQuery']) && $cats->first())
    <div class="flex justify-center mt-8">
        <span class="md:text-2xl text-xl font-bold text-white">Search results for: {{ $_GET['searchQuery'] }}</span>
    </div>
    @endif

    @if (!$cats->first())
    <div class="flex justify-center my-24 p-4">
        <span class="text-2xl md:text-3xl font-bold text-white">There were no results for: {{ $_GET['searchQuery'] }}</span>
    </div>
    @endif
    @if (!empty($cats))
    <!-- Items (cats) -->
    <x-cats :cats="$cats" />
    @endif
</section>
@endsection