<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Inventori</title>
    @include ('template-operator.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include ('template-operator.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include ('template-operator.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 font-weight-bold text-primary">Data Barang</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Tgl Kembali</th>
                                        <th>Surat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>22/03/2023</td>
                                        <td>pathfile</td>
                                        <td><mark class="bg-success">Done</span></mark></td>
                                        <td>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>22/03/2023</td>
                                        <td>pathfile</td>
                                        <td><mark class="bg-success">Done</span></mark></td>
                                        <td>                                            
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Laptop</td>
                                        <td>ASUS</td>
                                        <td>1</td>
                                        <td>23/03/2023</td>
                                        <td>22/03/2023</td>
                                        <td>pathfile</td>
                                        <td><mark class="bg-success">Done</span></mark></td>
                                        <td>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            @include ('template-operator.footer')
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

@include ('template-operator.script')
</body>

</html>