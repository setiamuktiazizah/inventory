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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Pengurangan Barang</h1>
                        <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahPenguranganModal">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a>
                </div>                

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <!-- <table id="example" class="display" width="100%" cellspacing="0"> -->
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Jenis Pengurangan</th>
                                        <th>Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($data_reduce as $reduce)
                                    <tr>
                                        <td>1</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>LCD</td>
                                        <td>AS</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Rusak</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Keyboard</td>
                                        <td>HU</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"data-toggle="modal" data-target="#editPenguranganModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>CPU</td>
                                        <td>Hoho</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>02-05-2023</td>
                                        <td>BHP</td>
                                        <td>Spidol</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>02-05-2023</td>
                                        <td>Aset</td>
                                        <td>Laptop</td>
                                        <td>Asus</td>
                                        <td>1</td>
                                        <td>5.600.000</td>
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
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
                                        <td>Pindah Tangan</td>
                                        <td>Nina Aidha</td>
                                        <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editPenguranganModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>
                                    </tr>                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                 <!-- The Modal Input -->
            <div class="modal fade" id="tambahModal">
                <div class="modal-dialog">
                <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Input Data Pengurangan Barang</h4>
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
                    <label for="categorys" class="form-label">Jenis Kategori</label>
                    <select class="form-select" id="category" name="category_id">
                        @foreach ($data_category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Barang</label>
                    <input type="text" name="name" class="form-control @error('name')
                        is-invalid
                    @enderror">
                  </div>
                  @error('name')
                      <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror

                  <div class="form-group">
                    <label>Merk</label>
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
                    <label>Jenis Pengurangan</label>
                    <select class="form-select" id="cause" name="cause" value="">
                        <option value="hilang">Hilang</option>
                        <option value="tidak layak">Tidak Layak</option>
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
            @include ('template-admin.footer')
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
                <h4 class="modal-title">Edit Data Pengurangan Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="POST" action="" id="form_edit" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="date" class="form-control" value="{{$reduce->date}} " id="date">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-select" name="id_category" value=" " >
                            @foreach ($data_category as $category)
                                <option value="{{ $category->id }}"> {{$category->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <input type="text" name="name" class="form-control" value="{{$reduce->item->name}} " id="name">
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" name="brand" class="form-control" value="{{$reduce->item->brand}} " id="brand">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="quantity" class="form-control" value="{{$reduce->quantity}} " id="quantity">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="price" class="form-control" value="10000" id="price">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pengurangan</label>
                        <select class="form-select" id="cause" name="cause" value="{{$reduce->cause}} ">
                            <option value="hilang">Hilang</option>
                            <option value="tidak layak">Tidak Layak</option>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include ('template-admin.footer')
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

    <!-- Tambah Data Pengurangan Barang Modal-->
    <div class="modal fade" id="tambahPenguranganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengurangan Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Kategori</h6>
                                <!-- <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Kategori"> -->
                                    <input class="form-control form-control-sm" list="categories" name="category" id="category">
                                    <datalist id="categories">
                                        <option value="Aset">
                                        <option value="Bolpen">
                                    </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Barang</h6>
                                <input class="form-control form-control-sm" list="items" name="item" id="item">
                                <datalist id="items">
                                    <option value="Laptop">
                                    <option value="Bolpen">
                                    <option value="LCD">
                                </datalist>
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
                        <div class="form-group row justify-content-between mb-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jumlah</h6>
                                <input min="1" type="number" id="quantity" class="form-control form-control-sm" />
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Harga</h6>
                                <input min="1" type="number" id="price" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="form-group row justify-content-between mb-lg-4">
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
                                <h6 class="h6 text-blue-100 mb-1">Jenis Pengurangan</h6>
                                <input class="form-control form-control-sm" list="adds" name="add" id="add">
                                <datalist id="adds">
                                    <option value="Perbaikan">
                                    <option value="Pindah Tangan">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary">Simpan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Data Pengurangan Barang Modal-->
    <div class="modal fade" id="editPenguranganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengurangan Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                        <div class="form-group row mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Kategori</h6>
                                <!-- <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Kategori"> -->
                                    <input class="form-control form-control-sm" list="categories" name="category" id="category">
                                    <datalist id="categories">
                                        <option value="Aset">
                                        <option value="Bolpen">
                                    </datalist>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Barang</h6>
                                <input class="form-control form-control-sm" list="items" name="item" id="item">
                                <datalist id="items">
                                    <option value="Laptop">
                                    <option value="Bolpen">
                                    <option value="LCD">
                                </datalist>
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
                        <div class="form-group row justify-content-between mb-lg-4">
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Jumlah</h6>
                                <input min="1" type="number" id="quantity" class="form-control form-control-sm" />
                            </div>
                            <div class="col-sm-4">
                                <h6 class="h6 text-blue-100 mb-1">Harga</h6>
                                <input min="1" type="number" id="price" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="form-group row justify-content-between mb-lg-4">
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
                                <h6 class="h6 text-blue-100 mb-1">Jenis Pengurangan</h6>
                                <input class="form-control form-control-sm" list="adds" name="add" id="add">
                                <datalist id="adds">
                                    <option value="Perbaikan">
                                    <option value="Pindah Tangan">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary">Simpan</a>
                </div>
            </div>
        </div>
    </div>
@include ('template-admin.script')
</body>

</html>