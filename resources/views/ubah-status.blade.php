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
                <h1 class="h3 mb-2 font-weight-bold text-primary">Edit Status Peminjaman</h1>
                
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                            <fieldset disabled>
                              <div class="form-row justify-content-between mt-4">
                                <div class="form-group col">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Barang</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $data_loanRequest->item->add_item->name }}">
                                </div>
                                <div class="form-group col">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Merk</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $data_loanRequest->item->add_item->brand }}">
                                </div>
                              </div>
                              <div class="form-row justify-content-between mt-4">
                                <div class="form-group col">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Tanggal Pinjam</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $data_loanRequest->loan_date}}">
                                </div>
                                <div class="form-group col">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Maks. Tanggal Pinjam</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $data_loanRequest->max_return_date}}">
                                </div>
                              </div>
                              <div class="form-row justify-content-between">
                                <div class="form-group col-6 col-md-4 mt-4">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Note</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Untuk keperluan kelas</textarea>
                                </div>
                              </div>
                            <div class="form-group-col-md-8 mt-4">
                                <label for="disabledTextInput" class="font-weight-bold text-primary">Surat</label>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="pathfile">
                            </div>
                            </fieldset>

                            <form action="/ubah-status-update/{{ $data_loanRequest->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-4">
                                    <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Pilih Status</label>
                                    <select class="custom-select" name="status" id="status">
                                        <option value="pending" selected>Pilih</option>
                                        <option value="accepted">Terima</option>
                                        <option value="rejected">Tolak</option>
                                    </select>
                                </div>
                                <button name="submit" type="submit" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                                    Simpan
                                    <i class="fas text-white-50"></i>
                                </button>
                                {{-- <a href="/pengajuan-peminjaman-operator" class=>
                                Simpan <i class="fas text-white-50"></i></a> --}}
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
                    <a class="btn btn-primary" href="/">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    
@include ('template-dashboard.script')
</body>

</html>