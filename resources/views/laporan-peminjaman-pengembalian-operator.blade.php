<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Inventori</title>
    @include ('template-operator.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include ('template-operator.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include ('template-operator.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Laporan Peminjaman Pengembalian Operator</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" class=" float-right d-none d-md-inline-block btn btn-md btn-dark shadow-md mr-4" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-download fa-md text-white-50"></i> Unduh PDF</a>
                        <a href="#" class="float-right d-none d-md-inline-block btn btn-md btn-dark shadow-md mr-4" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-download fa-md text-white-50"></i> Unduh Excel</a>
                        <a href="#" class="float-right d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#periodeModal">
                            <i class="fas fa-download fa-md text-white-50"></i> Periode</a>
                    </div>
                </div>                

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Tgl Kembali</th>
                                        <th>Surat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>22/03/2023</td>
                                        <td>pathfile</td>
                                        <td><mark class="bg-success">Done</span></mark></td>
                                        <td>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>22/03/2023</td>
                                        <td>pathfile</td>
                                        <td><mark class="bg-success">Done</span></mark></td>
                                        <td>                                            
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>22/03/2023</td>
                                        <td>pathfile</td>
                                        <td><mark class="bg-success">Done</span></mark></td>
                                        <td>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
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
            @include ('template-operator.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Periode -->
    <div class="modal fade" id="periodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Periode</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user">
                            <div class="form-group row justify-content-between mb-lg-4">
                                <div class="col-sm-4">
                                    <h6 class="h6 text-blue-100 mb-1">Tanggal Awal</h6>
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="date" class="form-control form-control-sm" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="h6 text-blue-100 mb-1">Tanggal Akhir</h6>
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="date" class="form-control form-control-sm" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary">Simpan</a>
                    </div>
                </div>
            </div>
        </div>

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

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Peminjaman dan Pengembalian</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                    <div class="form-group row mb-lg-4">
                        <div class="col-sm-4">
                            <h6 class="h6 text-blue-100 mb-1">Kategori</h6>
                            <!-- <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Kategori"> -->
                                <input class="form-control form-control-sm" list="categories" name="category" id="category">
                                <datalist id="categories">
                                    <option value="Aset">
                                    <option value="Bolpen">
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Barang</h6>
                                <input class="form-control form-control-sm" list="items" name="item" id="item">
                                <datalist id="items">
                                    <option value="Laptop">
                                    <option value="Bolpen">
                                    <option value="LCD">
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Merk</h6>
                                <input class="form-control form-control-sm" list="brands" name="brand" id="brand">
                                <datalist id="brands">
                                    <option value="ASUS">
                                    <option value="Snowman">
                                    <option value="Olaf">
                                </datalist>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="/">Simpan</a>
                </div>
            </div>
        </div>
    </div>
@include ('template-operator.script')
</body>

</html>