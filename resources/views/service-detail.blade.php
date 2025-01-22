@extends('layouts.app')

@section('title', $service->name)

@section('content')
    <!-- Service Detail Section -->
    <section id="service-detail" class="py-16 bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div class="container mx-auto px-4 mt-6">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12">{{ $service->name }}</h2>

            <!-- Layout 2 Kolom -->
            <div class="flex flex-col md:flex-row bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">
                <!-- Kolom Kiri -->
                <div
                    class="w-full md:w-1/2 bg-gray-900 p-8 flex flex-col items-center justify-center transition duration-300 hover:shadow-xl">
                    <!-- Gambar Ikon Layanan -->
                    <div class="mb-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/' . $service->icon) }}" alt="Ikon {{ $service->name }}"
                            class="w-60 h-60 object-cover rounded-md shadow-lg">
                    </div>
                    <!-- Tombol Order -->
                    <a href="{{ route('order', ['service_id' => $service->id]) }}"
                        class="inline-block bg-yellow-500 text-white py-3 px-8 rounded-full text-lg font-medium hover:bg-yellow-600 transition duration-300 shadow-md hover:scale-105">
                        Pesan Sekarang
                    </a>
                </div>

                <!-- Kolom Kanan -->
                <div
                    class="w-full md:w-1/2 bg-gray-800 p-8 border-l border-gray-700 text-gray-300 rounded-r-lg shadow-inner">
                    <!-- Deskripsi Layanan -->
                    <h3 class="text-xl font-bold mb-4 text-gray-100">Tentang Layanan</h3>
                    <p class="text-lg leading-relaxed text-justify">
                        {{ $service->description }}
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection
