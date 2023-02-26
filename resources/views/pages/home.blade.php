@extends('layouts.main')

@section('head')
<script defer>
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
    <div class="w-full flex justify-center my-16">
        <h1 class="text-3xl">There are many reasons why you should get a cat: </h1>
    </div>

    <!-- Slideshow container -->
    <div id="slideshow-container" class="min-w-fit m-auto relative">

        <!-- Full-width images with number and caption text -->
        <div class="slide-item">
            <img src="hero-cat-images/cat0.jpg" alt="image of cat :)" class="w-full object-contain" style="max-height: 500px;">
        </div>

        <div class="slide-item hidden">
            <img src="hero-cat-images/cat1.jpg" alt="image of cat :)" class="w-full object-contain" style="max-height: 500px;">
        </div>

        <div class="slide-item hidden">
            <img src="hero-cat-images/cat2.jpg" alt="image of cat :)" class="w-full object-contain" style="max-height: 500px;">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev cursor-pointer absolute left-0 top-1/2 w-auto -mt-14 p-8 text-blue-300 font-bold text-4xl transition-all hover:text-blue-500" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next cursor-pointer absolute right-0 top-1/2 w-auto -mt-14 p-8 text-blue-300 font-bold text-4xl transition-all hover:text-blue-500" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot cursor-pointer h-3 w-3 mx-0 my-2 bg-gray-200 rounded-full inline-block transition-all" onclick="currentSlide(1)"></span>
        <span class="dot cursor-pointer h-3 w-3 mx-0 my-2 bg-gray-200 rounded-full inline-block transition-all" onclick="currentSlide(2)"></span>
        <span class="dot cursor-pointer h-3 w-3 mx-0 my-2 bg-gray-200 rounded-full inline-block transition-all" onclick="currentSlide(3)"></span>
    </div>


</section>
@endsection