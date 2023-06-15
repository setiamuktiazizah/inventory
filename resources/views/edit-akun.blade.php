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
                <h1 class="h3 mb-2 font-weight-bold text-primary">Edit Akun</h1>
                
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form>
                            <fieldset disabled>
                              <div class="form-row">
                                <div class="form-group col-6 col-md-4">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Nomor Induk</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="060600">
                                </div>
                                <div class="form-group col-6 col-md-4">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Nama</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Lee Donghyeok">
                                </div>
                                <div class="form-group col-6 col-md-4">
                                    <label for="disabledTextInput" class="font-weight-bold text-primary">Email</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="haechanaceah@gmail.com">
                                </div>
                              </div>
                            </fieldset>
                                <div class="form-group mt-4">
                                    <label for="inputNomor" class="font-weight-bold text-primary">No. Hp</label>
                                    <input type="text" id="inputNomor" class="form-control" placeholder="085161695648">
                                </div>
                                <a href="/profil" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                                    Simpan <i class="fas text-white-50"></i></a></form>
                              {{-- <div class="form-row justify-content-between">
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
                            <div class="form-group mt-4">
                                <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">No. Hp</label>
                                <select class="custom-select">
                                    <option selected>Pilih</option>
                                    <option value="1">Acc</option>
                                    <option value="2">Active</option>
                                    <option value="3">Done</option>
                                    <option value="4">Done Late</option>
                                    <option value="5">Pending</option>
                                </select>
                            </div>
                            <a href="/pengajuan-peminjaman-operator" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                            Simpan <i class="fas text-white-50"></i></a></form> --}}
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