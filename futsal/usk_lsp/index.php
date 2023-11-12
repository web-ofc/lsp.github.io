<!doctype html>
<html lang="en">

<head>
  <title>Landing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
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
                    <a class="nav-link btn btn-light text-dark px-3" href="index.php?halaman=login">Login</a>
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
                            include "pages/home.php";
                            break;
                        case 'menu':
                            include "pages/menu.php";
                            break;
                        case 'login':
                                include "login.php";
                                break;
                        default:
                            echo "<center><h3>Maaf. Halaman yang kamu cari tidak di temukan !</h3></center>";
                            break;
                    } 
                } else {
                    include "pages/home.php";
                
                }
            ?>
        
    <!-- akhir content -->     
    



    <script src="public/js/login.js"></script>
    <script src="public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="public/fontawesome-6.2.1/js/all.js"></script>
</body>

</html>