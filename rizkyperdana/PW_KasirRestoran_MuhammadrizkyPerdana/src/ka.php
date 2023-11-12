<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir | Kasir Resto</title>
    <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/dashboard/css/styles.css">
    <link rel="stylesheet" href="../public/fontawesome-6.2.1/css/all.min.css">
    
    <!-- <link rel="stylesheet" href="../public/datatables/dataTables.bootstrap5.min.css">
    <script src="../public/datatables/jquery.dataTables.min.js"></script> -->
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }

        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
                visibility: hidden;
            }
        }
    </style>
</head>
<body>

    <?php
        // require "../app/config/koneksi.php";
        // session_start();

        // if ( !isset( $_SESSION["loginkasir"])) {
        //     header("Location: ../");
        //     exit;
        // }
    ?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark no-print d-flex">
            <a class="navbar-brand ps-3" href="dashboard_pengguna no-print">Dashboard Kasir</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <a class="ms-5 ms-5 me-auto dropdown-menu-end justify-content-end align-content-end text-end float-end align-items-end end me-0 order-1 float-right text-white py-2 text-decoration-none" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #003459;">
                Hi! 
            </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../logout.php">Keluar</a></li>
                </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="dashboard_kasir.php?content=dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Pesanan</div>
                            <a class="nav-link" href="dashboard_kasir.php?content=pesanan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi Pesanan
                            </a>
                            <div class="sb-sidenav-menu-heading">Pelanggan</div>
                            <a class="nav-link" href="dashboard_kasir.php?content=pelanggan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Pelanggan
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="dashboard_kasir.php?content=menu">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Menu
                            </a>
                            <a class="nav-link" href="../logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <?php 
    if(isset($_GET['content'])){
        $page = $_GET['content'];
    
        switch ($page) {
        case 'dashboard':
            include "kasir/home.php";
            break;
        case 'pesanan':
            include "kasir/pesanan.php";
            break;
        case 'menu':
            include "kasir/menu.php";
            break;
        case 'pemasukan':
            include "kasir/pemasukan.php";
            break;
        case 'pelanggan':
            include "kasir/pelanggan.php";
            break;
        default:
            echo "<div id='layoutSidenav_content'>
            <main>
                <div class='container-fluid px-4'><center class='mt-5'><h3>Maaf. Halaman tidak di temukan !</h3></center></div>
            </main>
             </div>";
            break;
        }
    }else{
        include "kasir/home.php";
    }
 
   ?>
   
   
   <script src="../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../public/dashboard/js/datatables-simple-demo.js"></script> -->
    <script src="../public/dashboard/js/scripts.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <!-- <script src="../style/dashboard/js/datatables-simple-demo.js"></script> -->
        <!-- <script src="../public/datatables/dataTables.bootstrap5.min.js"></script> -->
        
        <!-- <scrips -->
        
</body>
</html>