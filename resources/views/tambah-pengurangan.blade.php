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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Tambah Pengurangan Barang</h1>
                </div>            

                <!-- DataTales Example -->
                <form action="/simpan-pengurangan" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Barang yang akan dikurangi</label>
                                <select class="custom-select" name="id_item">
                                    <option selected>Pilih</option>
                                    @foreach($data_items as $item)
                                        <option value="{{ $item->id }}">{{ $item->add_item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Jumlah</label>
                                <input class="form-control" type="number" name='quantity'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlSelect1" class="font-weight-bold text-primary mt-4">Tanggal</label>
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="date" class="form-control form-control-md" name='date'/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            <div class='col mu-3'>
                                <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Alasan</label>
                                <select class="custom-select" name="cause">
                                    <option selected>Pilih</option>
                                    <option value="Penggunaan">Penggunaan</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Hilang">Hilang</option>
                                    <option value="Penggantian Pemilik">Penggantian Pemilik</option>
                                </select>
                            </div>
                            </div>
                            
                        </div>
                        
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah
                        </button>
                                
                        </div>
                    </div>
                    </div>
                </form>
                
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