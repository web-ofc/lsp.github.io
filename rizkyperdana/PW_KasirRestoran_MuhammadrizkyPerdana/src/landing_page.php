<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Kasir Resto</title>
	<link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="../public/fontawesome-6.2.1/css/all.min.css">
    <style>
        pallet{
            color: #1C6758;
            color: #3D8361;
            color: #D6CDA4;
            color: #EEF2E6;
        }

        .tx-color-1 {
            color: #1C6758;
        }
        .tx-color-2 {
            color: #3D8361;
        }
        .tx-color-3 {
            color: #D6CDA4;
        }
        .tx-color-4 {
            color: #EEF2E6;
        }

		body {
			background-color: #EEF2E6;
			font-family: 'Poppins', sans-serif;
		}

		.card-body {
			background-color: #EEF2E6;
		}

		.card-title {
			color: #D6CDA4;
		}

		.btn-primary {
			background-color: #1C6758;
			border-color: #1C6758;
		}

		.btn-primary:hover, .btn-primary:focus, .btn-primary:focus:active, .btn-primary:active, .btn-primary:checked, .btn-primary:disabled, .btn-primary.disabled {
			background-color: #3D8361;
			border-color: #3D8361;
			box-shadow: #D6CDA4;
		}
    </style>
</head>

<?php
        // require "../app/config/koneksi.php";
        // session_start();

        // if ( !isset( $_SESSION["loginAdmin"])) {
        //     header("Location: ../");
        //     exit;
        // }
    ?>

<body>
<div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-5 border-bottom">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
            <!-- <img src="../public/img/icon.png" alt="icon" srcset="" width="50px"> -->
            <span class="fs-4 ms-3"  style="color: #1C6758;">Kasir Resto</span>
            </a>
        
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="landing_page.php?page=beranda">Beranda</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="landing_page.php?page=menu">Menu</a>
                <a class="me-3 py-2 text-decoration-none" href="../login.php" style="color: #1C6758;">Login</a>
                <!-- <a class="me-3 py-2 text-decoration-none dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #003459;">
                Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="">?= $_SESSION["username"] ?></a></li>
                    <li><a class="dropdown-item" href="../logout.php">Keluar</a></li>
                </ul> -->
            </nav>
            </div>
        </header>

        <?php 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'beranda':
                    include "pages/beranda.php";
                    break;
                case 'menu':
                    include "pages/menu.php";
                    break;
                // case 'pesanan':
                //     include "pages/pesanan.php";
                //     break;
                case 'pemesanan':
                        include "pages/pemesanan.php";
                        break;
                default:
                    echo "<center><h3>Maaf. Halaman yang kamu cari tidak di temukan !</h3></center>";
                    break;
            } 
        } else {
            include "pages/beranda.php";
            // echo "<center><h3>Maaf. Halaman yang kamu cari tidak di temukan !</h3></center>";
        }
        ?>

        <!-- <div class="my-5 mt-3">
            <a href="" class="btn btn-danger">Keluar</a>
        </div> -->

        <footer class="my-5 pt-5 text-muted text-center text-small">
            Copyright &copy; 2023 &mdash; Muhammad Rizky Perdana | LSP 
        </footer>


    </div>


	<script src="../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome-6.2.1/js/all.js"></script>
</body>
</html>
