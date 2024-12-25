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
    <link href="<?= base_url('assets/sbadmin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(90deg, #4e73df 0%, #ffffff 100%);
            color: #4e73df;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background: #4e73df;
            border: none;
        }

        .btn-primary:hover {
            background: #3a5bb8;
        }

        .form-control {
            border-radius: 20px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.8);
        }

        .text-gray-900 {
            color: #5a5c69 !important;
        }

        a {
            color: #4e73df;
        }

        a:hover {
            color: #3a5bb8;
        }

        .illustration {
            max-width: 250px;
            height: auto;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            width: 100%;
        }

        .form-group input {
            width: 100%;
        }

        /* Adding margin between the columns */
        .form-row {
            margin-bottom: 15px;
        }
    </style>

</head>

<body>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center mt-5 mb-5">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Illustration -->
                    <div class="text-center mb-4">
                        <img src="<?= base_url('assets/images/undraw_add-information_06qr.svg') ?>"
                             alt="Register Illustration" class="illustration">
                    </div>
                    <!-- Judul Form Daftar Akun -->
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Daftar Akun</h1>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-11">
                        <form class="user" action="<?= base_url('auth/register') ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputName" name="nama" placeholder="Masukkan Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Masukkan Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Masukkan Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPasswordConfirm" name="password_confirm" placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="telp" placeholder="Nomor Telepon Kompetitor">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Kompetitor">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar
                            </button>
                        </form>
                        </div>
                    </div>
                    <hr>
                    <!-- Link untuk Masuk Akun -->
                    <div class="text-center">
                        <a class="small" href="login">Sudah punya akun? Masuk!</a>
                    </div>
                    <!-- Link untuk Kembali ke Beranda -->
                    <div class="text-center mt-2">
                        <a class="small" href="<?= base_url('home'); ?>">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>
