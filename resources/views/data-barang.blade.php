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
                <h1 class="h3 mb-2 font-weight-bold text-primary">Data Barang</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Barcode</th>
                                        <th>Nama Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah Barang</th>
                                        <th>Kondisi</th>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>A12345</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>B12345</td>
                                        <td>LCD</td>
                                        <td>Toshiba</td>
                                        <td>1</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>C12345</td>
                                        <td>Speaker</td>
                                        <td>Sony</td>
                                        <td>1</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>D12345</td>
                                        <td>Mouse</td>
                                        <td>Logitech</td>
                                        <td>1</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>E12345</td>
                                        <td>Proyektor</td>
                                        <td>Hitachi</td>
                                        <td>1</td>
                                        <td><span class="badge badge-success">Done</span></td>
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