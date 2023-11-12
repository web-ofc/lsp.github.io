<?php 
include "../app/config/koneksi.php";
$table = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.status_pesanan='Menunggu Konfirmasi' AND pesanan.id_menu=menu.id_menu ORDER BY tgl_pesanan ASC");
// $detail = mysqli_query($mysqli, "SELECT * FROM tb_pesanan, tb_menu, tb_pembeli WHERE tb_pesanan.kd_menu=tb_menu.kd_menu AND tb_pesanan.nis= tb_pembeli.nis AND tb_pesanan.nis");

?>

            
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
                  Data pesanan
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
                              <th>Nama Pembeli</th>
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
                        while ($view = mysqli_fetch_array($table)) {
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
                                        <form method="post" action="../app/function/pemesananDashAdmin.php">
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
                                                        <button type="submit" name="updatePemesanan" value="updatePemesanan" class="btn btn-primary" class="btn-close">Update</button>
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
      </div>

    


  </main>
  <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
          </div>
      </div>
  </footer>
</div>
