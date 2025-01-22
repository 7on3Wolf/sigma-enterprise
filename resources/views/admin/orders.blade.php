@extends('layouts.app2')

@section('title', 'Daftar Pesanan')

@section('content')

    <div class="container mt-5">
        <h2 class="text-3xl font-bold text-center mb-8">Daftar Pesanan</h2>

        <!-- Menampilkan Pesan Sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Alert Pesanan Masuk -->
        @if ($orders->where('status', 'pending')->count() > 0)
            <div class="alert alert-info">
                <strong>Pesanan Baru!</strong> Ada pesanan yang belum diterima. Segera periksa dan terima pesanan yang
                masuk.
            </div>
        @endif

        <!-- Tabel Data Pesanan -->
        <div class="table-responsive rounded-lg shadow-lg">
            <table id="example" class="table table-striped" style="width:100%">
                <thead class="bg-gray-800 text-gray-100 text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Jasa</th> <!-- Tambahkan kolom Nama Jasa -->
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Catatan</th>
                        <th class="text-center">Tanggal Pesanan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800 text-center">
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @if ($order->service)
                                    {{ $order->service->name }} <!-- Menampilkan Nama Jasa -->
                                @else
                                    <span class="text-danger">Tidak Ada</span>
                                @endif
                            </td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->notes }}</td>
                            <td>{{ $order->order_date }}</td>

                            <td>
                                @if ($order->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($order->status == 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Terima -->
                                <div class="d-flex justify-content-center gap-2">
                                    @if ($order->status == 'pending')
                                        <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST"
                                            target="_blank" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="redirect_to_whatsapp" value="1">
                                            <button type="submit" class="btn btn-success btn-sm">Terima</button>
                                        </form>
                                        <!-- Tombol Tolak -->
                                        <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- Tambahkan DataTables -->
    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable({
                responsive: true,
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endsection
