<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_futsal");
?>
    <head>
        <link rel="stylesheet" href="public/bootstrap-5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/main.css">
        <link rel="stylesheet" href="public/fontawesome-6.2.1/css/all.min.css">
    </head>
     <style>
          body{
                font-family: 'Poppins';
                background-color: #eaeaea;
            }
     </style>
		<form method="post" class="">
            <div class="card text-white bg-ligth col-3 shadow-lg mx-auto mt-5">
                <div class="card-body text-dark">
                    <p class="text-start mb-4" style="font-size: 2rem; font-weight: 800;"><span style="color: #eaa;">Log</span>in</p>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-md" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-md" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="login" class="btn btn-outline-primary col-12">Login</button> 
                    </div>
                </div>
            </div>
        </form>	

        <?php 
            
            if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $queries = [
                "kasir" => "SELECT * FROM kasir",
                "admin" => "SELECT * FROM admin"
            ];
            
            // Dalam konteks kode Anda, $key adalah kunci yang digunakan untuk mengidentifikasi tipe pengguna, 
            // seperti 'kasir', 'kantor_pusat', atau 'kantor_cabang'. Sementara itu, 
            // $query adalah query SQL yang berbeda untuk setiap tipe pengguna yang digunakan dalam proses otentikasi.
            foreach ($queries as $key => $query) {
                $result = mysqli_query($koneksi, "$query WHERE username='$username' and password='$password'");
                $data = mysqli_fetch_array($result);

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['level'] = $key;
                    // Sebagai contoh, jika pengguna berhasil masuk sebagai 'kasir', maka $_SESSION['level'] akan disetel ke 'kasir
                    echo "<script>alert('Anda sukses login!');</script>";
                    echo "<script>location='$key/index.php';</script>";
                    exit;
                }
            }

            echo "<script>alert('Anda gagal login!');</script>";
            echo "<script>location='index.php';</script>";
        }

        
        ?>

        
    <script src="public/js/login.js"></script>
    <script src="public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="public/fontawesome-6.2.1/js/all.js"></script>