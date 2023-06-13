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
                        <a href="#" class=" float-right d-none d-md-inline-block btn btn-md btn-outline-primary shadow-md mr-4" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-calendar fa-md text-primary-50"></i> Periode</a>
                        <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahPengadaanModal">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a>
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

                                    {{-- @foreach ($data_add as $add)
                                    <tr>

                                        <td>1</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPengadaanModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPengadaanModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPengadaanModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPengadaanModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Baru</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPengadaanModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            {{-- <!-- The Modal Input -->
            <div class="modal fade" id="tambahModal">
                <div class="modal-dialog">
                <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Input Data Pengadaan Barang</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" required></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="post" enctype="multipart/form-data" action="">
                  @csrf
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" name="date" class="form-control @error('date')
                          is-invalid
                      @enderror">
                  </div>
                  @error('date')
                      <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control @error('name')
                        is-invalid
                    @enderror">
                  </div>
                  @error('name')
                      <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror

                  <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control @error('brand')
                        is-invalid
                    @enderror">
                  </div>
                  @error('brand')
                      <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror

                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="quantity" class="form-control @error('quantity')
                        is-invalid
                    @enderror">
                  </div>
                  @error('quantity')
                      <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror

                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="price" class="form-control @error('price')
                        is-invalid
                    @enderror">
                  </div>
                  @error('price')
                      <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror

                  <div class="form-group">
                    <label>Jenis Pengadaan</label>
                    <select class="form-select" id="cause" name="cause" value="">
                        <option value="baru">Barang Baru</option>
                        <option value="donasi">Donasi</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="categorys" class="form-label">Jenis Kategori</label>
                    <select class="form-select" id="category" name="category_id">
                        @foreach ($data_category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <section>
                <button type="submit" class="btn btn-primary">Submit</button>
                </section>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </form>
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

   

            <!-- Modal footer -->
            <div class="modal-footer">
              <section>
              <button type="submit" class="btn btn-primary">Submit</button>
              </section>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

          </form>
          </div>
        </div>
      </div>
    
              <!-- The Modal Edit -->
        <div class="modal fade" id="updateModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Data Pengadaan Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="POST" action="" id="form_edit" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="date" class="form-control" value="{{$add->date}} " id="date">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{$add->name}} " id="name">
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control" value="{{$add->brand}} " id="brand">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="quantity" class="form-control" value="{{$add->quantity}} " id="quantity">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="price" class="form-control" value="{{$add->price}} " id="price">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pengadaan</label>
                        <select class="form-select" id="cause" name="cause" value="{{$add->cause}} ">
                            <option value="baru">Barang Baru</option>
                            <option value="donasi">Donasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-select" name="id_category" value="{{$add->category->id}} " >
                            @foreach ($data_category as $category)
                                <option value="{{ $category->id }}"> {{$category->name}} </option>
                            @endforeach
                        </select>
                    </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </form>
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
                    <a class="btn btn-primary" href="/">Keluar</a>
                </div>
            </div>
        </div>
    </div> --}}

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
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Tanggal</h6>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control form-control-sm" name="date" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-lg-4">
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