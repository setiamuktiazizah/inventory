<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/template/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card-login o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                            <div class="col">
                                <div class="p-5 mt-5 mb-5">
                                    <div class="text-center">
                                        <h1 class="h4 subhead text-blue-100 mb-3 mt-5">Atur Ulang Kata Sandi</h1>
                                    </div>
                                    <div class="text-left">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <h1 class="small text-gray-700 mb-4 px-6">Masukkan alamat email Anda dan kami akan 
                                            mengirimkan link untuk mengatur ulang kata sandi Anda!</h1>
                                    </div>
                                    <form class="user px-6 mb-5" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <h6 class="h6 text-blue-100 mb-1">Email*</h6>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                 value="{{ old('email') }}" required autocomplete="email" autofocus
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Masukkan email">

                                                @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror
                                        </div>
                                        
                                        <button type="submit" class="btn btn-login btn-user btn-block">
                                            Kirim
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

</body>

</html>