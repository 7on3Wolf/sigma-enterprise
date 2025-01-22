@extends('layouts.app')

@section('title', 'Partners')

@section('content')
    <!-- Partners Section -->
    <section id="order" class="bg-gradient-to-r from-black via-gray-900 to-black py-16 text-gray-100">
        <div class="container mx-auto px-4 mt-6">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12">Our Partners</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12 items-center">

                <!-- Partner 1 -->
                <div
                    class="flex justify-center flex-col items-center text-center transform transition-transform hover:scale-105">
                    <img src="https://via.placeholder.com/150" alt="Partner 1"
                        class="w-32 h-32 rounded-full border-4 border-white shadow-lg transition-shadow duration-300 hover:shadow-2xl mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">John Doe</h3>
                    <p class="text-gray-300 mb-4">CEO, Tech Innovations</p>
                    <p class="text-gray-400">Leading the way in cutting-edge technology solutions. Passionate about
                        innovation and teamwork.</p>
                </div>

                <!-- Partner 2 -->
                <div
                    class="flex justify-center flex-col items-center text-center transform transition-transform hover:scale-105">
                    <img src="https://via.placeholder.com/150" alt="Partner 2"
                        class="w-32 h-32 rounded-full border-4 border-white shadow-lg transition-shadow duration-300 hover:shadow-2xl mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Jane Smith</h3>
                    <p class="text-gray-300 mb-4">Founder, GreenTech Solutions</p>
                    <p class="text-gray-400">Expert in sustainable energy solutions, dedicated to eco-friendly projects and
                        future technologies.</p>
                </div>

                <!-- Partner 3 -->
                <div
                    class="flex justify-center flex-col items-center text-center transform transition-transform hover:scale-105">
                    <img src="https://via.placeholder.com/150" alt="Partner 3"
                        class="w-32 h-32 rounded-full border-4 border-white shadow-lg transition-shadow duration-300 hover:shadow-2xl mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Robert Brown</h3>
                    <p class="text-gray-300 mb-4">CTO, Cyber Solutions</p>
                    <p class="text-gray-400">Cybersecurity specialist, passionate about creating safe and secure digital
                        experiences for businesses.</p>
                </div>

                <!-- Partner 4 -->
                <div
                    class="flex justify-center flex-col items-center text-center transform transition-transform hover:scale-105">
                    <img src="https://via.placeholder.com/150" alt="Partner 4"
                        class="w-32 h-32 rounded-full border-4 border-white shadow-lg transition-shadow duration-300 hover:shadow-2xl mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Alice Williams</h3>
                    <p class="text-gray-300 mb-4">COO, InnovateX</p>
                    <p class="text-gray-400">Passionate about driving business growth and scaling up operations for
                        tech-driven companies.</p>
                </div>

                <!-- Partner 5 -->
                <div
                    class="flex justify-center flex-col items-center text-center transform transition-transform hover:scale-105">
                    <img src="https://via.placeholder.com/150" alt="Partner 5"
                        class="w-32 h-32 rounded-full border-4 border-white shadow-lg transition-shadow duration-300 hover:shadow-2xl mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Michael Clark</h3>
                    <p class="text-gray-300 mb-4">Business Development Manager, GlobalTech</p>
                    <p class="text-gray-400">Building strategic partnerships and leading business expansion in the tech
                        industry.</p>
                </div>

            </div>
        </div>
    </section>
@endsection
