@extends('layouts.app2')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <!-- Service Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-briefcase-fill display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Service</h5>
                        <p class="card-text">Kelola layanan dan tambahkan layanan baru.</p>
                        <a href="{{ route('admin.service') }}" class="btn btn-primary">Kelola Service</a>
                    </div>
                </div>
            </div>

            <!-- Category Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-tags-fill display-4 text-success"></i>
                        <h5 class="card-title mt-3">Category</h5>
                        <p class="card-text">Kelola kategori dan tambahkan kategori baru.</p>
                        <a href="{{ route('admin.categories') }}" class="btn btn-success">Kelola Category</a>
                    </div>
                </div>
            </div>


            <!-- Pesanan Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-card-list display-4 text-success"></i>
                        <h5 class="card-title mt-3">Pesanan</h5>
                        <p class="card-text">Kelola semua pesanan pelanggan secara efisien.</p>
                        <a href="/admin/orders" class="btn btn-success">Lihat Pesanan</a>
                    </div>
                </div>
            </div>

            <!-- Pesanan Selesai Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-clipboard-check display-4 text-success"></i>
                        <h5 class="card-title mt-3">Pesanan Selesai</h5>
                        <p class="card-text">Lihat pesanan yang telah berhasil diselesaikan.</p>
                        <a href="/admin/completed-orders" class="btn btn-success">Lihat Pesanan Selesai</a>
                    </div>
                </div>
            </div>

            <!-- Pesanan Diterima Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-bag-check display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Pesanan Diterima</h5>
                        <p class="card-text">Lihat pesanan yang telah diterima oleh mitra.</p>
                        <a href="/admin/accepted-orders" class="btn btn-primary">Lihat Pesanan Diterima</a>
                    </div>
                </div>
            </div>


            <!-- Pesanan Gagal Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-exclamation-triangle-fill display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Pesanan Gagal</h5>
                        <p class="card-text">Lihat dan kelola pesanan yang gagal diproses dengan mudah.</p>
                        <a href="/admin/failed-orders" class="btn btn-warning">Lihat Pesanan Gagal</a>
                    </div>
                </div>
            </div>


            <!-- Laporan Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-bar-chart-fill display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Laporan</h5>
                        <p class="card-text">Analisis performa bisnis Anda melalui laporan lengkap.</p>
                        <a href="/admin/reports" class="btn btn-warning">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Layout Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-layout-text-window-reverse display-4 text-secondary"></i>
                        <h5 class="card-title mt-3">Layout</h5>
                        <p class="card-text">Kelola tata letak halaman seperti Home, About, dan lainnya.</p>
                        <a href="/layout/home" class="btn btn-secondary">Kelola Layout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

@endsection
