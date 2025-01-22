@extends('layouts.app')

@section('title', 'Order')

@section('content')
    <!-- Order Section -->
    <section id="order" class="bg-gradient-to-r from-black via-gray-900 to-black py-16 text-gray-100">
        <div class="container mx-auto px-4 mt-6">
            <h2 class="text-4xl font-extrabold text-center text-white mb-12">Formulir Pemesanan</h2>

            <!-- Form Card -->
            <div class="max-w-lg mx-auto bg-gray-800 rounded-2xl shadow-xl p-10">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}"
                            class="w-full px-4 py-3 border-2 border-gray-600 rounded-xl focus:ring-4 focus:ring-blue-300 focus:border-blue-500 text-white bg-gray-700">
                    </div>

                    <!-- Alamat -->
                    <div class="mb-6">
                        <label for="address" class="block text-sm font-semibold text-gray-300 mb-2">Alamat Lengkap</label>
                        <input type="text" id="address" name="address" required value="{{ old('address') }}"
                            class="w-full px-4 py-3 border-2 border-gray-600 rounded-xl focus:ring-4 focus:ring-blue-300 focus:border-blue-500 text-white bg-gray-700">
                    </div>

                    <!-- Nomor Telepon/WhatsApp -->
                    <div class="mb-6">
                        <label for="phone" class="block text-sm font-semibold text-gray-300 mb-2">Nomor
                            Telepon/WhatsApp</label>
                        <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}"
                            class="w-full px-4 py-3 border-2 border-gray-600 rounded-xl focus:ring-4 focus:ring-blue-300 focus:border-blue-500 text-white bg-gray-700">
                    </div>

                    <!-- Pilihan Jasa -->
                    <div class="mb-6">
                        <label for="service" class="block text-sm font-semibold text-gray-300 mb-2">Pilih Jasa</label>
                        <select id="service" name="service_id" required
                            class="w-full px-4 py-3 border-2 border-gray-600 rounded-xl focus:ring-4 focus:ring-blue-300 focus:border-blue-500 text-white bg-gray-700">
                            <option value="" disabled selected>Pilih Jasa</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ request('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Catatan Tambahan -->
                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-semibold text-gray-300 mb-2">Catatan
                            Tambahan</label>
                        <textarea id="notes" name="notes"
                            class="w-full px-4 py-3 border-2 border-gray-600 rounded-xl focus:ring-4 focus:ring-blue-300 focus:border-blue-500 text-white bg-gray-700"
                            rows="4">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Input untuk tanggal pesanan -->
                    <input type="hidden" name="order_date" value="{{ now() }}">

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:bg-blue-700">
                        Kirim Pesanan
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
