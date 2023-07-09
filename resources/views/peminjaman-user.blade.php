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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Riwayat Peminjaman Barang Saya</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="{{ url('https://uns.id/TemplateSuratPengajuan') }}" target="_blank" class="float-right d-none d-md-inline-block btn btn-md btn-outline-primary shadow-md mr-4">
                            <i class="text-white-50"></i> Template Surat</a>
                        <a href="/peminjaman-1" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md">
                            <i class="fas fa-plus fa-md text-white-50"></i> Ajukan Peminjaman</a>
                    </div>
                </div>            
                <!-- DataTales Example -->
                @if( count($data_loanRequests) == 0)
                    Anda belum pernah melakukan pengajuan peminjaman barang
                @else
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Barang</th>
                                        {{-- <th>Merk</th> --}}
                                        <th>Tgl Pinjam</th>
                                        <th>Maks Tgl Kembali</th>
                                        <th>Surat</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($data_loanRequests as $loanRequest)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            {{-- <td>{{ $loanRequest->item->add_item->name }}</td> --}}
                                            {{-- <td>{{ $loanRequest->item->add_item->brand }}</td> --}}
                                            <td>
                                                @foreach($loanRequest->loan_objects as $loanObject)
                                                    <p>{{ $loanObject->item->add_item->name }}</p>
                                                @endforeach
                                            </td>
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
                                            <td>
                                                {{-- <a href="/peminjaman-edit" class="btn btn-info btn-sm" data-id="$user->id" id="editUser"> --}}
                                                <a href="#" class="btn btn-info btn-sm" data-id="$user->id" id="editUser">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Lengkapi</span>
                                                </a>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

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