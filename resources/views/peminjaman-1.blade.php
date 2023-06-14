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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengajuan Peminjaman Barang</h1>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="/peminjaman-2" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Pilih Kategori</label>
                            <select class="custom-select" id="id_category" name="id_category">
                                <option selected value="">Pilih</option>
                                @foreach($data_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                @endforeach
                            </select>
                            <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Tanggal Pinjam</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="date" class="form-control form-control-md" id="loan_date" name="loan_date" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <button name="submit" type="submit" class="btn btn-success mb-5">Selanjutnya</button>
                            {{-- <a href="/peminjaman-2" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                                 Selanjutnya    <i class="fas fa-arrow-right fa-md text-white-50"></i></a> --}}
                        </form>
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