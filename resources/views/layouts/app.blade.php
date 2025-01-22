<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="bg-gradient-to-r from-black via-gray-900 to-black min-h-screen flex flex-col">

    <!-- Header Section -->
    @include('partials.header')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer Section -->
    @include('partials.footer')

    {{-- <script>
        const navbar = document.getElementById("navbar");
        const navbarLinks = document.getElementById("navbar-links");
        const logoText = document.getElementById("logo-text");
        const homeLink = document.getElementById("home-link");

        // Set initial state when the page is loaded
        window.addEventListener("load", () => {
            if (window.scrollY === 0) {
                navbar.classList.add("bg-transparent");
                logoText.classList.add("text-white");
                homeLink.classList.add("text-white");
            }
        });

        // Change navbar style on scroll
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("bg-white", "shadow-lg");
                navbar.classList.remove("bg-transparent");

                logoText.classList.replace("text-white", "text-black");
                homeLink.classList.replace("text-white", "text-black");

                navbarLinks.querySelectorAll("a").forEach(link => {
                    link.classList.replace("text-white", "text-black");
                });
            } else {
                navbar.classList.remove("bg-white", "shadow-lg");
                navbar.classList.add("bg-transparent");

                logoText.classList.replace("text-black", "text-white");
                homeLink.classList.replace("text-black", "text-white");

                navbarLinks.querySelectorAll("a").forEach(link => {
                    link.classList.replace("text-black", "text-white");
                });
            }
        });
    </script> --}}
</body>

</html>
