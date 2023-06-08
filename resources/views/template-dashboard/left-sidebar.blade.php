<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #101540" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-pencil-ruler"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Inventory</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Data Barang -->
<li class="nav-item">
    <a class="nav-link" href="/data-barang">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Barang</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- ADMIN -->
<!-- Nav Item - Pengadaan Barang -->
@can('admin')
<li class="nav-item">
    <a class="nav-link" href="/pengadaan-barang">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Pengadaan Barang</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pengurangan Barang -->
<li class="nav-item">
    <a class="nav-link" href="/pengurangan-barang">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Pengurangan Barang</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Laporan  -->
<li class="nav-item ">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan</span>
    </a>
    <div id="collapsePages" class="collapse " aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Riwayat:</h6>
            <a class="collapse-item" href="/laporan-pengadaan-barang">Pengadaan Barang</a>
            <a class="collapse-item" href="/laporan-pengurangan-barang">Pengurangan Barang</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Manajemen User -->
<li class="nav-item">
    <a class="nav-link" href="/manajemen-user">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Manajemen User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
@endcan

<!-- OPERATOR  -->
<!-- Nav Item - Peminjaman Barang -->
@can('operator')
<!-- Nav Item - Peminjaman Barang -->
<li class="nav-item ">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Peminjaman & Pengembalian Barang</span>
    </a>
    <div id="collapsePages" class="collapse " aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Update:</h6>
            <a class="collapse-item" href="/pengajuan-peminjaman-operator">Ajuan Peminjaman</a>
            <a class="collapse-item" href="/peminjaman-operator">Peminjaman</a>
            <a class="collapse-item" href="/pengembalian-operator">Pengembalian</a>

        </div>
    </div>
</li>
<hr class="sidebar-divider">
@endcan

<!-- USER -->
<!-- Nav Item - Peminjaman Barang -->
@can('user')
<li class="nav-item">
    <a class="nav-link" href="/peminjaman-user">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Peminjaman</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
@endcan

<!-- Nav Item - Akun -->
<li class="nav-item">
    <a class="nav-link" href="/profil">
        <i class="fas fa-fw fa-user"></i>
        <span>Akun</span></a>
</li>

<!-- Heading -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>