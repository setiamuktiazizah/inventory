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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="float-right d-none d-md-inline-block mr-4 dropdown">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-download fa-md text-secondary-50"></i> Export
                            </a>
                            <div class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#"><i class="fas fa-file-pdf fa-fw mr-2 text-gray-400"></i>PDF</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-file-excel fa-md fa-fw mr-2 text-gray-400"></i>Excel</a>
                            </div>
                        </div>
                        <a href="#" class=" float-right d-none d-md-inline-block btn btn-md btn-outline-primary shadow-md mr-4" data-toggle="modal" data-target="#periodeModal">
                            <i class="fas fa-calendar fa-md text-primary-50"></i> Periode</a>
                    </div>
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
                                        {{-- <th>Jumlah</th> --}}
                                        <th>Tgl Pinjam</th>
                                        <th>Maks Tgl Kembali</th>
                                        {{-- <th>Tgl Kembali</th> --}}
                                        <th>Surat</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    {{-- @dd($data_loanRequests[0]->item->add) --}}
                                    @foreach($data_loanRequests as $loanRequest)
                                        <tr>
                                            <td>{{ $loop->index }}</td>
                                            <td>{{ $loanRequest->item->add_item->name }}</td>
                                            <td>{{ $loanRequest->item->add_item->brand }}</td>
                                            <td>{{ $loanRequest->loan_date }}</td>
                                            <td>{{ $loanRequest->max_return_date }}</td>
                                            <td>{{ $loanRequest->pathfile }}</td>

                                            @if($loanRequest->status == "pending")
                                                <td><div class="badge-pill badge-warning">Pending</span></div></td>
                                            @elseif($loanRequest->status == "accepted")
                                                <td><div class="badge-pill badge-success">Accepted</span></div></td>
                                            @elseif($loanRequest->status == "rejected")
                                                <td><div class="badge-pill badge-danger">Rejected</span></div></td>
                                            @else
                                                error
                                            @endif

                                            <td>{{ $loanRequest->note }}</td>
                                            
                                            @if($loanRequest->status == "pending")
                                                <td>
                                                    <a href="/ubah-status/{{ $loanRequest->id }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>    
                                    @endforeach
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>26/03/2023</td>
                                        <td>25/03/2023</td>
                                        <td>Untuk keperluan kelas</td>
                                        <td>pathfile</td>
                                        <!-- <td><mark class="bg-gradient-success">Done</span></mark></td> -->
                                        <td><div class="badge-pill badge-success">Done</span></div></td>
                                        @can ('operator')
                                        <td>
                                            <a href="/ubah-status" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                        </td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <td>2</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>26/03/2023</td>
                                        <td>25/03/2023</td>
                                        <td>Untuk keperluan kelas</td>
                                        <td>pathfile</td>
                                        <!-- <td><mark class="bg-gradient-success">Done</span></mark></td> -->
                                        <td><div class="badge-pill badge-success">Done</span></div></td>
                                        @can ('operator')
                                        <td>
                                            <a href="/ubah-status" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                        </td>
                                        @endcan
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>26/03/2023</td>
                                        <td>25/03/2023</td>
                                        <td>Untuk keperluan kelas</td>
                                        <td>pathfile</td>
                                        <!-- <td><mark class="bg-gradient-success">Done</span></mark></td> -->
                                        <td><div class="badge-pill badge-success">Done</span></div></td>
                                        @can ('operator')
                                        <td>
                                            <a href="/ubah-status" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                        </td>
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