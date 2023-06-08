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
                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Manajemen User</h1>
                    <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahModal">
                        <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data
                    </a>
                </div> --}}

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>No HP</th>
                                        <th>No Induk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($data_user as $user)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->email}} </td>
                                        <td>{{$user->role->name}} </td>
                                        <td>{{$user->no_hp}} </td>
                                        <td>{{$user->no_credential}} </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal" data-id="$user->id" id="editUser">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            {{-- <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Andi</td>
                                        <td>andi@gmail.com</td>
                                        <td>123</td>
                                        <td>Admin</td>
                                        <td>0875432234</td>
                                        <td>123456</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Budi</td>
                                        <td>budi@gmail.com</td>
                                        <td>123</td>
                                        <td>Operator Inventory</td>
                                        <td>0875432234</td>
                                        <td>234567</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Cici</td>
                                        <td>cici@gmail.com</td>
                                        <td>123</td>
                                        <td>User</td>
                                        <td>0875432234</td>
                                        <td>876543</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>
                                        </td>
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

    {{-- <!-- Tambah Data Modal-->
    <div class="modal" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Nama</h6>
                            <input type="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan email" readonly>
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Email</h6>
                            <input type="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan email" readonly>
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Password*</h6>
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Minimum 8 karakter" readonly>
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Role</h6>
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">No HP</h6>
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan email" readonly>
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">No Induk</h6>
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Minimum 8 karakter" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="/manajemen-user">Simpan</a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="userData">
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Nama</h6>
                            <input type="email" class="form-control form-control-user"
                                id="name" aria-describedby="emailHelp" name="name"
                                 readonly value="">
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Email</h6>
                            <input type="email" class="form-control form-control-user"
                                id="email" name="email" aria-describedby="emailHelp"
                                 readonly value="">
                        </div>
                        {{-- <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Password*</h6>
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword"  readonly>
                        </div> --}}
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">Role</h6>
                            <input type="text" class="form-control form-control-user"
                                id="id_role" name="id_role" aria-describedby="emailHelp" value=""
                                >
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">No HP</h6>
                            <input type="text" class="form-control form-control-user"
                                id="no_hp" name="no_hp" aria-describedby="emailHelp" value=""
                                readonly>
                        </div>
                        <div class="form-group">
                            <h6 class="h6 text-blue-100 mb-1">No Induk</h6>
                            <input type="text" class="form-control form-control-user"
                                id="no_credential" name="no_credential" value=""  readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <a class="btn btn-primary" href="/manajemen-user">Simpan</a> --}}
                    <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>

    <!-- Hapus Modal-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin ingin menghapus data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="/manajemen-user">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    
@include ('template-admin.script')
</body>

</html>

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

$(document).ready(function () {

// $.ajaxSetup({
//     headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
// });

$('body').on('click', '#submit', function (event) {
    event.preventDefault()

    var id_role = $("#id_role").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var no_hp = $("#no_hp").val();
    var no_credential = $("#no_credential").val();
   
    $.ajax({
      url: 'manajemen-user/' + id,
      type: "POST",
      data: {
        name: name,
        email: email,
        password: password,
        no_hp: no_hp,
        no_credential: no_credential,
      },
      dataType: 'json',
      success: function (data) {
          
          $('#userData').trigger("reset");
          $('#editModal').modal('hide');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '#editModal', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.get('manajemen-user/' + id + '/edit', function (data) {
        //  $('#userCrudModal').html("Edit category");
        //  $('#submit').val("Edit category");
         $('#practice_modal').modal('show');
        //  $('#color_id').val(data.data.id);
         $('#name').val(data.data.name);
         $('#email').val(data.data.email);
         $('#password').val(data.data.password);
         $('#no_hp').val(data.data.no_hp);
         $('#no_credential').val(data.data.no_credential);
     })
});

}); 
</script>
@endpush 