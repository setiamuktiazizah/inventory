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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Tambah Pengembalian Barang</h1>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <form class="user" id="userData" >
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Nama Barang</label>
                            <select class="custom-select">
                                <option selected>Pilih</option>
                                <option value="1">Laptop</option>
                                <option value="2">Proyektor</option>
                                <option value="3">Speaker</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Tanggal</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control form-control-md" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="note" name="note">Dipinjam untuk keperluan himpunan mahasiswa</textarea>
                    </div>
                    </form>
                        <a href="/pengembalian-operator" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
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