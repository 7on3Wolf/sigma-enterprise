@extends('layouts.app2')

@section('title', 'Services')

@section('content')
    <!-- Tabel Services Section -->

    <div class="container mx-auto px-4 mt-6 mb-11">
        <h2 class="text-3xl font-bold text-center mb-8">Layanan Kami</h2>

        <!-- Tombol Create Jasa -->
        <div class="mb-4 text-right">
            <a href="{{ route('admin.service.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus-circle"></i> Tambah Jasa
            </a>
        </div>

        <!-- DataTable -->
        <div class="table-responsive rounded-lg shadow-lg">
            <table id="example" class="table table-striped" style="width:100%">
                <thead class="bg-gray-800 text-gray-100 text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama Layanan</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Ikon</th>
                        <th class="text-center">Aksi</th>

                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800 text-center">
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($service->description, 50, '...') }}</td>
                            <td>{{ $service->category->name }}</td>
                            <td>
                                <img src="{{ asset('images/' . $service->icon) }}" alt="Ikon {{ $service->name }}">
                            </td>


                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.service.edit', $service->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.service.delete', $service->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection

@section('scripts')
    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#servicesTable').DataTable({
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                language: {
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Tidak ada data ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data tersedia",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    search: "Cari:",
                    paginate: {
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endsection

<style>
    .table img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        /* Untuk membuat gambar menjadi lingkaran */
        object-fit: cover;
        /* Agar gambar tidak terdistorsi */
    }
</style>
