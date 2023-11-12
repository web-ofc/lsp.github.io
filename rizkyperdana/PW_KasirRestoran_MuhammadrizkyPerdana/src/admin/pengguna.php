<?php 
include "../app/config/koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM user");
?>

            
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">Master Pengguna</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Aplikasi Kasir Resto</li>
          </ol>
          <div class="">
            <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  Data Pengguna
              </div>
              <div class="card-body">
                <!-- <div class="btn btn-success mb-3" onclick="window.print();" >Print</div> -->
                <div class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah</div>
                <form action="../app/function/userDashAdmin.php" method="post">
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
                                                            <label for="" class="form-label mt-2">Username</label>
                                                            <input type="text" name="username" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Email</label>
                                                            <input type="email" name="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Password</label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Role Akun</label>
                                                            <select name="role" id="" class="form-control">
                                                                <option selected disabled hidden>Pilih Role</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Kasir">Kasir</option>
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
                              <th>Username</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th width = "20px">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                        $no = 1;
                        while ($view = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $view["username"] ?></td>
                                <td><?= $view["email"] ?></td>
                                <td><?= $view["role"] ?></td>
                                <td>
                                <button class="btn btn-primary btn-sm small" data-bs-toggle="modal" data-bs-target="#modal<?= $view["id_user"] ?>">Edit</button>
                                    <form action="../app/function/userDashAdmin.php" method="post">
                                    <div class="modal fade" id="modal<?= $view["id_user"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Username</label>
                                                            <input type="hidden" name="id_user" class="form-control" value="<?= $view["id_user"] ?>">
                                                            <input type="text" name="username" class="form-control" value="<?= $view["username"] ?>">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Email</label>
                                                            <input type="email" name="email" value="<?= $view["email"] ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Password Baru</label>
                                                            <input type="text" name="password" value="<?= $view["password"] ?>" class="form-control" >
                                                        </div>
                                                        <div class="row">
                                                        <div class="form-group col-12">
                                                            <label for="" class="form-label mt-2">Role Akun</label>
                                                            <select name="role" id="" class="form-control">
                                                                <option value="<?= $view["role"] ?>" selected hidden><?= $view["role"] ?></option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Kasir">Kasir</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <a href="../app/function/userDashAdmin.php?id_user=<?= $view['id_user']?>" class="btn btn-danger btn-sm small mt-2" onclick='confirm(`Apa Anda Yakin?`)'>Hapus</a>
                                </td>
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
      </div>
  </footer>
</div>