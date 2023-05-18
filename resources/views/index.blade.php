<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
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
                                    <form class="user">
                                        <div class="form-group">
                                            <h6 class="h6 text-blue-100 mb-1">Email*</h6>
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan email" required>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="h6 text-blue-100 mb-1">Password*</h6>
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Minimum 8 karakter" required>
                                        </div>
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
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
                                        <a href="/dashboard-admin" class="btn btn-login btn-user btn-block">
                                            Masuk
                                        </a>
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

=======
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Inventori</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="landing-page/assets/favicon.ico" /> 
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="landing-page/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="landing-page/assets/img/navbar-logo.svg" alt="..." /></a>
                <a class="navbar-brand" href="#page-top">Sistem Inventaris</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#page-top">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Masuk</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register" style="color: #FF9900">Daftar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading" style="font-style: italic">Selamat Datang di</div>
                <div class="masthead-heading text-uppercase" style="color: #1565C0">Sistem Inventaris</div>
                <div class="masthead-subheading">Fakultas Teknologi Informasi dan Sains Data </div>
                <div class="masthead-subheading">Universitas Sebelas Maret</div>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading">Layanan Kami</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Peminjaman Barang Aset</h4>
                        <p class="text-muted">Lihat data barang kemudian ajukan peminjaman!</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-history fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Manajemen Barang Inventaris</h4>
                        <p class="text-muted">Lihat riwayat peminjaman barang dengan mudah!</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-3x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-pen fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Permintaan BHP dan ATK</h4>
                        <p class="text-muted">Lihat data barang kemudian ajukan permintaan!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">FATISDA UNS &copy; 2023. All Rights Reserved</div>
                    <!-- <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div> -->
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="landing-page/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
>>>>>>> 094d009818aa62b779a29177a71530df5dae3747
</html>