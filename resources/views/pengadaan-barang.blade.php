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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengadaan Barang</h1>
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
<<<<<<< Updated upstream
                        @can ('admin') <a href="/tambah-pengadaan" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a> @endcan
=======
                        <a href="/tambah-pengadaan" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a>
>>>>>>> Stashed changes
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
                                        <th>Kategori</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Jenis Pengadaan</th>
                                        <th>Admin</th>
                                        @can ('admin')
                                        <th>Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($data_addItems as $addItem)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$addItem->date}} </td>
                                        <td>{{$addItem->category->name}} </td>
                                        <td>{{$addItem->name}} </td>
                                        <td>{{$addItem->brand}} </td>
                                        <td>{{$addItem->quantity}} </td>
                                        <td>{{$addItem->price}} </td>
                                        <td>{{$addItem->cause}} </td>
                                        <td>{{$addItem->creator->name}} </td>
<<<<<<< Updated upstream
                                        @can ('admin')
                                        <td><a href="/edit-pengadaan" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-id="{{ $addItem->id }}">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td> 
                                        @endcan 
=======
                                        <td><a href="/edit-pengadaan" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-id="{{ $addItem->id }}">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
>>>>>>> Stashed changes
                                    </tr>
                                    @endforeach

                                    
                        
    
    <!-- Tambah Data Pengadaan Barang Modal-->
    <div class="modal fade" id="tambahPengadaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengadaan Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{url('/pengadaan-barang/'.$addItem->id.'/store')}}" class="user">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="id">
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Kategori</h6>
                                <input class="form-control form-control-sm" list="categories" name="category" id="category">
                                <datalist id="categories" value="{{$addItem->category->id}} ">
                                    @foreach ($data_categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}} </option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Barang</h6>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $addItem->name)}}" id="name">
                                @error('name')
                                    <p class="invalid-feedback d-block">{{ $message }}</p>
                                @enderror
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
                        </div>
                        <div class="form-group row mb-lg-4">
                            {{-- <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Satuan</h6>
                                <input class="form-control form-control-sm" list="units" name="unit" id="unit">
                                <datalist id="units">
                                    <option value="rim">
                                    <option value="pak">
                                    <option value="unit">
                                </datalist>
                            </div> --}}
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jumlah</h6>
                                <input min="1" type="number" id="quantity" class="form-control form-control-sm" value="{{ old('quantity', $addItem->quantity)}}" />
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Harga</h6>
                                <input min="1" type="number" id="price" name="price" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Tanggal</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jenis Pengadaan</h6>
                                <input class="form-control form-control-sm" list="adds" name="add" id="add">
                                <datalist id="adds">
                                    <option value="Barang Baru">
                                    <option value="Transfer">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Admin</h6>
                            <input class="form-control form-control-sm" list="users" name="user" id="user">
                            <datalist id="users">
                                <option value="Alwi">
                                <option value="Bayu">
                            </datalist>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary">Simpan</a>
                </div>
            </form>
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
<script>
    $(document).ready(function(){
        $(document).on('click','.editbtn',function(){
            var add_id = $(this).val();
            // alert(add_id);
            $('#editPengadaanModal').modal('show');

            $.ajax({
                type : "GET",
                url : "/pengadaan-barang/"+add_id,
                success: function(response){
                    $('#quantity').val(response.data.quantity)
                    $('#category').val(response.data2.name)
                    $('#item').val(response.data.name)
                    $('#brand').val(response.data.brand)
                    $('#price').val(response.data.price)
                    $('#add').val(response.data.cause)
                    $('#user').val(response.data3.name)
                    
                }


            });
        });
    });

 
</script>
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