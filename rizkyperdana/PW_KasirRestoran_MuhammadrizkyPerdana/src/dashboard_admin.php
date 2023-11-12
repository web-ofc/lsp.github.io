<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | Kasir Resto</title>
    <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/dashboard/css/styles.css">
    <link rel="stylesheet" href="../public/fontawesome-6.2.1/css/all.min.css">

    <!-- <link rel="stylesheet" href="../public/datatables/dataTables.bootstrap5.min.css">
    <script src="../public/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="../public/js/jq"></script> -->
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
        require "../app/config/koneksi.php";
        session_start();

        if ( !isset( $_SESSION["loginAdmin"])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    ?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="dashboard_pengguna">Dashboard Admin</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <a class="ms-5 ms-5 me-auto dropdown-menu-end justify-content-end align-content-end text-end float-end align-items-end end me-0 order-1 float-right text-white py-2 text-decoration-none" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #003459;">
                Hi! <?= $_SESSION["username"] ?>
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
                            <a class="nav-link" href="dashboard_admin.php?content=dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Pesanan</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pemesanan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="dashboard_admin.php?content=barang">Barang</a>
                                    <a class="nav-link" href="dashboard_admin.php?content=kategori">Kategori Barang</a>
                                    <a class="nav-link" href="dashboard_admin.php?content=stok">Stok Barang</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="dashboard_admin.php?content=transaksi">Data Transaksi</a>
                                </nav>
                            </div> -->
                            
                            <div class="sb-sidenav-menu-heading">Pemesanan</div>
                            <a class="nav-link" href="dashboard_admin.php?content=transaksi_pesanan">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Transksi Pesanan
                            </a>
                            <a class="nav-link" href="dashboard_admin.php?content=pesanan">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Pesanan
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="dashboard_admin.php?content=menu">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Menu
                            </a>
                            <a class="nav-link" href="dashboard_admin.php?content=pemasukan">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Pemasukan
                            </a>
                            <div class="sb-sidenav-menu-heading">Master User</div>
                            <a class="nav-link" href="dashboard_admin.php?content=pengguna">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Pengguna
                            </a>
                            <div class="sb-sidenav-menu-heading">Logout</div>
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
            include "admin/home.php";
            break;
        case 'transaksi_pesanan':
            include "admin/transaksi_pesanan.php";
            break;
        case 'pesanan':
            include "admin/pesanan.php";
            break;
        case 'menu':
            include "admin/menu.php";
            break;
        case 'pemasukan':
            include "admin/pemasukan.php";
            break;
        case 'pembeli':
            include "admin/pembeli.php";
            break;
        case 'pengguna':
            include "admin/pengguna.php";
            break;
        case 'profil':
            include "admin/profil.php";
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
        include "admin/home.php";
    }
 
   ?>
          <script>
$(document).ready(function () {
            $('#example').DataTable();
        });
        
</script>
   
    <script src="../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="../public/dashboard/js/datatables-simple-demo.js"></script>
    <script src="../public/dashboard/js/scripts.js"></script>
    <script src="../public/fontawesome-6.2.1/js/all.js"></script>

    <!-- <script src="../public/datatables/dataTables.bootstrap5.min.js"></script> -->

    

    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../../style/dashboard/js/datatables-simple-demo.js"></script> -->
        
 
        
</body>
</html>