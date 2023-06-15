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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Edit Peminjaman Barang</h1>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Barang</label>
                        <input class="form-control" type="text" placeholder="Laptop" disabled>

                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Merk</label>
                        <input class="form-control" type="text" placeholder="Asus" disabled>

                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Jumlah</label>
                        <input class="form-control" type="text" placeholder="Laptop" disabled>

                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Tanggal Pinjam</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control form-control-md" disabled/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Maksimal Tanggal Kembali</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control form-control-md" disabled/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Tanggal Kembali</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control form-control-md" disabled/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Catatan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Unggah Surat</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Browse</label>
                              </div>
                        
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Status</label>
                            <input type="text" readonly class="form-control-plaintext" id="staticStatus" value="Pending">

                        <a href="/peminjaman-user" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                             Simpan</a>
                            
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