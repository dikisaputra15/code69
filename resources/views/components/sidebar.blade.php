<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ Route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">FOODCOURT</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ Route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<?php if(auth()->user()->roles == 'admin'){ ?>
<!-- Heading -->
<div class="sidebar-heading">
    Master
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ Route('user.index') }}">Management User</a>
            <a class="collapse-item" href="{{ Route('meja.index') }}">No Meja</a>
            <a class="collapse-item" href="{{ Route('kategori.index') }}">Kategori</a>
            <a class="collapse-item" href="{{ Route('warung.index') }}">Warung</a>
            <a class="collapse-item" href="{{ Route('produk.index') }}">Produk</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Laporan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/transaksi">Laporan Penjualan</a>
            <a class="collapse-item" href="/lapwarunglaris">Laporan Warung Terlaris</a>
            <a class="collapse-item" href="/lapproduklaris">Laporan Produk Terlaris</a>
        </div>
    </div>
</li>
<?php } ?>

<?php if(auth()->user()->roles == 'penjual'){ ?>
    <!-- Heading -->
<div class="sidebar-heading">
    Pesanan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pesanan</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/allpesanan">Pesanan</a>
        </div>
    </div>
</li>

<div class="sidebar-heading">
    Laporan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/transaksi">Laporan Penjualan</a>
            <a class="collapse-item" href="/lapwarunglaris">Laporan Warung Terlaris</a>
            <a class="collapse-item" href="/lapproduklaris">Laporan Produk Terlaris</a>
        </div>
    </div>
</li>
<?php } ?>

<?php if(auth()->user()->roles == 'pemilik'){ ?>
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/transaksi">Laporan Penjualan</a>
                <a class="collapse-item" href="/lapwarunglaris">Laporan Warung Terlaris</a>
                <a class="collapse-item" href="/lapproduklaris">Laporan Produk Terlaris</a>
            </div>
        </div>
    </li>
<?php } ?>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
