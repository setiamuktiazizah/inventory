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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengurangan Barang</h1>
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
                        @can ('admin') <a href="/tambah-pengurangan" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a> @endcan
                    </div>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tbl_list" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Alasan</th>
                                        @can ('admin') <th>Aksi</th> @endcan
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($reduceItems as $reduceItem)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$reduceItem->date}} </td>
                                        <td>{{$reduceItem->item->add_item->name}} </td>
                                        <td>{{$reduceItem->quantity}} </td>
                                        <td>{{$reduceItem->cause}} </td>
                                        <td><a href="/edit-pengurangan/{{ $reduceItem->id }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
                                    </tr>
                                    @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




    <!-- Modal Periode -->
       <div class="modal fade" id="periodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
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
{{-- @push('scripts')
<script type="text/javascript">
$(document).ready(function () {
   $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url()->current() }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'date', name: 'date' },
            { data: 'name', name: 'name' },
            { data: 'brand', name: 'brand' },
            { data: 'quantity', name: 'quantity' },
            { data: 'price', name: 'price' },
            { data: 'cause', name: 'cause' },
        ]
    });
 });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush --}}