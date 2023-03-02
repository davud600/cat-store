@extends('layouts.main')

@section('head')
<title>Thank You</title>
@endsection

@section('content')
<section id="shipping-section" class="px-4 md:px-14 py-12">
    <article class="flex flex-col items-center text-center gap-4 bg-gray-200 px-4 md:px-6 py-8 rounded-lg">
        <h1 class="text-2xl md:text-3xl font-semibold my-4">Your order has been received</h1>
        <!-- <div class=""> -->
        <svg class="fill-green-600 w-36 my-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
        </svg>
        <!-- </div> -->
        <h2 class="text-xl md:text-2xl">Thank you for your purchase!</h2>
        <span class="text-base md:text-lg">Your order ID is: 1234567890</span>
        <a href="/" class="button text-center cursor-pointer bg-orange-500 w-full md:w-48 py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-orange-700 transition-all">Return Home</a>
    </article>
</section>
@endsection