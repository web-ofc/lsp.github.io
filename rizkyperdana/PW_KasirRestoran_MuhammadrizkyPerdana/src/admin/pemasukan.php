<?php 
include "../app/config/koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM pemasukan");
$table = mysqli_query($conn, "SELECT * FROM pemasukan, menu WHERE pemasukan.id_menu=menu.id_menu");
$men = mysqli_query($conn, "SELECT * FROM menu")
?>

            
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">Tambah Stok Menu Kasir Resto</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
          </ol>
          <div class="">
            <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  Data Pemasukan
              </div>
              <div class="card-body">
                <div class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah</div>
                    <form action="../app/function/menuDashAdmin.php" method="post">
                        <div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-12">
                                            <label for="" class="form-label mt-2">Menu</label>
                                            <select name="id_menu" id="" class="form-control">
                                                <?php while ($id_menu = mysqli_fetch_array($men)) {
                                                    ?>
                                                <option value="<?= $id_menu['id_menu'] ?>"><?= $id_menu['nama_menu'] ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="" class="form-label mt-2">Banyak Stok Pemasukan</label>
                                                <input type="text" name="stok_masuk" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="insertPemasukan" value="insertPemasukan" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="datatablesSimple" class="table table-responsive table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Menu</th>
                              <th>Banyak Pemasukan</th>
                              <th>Tanggal</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Nama menu</th>
                              <th>Banyak Pemasukan</th>
                              <th>Tanggal</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                        $no = 1;
                        while ($view = mysqli_fetch_array($table)) {
                        ?>
                        <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $view["nama_menu"] ?></td>
                                <td><?= $view["stok_masuk"] ?></td>
                                <td><?= $view["tgl_pemasukan"] ?></td>
                                
                          </tr>
                        <?php } ?>
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
  </footer>
</div>