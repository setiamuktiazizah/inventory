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
                <h1 class="h3 mb-2 font-weight-bold text-primary">Data Stok Barang</h1>
                
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Merk</th>
                                        <th>Stok</th>
                                        <th>Kondisi</th>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($data_items as $item)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$item->add_item->barcode}}</td>
                                        <td>{{$item->add_item->name}}</td>
                                        <td>{{$item->add_item->brand}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>
                                            <div class="badge rounded-pill bg-success text-white">{{$item->condition}}</span></div>
                                            {{-- <mark class="bg-success">{{$item->condition}}</mark> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td>2</td>
                                        <td>B12345</td>
                                        <td>LCD</td>
                                        <td>Toshiba</td>
                                        <td>1</td>
                                        <td><mark class="bg-success">Baik</span></mark></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>C12345</td>
                                        <td>Speaker</td>
                                        <td>Sony</td>
                                        <td>1</td>
                                        <td><mark class="bg-success">Baik</span></mark></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>D12345</td>
                                        <td>Mouse</td>
                                        <td>Logitech</td>
                                        <td>1</td>
                                        <td><mark class="bg-success">Baik</span></mark></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>E12345</td>
                                        <td>Proyektor</td>
                                        <td>Hitachi</td>
                                        <td>1</td>
                                        <td><mark class="bg-success">Baik</span></mark></td>
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