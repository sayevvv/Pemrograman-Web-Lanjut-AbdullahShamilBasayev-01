@php
    $user = Auth::user()->load('level');
@endphp

<div class="sidebar">
    <!-- Profile Picture -->
    <div class="user-panel d-flex flex-column align-items-center text-center mt-2 mb-2 small">
        <a href="{{ url('/profil') }}" class="image mb-2 position-relative">
            <img src="{{ asset('storage/uploads/profile_images/' . ($user->profile_picture ?? 'default-profile.png')) }}"
                class="img-circle elevation-2"
                alt="User Image"
                style="width: 40px; height: 40px; object-fit: cover; border: 2px solid white;">
        </a>
        <div class="info">
            <span class="text-dark">{{ $user->nama }}</span>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline mt-1">
        <div class="input-group input-group-sm" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar btn-sm">
                    <i class="fas fa-search fa-xs"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 small">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} py-1">
                    <i class="nav-icon fas fa-tachometer-alt fa-sm"></i>
                    <p class="mb-0">Dashboard</p>
                </a>
            </li>

            @if($user->hasRole('ADM'))
                <li class="nav-header">Data Pengguna</li>
                <li class="nav-item">
                    <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} py-1">
                        <i class="nav-icon fas fa-layer-group fa-sm"></i>
                        <p class="mb-0">Level User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }} py-1">
                        <i class="nav-icon fas fa-user fa-sm"></i>
                        <p class="mb-0">Data User</p>
                    </a>
                </li>
            @endif

            @if($user->hasRole('ADM') || $user->hasRole('MNG'))
                <li class="nav-header">Data Barang</li>
                <li class="nav-item">
                    <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} py-1">
                        <i class="nav-icon fas fa-bookmark fa-sm"></i>
                        <p class="mb-0">Kategori Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} py-1">
                        <i class="nav-icon fas fa-list-alt fa-sm"></i>
                        <p class="mb-0">Data Barang</p>
                    </a>
                </li>
            @endif

            <li class="nav-header">Data Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{ $activeMenu == 'supplier' ? 'active' : '' }} py-1">
                    <i class="nav-icon fas fa-warehouse fa-sm"></i>
                    <p class="mb-0">Supplier Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} py-1">
                    <i class="nav-icon fas fa-cubes fa-sm"></i>
                    <p class="mb-0">Stok Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }} py-1">
                    <i class="nav-icon fas fa-shopping-cart fa-sm"></i>
                    <p class="mb-0">Penjualan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan_detail') }}" class="nav-link {{ $activeMenu == 'penjualan_detail' ? 'active' : '' }} py-1">
                    <i class="nav-icon fas fa-receipt fa-sm"></i>
                    <p class="mb-0">Detail Penjualan</p>
                </a>
            </li>

            <li class="nav-header">Lainnya</li>
            <li class="nav-item">
                <a href="{{ url('/profil') }}" class="nav-link {{ $activeMenu == 'profil' ? 'active' : '' }} py-1">
                    <i class="nav-icon fas fa-user-circle fa-sm"></i>
                    <p class="mb-0">Profil</p>
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="nav-link py-1" id="logout-btn">
                    <i class="nav-icon fas fa-sign-out-alt fa-sm"></i>
                    <p class="mb-0">Log Out</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
