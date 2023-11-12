<div id="layoutSidenav_content">
<?php 
    include "../app/config/koneksi.php";
    // menu
    $data_menu = mysqli_query($conn,"SELECT * FROM menu");
    $jumlah_menu = mysqli_num_rows($data_menu);

    // pesanan
    $data_pesanan = mysqli_query($conn,"SELECT * FROM pesanan");
    $jumlah_pesanan = mysqli_num_rows($data_pesanan);

    // pemasukan
    $data_pemasukan = mysqli_query($conn,"SELECT * FROM pemasukan");
    $jumlah_pemasukan = mysqli_num_rows($data_pemasukan);

    // pengguna
    $data_user = mysqli_query($conn,"SELECT * FROM user");
    $jumlah_user = mysqli_num_rows($data_user);
    ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Aplikasi Koperasi Sekolah</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body d-inline-block">
                                        <div class="h2">Pemesanan</div>
                                         <div class="h1"><?= $jumlah_pesanan ?></div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_admin.php?content=pesanan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body d-inline-block">
                                        <div class="h2">Menu</div>
                                         <div class="h1"><?= $jumlah_menu ?></div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_admin.php?content=menu">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body d-inline-block">
                                        <div class="h2">Pemasukan</div>
                                         <div class="h1"><?= $jumlah_pemasukan ?></div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_admin.php?content=pemasukan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body d-inline-block">
                                        <div class="h2">Pengguna</div>
                                         <div class="h1"><?= $jumlah_user ?></div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_admin.php?content=pengguna">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                    </div>
                </footer>
            </div>