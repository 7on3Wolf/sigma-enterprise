@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="h-screen flex items-center justify-center bg-cover bg-center relative"
        style="background-image: url('/images/hero.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container mx-auto px-6 md:px-12 lg:px-16 py-16 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                Welcome to Sigma Enterprise
            </h1>

            <p class="text-lg md:text-xl text-gray-200 mb-8 mx-auto max-w-3xl leading-relaxed opacity-80">
                Menyediakan layanan pemasangan dan perbaikan profesional dan menjadi solusi terbaik untuk semua kebutuhan
                Anda.
            </p>
            <div class="space-x-4 flex justify-center flex-wrap">
                <!-- Button Explore Services -->
                <a href="{{ route('services') }}"
                    class="relative inline-block px-10 py-4 font-bold text-lg text-white bg-gray-800 rounded-full shadow-md border-2 border-gray-600 transform transition-all duration-500 hover:scale-105 hover:bg-gray-700 hover:text-gray-200 group mb-4 sm:mb-0">
                    <span
                        class="absolute inset-0 w-full h-full bg-gray-700 opacity-0 rounded-full blur-md group-hover:opacity-20 transition-opacity duration-500"></span>
                    <span class="relative z-10">Explore Services</span>
                </a>

                <!-- Button Contact Us -->
                <a href="{{ route('contact') }}"
                    class="relative inline-block px-10 py-4 font-bold text-lg text-gray-800 bg-gray-200 rounded-full shadow-md border-2 border-gray-800 transform transition-all duration-500 hover:scale-105 hover:bg-gray-800 hover:text-gray-200 group mb-4 sm:mb-0">
                    <span
                        class="absolute inset-0 w-full h-full bg-gray-800 opacity-0 rounded-full blur-md group-hover:opacity-20 transition-opacity duration-500"></span>
                    <span class="relative z-10">Contact Us</span>
                </a>
            </div>

        </div>
    </section>


    <section id="about" class="py-24 bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div class="container mx-auto px-6">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <h2
                    class="text-5xl font-extrabold text-white leading-tight mb-4 tracking-wide animate__animated animate__fadeIn">
                    Tentang Sigma Enterprise
                </h2>
                <p class="text-lg md:text-xl max-w-3xl mx-auto text-gray-300 opacity-80">
                    Sigma Enterprise adalah penyedia layanan pemasangan dan perbaikan profesional, berkomitmen untuk
                    memberikan solusi
                    terbaik
                    bagi segala kebutuhan pemasangan Anda, dengan standar kualitas tinggi dan kepercayaan pelanggan sebagai
                    prioritas utama.
                </p>
            </div>

            <!-- Content Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                <!-- Image Section -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/icon.png') }}" alt="About Us Image"
                        class="rounded-3xl shadow-xl border-4 border--100 w-full max-w-xl">
                </div>

                <!-- Text Section -->
                <div class="space-y-12">
                    <div>
                        <h3 class="text-3xl font-semibold text-white mb-6">Misi Kami</h3>
                        <p class="text-lg text-gray-300 leading-relaxed opacity-90">
                            Misi kami adalah menyediakan layanan pemasangan yang berkualitas dan solusi terbaik untuk segala
                            kebutuhan Anda,
                            dengan tujuan tidak hanya memenuhi, tetapi melampaui harapan pelanggan kami, mendorong
                            keberhasilan bersama.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-semibold text-white mb-6">Visi Kami</h3>
                        <p class="text-lg text-gray-300 leading-relaxed opacity-90">
                            Menjadi penyedia utama layanan pemasangan terpercaya, berinovasi untuk menciptakan solusi yang
                            efisien dan
                            berkelanjutan, serta membangun kemitraan jangka panjang dengan pelanggan.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-semibold text-white mb-6">Komitmen Utama Kami</h3>
                        <ul class="space-y-4">
                            <li class="text-lg text-gray-300 opacity-80">
                                <strong>Integritas:</strong> Kami berkomitmen untuk selalu menjaga kejujuran dan
                                profesionalisme dalam
                                setiap layanan yang kami berikan.
                            </li>
                            <li class="text-lg text-gray-300 opacity-80">
                                <strong>Inovasi:</strong> Kami terus mencari solusi baru dan efisien untuk memenuhi tuntutan
                                pasar yang
                                dinamis.
                            </li>
                            <li class="text-lg text-gray-300 opacity-80">
                                <strong>Fokus pada Pelanggan:</strong> Kami selalu berusaha untuk memberikan pengalaman
                                terbaik dengan
                                memahami dan memenuhi setiap kebutuhan pelanggan.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Services Section -->
    <section id="services" class="bg-gradient-to-r from-black via-gray-900 to-black text-gray-100 ">
        <div class="container mx-auto px-4 mt-6 mb-11">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12">Layanan Kami</h2>

            <!-- Loop untuk menampilkan 6 layanan acak -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($services as $service)
                    <a href="{{ route('services.show', $service->id) }}"
                        class="group bg-gray-900 rounded-lg border border-gray-700 shadow-md block overflow-hidden hover:bg-gray-900 transition-all duration-300 ease-in-out">

                        <!-- Gambar Ikon -->
                        <div class="w-full h-48 relative overflow-hidden rounded-t-lg">
                            <img src="{{ asset('images/' . $service->icon) }}" alt="Ikon {{ $service->name }}"
                                class="w-full h-full object-cover transition-all group-hover:scale-105">

                            <!-- Hover Effect: Overlay Description -->
                            <div
                                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white text-lg font-medium text-center px-4">
                                    {{ Str::limit($service->description, 50) }}
                                </p>
                            </div>
                        </div>

                        <!-- Nama Layanan -->
                        <div class="bg-gray-900 p-4 text-center rounded-b-lg">
                            <h3
                                class="text-xl font-semibold text-white group-hover:text-blue-200 transition-colors duration-200">
                                {{ $service->name }}
                            </h3>
                        </div>

                    </a>
                @endforeach
            </div>

            <!-- Tombol "Selanjutnya" -->
            <div class="text-center mt-8">
                <a href="{{ route('services') }}"
                    class="inline-flex items-center text-gray-900 font-bold bg-white hover:bg-yellow-400 py-2 px-6 rounded-full transition-colors duration-300 shadow-md transform hover:scale-105 border-4 border-gray-900">
                    <span>Lainnya</span>
                    <!-- Ikon panah ke kanan -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" viewBox="0 0 20 20" fill="currentColor"
                        fill-rule="evenodd">
                        <path fill-rule="evenodd"
                            d="M10.293 15.293a1 1 0 011.414 0l4-4a1 1 0 010-1.414l-4-4a1 1 0 011.414-1.414l5 5a3 3 0 010 4.242l-5 5a1 1 0 01-1.414-1.414l4-4-4-4a1 1 0 010-1.414l-4 4a1 1 0 011.414 1.414z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>



    <section id="partnert" class="bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div class="container mx-auto px-4 mt-6 py-8 ">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12 animate__animated animate__fadeIn">Our Partners
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-12 items-center">

                <!-- Partner 1 -->
                <div class="flex justify-center transform transition-transform hover:scale-105 ">
                    <img src="{{ asset('images/luffy.jpg') }}" alt="Anime Partner 1"
                        class="w-40 h-58 rounded-lg shadow-lg transition-shadow duration-300 group-hover:scale-105">
                </div>

                <!-- Partner 2 -->
                <div class="flex justify-center transform transition-transform hover:scale-105 ">
                    <img src="{{ asset('images/dragon.jpg') }}" alt="Anime Partner 2"
                        class="w-40 h-58 rounded-lg shadow-lg transition-shadow duration-300 group-hover:scale-105">
                </div>

                <!-- Partner 3 -->
                <div class="flex justify-center transform transition-transform hover:scale-105 ">
                    <img src="{{ asset('images/garp.jpg') }}" alt="Anime Partner 3"
                        class="w-40 h-58 rounded-lg shadow-lg transition-shadow duration-300 group-hover:scale-105">
                </div>

                <!-- Partner 4 -->
                <div class="flex justify-center transform transition-transform hover:scale-105 ">
                    <img src="{{ asset('images/shanks.png') }}" alt="Anime Partner 4"
                        class="w-40 h-58 rounded-lg shadow-lg transition-shadow duration-300 group-hover:scale-105">
                </div>

                <!-- Partner 5 -->
                <div class="flex justify-center transform transition-transform hover:scale-105 ">
                    <img src="{{ asset('images/benn.jpg') }}" alt="Anime Partner 5"
                        class="w-40 h-58 rounded-lg shadow-lg transition-shadow duration-300 group-hover:scale-105">
                </div>

            </div>
        </div>
    </section>






    <div class="py-24 bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div
            class="grid grid-cols-12 gap-4 items-center border-4 border-white py-8 px-4 mx-6 sm:mx-20 rounded-lg shadow-lg">
            <!-- Icon -->
            <div class="col-span-2 flex justify-center mb-4 sm:mb-0">
                <svg class="h-12 w-12 text-white animate__animated animate__pulse animate__infinite"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z" />
                </svg>
            </div>

            <!-- Catatan -->
            <div class="col-span-10">
                <p class="font-semibold text-lg text-yellow-100 mb-2">Catatan Penting</p>
                <p class="text-sm sm:text-base text-gray-300 leading-relaxed">
                    Untuk informasi lebih lanjut mengenai harga jasa yang kami tawarkan, silakan langsung menghubungi admin
                    kami melalui
                    <a href="https://wa.me/6289530010370" target="_blank"
                        class="font-medium text-green-400 hover:text-green-300 hover:underline transition-colors duration-300">WhatsApp</a>.
                    Kami siap membantu Anda dengan layanan terbaik.
                </p>
            </div>
        </div>
    </div>





@endsection
