<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')
    <title>Cat Store</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-header />

    <!-- Portal div (alerts / pop ups) -->
    <div id="portal" class="relative">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert error="{{ $error }}" />
        @endforeach
        @endif

        @if (session('status'))
        <x-alert error="{{ session('status') }}" />
        @endif
    </div>

    <!-- Main content -->
    <main class="overflow-x-hidden bg-neutral-900">
        @yield('content')
    </main>

    <!-- Back to top button -->
    <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block p-4 m-1 md:p-6 md:m-2 bg-blue-600 text-white font-medium text-xs leading-tight fixed z-20 uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5" id="btn-back-to-top">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-4 h-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
        </svg>
    </button>

    <x-footer />

    <script defer>
        /*
         * Script to handle the scroll to top button
         */
        const scrollTopButton = document.getElementById("btn-back-to-top");
        const heightToShowButton = 100;
        window.addEventListener('scroll', () => {
            if (
                document.body.scrollTop > heightToShowButton ||
                document.documentElement.scrollTop > heightToShowButton
            ) {
                scrollTopButton.style.display = "block";
            } else {
                scrollTopButton.style.display = "none";
            }
        })

        scrollTopButton.addEventListener("click", () => {
            document.body.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            document.documentElement.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>