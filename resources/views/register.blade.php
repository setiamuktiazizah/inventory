<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="/template/css/sb-admin-2.css" rel="stylesheet">
</head>


<body class="bg-gradient-primary">
    <div class="container">
        <div class="card-login o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-left">
                                <h1 class="h4 subhead text-blue-100 mb-3">Daftar Akun</h1>
                            </div>
                            <div class="text-left">
                                <h1 class="h6 subhead text-blue-100 mb-2">Mengatur barang inventaris dengan efisien!</h1>
                            </div>
                            <div class="text-left">
                                <h1 class="h6 text-gray-700 mb-4">Daftarkan segera akun Anda agar bisa terverifikasi sebagai akun personal dan mulai untuk menyiapkan profil dan kebutuhan Anda!</h1>
                            </div>
                            <form class="user" action='/register' method='POST'>
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h6 class="h6 text-blue-100 mb-1">Nama Lengkap</h6>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' placeholder="Masukkan nama Anda" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <div class="error">
                                            <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="h6 text-blue-100 mb-1">Nomor Induk</h6>
                                        <input type="text" class="form-control form-control-user @error('no_credential') is-invalid @enderror" id="no_credential" name="no_credential" placeholder="Masukkan nomor induk Anda" required autocomplete="no_credential">
                                        @error('no_credential')
                                        <div class="error">
                                            <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h6 class="h6 text-blue-100 mb-1">Email</h6>
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email Anda" required autocomplete="email">
                                        @error('email')
                                        <div class="error">
                                            <p style="font-size: 13px; color: red;"> {{$message}} </p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="h6 text-blue-100 mb-1">Nomor HP</h6>
                                        <input type="tel" class="form-control form-control-user @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" pattern="[0][8][0-9]{10}" required autocomplete="no_hp">
                                        @error('no_hp')
                                        <div class="error">
                                            <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="h6 text-blue-100 mb-1">Kata Sandi</h6>
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan kata sandi" required autocomplete="password">
                                    @error('password')
                                    <div class="error">
                                        <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Saya menyetujui semua syarat
                                            dan ketentuan yang berlaku
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-login btn-user btn-regist" type='submit'>
                                    Daftar
                                </button>
                            </form>
                            <div class="text-left">
                                <a class="small text-blue-100" href="/login">Sudah punya akun? Masuk</a>
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
