@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section id="contact" class="py-16 bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div class="container mx-auto px-4 mt-6">
            <!-- Header Section -->
            <h2 class="text-4xl font-extrabold text-center text-white mb-8 pt-8">Kontak Kami</h2>
            <p class="text-center text-gray-200 text-lg max-w-2xl mx-auto mb-12">
                Ada pertanyaan atau ingin mengetahui lebih lanjut tentang layanan kami? Jangan ragu untuk menghubungi kami.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-100 mb-6">Kirim Pesan</h3>
                    <form action="{{ url('/contact') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300">Nama Anda</label>
                            <input type="text" id="name" name="name" required
                                class="mt-2 block w-full p-4 border border-gray-600 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-300">Nomor Telepon Anda</label>
                            <input type="tel" id="phone" name="phone" required
                                class="mt-2 block w-full p-4 border border-gray-600 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-300">Pesan Anda</label>
                            <textarea id="message" name="message" rows="4" required
                                class="mt-2 block w-full p-4 border border-gray-600 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-800"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full py-3 px-4 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Kirim Pesan
                        </button>
                    </form>

                </div>

                <!-- Contact Information -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-100 mb-6">Hubungi Kami</h3>
                    <p class="text-gray-300 mb-4">Kami siap membantu! Berikut cara untuk menghubungi kami:</p>
                    <ul class="space-y-6">
                        <li class="flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 2v4M8 2v4m-4 6h16m-7 9a2 2 0 11-4 0 2 2 0 014 0zm5-6H6a2 2 0 00-2 2v3a2 2 0 002 2h12a2 2 0 002-2v-3a2 2 0 00-2-2z">
                                </path>
                            </svg>
                            <span>Setiap Hari</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10l1.5-1.5A2 2 0 016 8h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-1.5-.5L3 20V10z">
                                </path>
                            </svg>
                            <span>+62 895-3001-0370</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10a1 1 0 011-1h.28a1 1 0 01.917.606l1.034 2.067a2 2 0 003.564 0l1.034-2.067A1 1 0 0111.72 9H20a1 1 0 011 1v4.5a2.5 2.5 0 11-5 0v-.5a1 1 0 00-1-1H9a1 1 0 00-1 1v.5a2.5 2.5 0 11-5 0V10z">
                                </path>
                            </svg>
                            <span>Jl. Panji-Pasadama, Tialatang Kamang, Agam</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Alert -->
    <script>
        const form = document.getElementById('contact-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission for demo purposes

            // Display alert
            const alertMessage = document.getElementById('alert-message');
            alertMessage.classList.remove('hidden');

            // Hide the alert after 3 seconds
            setTimeout(() => {
                alertMessage.classList.add('hidden');
            }, 3000);
        });
    </script>
@endsection
