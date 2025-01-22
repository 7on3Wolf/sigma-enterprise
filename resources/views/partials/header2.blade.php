 {{-- <header class="bg-white shadow-md py-4 px-6">
     <div class="flex items-center justify-between">
         <div class="flex items-center">
             <button class="lg:hidden text-xl" id="menu-toggle">
                 <i class="fas fa-bars"></i>
             </button>
             {{-- <a href="/" class="text-xl font-bold text-gray-900">Sigma Enterprise</a> --}}
 {{-- </div>
         <div class="flex items-center space-x-4">
             @auth
                 <div class="relative">
                     <button id="dropdownProfile" class="flex items-center space-x-2">
                         <img src="{{ auth()->user()->profile_picture }}" alt="Profile" class="w-8 h-8 rounded-full">
                         <span class="text-gray-700">{{ auth()->user()->name }}</span>
                     </button>
                     <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
                         <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             Logout
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                             @csrf
                         </form>
                     </div>
                 </div>
             @else
                 <a href="{{ route('login') }}" class="text-gray-700">Login</a>
             @endauth
         </div>
     </div> --}}
 {{-- </header> --}}
 <div id="main">
     <header class="mb-3">
         <a href="#" class="burger-btn d-block d-xl-none">
             <i class="bi bi-justify fs-3"></i>
         </a>
     </header>
