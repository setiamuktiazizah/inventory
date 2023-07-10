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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengembalian Barang</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="/pengembalian-operator" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md">Kembali</a>
                        &nbsp;
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-download fa-md text-secondary-50"></i> Export
                        </a>
                        <div class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/pengembalian/pdf/{{$tgl_awal}}/{{$tgl_akhir}}" data-tgl_awal={{$tgl_awal}} data-tgl_akhir={{$tgl_akhir}}><i class="fas fa-file-pdf fa-fw mr-2 text-gray-400"></i>PDF</a>
                            <a class="dropdown-item" href="/pengembalian/excel/{{$tgl_awal}}/{{$tgl_akhir}}"><i class="fas fa-file-excel fa-md fa-fw mr-2 text-gray-400"></i>Excel</a>
                        </div>
                        </div>
                </div>  
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h3 class="h3 mb-2 font-weight-bold text-primary">Periode ( {{$tgl_awal}} ) - ( {{$tgl_akhir}} )</h3>
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
                                        <th>Maks Tgl Kembali</th>
                                        <th>Tgl Kembali</th>
                                        <th>Note</th>
                                        <th>Surat</th>
                                        <th>Status</th>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($data_returnItem as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$data->loan_item->loan_request->item->add_item->name}}</td>
                                        <td>{{ $data->loan_item->loan_request->item->add_item->brand }}</td>
                                        <td>{{ $data->loan_item->loan_request->item->add_item->quantity }}</td>
                                        <td>{{$data->loan_item->loan_request->loan_date}}</td>
                                        <td>{{$data->loan_item->loan_request->max_return_date}}</td>
                                        <td>{{$data->return_date}}</td>
                                        <td>{{$data->loan_item->loan_request->note}}</td>
                                        <td>{{$data->loan_item->loan_request->path_file_cdn}}</td>
                                        @if($data->loan_item->status == "done late")
                                            <td><div class="badge-pill badge-warning">DoneLate</span></div></td>
                                        @elseif($data->loan_item->status == "done")
                                            <td><div class="badge-pill badge-success">Done</span></div></td>
                                        @elseif($data->loan_item->status == "active")
                                            <td><div class="badge-pill badge-primary">Active</span></div></td>
                                        @elseif($data->loan_item->status == "late")
                                            <td><div class="badge-pill badge-danger">Late</span></div></td>
                                        @else
                                            <td><div></div></td>
                                        @endif
                                    </tr>
                                    @endforeach
                               
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
    
    <!-- Edit Data Peminjaman-pengembalian Barang Modal-->
    <div class="modal fade" id="editPeminjamanPengembalianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jumlah</h6>
                                <input class="form-control form-control-sm" list="quantity" name="quantity" id="quantity">
                                <datalist id="quantity">
                                    <option value="1">
                                    <option value="2">
                                    <option value="3">
                                </datalist>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h6 class="h6 text-blue-100 mb-1">Status</h6>
                                <input class="form-control form-control-sm" list="stat" name="stat" id="stat">
                                <datalist id="stat">
                                    <option value="Empty">
                                    <option value="Done">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group row justify-content-between mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Tgl Peminjaman</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Tgl Pengembalian</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Notes</label>
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

    <!-- Modal Periode -->
    <div class="modal fade" id="periodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
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

@include ('template-dashboard.script')
</body>

</html>