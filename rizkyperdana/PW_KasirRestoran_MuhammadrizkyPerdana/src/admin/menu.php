<?php 
include_once "../app/config/koneksi.php";
$table = mysqli_query($conn, "SELECT * FROM menu ORDER BY kategori_menu ASC");

?>

            
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">Menu Kasir Resto</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
          </ol>
          <div class="">
            <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  Data Menu
              </div>
              <div class="card-body">
                <!-- <div class="btn btn-success mb-3" onclick="window.print();" >Print</div> -->
                <div class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah</div>
                <form action="../app/function/menuDashAdmin.php" method="post">
                                    <div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Nama Menu</label>
                                                            <input type="text" name="nama_menu" class="form-control" >
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Harga Menu</label>
                                                            <input type="text" name="harga_menu" class="form-control">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Stok Menu</label>
                                                            <input type="text" name="stok_menu" class="form-control">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Kategori menu</label>
                                                            <select name="kategori_menu" id="" class="form-control">
                                                                <option value="Appetizer">Appetizer </option>
                                                                <option value="Main Course">Main Course</option>
                                                                <option value="Dessert">Dessert</option>
                                                                <option value="Drink">Drink</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="insert" value="insert" class="btn btn-primary">Add</button>
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
                              <th>Kategori</th>
                              <th>Harga</th>
                              <th>Stok</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
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
                                <td><?= $view["kategori_menu"] ?></td>
                                <td><?= $view["harga_menu"] ?></td>
                                <td><?= $view["stok_menu"] ?></td>
                                <td>

                                <button class="btn btn-primary btn-sm small" data-bs-toggle="modal" data-bs-target="#modal<?= $view["id_menu"] ?>">Edit</button>
                                    <form action="../app/function/menuDashAdmin.php" method="post">
                                    <div class="modal fade" id="modal<?= $view["id_menu"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="form-group col-6">
                                                            <input type="hidden" name="id_menu" value="<?= $view["id_menu"] ?>">
                                                            <label for="" class="form-label mt-2">Nama Barang</label>
                                                            <input type="text" name="nama_menu" class="form-control" value="<?= $view["nama_menu"] ?>">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="" class="form-label mt-2">Harga Barang</label>
                                                            <input type="text" name="harga_menu" class="form-control" value="<?= $view["harga_menu"] ?>">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="" class="form-label mt-2">Kategori Barang</label>
                                                            <select name="kategori_menu" id="" class="form-control">
                                                                <option value="<?= $view['kategori_menu'] ?>" selected hidden><?= $view['kategori_menu'] ?></option>
                                                                <option value="Appetizer">Appetizer </option>
                                                                <option value="Main Course">Main Course</option>
                                                                <option value="Dessert">Dessert</option>
                                                                <option value="Drink">Drink</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-content">
                                                    <button type="button" class="btn btn-secondary mx-5 mt-1 mb-3" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" value="update" class="btn btn-primary  mx-5 mb-1">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <a href="../app/function/menuDashAdmin.php?id_menu=<?= $view['id_menu']?>" class="btn btn-danger btn-sm small mt-2" onclick='confirm(`Apa Anda Yakin?`)'>Hapus</a>
                                    
                                </td>
                          </tr>
                          <?php 
            
                         } 
                         
                         ?>
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