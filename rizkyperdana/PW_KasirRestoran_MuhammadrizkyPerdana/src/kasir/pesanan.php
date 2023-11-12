<?php 
include "../../app/config/koneksi.php";
$table1 = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.status_pesanan='Menunggu Konfirmasi' AND pesanan.id_menu=menu.id_menu ORDER BY tgl_pesanan ASC");
// $table2 = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.id_menu=menu.id_menu");
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $table2 = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.id_menu=menu.id_menu AND 
    (nama_pelanggan LIKE '%$keyword%'
    OR status_pesanan LIKE '%$keyword%'
    OR total_harga LIKE '%$keyword%'
    OR tgl_pesanan LIKE '%$keyword%')
    OR nama_menu LIKE '%$keyword%'
    ORDER BY tgl_pesanan DESC");
} else {
    $table2 = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.id_menu=menu.id_menu ORDER BY tgl_pesanan DESC");
}
// $detail = mysqli_query($mysqli, "SELECT * FROM tb_pesanan, tb_menu, tb_pembeli WHERE tb_pesanan.kd_menu=tb_menu.kd_menu AND tb_pesanan.nis= tb_pembeli.nis AND tb_pesanan.nis");

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
          <h1 class="mt-4">Transaksi Pesanan</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
          </ol>
          <div class="">
            <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  Data Pesanan Yang Belum Melakukan Transaksi
              </div>
              <div class="card-body">
                <!-- <div class="btn btn-success mb-3" onclick="window.print();" >Print</div> -->
                  <table id="datatablesSimple" class="table table-responsive table-bordered">
                  <thead>
                          <tr>
                              <th>No</th>
                              <th>Atas Nama</th>
                              <th>Menu Yang Dipesan</th>
                              <th>Banyak Pesanan</th>
                              <th>Total Harga</th>
                              <th>Status</th>
                              <th>Tanggal Pemesanan</th>
                              <th class="no-print">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th>No</th>
                              <th>Atas Nama</th>
                              <th>Menu Yang Dipesan</th>
                              <th>Banyak Pesanan</th>
                              <th>Total Harga</th>
                              <th>Status</th>
                              <th>Tanggal Pemesanan</th>
                              <th class="no-print">Aksi</th>
                          </tr>
                      </tfoot>
                      
                      <tbody>
                      <?php 
                        $no = 1;
                        while ($view = mysqli_fetch_array($table1)) {
                        ?>
                        
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $view["nama_pelanggan"] ?></td>
                                <td><?= $view["nama_menu"] ?></td>
                                <td><?= $view["qty"] ?></td>
                                <td>Rp.<?= $view["total_harga"] ?></td>
                                <td><?= $view["status_pesanan"] ?></td>
                                <td><?= $view["tgl_pesanan"] ?></td>
                                <td>
                                    <div class="no-print">
                                    <button class="btn btn-success btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#status<?= $view["id_pesanan"] ?>">Lakukan Pembayaran</button>
                                    <div class="modal fade" id="status<?= $view["id_pesanan"] ?>" tabindex="-1" aria-hidden="true">
                                        <form method="post" action="../../app/function/DashKasir.php">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Transaksi Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <div class="row">
                                                                <input type="hidden" name="id_pesanan" value="<?= $view['id_pesanan'] ?>">
                                                                <input type="hidden" name="status_pesanan" value="Sudah Dibayar">
                                                                <label for="" class="form-label mt-2">Total Harga</label>
                                                                <input type="text" class="form-control" name="total_harga" id="" value="<?= $view["total_harga"] ?>" required readonly>
                                                                <label for="">Uang Bayar</label>
                                                                <input type="number" min="<?= $view["total_harga"] ?>" class="form-control" name="uang_bayar" id="" placeholder="" required>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="updatePemesanan" value="updatePemesanan" class="btn btn-success" class="btn-close">Bayar</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                          </tr>
                          <?php 
            
                         } ?>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="">
            <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  Data Pesanan Keseluruhan
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
                <!-- <div class="btn btn-success mb-3" onclick="window.print();" >Print</div> -->
                  <table id="example" class="table table-responsive table-bordered">
                  <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Pembeli</th>
                              <th>Menu Yang Dipesan</th>
                              <th>Banyak Pesanan</th>
                              <th>Total Harga</th>
                              <th>Uang Bayar</th>
                              <th>Uang Kembali</th>
                              <th>Status</th>
                              <th>Tanggal Pemesanan</th>
                              <th class="no-print">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th>No</th>
                              <th>Nama Pembeli</th>
                              <th>Menu Yang Dipesan</th>
                              <th>Banyak Pesanan</th>
                              <th>Total Harga</th>
                              <th>Uang Bayar</th>
                              <th>Uang Kembali</th>
                              <th>Status</th>
                              <th>Tanggal Pemesanan</th>
                              <th class="no-print">Aksi</th>
                          </tr>
                      </tfoot>
                      
                      <tbody>
                      <?php 
                        $no = 1;
                        while ($view = mysqli_fetch_array($table2)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $view["nama_pelanggan"] ?></td>
                                <td><?= $view["nama_menu"] ?></td>
                                <td><?= $view["qty"] ?></td>
                                <td>Rp.<?= $view["total_harga"] ?></td>
                                <td>Rp.<?= $view["uang_bayar"] ?></td>
                                <td>Rp.<?= $view["uang_kembali"] ?></td>
                                <td><?= $view["status_pesanan"] ?></td>
                                <td><?= $view["tgl_pesanan"] ?></td>
                                <td>
                                    <div class="no-print">

                                    <button class="btn btn-primary btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#modal<?= $view["id_pesanan"] ?>">Detail</button>
                                    </div>
                                    <div class="modal fade" id="modal<?= $view["id_pesanan"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Nama Pembeli</label>
                                                            <input type="text" class="form-control" readonly value="<?= $view["nama_pelanggan"] ?>">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="" class="form-label mt-2">Pilihan Menu</label>
                                                            <input type="text" class="form-control" readonly value="<?= $view["nama_menu"] ?>">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="" class="form-label mt-2">Harga</label>
                                                            <input type="text" class="form-control" readonly value="Rp.<?= $view["harga_menu"] ?>,-">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="" class="form-label mt-2">Total Pesanan</label>
                                                            <input type="text" class="form-control" readonly value="<?= $view["qty"] ?>">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="" class="form-label mt-2">Total Harga</label>
                                                            <input type="text" class="form-control" readonly value="Rp.<?= $view["total_harga"] ?>,-">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Bayar</label>
                                                            <input type="text" readonly class="form-control" value="Rp.<?= $view["uang_bayar"] ?>,-">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Kembali</label>
                                                            <input type="text" readonly class="form-control" value="Rp.<?= $view["uang_kembali"] ?>,-">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Tanggal Transaksi</label>
                                                            <input type="text" readonly class="form-control" readonly value="<?= $view["tgl_pesanan"] ?>">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Status</label>
                                                            <input type="text" readonly class="form-control" readonly value="<?= $view["status_pesanan"] ?>">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="../print/struk_pesanan.php?id_pesanan=<?= $view['id_pesanan'] ?>" class="btn btn-success">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a href="../app/function/menuDashAdmin.php?id_menu=<?= $view['id_menu']?>" class="btn btn-danger btn-sm small mt-2" onclick='confirm(`Apa Anda Yakin?`)'>Hapus</a> -->
                                </td>
                          </tr>
                          <?php 
            
                         } ?>
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
    <script src="../../public/dashboard/js/scripts.js"></script>
        
        <!-- <scrips -->
        
</body>
</html>