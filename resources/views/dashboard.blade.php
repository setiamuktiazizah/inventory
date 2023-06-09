<!DOCTYPE html>
<html lang="en">
{{-- @dd($jumlah_addItem) --}}
<head>
    <title>Sistem Inventori</title>
    @include ('template-dashboard.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include ('template-dashboard.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include ('template-dashboard.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <div class="row">

                <!-- CARD ALL USER TYPE-->
                        <!-- Card Barang -->
                        <div class="position-relative col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            <a href="/data-barang" class="stretched-link">Barang</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_item }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pencil-ruler fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- CARD ADMIN -->
                        <!-- Card Pengadaan Barang -->
                        @canany (['operator', 'admin']) 
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a href="/pengadaan-barang">Pengadaan Barang</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_addItem }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Pengurangan Barang --> 
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                <a href="/pengurangan-barang">Pengurangan Barang</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_reduceItem }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-minus-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcanany

                <!-- CARD OPERATOR  -->
                        <!-- Card Penminjaman Barang -->
                        @canany (['operator', 'admin']) 
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="position-relative card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a href="pengajuan-peminjaman-operator" class="stretched-link">Ajuan Peminjaman</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_ajuan }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a href="/peminjaman-operator" class="stretched-link">Peminjaman</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_dipinjam }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-inbox fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a href="/pengembalian-operator" class="stretched-link">Pengembalian</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_kembali }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcanany 

                <!-- CARD USER -->
                        <!-- Card Pengajuan Peminjaman Barang -->
                        @can('user')
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a href="/peminjaman-user">Pengajuan Peminjaman Barang</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_ajuan }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include ('template-dashboard.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel" >Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-primary" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
@include ('template-dashboard.script')
</body>

</html>