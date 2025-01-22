@extends('layouts.app2')

@section('title', 'Pesanan Gagal')

@section('content')
    <div class="container py-5">
        <h2 class="text-3xl font-bold text-center mb-8">Pesanan Gagal</h2>

        @if ($failedOrders->isEmpty())
            <p class="text-center text-gray-500">Tidak ada pesanan gagal.</p>
        @else
            <div class="table-responsive rounded-lg shadow-lg">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead class="bg-gray-800 text-gray-100 text-center">
                        <tr>
                            <th class="px-4 py-2 text-center">ID</th>
                            <th class="px-4 py-2 text-center">Service ID</th>
                            <th class="px-4 py-2 text-center">Nama</th>
                            <th class="px-4 py-2 text-center">Telepon</th>
                            <th class="px-4 py-2 text-center">Catatan</th>
                            <th class="px-4 py-2 text-center">Alamat</th>
                            <th class="px-4 py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($failedOrders as $order)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2 text-center">{{ $order->id }}</td>
                                <td class="px-4 py-2 text-center">{{ $order->service_id }}</td>
                                <td class="px-4 py-2 text-center">{{ $order->name }}</td>
                                <td class="px-4 py-2 text-center">{{ $order->phone }}</td>
                                <td class="px-4 py-2 text-center">{{ $order->notes }}</td>
                                <td class="px-4 py-2 text-center">{{ $order->address }}</td>
                                <td class="px-4 py-2 text-center text-red-500 font-bold uppercase">
                                    {{ $order->status }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
