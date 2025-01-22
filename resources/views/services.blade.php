@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <!-- Services Section -->
    <section id="services" class="py-16 bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div class="container mx-auto px-4 mt-6 mb-11">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12">Layanan Kami</h2>

            <!-- Loop melalui kategori layanan yang sudah dikelompokkan -->
            @foreach ($groupedServices as $categoryId => $servicesByCategory)
                <div class="mb-12">
                    <h3 class="text-3xl font-semibold text-white mb-6">{{ $servicesByCategory->first()->category->name }}
                    </h3>

                    <!-- Grid yang responsif -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                        @foreach ($servicesByCategory as $service)
                            <a href="{{ route('services.show', $service->id) }}"
                                class="group bg-gray-900 rounded-lg border border-gray-700 shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl block overflow-hidden hover:bg-gray-900">

                                <!-- Gambar Ikon -->
                                <div class="w-full h-32 sm:h-48 relative">
                                    <img src="{{ asset('images/' . $service->icon) }}" alt="Ikon {{ $service->name }}"
                                        class="w-full h-full object-cover rounded-t-lg">

                                    <!-- Hover Effect: Overlay Description -->
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-white text-sm sm:text-lg text-center font-medium">
                                            {{ Str::limit($service->description, 50) }}</p>
                                    </div>
                                </div>

                                <!-- Nama Layanan -->
                                <div class="bg-gray-900 p-4 text-center rounded-b-lg">
                                    <h3
                                        class="text-base sm:text-xl font-semibold text-white group-hover:text-gray-300 transition-colors duration-300">
                                        {{ $service->name }}
                                    </h3>
                                </div>

                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Pesanan Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
