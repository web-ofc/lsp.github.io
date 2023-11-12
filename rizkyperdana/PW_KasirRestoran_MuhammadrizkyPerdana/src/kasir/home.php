<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir | Kasir Resto</title>
    <link rel="stylesheet" href="../../public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/dashboard/css/styles.css">
    <link rel="stylesheet" href="../../public/fontawesome-6.2.1/css/all.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
                visibility: hidden;
            }
        }
    </style>
</head>

<body>

    <?php
        require "../../app/config/koneksi.php";
        session_start();

        if ( !isset( $_SESSION["loginKasir"])) {
            header('Location: ../../');
            exit;
        }
    ?>


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark no-print d-flex">
        <a class="navbar-brand ps-3" href="dashboard_pengguna no-print">Dashboard Kasir</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <a class="ms-5 ms-5 me-auto dropdown-menu-end justify-content-end align-content-end text-end float-end align-items-end end me-0 order-1 float-right text-white py-2 text-decoration-none" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #003459;">
            Hi! <?= $_SESSION["username"] ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../../logout.php">Keluar</a></li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Pesanan</div>
                        <a class="nav-link" href="pesanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Transaksi Pesanan
                        </a>
                        <div class="sb-sidenav-menu-heading">Pelanggan</div>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pelanggan
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="menu.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Menu
                        </a>
                        <a class="nav-link" href="../../logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>




        <div id="layoutSidenav_content">
            <?php
            include "../../app/config/koneksi.php";
            // menu
            $data_menu = mysqli_query($conn, "SELECT * FROM menu");
            $jumlah_menu = mysqli_num_rows($data_menu);

            // pesanan
            $data_pesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE pesanan.status_pesanan='Menunggu Konfirmasi'");
            $jumlah_pesanan = mysqli_num_rows($data_pesanan);

            // pemasukan
            $data_pemasukan = mysqli_query($conn, "SELECT * FROM pemasukan");
            $jumlah_pemasukan = mysqli_num_rows($data_pemasukan);

            // pengguna
            $data_user = mysqli_query($conn, "SELECT * FROM user");
            $jumlah_user = mysqli_num_rows($data_user);
            ?>
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-inline-block">
                                    <div class="h2">Transaksi Pesanan</div>
                                    <div class="h1"><?= $jumlah_pesanan ?></div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="pesanan.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body d-inline-block">
                                    <div class="h2">Menu</div>
                                    <div class="h1"><?= $jumlah_menu ?></div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="menu.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                    </div>
                </div>
            </footer>
        </div>



        <script src="../../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
        <script src="../../public/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="../../public/dashboard/js/scripts.js"></script>

</body>

</html>