<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Inventori</title>
    @include ('template-peminjam.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include ('template-peminjam.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include ('template-peminjam.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Peminjaman Barang</h1>
                        <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahPeminjaman">
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
                                        <th>Nama Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Maks Tgl Kembali</th>
                                        <th>Tgl Kembali</th>
                                        <th>Note</th>
                                        <th>Surat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>

                                        <td>1</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>25-05-2023</td>
                                        <td>28-05-2023</td>
                                        <td>27-05-2023</td>
                                        <td>Kondisi baik</td>
                                        <td>Path</td>
                                        <td><div class="badge-pill badge-success">Done</span></div></td>  
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Proyektor</td>
                                        <td>Epson</td>
                                        <td>1</td>
                                        <td>25-05-2023</td>
                                        <td>28-05-2023</td>
                                        <td>27-05-2023</td>
                                        <td>Kondisi baik</td>
                                        <td>Path</td>
                                        <td><div class="badge-pill badge-success">Done</span></div></td> 
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Spidol</td>
                                        <td>Snowman</td>
                                        <td>1</td>
                                        <td>25-05-2023</td>
                                        <td>28-05-2023</td>
                                        <td>27-05-2023</td>
                                        <td>Kondisi baik</td>
                                        <td>Path</td>
                                        <td><div class="badge-pill badge-success">Done</span></div></td> 
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Speaker</td>
                                        <td>Sony</td>
                                        <td>1</td>
                                        <td>25-05-2023</td>
                                        <td>28-05-2023</td>
                                        <td>27-05-2023</td>
                                        <td>Kondisi baik</td>
                                        <td>Path</td>
                                        <td><div class="badge-pill badge-success">Done</span></div></td> 
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>25-05-2023</td>
                                        <td>28-05-2023</td>
                                        <td>27-05-2023</td>
                                        <td>Kondisi baik</td>
                                        <td>Path</td>
                                        <td><div class="badge-pill badge-success">Done</span></div></td> 
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
            @include ('template-peminjam.footer')
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
                    <a class="btn btn-primary" href="/login">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Data Peminjaman Modal-->
    <div class="modal fade" id="tambahPeminjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Peminjaman Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Barang</h6>
                                <!-- <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Kategori"> -->
                                    <input class="form-control form-control-sm" list="categories" name="category" id="category">
                                    <datalist id="categories">
                                        <option value="Aset">
                                        <option value="Bolpen">
                                    </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Merk</h6>
                                <input class="form-control form-control-sm" list="items" name="item" id="item">
                                <datalist id="items">
                                    <option value="Laptop">
                                    <option value="Bolpen">
                                    <option value="LCD">
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jumlah</h6>
                                <input min="1" type="number" id="quantity" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="form-group row mb-lg-4 justify-content-between">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Tgl Pinjam</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Max. Tgl Kembali</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="formFileSm" class="form-label h6 text-blue-100 mb-1">Unggah Surat</label>
                            <input class="form-control form-control-sm" id="formFilesm" type="file">
                        </div>   
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label h6 text-blue-100 mb-1">Note</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary">Simpan</a>
                </div>
            </div>
        </div>
    </div>

    
@include ('template-peminjam.script')
</body>

</html>