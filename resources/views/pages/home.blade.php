@extends('layouts.main')

@section('head')
<script defer>
    /*
     * This script manages the image slider by
     * keeping track of an index which represents the current active image
     */
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides((slideIndex += n), n > 0);
    }

    function currentSlide(n) {
        showSlides((slideIndex = n), null);
    }

    function showSlides(n, animate) {
        let i;
        let slides = document.getElementsByClassName("slide-item");
        let dots = document.getElementsByClassName("dot");

        // Clamp slideIndex value (0 - slides.length)
        if (n > slides.length)
            slideIndex = 1;
        if (n < 1)
            slideIndex = slides.length;

        // Disable inactive slide items
        for (i = 0; i < slides.length; i++)
            slides[i].style.display = "none";
        for (i = 0; i < dots.length; i++)
            dots[i].className = dots[i].className.replace(" active", "");

        // Enable the active slide item
        if (slides[slideIndex - 1])
            slides[slideIndex - 1].style.display = "block";
        if (dots[slideIndex - 1])
            dots[slideIndex - 1].className += " active";
    }
</script>
@endsection

@section('content')
<section id="hero-section">
    <!-- Section title container -->
    <div class="w-full flex justify-center my-4 md:my-10 md:px-16 px-6 text-center">
        <h1 class="md:text-3xl text-xl font-semibold">There are many reasons why you should get a cat: </h1>
    </div>

    <!-- Slideshow container -->
    <div id="slideshow-container" class="min-w-fit m-auto relative">

        @for ($i = 0; $i < env('TOTAL_HOMEPAGE_CATS'); $i++) <div class="slide-item {{ $i > 0 ? 'hidden':'' }}">
            <img src="hero-cat-images/cat{{ $i }}.jpg" alt="image of cat :)" class="w-full object-contain" style="height: 485px;">
    </div>
    @endfor

    <!-- Next and previous buttons -->
    <a class="prev cursor-pointer absolute left-0 top-1/2 w-auto -mt-14 p-8 text-blue-300 font-bold text-4xl transition-all hover:text-blue-500" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next cursor-pointer absolute right-0 top-1/2 w-auto -mt-14 p-8 text-blue-300 font-bold text-4xl transition-all hover:text-blue-500" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot cursor-pointer h-3 w-3 mx-0 my-2 bg-gray-200 rounded-full inline-block transition-all" onclick="currentSlide(1)"></span>
        <span class="dot cursor-pointer h-3 w-3 mx-0 my-2 bg-gray-200 rounded-full inline-block transition-all" onclick="currentSlide(2)"></span>
        <span class="dot cursor-pointer h-3 w-3 mx-0 my-2 bg-gray-200 rounded-full inline-block transition-all" onclick="currentSlide(3)"></span>
    </div>
</section>
<section id="buy-section" class="md:px-16 px-6">
    <div class="flex px-16 py-10 bg-blue-100 md:h-96 flex-col md:flex-row" style="height: 32rem;">
        <div class="flex flex-col md:w-1/2 w-full gap-6 text-center justify-center">
            <span class="md:text-3xl text-2xl font-semibold">Buy any kind of cat you want</span>
            <form action="/cats" method="get">
                <input name="searchQuery" id="searchQuery" type="text" placeholder="Search for any cat breed" class="nosubmit border-red-600 bg-transparent border-solid border-2 rounded-2xl py-3 md:py-4 md:w-72 w-52 text-sm md:text-base md:pl-9 pl-7 pr-2 md:pr-3">
            </form>
        </div>
        <div class="flex flex-col gap-10 md:gap-20 mt-12 md:mt-0">
            <div class="flex flex-row gap-24 justify-center">
                <div class="hover:scale-110 transition-all duration-300 bg-yellow-300 flex justify-center items-center rounded-xl w-14 h-14 md:w-24 md:h-24 drop-shadow-lg">
                    <svg class="fill-white md:w-14 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z" />
                    </svg>
                </div>
                <div class="hover:scale-110 transition-all duration-300 bg-sky-300 flex justify-center items-center rounded-xl w-14 h-14 md:w-24 md:h-24 drop-shadow-lg">
                    <svg class="fill-white md:w-14 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M481.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-30.9 28.1c-7.7 7.1-11.4 17.5-10.9 27.9c.1 2.9 .2 5.8 .2 8.8s-.1 5.9-.2 8.8c-.5 10.5 3.1 20.9 10.9 27.9l30.9 28.1c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-39.7-12.6c-10-3.2-20.8-1.1-29.7 4.6c-4.9 3.1-9.9 6.1-15.1 8.7c-9.3 4.8-16.5 13.2-18.8 23.4l-8.9 40.7c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-8.9-40.7c-2.2-10.2-9.5-18.6-18.8-23.4c-5.2-2.7-10.2-5.6-15.1-8.7c-8.8-5.7-19.7-7.8-29.7-4.6L69.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l30.9-28.1c7.7-7.1 11.4-17.5 10.9-27.9c-.1-2.9-.2-5.8-.2-8.8s.1-5.9 .2-8.8c.5-10.5-3.1-20.9-10.9-27.9L8.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l39.7 12.6c10 3.2 20.8 1.1 29.7-4.6c4.9-3.1 9.9-6.1 15.1-8.7c9.3-4.8 16.5-13.2 18.8-23.4l8.9-40.7c2-9.1 9-16.3 18.2-17.8C213.3 1.2 227.5 0 242 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l8.9 40.7c2.2 10.2 9.4 18.6 18.8 23.4c5.2 2.7 10.2 5.6 15.1 8.7c8.8 5.7 19.7 7.7 29.7 4.6l39.7-12.6c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM242 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>
                </div>
            </div>
            <div class="flex gap-14">
                <div class="hover:scale-110 transition-all duration-300 bg-orange-300 flex justify-center items-center rounded-xl w-14 md:w-24 md:h-24 drop-shadow-lg h-14">
                    <svg class="fill-white md:w-14 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M240 0c4.6 0 9.2 1 13.4 2.9L441.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C41.3 420.7 .5 239.2 0 140c-.1-26.2 16.3-47.9 38.3-57.2L226.7 2.9C230.8 1 235.4 0 240 0z" />
                    </svg>
                </div>
                <div class="md:w-36 w-10 md:block hidden">
                    <svg class="fill-pink-300 md:w-36 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M288 192h17.1c22.1 38.3 63.5 64 110.9 64c11 0 21.8-1.4 32-4v4 32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V339.2L248 448h56c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-53 0-96-43-96-96V192.5c0-16.1-12-29.8-28-31.8l-7.9-1C10.5 157.6-1.9 141.6 .2 124s18.2-30 35.7-27.8l7.9 1c48 6 84.1 46.8 84.1 95.3v85.3c34.4-51.7 93.2-85.8 160-85.8zm160 26.5v0c-10 3.5-20.8 5.5-32 5.5c-28.4 0-54-12.4-71.6-32h0c-3.7-4.1-7-8.5-9.9-13.2C325.3 164 320 146.6 320 128v0V32 12 10.7C320 4.8 324.7 .1 330.6 0h.2c3.3 0 6.4 1.6 8.4 4.2l0 .1L352 21.3l27.2 36.3L384 64h64l4.8-6.4L480 21.3 492.8 4.3l0-.1c2-2.6 5.1-4.2 8.4-4.2h.2C507.3 .1 512 4.8 512 10.7V12 32v96c0 17.3-4.6 33.6-12.6 47.6c-11.3 19.8-29.6 35.2-51.4 42.9zM400 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm48 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32z" />
                    </svg>
                </div>
                <div class="hover:scale-110 transition-all duration-300 bg-green-300 flex justify-center items-center rounded-xl w-14 md:w-24 md:h-24 drop-shadow-lg">
                    <svg class="fill-white w-6 md:w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                    </svg>
                </div>
            </div>
            <div class="flex justify-center md:hidden">
                <div class="md:w-36 w-10">
                    <svg class="fill-pink-300 md:w-36 w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M288 192h17.1c22.1 38.3 63.5 64 110.9 64c11 0 21.8-1.4 32-4v4 32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V339.2L248 448h56c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-53 0-96-43-96-96V192.5c0-16.1-12-29.8-28-31.8l-7.9-1C10.5 157.6-1.9 141.6 .2 124s18.2-30 35.7-27.8l7.9 1c48 6 84.1 46.8 84.1 95.3v85.3c34.4-51.7 93.2-85.8 160-85.8zm160 26.5v0c-10 3.5-20.8 5.5-32 5.5c-28.4 0-54-12.4-71.6-32h0c-3.7-4.1-7-8.5-9.9-13.2C325.3 164 320 146.6 320 128v0V32 12 10.7C320 4.8 324.7 .1 330.6 0h.2c3.3 0 6.4 1.6 8.4 4.2l0 .1L352 21.3l27.2 36.3L384 64h64l4.8-6.4L480 21.3 492.8 4.3l0-.1c2-2.6 5.1-4.2 8.4-4.2h.2C507.3 .1 512 4.8 512 10.7V12 32v96c0 17.3-4.6 33.6-12.6 47.6c-11.3 19.8-29.6 35.2-51.4 42.9zM400 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm48 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Items (cats) -->
    <div class="justify-between grid my-24 lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5">
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

    <div class="flex justify-center mb-6">
        <a href="/cats" class="button text-center cursor-pointer bg-orange-500 w-full md:w-48 py-3 px-1 text-white rounded-lg font-bold my-6 hover:bg-orange-700 transition-all">View All</a>
    </div>
</section>
@endsection