<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo d-flex align-items-center">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center"
                        style="text-decoration: none;">
                        <img src="{{ asset('images/icon.png') }}" alt="Logo" class="me-2" width="100"
                            height="100">
                        <span class="logo-name" style="font-size: 1.5rem; font-weight: bold; color: #333;">Sigma
                            Enterprise</span>
                    </a>

                </div>

                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <span>Dashboard</span>
                    </a>
                </li>


                <!-- Service -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.service') }}" class='sidebar-link'>
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Service</span>
                    </a>
                </li>

                <!-- Category -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.categories') }}" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i> <!-- Ikon untuk kategori, bisa diganti sesuai keinginan -->
                        <span>Category</span>
                    </a>
                </li>


                <!-- Pesanan -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.orders') }}" class='sidebar-link'>
                        <i class="bi bi-card-list"></i>
                        <span>Pesanan</span>

                        <!-- Tampilkan badge jika ada pesanan baru -->
                        @if ($newOrdersCount > 0)
                            <span
                                class="inline-block bg-yellow-400 text-black font-semibold rounded-full px-2 py-1 text-sm ml-2">
                                {{ $newOrdersCount }}
                            </span>
                        @endif
                    </a>
                </li>

                <!-- Pesanan Selesai -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.completed-orders') }}" class="sidebar-link">
                        <i class="bi bi-check2-square"></i>
                        <span>Pesanan Selesai</span>
                        @if (isset($completedOrdersCount) && $completedOrdersCount > 0)
                            <span
                                class="inline-block bg-green-500 text-white font-semibold rounded-full px-2 py-1 text-sm ml-2">
                                {{ $completedOrdersCount }}
                            </span>
                        @endif
                    </a>
                </li>


                <!-- Pesanan Diterima -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.accepted-orders') }}" class="sidebar-link">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Pesanan Diterima</span>
                        @if (isset($acceptedOrdersCount) && $acceptedOrdersCount > 0)
                            <span
                                class="inline-block bg-blue-500 text-white font-semibold rounded-full px-2 py-1 text-sm ml-2">
                                {{ $acceptedOrdersCount }}
                            </span>
                        @endif
                    </a>
                </li>


                <!-- Pesanan Gagal -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.failedOrders') }}" class="sidebar-link">
                        <i class="bi bi-x-circle-fill"></i>
                        <span>Pesanan Gagal</span>

                        <!-- Tampilkan badge jika ada pesanan gagal -->
                        @if (isset($failedOrdersCount) && $failedOrdersCount > 0)
                            <span
                                class="inline-block bg-red-500 text-white font-semibold rounded-full px-2 py-1 text-sm ml-2">
                                {{ $failedOrdersCount }}
                            </span>
                        @endif
                    </a>
                </li>



                <!-- Laporan -->
                <li class="sidebar-item">
                    <a href="/admin/reports" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <!-- Laporan Customer -->
                <li class="sidebar-item">
                    <a href="/admin/customer-reports" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Laporan Customer</span>
                    </a>
                </li>

                <!-- Layout -->
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-layout-text-window-reverse"></i>
                        <span>Layout</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="/layout/home">Home</a>
                        </li>
                        <li class="submenu-item">
                            <a href="/layout/about">About</a>
                        </li>
                        <li class="submenu-item">
                            <a href="/layout/services">Services</a>
                        </li>
                        <li class="submenu-item">
                            <a href="/layout/order">Order</a>
                        </li>
                        <li class="submenu-item">
                            <a href="/layout/partners">Partners</a>
                        </li>
                        <li class="submenu-item">
                            <a href="/layout/contact">Contact</a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="sidebar-link bg-transparent border-0 text-left w-100">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>

            </ul>
        </div>

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<style>
    .logo img {
        width: 100px !important;
        height: 100px !important;
    }

    .sidebar-item .badge {
        font-size: 0.8rem;
        padding: 5px 10px;
        border-radius: 50%;
        position: absolute;
        top: 5px;
        right: 10px;
    }
</style>
