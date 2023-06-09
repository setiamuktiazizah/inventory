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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Edit Kondisi Barang</h1>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="user" id="userData" method="post" enctype="multipart/form-data" action='/update-barang/{{ $item->id }}'>
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="disabledTextInput" class="font-weight-bold text-primary">Nama</label>
                                <input type="text" class="form-control form-control-user"
                                    id="name" readonly value="{{ $item->add_item->name }}">
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput" class="font-weight-bold text-primary">Merk</label>
                                <input type="text" class="form-control form-control-user"
                                    id="brand"  readonly value="{{ $item->add_item->brand }}">
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput" class="font-weight-bold text-primary">Stok</label>
                                <input type="number" class="form-control form-control-user"
                                    id="quantity"  readonly value="{{ $item->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Kondisi</label>
                                <select class="custom-select" name="condition">
                                    {{-- <option selected>Pilih</option> --}}
                                    <option {{ $item->condition == "Baik" ? 'selected' : '' }} value="Baik">Baik</option>
                                    <option {{ $item->condition == "Rusak" ? 'selected' : '' }} value="Rusak">Rusak</option>
                                </select>
                            </div>

                            <button name="submit" type="submit" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                                Simpan
                            </button>
                        </form>
                        {{-- <a href="/data-barang" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                             Simpan</a> --}}
                            
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