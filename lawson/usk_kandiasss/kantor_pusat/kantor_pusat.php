<h1 class="text-center mt-5">DATA PUSAT</h1><br><br>

<form method="post" action="" class="form-inline d-flex justify-content-center mt-3 col-5 mx-auto mb-4">
    <input class="form-control" type="text" name="keyword" placeholder="Search" aria-label="Search">
    <button class="btn btn-dark my-2 my-sm-0" type="submit" name="cari">Search</button>
</form>


<div class="table-responsive col-9 mx-auto text-center">
    <!-- Tambah Data -->
     <div class="btn btn-warning mb-3 col-5" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah</div>
    <!-- Akhir Tambah Data -->
    <table class="table table-light table-striped table-hover">
        <thead>
            <tr>
                
                <td>Id Kantor Pusat</td>
                <td>Username</td>
                <td>Nama Kantor Pusat</td>
                <td>Alamat</td>
                <td>Pimpinan</td>
                <td>Email</td>
                <td>NO NPWP</td>
                <th class="no-print">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_POST['cari'])) {
                    $keyword = $_POST['keyword'];
                    $ambil = $koneksi->query("SELECT * FROM kantor_pusat WHERE nama_kantor_pusat LIKE '%$keyword%' OR username LIKE '%$keyword%' OR pimpinan LIKE '%$keyword%'");
                    
                } else {
                    $ambil = $koneksi->query("SELECT * FROM kantor_pusat");
                }

                while ($pecah = $ambil->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $pecah['id_kantor_pusat']; ?></td>
                    <td><?= $pecah['username']; ?></td>
                    <td><?= $pecah['nama_kantor_pusat']; ?></td>
                    <td><?= $pecah['alamat']; ?></td>
                    <td><?= $pecah['pimpinan']; ?></td>
                    <td><?= $pecah['email']; ?></td>
                    <td><?= $pecah['no_npwp']; ?></td>
                    <td>
                        <!-- update modal -->
                        <div class="update">
                            <button class="btn btn-primary btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#modal<?= $pecah['id_kantor_pusat'] ?>">Update</button>
                            <div class="modal fade" id="modal<?= $pecah["id_kantor_pusat"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_kantor_pusat" value="<?= $pecah['id_kantor_pusat'] ?>">
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">Username</label>
                                                        <input type="text" name="username" class="form-control" value="<?= $pecah["username"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">password</label>
                                                        <input type="password" name="password" class="form-control" value="<?= $pecah["password"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">Nama Kantor Pusat</label>
                                                        <input type="text" name="nama_kantor_pusat" class="form-control" value="<?= $pecah["nama_kantor_pusat"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">alamat</label>
                                                        <input type="text" name="alamat" class="form-control" value="<?= $pecah["alamat"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">pimpinan</label>
                                                        <input type="text" name="pimpinan" class="form-control" value="<?= $pecah["pimpinan"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">email</label>
                                                        <input type="text" name="email" class="form-control" value="<?= $pecah["email"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">no npwp</label>
                                                        <input type="text" name="no_npwp" class="form-control" value="<?= $pecah["no_npwp"] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button name="ubah" type="submit" value="ubah" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- akhir update modal -->

                        <!-- hapus modal -->
                        <form action="" method="post">
                            <input type="hidden" name="id_kantor_pusat" value="<?= $pecah['id_kantor_pusat'] ?>">
                            <button type="submit" name="hapus" class="btn btn-danger btn-sm small mt-2" onclick="return confirm('Apa Anda Yakin?')">Hapus</button>
                        </form>
                        <!-- akhir hapus modal -->
                    </td>
                </tr>
            <?php } ?>
                                    
        </tbody>
    </table>
</div>

    <!-- tambah dengan modal -->
    <form action="" method="post">
        <div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah kantor_pusat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-start mb-3">
                                <label for="" class="form-label mt-2">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group col-12 text-start mb-3">
                                <label for="" class="form-label mt-2">password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>
                            <div class="form-group col-12 text-start">
                                <label for="" class="form-label mt-2 ">Nama Kantor Pusat</label>
                                <input type="text" name="nama_kantor_pusat" class="form-control" >
                            </div>
                            <div class="form-group col-12 text-start mb-3">
                                <label for="" class="form-label mt-2">alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>
                            <div class="form-group col-12 text-start mb-3">
                                <label for="" class="form-label mt-2">pimpinan</label>
                                <input type="text" name="pimpinan" class="form-control">
                            </div>
                            <div class="form-group col-12 text-start mb-3">
                                <label for="" class="form-label mt-2">email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group col-12 text-start mb-3">
                                <label for="" class="form-label mt-2">no npwp</label>
                                <input type="text" name="no_npwp" class="form-control">
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


<?php 
    if (isset($_POST['insert'])){
        $koneksi->query("INSERT INTO kantor_pusat (username,password,nama_kantor_pusat,alamat,pimpinan,email,no_npwp) VALUES ('$_POST[username]','$_POST[password]','$_POST[nama_kantor_pusat]','$_POST[alamat]','$_POST[pimpinan]','$_POST[email]','$_POST[no_npwp]')");

        echo "<script>alert('Berhasil!');</script>";
        echo "<script>location='index.php?halaman=kantor_pusat';</script>";
    }

    if (isset($_POST['ubah'])) {

        $id_kantor_pusat = $_POST['id_kantor_pusat'];
        $username_baru = $_POST['username'];
        $password_baru = $_POST['password'];
        $nama_kantor_pusat_baru = $_POST['nama_kantor_pusat'];
        $alamat_baru = $_POST['alamat'];
        $pimpinan_baru = $_POST['pimpinan'];
        $email_baru = $_POST['email'];
        $no_npwp_baru = $_POST['no_npwp'];

        $query = "UPDATE kantor_pusat SET username='$username_baru',password='$password_baru',nama_kantor_pusat='$nama_kantor_pusat_baru',alamat='$alamat_baru',pimpinan='$pimpinan_baru',email='$email_baru',no_npwp='$no_npwp_baru' WHERE id_kantor_pusat='$id_kantor_pusat'";

        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terupdate!');</script>";
            echo "<script>location='index.php?halaman=kantor_pusat';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }
    }

   if (isset($_POST['hapus'])) {
        $id = $_POST['id_kantor_pusat'];
        $query = "DELETE FROM kantor_pusat WHERE id_kantor_pusat='$id'";
        
        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terhapus!');</script>";
            echo "<script>location='index.php?halaman=kantor_pusat';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data.');</script>";
        }
    }

?>