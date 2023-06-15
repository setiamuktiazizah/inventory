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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Detail Peminjaman</h1>
                </div>            

                {{-- @dd($previous_request) --}}
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="/peminjaman-end" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <input hidden type="text" id="id_category" name="id_category" value="{{ $previous_request->id_category }}"> --}}
                            <input hidden type="date" id="loan_date" name="loan_date" value="{{ $previous_request->loan_date }}">
                            <input hidden type="text" id="id_item" name="id_item" value="{{ $previous_request->id_item }}">

                            <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Maksimal Tanggal Kembali</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-md" id="max_return_date" name="max_return_date"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Catatan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="note" name="note"></textarea>
                        
                            <button name="submit" type="submit" class="btn btn-primary mt-4 float-right">
                                <i class="fas fa-plus fa-md text-white-50"></i>   Ajukan Peminjaman 
                            </button>
                        </form>
                        {{-- <a href="/peminjaman-user" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                             Ajukan Peminjaman    <i class="fas fa-arrow-right fa-md text-white-50"></i></a>
                             --}}
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