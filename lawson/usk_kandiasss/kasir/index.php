<?php 

session_start();
$koneksi = new mysqli("localhost", "root", "", "kandias_minimarket");
   if (!isset($_SESSION['username'])) {
        header("Location: ../login.php"); // Ganti dengan halaman utama setelah login
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawson Store</title>

    <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/fontawesome-6.2.1/css/all.min.css">
</head>
<style>
    
    body{
        font-family: 'Poppins';
        background-color: #4159e6;
    }
</style>
<body>
    <!-- navbar -->
        <nav class="navbar navbar-light bg-light">
           <div class="container-fluid mx-5" style="margin:0 140px !important;">
                <h1><a class="navbar-brand fs-4" style="color:black;font-weight:600;">Lawson<span style="color: #589FCB;">Station</span></a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" style="border: none !important; color:white;background:#eaeaea;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" >
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-weight: 600; color:#589FCB">KndzStation</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=home" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=menu">Menu Lawson Station</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=kasir">Daftar Kasir</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- akhir navbar -->

        <!-- content -->
            <?php 
                if (isset($_GET['halaman'])) {
                    $page = $_GET['halaman'];

                    switch ($page) {
                        case 'home':
                            include "home.php";
                            break;
                        case 'menu':
                            include "menu.php";
                            break;
                        case 'kasir':
                            include "kasir.php";
                            break;
                        case 'order':
                            include "order.php";
                            break;
                        case 'transaksi':
                            include "transaksi.php";
                            break;
                        case 'login':
                                include "login.php";
                                break;
                        default:
                            echo "<center><h3>Maaf. Halaman yang kamu cari tidak di temukan !</h3></center>";
                            break;
                    } 
                } else {
                    include "../kasir/home.php";
                
                }
            ?>
        
        <!-- akhir content -->     

    <script src="../public/js/login.js"></script>
    <script src="../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="../public/fontawesome-6.2.1/js/all.js"></script>
</body>
</html>