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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="/template/css/sb-admin-2.css" rel="stylesheet">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}


</head>


<body class="bg-gradient-primary">


    <div class="container">


        <!-- Outer Row -->
        <div class="row justify-content-center">


            <div class="col-xl-10 col-lg-12 col-md-9">


                <div class="card-login o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-left">
                                        <h1 class="h4 subhead text-blue-100 mb-3">Masuk Akun</h1>
                                    </div>
                                    <div class="text-left">
                                        <h1 class="h6 text-gray-700 mb-4">Sistem Inventaris Aset dan BHP </h1>
                                    </div>
                                    <form class="user" action='/login' method='POST'>
                                        @csrf
                                        <div class="form-group">
                                            <h6 class="h6 text-blue-100 mb-1">Email*</h6>
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan email" required>
                                            @error('email')
                                            <div class="error">
                                                <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h6 class="h6 text-blue-100 mb-1">Password*</h6>
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Minimum 8 karakter" required>
                                            @error('password')
                                            <div class="error">
                                                <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                            </div>
                                            @enderror
                                        </div>
                                        @if ($displayCaptcha)


                                        <div class="g-recaptcha-response" name="g-recaptcha-response"> {!! htmlFormSnippet() !!} </div>




                                        @error('g-recaptcha-response')
                                        <span class="error" role="alert">
                                            <p style="font-size: 13px;color: red;"> {{$message}} </p>
                                        </span>
                                        @enderror


                                        @endif
                                        <div class="form-group row">
                                            <div class="col">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck" required>Ingat
                                                        saya</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-right">
                                                    <a class="small text-blue-100" href="/reset-password">Lupa kata sandi?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-login btn-user btn-block" type='submit'>
                                            Masuk
                                        </button>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <div class="text-left">
                                        <a class="small text-blue-100" href="/register">Belum punya akun? Daftar akun!</a>
                                    </div>
                                </div>
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
