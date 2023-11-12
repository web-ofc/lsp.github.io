<?php
include "../../app/config/koneksi.php";

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM pesanan 
    WHERE nama_pelanggan LIKE '%$keyword%'
    OR tgl_pesanan LIKE '%$keyword%'
    ORDER BY tgl_pesanan ASC");
} else {
    $result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tgl_pesanan ASC");
}


?>

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
        header('Location: ' . $_SERVER['HTTP_REFERER']);
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
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Pelanggan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
                    </ol>
                    <div class="">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Histori Pelanggan
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="text" name="keyword" class="form-control" placeholder="Masukan data yang ingin dicari">
                                            <input type="submit" name="cari" value="Cari" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Terakhir Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Terakhir Transaksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($view = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $view["nama_pelanggan"] ?></td>
                                                <td><?= $view["tgl_pesanan"] ?></td>
                                            </tr>
                                            <!-- php var_dump($view) ?> -->
                                        <?php } ?>
                                    </tbody>

                                </table>
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
        <script src="../public/dashboard/js/scripts.js"></script>

</body>

</html>