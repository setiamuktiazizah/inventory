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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Daftar Barang Tersedia</h1>
                </div>            

                <!-- DataTales Example -->
                {{-- @dd($available_items[0]) --}}
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Merk</th>
                                        <th>Kondisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($available_items as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->brand }}</td>
                                            <td>{{ $item->condition }}</td>
                                            <td>
                                                <form action="/peminjaman-3" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- <input hidden type="text" id="id_category" name="id_category" value="{{ $previous_request->id_category }}"> --}}
                                                    <input hidden type="date" id="loan_date" name="loan_date" value="{{ $previous_request->loan_date }}">
                                                    <input hidden type="text" id="id_item" name="id_item" value="{{ $item->id }}">

                                                    <button name="submit" type="submit" class="btn btn-info">
                                                        <i class="fas fa-plus-circle fa-sm text-white-50"></i> Pinjam
                                                    </button>
                                                    
                                                </form>
                                                {{-- <a href="/peminjaman-3" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                                    <i class="fas fa-plus-circle fa-sm text-white-50"></i> Pinjam
                                                </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Laptop Asus</td>
                                        <td>Asus</td>
                                        <td>Baik</td>
                                        <td><a href="/peminjaman-3" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Pinjam</a></td>
                                    </tr> --}}

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