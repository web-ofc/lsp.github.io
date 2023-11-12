<h1 class="text-center mt-5">List Kasir</h1><br><br>

<form method="post" action="" class="form-inline d-flex justify-content-center mt-3 col-5 mx-auto mb-4">
    <input class="form-control" type="text" name="keyword" placeholder="Search" aria-label="Search">
    <button class="btn btn-dark my-2 my-sm-0" type="submit" name="cari">Search</button>
</form>


<div class="table-responsive col-9 mx-auto text-center">
    <!-- Tambah Data -->
     <div class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah</div>
    <!-- Akhir Tambah Data -->
    <table class="table table-light table-striped table-hover">
        <thead>
            <tr>
                <th>ID Kasir</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama</th>
                <th>No HP</th>
                <th class="no-print">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_POST['cari'])) {
                    $keyword = $_POST['keyword'];
                    $ambil = $koneksi->query("SELECT * FROM kasir WHERE  username LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR nohp LIKE '%$keyword%'");
                    
                } else {
                    $ambil = $koneksi->query("SELECT * FROM kasir");
                }

                while ($pecah = $ambil->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $pecah['id_kasir']; ?></td>
                    <td><?= $pecah['username']; ?></td>
                    <td><?= $pecah['password']; ?></td>
                    <td><?= $pecah['nama']; ?></td>
                    <td><?= $pecah['nohp']; ?></td>
                    <td>
                        <!-- update modal -->
                        <div class="update">
                            <button class="btn btn-primary btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#modal<?= $pecah['id_kasir'] ?>">Update</button>
                            <div class="modal fade" id="modal<?= $pecah["id_kasir"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_kasir" value="<?= $pecah['id_kasir'] ?>">
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">Username</label>
                                                        <input type="text" name="username" class="form-control" value="<?= $pecah["username"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">Password</label>
                                                        <input type="password" name="password" class="form-control" value="<?= $pecah["password"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?= $pecah["nama"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">NoHP</label>
                                                        <input type="text" name="nohp" class="form-control" value="<?= $pecah["nohp"] ?>">
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
                            <input type="hidden" name="id_kasir" value="<?= $pecah['id_kasir'] ?>">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah kasir</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">nama kasir</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">nama</label>
                                <input type="text" name="nama" class="form-control" >
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">NoHP</label>
                                <input type="text" name="nohp" class="form-control" >
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
    if (isset($_POST['insert']))
    {
        $koneksi->query("INSERT INTO kasir (username,password,nama,nohp) VALUES ('$_POST[username]','$_POST[password]','$_POST[nama]','$_POST[nohp]')");

        echo "<script>alert('Berhasil!');</script>";
        echo "<script>location='index.php?halaman=kasir';</script>";
    }

    if (isset($_POST['ubah'])) {

        $id_kasir = $_POST['id_kasir'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];

        $query = "UPDATE kasir SET username='$username',password='$password',nama='$nama',nohp='$nohp' WHERE id_kasir='$id_kasir'";

        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terupdate!');</script>";
            echo "<script>location='index.php?halaman=kasir';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }
    }

   if (isset($_POST['hapus'])) {
        $id = $_POST['id_kasir'];
        $query = "DELETE FROM kasir WHERE id_kasir='$id'";
        
        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terhapus!');</script>";
            echo "<script>location='index.php?halaman=kasir';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data.');</script>";
        }
    }

?>