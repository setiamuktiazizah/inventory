<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Inventori</title>
    @include ('template-admin.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include ('template-admin.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include ('template-admin.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengadaan Barang</h1>
                        <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahPengadaanModal">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a>
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
                                        <th>Aksi</th>
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
                                        <td><a href="{{url('/pengadaan-barang/'.$addItem->id)}} " class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPengadaanModal" data-id="{{ $addItem->id }}">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
                                    </tr>
                                    @endforeach

    <!-- Tambah Data Pengadaan Barang Modal-->
    <div class="modal fade" id="tambahPengadaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengadaan Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('pengadaan-barang.store') }}">
                        @csrf
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Kategori</h6>
                                    <input class="form-control form-control-sm" list="categories" name="id_category" id="category">
                                    <datalist id="categories" value=" ">
                                        @foreach ($data_categories as $category)
                                            <option value="{{$category->id}}" >{{$category->name}} </option>
                                        @endforeach
                                    </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Barang</h6>
                                <input type="text" name="name" class="form-control" value="" id="name">
                                @error('name')
                                    <p class="invalid-feedback d-block">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Merk</h6>
                                <input type="text" name="brand" class="form-control" value="" id="brand">
                                {{-- <input class="form-control form-control-sm" list="brand" name="brand" id="brand">
                                <datalist id="brand">
                                    <option value="ASUS">
                                    <option value="Snowman">
                                    <option value="Olaf">
                                </datalist> --}}
                            </div>
                        </div>
                        <div class="form-group row mb-lg-4">
                            {{-- <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Satuan</h6>
                                <input class="form-control form-control-sm" list="units" name="unit" id="unit">
                                <datalist id="units" value=" ">
                                    <option value="rim">
                                    <option value="pak">
                                    <option value="unit">
                                </datalist> --}}
                                    {{-- @foreach ($data_itemUnits as $itemUnit)
                                        <option value="{{$itemUnit->id}}" >{{$itemUnit->name}} </option>
                                    @endforeach --}}
                            {{-- </div> --}}
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jumlah</h6>
                                <input min="1" type="number" id="quantity" class="form-control form-control-sm" name="quantity" />
                                @error('quantity')
                                    <p class="invalid-feedback d-block">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Harga</h6>
                                <input min="1" type="number" id="price" class="form-control form-control-sm" name="price" />
                            </div>
                            @error('price')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Tanggal</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" name="date" />
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
                        <div class="col-sm-4">
                            <h6 class="h6 text-blue-100 mb-1">Barcode</h6>
                            <input min="1" type="number" id="barcode" class="form-control form-control-sm" name="barcode"/>
                        </div>
                        @error('barcode')
                            <p class="invalid-feedback d-block">{{ $message }}</p>
                        @enderror
                        {{-- <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Admin</h6>
                            <input class="form-control form-control-sm" list="users" name="user" id="user">
                            <datalist id="users">
                                <option value="Alwi">
                                <option value="Bayu">
                            </datalist>
                        </div> --}}
                    
                </div>
                <div class="modal-footer">
                    {{-- <a class="btn btn-primary">Simpan</a> --}}
                    <section>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </section>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <!-- Edit Data Pengadaan Barang Modal-->
    <div class="modal fade" id="editPengadaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <input min="1" type="number" id="price" class="form-control form-control-sm" />
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
@include ('template-admin.script')
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