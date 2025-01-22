@extends('layouts.app2')

@section('title', 'Pesanan Diterima')

@section('content')
    <div class="container py-5">
        <h2 class="text-3xl font-bold text-center mb-8">Pesanan Diterima</h2>

        <!-- Alert jika ada pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Pesanan -->
        <div class="table-responsive rounded-lg shadow-lg">
            <table id="example" class="table table-striped" style="width:100%">
                <thead class="bg-gray-800 text-gray-100 text-center">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Catatan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tanggal Pesanan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->notes }}</td>
                            <td>
                                @if ($order->progress_status === 'on going')
                                    <span class="badge bg-warning text-dark">On Going</span>
                                @elseif ($order->progress_status === 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td>{{ $order->order_date }}</td>
                            <td>
                                <!-- Tombol untuk membuka modal -->
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#completeOrderModal-{{ $order->id }}">
                                    Tandai Selesai
                                </button>
                            </td>
                        </tr>

                        <!-- Modal untuk input harga -->
                        <div class="modal fade" id="completeOrderModal-{{ $order->id }}" tabindex="-1"
                            aria-labelledby="completeOrderModalLabel-{{ $order->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="completeOrderModalLabel-{{ $order->id }}">Tandai
                                            Pesanan Selesai</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.orders.complete', $order->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="price-{{ $order->id }}" class="form-label">Harga</label>
                                                <input type="text" class="form-control format-price"
                                                    id="price-{{ $order->id }}" name="price"
                                                    placeholder="Masukkan harga" required>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada pesanan yang diterima.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formatPriceInputs = document.querySelectorAll('.format-price');

            formatPriceInputs.forEach(input => {
                // Menangani input saat mengetik
                input.addEventListener('input', function(e) {
                    let value = this.value.replace(/\./g, ''); // Menghapus titik yang ada

                    // Cek apakah input adalah angka valid
                    if (!isNaN(value)) {
                        this.value = value; // Menyimpan angka tanpa format titik
                    }
                });

                // Sebelum form disubmit, bersihkan titik agar server menerima angka bersih
                input.closest('form').addEventListener('submit', function() {
                    // Hilangkan titik yang diformat
                    input.value = input.value.replace(/\./g, '');
                });
            });
        });


        $(document).ready(function() {
            $('#accepted-orders').DataTable({
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



@endsection
