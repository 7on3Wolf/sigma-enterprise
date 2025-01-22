@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <!-- Login Section -->
    <section id="login" class="bg-gradient-to-r from-black via-gray-900 to-black py-16 text-gray-100">
        <div class="container mx-auto px-4 mt-6">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12 py-6">Formulir Login</h2>

            <!-- Form Card -->
            <!-- Form Card -->
            <div class="max-w-lg mx-auto bg-gray-900 text-gray-100 rounded-2xl shadow-xl p-10">
                <!-- Cek apakah user sudah login -->
                @auth
                    <p class="text-lg text-center font-semibold text-gray-300">Anda sudah login!</p>
                @else
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold text-gray-400 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-4 focus:ring-blue-500 focus:outline-none focus:border-blue-500 text-gray-100 transition duration-200 placeholder-gray-500"
                                placeholder="Masukkan nama Anda">
                        </div>

                        <!-- Password -->
                        <div class="mb-6 relative">
                            <label for="password" class="block text-sm font-semibold text-gray-400 mb-2">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-4 focus:ring-blue-500 focus:outline-none focus:border-blue-500 text-gray-100 transition duration-200 placeholder-gray-500"
                                placeholder="Masukkan password Anda">
                            <!-- Eye Icon -->
                            <span class="absolute right-4 top-10 cursor-pointer text-gray-400" id="togglePassword">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-9c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 3 12 3z" />
                                </svg>
                            </span>
                        </div>

                        <!-- Checkbox Remember Me -->
                        <div class="mb-6 flex items-center">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-5 w-5 bg-gray-800 text-blue-500 rounded border-gray-700 focus:ring-4 focus:ring-blue-500 focus:outline-none">
                            <label for="remember" class="ml-2 text-sm text-gray-400">Ingat saya</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition duration-200 transform hover:scale-105 focus:ring-4 focus:ring-blue-500">
                            Login
                        </button>
                    </form>
                @endauth
            </div>

            <!-- Script -->
            <script>
                const togglePassword = document.querySelector("#togglePassword");
                const passwordField = document.querySelector("#password");

                togglePassword.addEventListener("click", function() {
                    // Toggle the type attribute between 'password' and 'text'
                    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                    passwordField.setAttribute("type", type);

                    // Change the icon (toggle between open and closed eye)
                    this.innerHTML = type === "password" ?
                        `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-9c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 3 12 3z" />
            </svg>` :
                        `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 4.5c5.523 0 10 4.477 10 10s-4.477 10-10 10-10-4.477-10-10S6.477 4.5 12 4.5zm0 7.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
            </svg>`;
                });
            </script>


        </div>
    </section>
@endsection
