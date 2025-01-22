<header id="navbar"
    class="fixed top-4 left-1/2 transform -translate-x-1/2 w-[95%] bg-transparent shadow-md z-50 transition-all duration-300 rounded-[20px] backdrop-blur-md">
    <nav class="flex items-center justify-between px-6 py-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-xl font-bold transition duration-300 flex items-center space-x-2">
            <!-- Logo Icon -->
            <img src="{{ asset('images/icon.png') }}" alt="Sigma Logo" class="h-10 w-10">
            <!-- Logo Text -->
            <span class="text-white" id="logo-text">
                SigmaEnterprise.
            </span>
        </a>


        <!-- Menu Items -->
        <ul class="hidden md:flex space-x-8" id="navbar-links">
            <li><a href="{{ route('home') }}" class="text-white font-medium hover:text-gray-500 transition duration-200"
                    id="home-link">Home</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="text-white font-medium hover:text-gray-500 transition duration-200">About</a></li>
            <li><a href="{{ route('services') }} "
                    class="text-white font-medium hover:text-gray-500 transition duration-200">Services</a></li>
            <li><a href="{{ route('order') }}"
                    class="text-white font-medium hover:text-gray-500 transition duration-200">Order</a></li>
            <li><a href="{{ route('partners') }}"
                    class="text-white font-medium hover:text-gray-500 transition duration-200">Partners</a></li>
            <li><a href="{{ route('contact') }}"
                    class="text-white font-medium hover:text-gray-500 transition duration-200">Contact</a></li>
        </ul>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-white focus:outline-none" id="mobile-menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-black text-white p-4 space-y-4 hidden">
        <a href="{{ route('home') }}" class="block text-lg">Home</a>
        <a href="{{ route('about') }}" class="block text-lg">About</a>
        <a href="{{ route('services') }}" class="block text-lg">Services</a>
        <a href="{{ route('order') }}" class="block text-lg">Order</a>
        <a href="{{ route('partners') }}" class="block text-lg">Partners</a>
        <a href="{{ route('contact') }}" class="block text-lg">Contact</a>
    </div>
</header>

<script>
    const navbar = document.getElementById("navbar");
    const navbarLinks = document.getElementById("navbar-links");
    const logoText = document.getElementById("logo-text");
    const homeLink = document.getElementById("home-link");
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

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
            navbar.classList.add("bg-gray-100", "shadow-lg");
            navbar.classList.remove("bg-transparent");

            logoText.classList.replace("text-white", "text-black");
            homeLink.classList.replace("text-white", "text-black");

            navbarLinks.querySelectorAll("a").forEach(link => {
                link.classList.replace("text-white", "text-black");
            });

            // Change hamburger icon to black when scrolled
            if (mobileMenuButton) {
                mobileMenuButton.classList.add("text-black");
            }
        } else {
            navbar.classList.remove("bg-gray-100", "shadow-lg");
            navbar.classList.add("bg-transparent");

            logoText.classList.replace("text-black", "text-white");
            homeLink.classList.replace("text-black", "text-white");

            navbarLinks.querySelectorAll("a").forEach(link => {
                link.classList.replace("text-black", "text-white");
            });

            // Revert hamburger icon to white
            if (mobileMenuButton) {
                mobileMenuButton.classList.remove("text-black");
                mobileMenuButton.classList.add("text-white");
            }
        }
    });

    // Toggle mobile menu and change hamburger icon color
    mobileMenuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");

        // Change hamburger icon color when the menu is opened or closed
        if (mobileMenu.classList.contains("hidden")) {
            mobileMenuButton.classList.add("text-white");
            mobileMenuButton.classList.remove("text-black");
        } else {
            mobileMenuButton.classList.add("text-black");
            mobileMenuButton.classList.remove("text-white");
        }
    });

    // Change hamburger color when scrolling
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            // Make the hamburger icon black when scrolling
            mobileMenuButton.classList.add("text-black");
            mobileMenuButton.classList.remove("text-white");
        } else {
            // Revert hamburger icon color to white when at the top
            mobileMenuButton.classList.add("text-white");
            mobileMenuButton.classList.remove("text-black");
        }
    });
</script>
