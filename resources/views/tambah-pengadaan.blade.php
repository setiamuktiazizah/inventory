<!DOCTYPE html>
<html lang="en">

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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Tambah Pengadaan Barang</h1>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Kategori</label>
                            <select class="custom-select">
                                <option selected>Pilih</option>
                                <option value="1">Laptop</option>
                                <option value="2">Bolpoin</option>
                                <option value="3">Pensil</option>
                            </select>
                        </div>
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Barang</label>
                        <input class="form-control" type="text" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Merk</label>
                        <input class="form-control" type="text" placeholder="Merk">
                        </div>
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Jumlah</label>
                        <input min="1" type="number" id="quantity" class="form-control form-control-sm" name="quantity" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Harga</label>
                        <input min="1" type="number" id="price" class="form-control form-control-sm" name="price" />
                        </div>
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Tanggal</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control form-control-md" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Jenis Pengadaan</label>
                            <select class="custom-select">
                                <option selected>Pilih</option>
                                <option value="1">Barang Baru</option>
                                <option value="2">Bolpoin</option>
                            </select>
                        </div>
                        <div class="col">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Barcode</label>
                        <input class="form-control" type="text" placeholder="Barcode">
                        </div>
                    </div>
                        <a href="/pengadaan-barang" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                        Tambah Data</a>
                            
                    </div>
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
                    <a class="btn btn-primary" href="/login">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    
@include ('template-dashboard.script')
</body>

</html>