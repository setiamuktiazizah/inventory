<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Inventori</title>
    @include ('template-admin.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include ('template-admin.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include ('template-admin.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengadaan Barang</h1>
                        <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a>
                </div>                

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Jenis Pengadaan</th>
                                        <th>Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include ('template-admin.footer')
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
                    <a class="btn btn-primary" href="/">Keluar</a>
                </div>
            </div>
        </div>
    </div>

@include ('template-admin.script')
</body>

</html>