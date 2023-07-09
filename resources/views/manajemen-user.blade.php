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
                    <h1 class="h3 mb-2 font-weight-bold text-primary">Manajemen User</h1>
                    {{-- <a href="#" class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" data-toggle="modal" data-target="#tambahModal">
                        <i class="fas fa-plus fa-md text-white-50"></i> Tambah Data
                    </a> --}}
                </div>

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
                                        {{-- <th>Aksi</th> --}}
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
                                            <a href="/manajemen-user/{{$user->id}}" class="btn btn-info btn-sm" data-id="$user->id" id="editUser">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                        </td> 
                                    </tr>
                                    @endforeach
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