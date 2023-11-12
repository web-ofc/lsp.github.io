<?php 

session_start();
$koneksi = new mysqli("localhost", "root", "", "db_futsal");
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
    <title>PowerPlay Arena</title>

    <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/fontawesome-6.2.1/css/all.min.css">
</head>
<style>
    
    body{
        font-family: 'Poppins';
        background-color: #eaeaea;
    }
</style>
<body>
     <!-- Nav tabs -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="#">PowerPlay Arena</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?halaman=home" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?halaman=menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?halaman=transaksi">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- content -->
            <?php
                if(isset($_GET['halaman'])) {
                    $page = $_GET['halaman'];

                    switch ($page) {
                        case 'home':
                            include "home.php";
                            break;
                        case 'menu':
                            include "menu.php";
                            break;
                        case 'pemesan':
                            include "pemesan.php";
                            break;
                        case 'transaksi':
                            include "transaksi.php";
                            break;
                        default:
                            echo "<center><h3>Maaf. Halaman yang kamu cari tidak di temukan !</h3></center>";
                            break;
                    } 
                } else {
                    include "home.php";
                
                }
            ?>
        
    <!-- akhir content -->     
    

    <script src="../public/js/login.js"></script>
    <script src="../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="../public/fontawesome-6.2.1/js/all.js"></script>
</body>
</html>