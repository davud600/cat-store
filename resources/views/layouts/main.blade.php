<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cat Store</title>
    @yield('head')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-header />

    <main class="overflow-x-hidden">
        @yield('content')
    </main>

    <x-footer />

    <script defer>
        const navbarElem = document.getElementById("navbar");
        const logoElem = document.getElementById("logo");
        const initialPaddingY = navbarElem.style.paddingTop;

        const scrollThreshold = 10;
        let lastScrollTop = 0;

        window.onscroll = function() {
            let st = document.documentElement.scrollTop;
            if (st > lastScrollTop + scrollThreshold) {
                shrinkNavbar();
            } else if (st < lastScrollTop - scrollThreshold) {
                resetNavbar();
            }

            lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
        };

        function shrinkNavbar() {
            navbarElem.style.paddingTop = "0.45rem";
            navbarElem.style.paddingBottom = "0.45rem";
        }

        function resetNavbar() {
            navbarElem.style.paddingTop = initialPaddingY;
            navbarElem.style.paddingBottom = initialPaddingY;
        }
    </script>
</body>

</html>