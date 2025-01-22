@extends('layouts.app2')

@section('title', 'Pesanan Selesai')

@section('content')
    <div class="container mt-5">
        <h2 class="text-3xl font-bold text-center mb-8">Pesanan Selesai</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Pesanan Selesai -->
        <div class="table-responsive rounded-lg shadow-lg">
            <table id="example" class="table table-striped" style="width:100%">
                <thead class="bg-gray-800 text-gray-100 text-center">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tanggal Pesanan</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Struk</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $order->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-success text-white">{{ $order->progress_status }}</span>
                            </td>
                            <td class="text-center">{{ $order->order_date }}</td>
                            <td class="text-center">{{ number_format($order->price, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $order->receipt }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    @if ($order->receipt)
                                        <button class="btn btn-success btn-sm" disabled>
                                            Done
                                        </button>
                                    @else
                                        <!-- Jika struk belum dibuat, tampilkan tombol "Buat Struk" -->
                                        <a href="{{ route('admin.generateReceipt', $order->id) }}"
                                            class="btn btn-primary btn-sm" target="_blank">
                                            Buat Struk
                                        </a>
                                    @endif
                                    |
                                    <form id="sendReceiptForm-{{ $order->id }}"
                                        action="{{ route('order.sendReceiptViaWhatsApp', $order->id) }}" method="GET"
                                        target="_blank">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Kirim
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada pesanan yang selesai.</td>
                            <!-- Kolom untuk harga menambah satu -->
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection

<!-- Inisialisasi DataTable -->
<script>
    function openWhatsAppInNewTab(orderId) {
        // Ambil form berdasarkan ID
        const form = document.getElementById(`sendReceiptForm-${orderId}`);

        // Ambil URL dari atribut 'action' form
        const url = form.getAttribute('action');

        // Buka URL di tab baru
        window.open(url, '_blank');
    }

    $(document).ready(function() {
        $('#completedOrdersTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ entri",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                },
                "zeroRecords": "Tidak ada data yang ditemukan",
            },
            "pageLength": 5,
        });
    });
</script>
