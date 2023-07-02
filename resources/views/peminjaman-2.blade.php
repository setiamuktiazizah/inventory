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
                    {{-- @dd($previous_request) --}}

                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        @if(count($queried_items) > 0)
                            <h1>Barang yang akan dipinjam:</h1>
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
                                    {{-- @dd($queried_items) --}}
                                    <tbody class="text-center">
                                        @foreach($queried_items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->add_item->name }}</td>
                                                <td>{{ $item->add_item->brand }}</td>
                                                <td>{{ $item->condition }}</td>
                                                <td>
                                                    <form action="/peminjaman-2-remove" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <input hidden type="text" id="id_category" name="id_category" value="{{ $previous_request->id_category }}"> --}}
                                                        <input hidden type="date" id="loan_date" name="loan_date" value="{{ $previous_request->loan_date }}">

                                                        <input hidden type="text" id="id_items_string_array" name="id_items_string_array" value="{{ $previous_request->id_items_string_array }}">

                                                        <input hidden type="text" id="id_item_to_be_removed" name="id_item_to_be_removed" value="{{ $item->id }}">
                                                            
                                                        <button name="submit" type="submit" class="btn btn-danger">
                                                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Hapus
                                                        </button>
                                                        
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

    
                                    </tbody>
                                </table>
                            </div>
                            {{-- <h1>Queried items:</h1>
                            @foreach($queried_items as $item)
                                <p>{{ $item->id }}</p>
                            @endforeach
                            <p>{{ $previous_request->id_items_string_array }}</p> --}}

                            <form action="/peminjaman-4" method="post" enctype="multipart/form-data">
                                @csrf

                                <input hidden type="date" id="loan_date" name="loan_date" value="{{ $previous_request->loan_date }}">
                                <input hidden type="text" id="id_items_string_array" name="id_items_string_array" value="{{ $previous_request->id_items_string_array }}">
    
                                <button name="submit" type="submit" class="btn btn-primary mt-4">Pinjam</button>
                                {{-- <a href="/peminjaman-2" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md mt-5 float-right">
                                     Selanjutnya    <i class="fas fa-arrow-right fa-md text-white-50"></i></a> --}}
                            </form>

                        @endif
                        <form action="/peminjaman-3" method="post" enctype="multipart/form-data">
                            @csrf

                            <input hidden type="text" id="id_items_string_array" name="id_items_string_array" value="{{ $previous_request->id_items_string_array }}">
                            <input hidden type="date" id="loan_date" name="loan_date" value="{{ $previous_request->loan_date }}">

                            <label for="exampleFormControlSelect1" class="font-weight-bold text-primary">Pilih Kategori</label>
                            <select class="custom-select" id="id_category" name="id_category">
                                <option selected value="">Pilih</option>
                                @foreach($data_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                @endforeach
                            </select>

                            <button name="submit" type="submit" class="btn btn-primary mt-4 float-right">Selanjutnya</button>
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