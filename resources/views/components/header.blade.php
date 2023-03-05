<header class="sticky top-0 z-20">
    <nav id="navbar" class="flex justify-between md:px-32 px-4 py-4 shadow-md items-center bg-neutral-800 transition-all duration-300">
        <a id="logo" class="font-black text-blue-400 md:text-4xl text-3xl" href="/">Cat-Store</a>

        <ul>
            <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <!-- <li class="flex items-center justify-center md:gap-4 gap-3">
                <svg class="w-4 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
                <a href="#" class="flex md:flex-row flex-col md:gap-2 gap-1 text-center">
                    <span class="md:text-base text-sm">(Guest)</span>
                    <span class="md:text-base text-sm">Register/Login</span>
                </a>
            </li> -->
        </ul>
    </nav>
</header>

<script defer>
    const navbarElem = document.getElementById("navbar");
    const initialPaddingY = navbarElem.style.paddingTop;

    const scrollShrinkThreshold = 7;
    const scrollResetThreshold = 10;
    let lastScrollTop = 0;

    window.addEventListener('scroll', () => {
        let st = document.documentElement.scrollTop;

        if (st > lastScrollTop + scrollShrinkThreshold)
            shrinkNavbar();
        else if (st < lastScrollTop - scrollResetThreshold)
            resetNavbar();

        lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
    })

    function shrinkNavbar() {
        navbarElem.style.paddingTop = "0.25rem";
        navbarElem.style.paddingBottom = "0.25rem";
    }

    function resetNavbar() {
        navbarElem.style.paddingTop = initialPaddingY;
        navbarElem.style.paddingBottom = initialPaddingY;
    }
</script>