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
                        <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data</a>
                </div>            

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                    @foreach ($data_add as $add)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$add->date}} </td>
                                        <td>{{$add->category->name}} </td>                                          
                                        <td>{{$add->name}} </td>
                                        <td>{{$add->brand}} </td>
                                        <td>{{$add->quantity}} </td>
                                        <td>{{$add->price}} </td>
                                        <td>{{$add->cause}} </td>
                                        <td>{{$add->user->name}}</td>
                                        <td><a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#updateModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a></td>  
                                    </tr>
                                    @endforeach
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
    </div>

@include ('template-admin.script')
</body>

</html>