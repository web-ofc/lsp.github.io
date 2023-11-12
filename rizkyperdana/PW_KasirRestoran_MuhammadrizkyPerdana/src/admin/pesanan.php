<?php 
include "../app/config/koneksi.php";
$table = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.id_menu=menu.id_menu ORDER BY pesanan.tgl_pesanan DESC");
?>

            
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">Data Pesanan</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
          </ol>
          <div class="">
            <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  Data Pesanan
              </div>
              <div class="card-body">
                <!-- <div class="btn btn-success mb-3" onclick="window.print();" >Print</div> -->
                  <table id="datatablesSimple" class="table table-responsive table-bordered">
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
                        while ($view = mysqli_fetch_array($table)) {
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
                                                    <a href="print/struk_pesanan.php?id_pesanan=<?= $view['id_pesanan'] ?>" class="btn btn-success">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a href="../app/function/menuDashAdmin.php?id_menu=?= $view['id_menu']?>" class="btn btn-danger btn-sm small mt-2" onclick='confirm(`Apa Anda Yakin?`)'>Hapus</a> -->
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