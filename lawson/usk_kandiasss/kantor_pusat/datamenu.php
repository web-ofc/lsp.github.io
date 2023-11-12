<h1 class="text-center mt-5">DATA BARANG</h1><br><br>

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
                <th>ID barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Image</th>
                <th class="no-print">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_POST['cari'])) {
                    $keyword = $_POST['keyword'];
                    $ambil = $koneksi->query("SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%' OR kategori LIKE '%$keyword%'");
                    
                } else {
                    $ambil = $koneksi->query("SELECT * FROM barang");
                }

                while ($pecah = $ambil->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $pecah['id_barang']; ?></td>
                    <td><?= $pecah['nama_barang']; ?></td>
                    <td><?= $pecah['kategori']; ?></td>
                    <td><?= $pecah['harga']; ?></td>
                    <td><?= $pecah['stok']; ?></td>
                    <td><img src="../img/<?= $pecah['gambar']; ?>" width="150"></td>
                    <td>
                        <!-- update modal -->
                        <div class="update">
                            <button class="btn btn-primary btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#modal<?= $pecah['id_barang'] ?>">Update</button>
                            <div class="modal fade" id="modal<?= $pecah["id_barang"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_barang" value="<?= $pecah['id_barang'] ?>">
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">nama barang</label>
                                                        <input type="text" name="nama_barang" class="form-control" value="<?= $pecah["nama_barang"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">kategori</label>
                                                        <input type="text" name="kategori" class="form-control" value="<?= $pecah["kategori"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">harga</label>
                                                        <input type="text" name="harga" class="form-control" value="<?= $pecah["harga"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">stok</label>
                                                        <input type="text" name="stok" class="form-control" value="<?= $pecah["stok"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">gambar</label>
                                                        <input type="text" name="gambar" class="form-control" value="<?= $pecah["gambar"] ?>">
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
                            <input type="hidden" name="id_barang" value="<?= $pecah['id_barang'] ?>">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">nama barang</label>
                                <input type="text" name="nama_barang" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">kategori</label>
                                <input type="text" name="kategori" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">harga</label>
                                <input type="text" name="harga" class="form-control" >
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">stok</label>
                                <input type="text" name="stok" class="form-control" >
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">gambar</label>
                                <input type="text" name="gambar" class="form-control" >
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
        $koneksi->query("INSERT INTO barang (nama_barang,kategori,harga,stok,gambar) VALUES ('$_POST[nama_barang]','$_POST[kategori]','$_POST[harga]','$_POST[stok]','$_POST[gambar]')");

        echo "<script>alert('Berhasil!');</script>";
        echo "<script>location='index.php?halaman=datamenu';</script>";
    }

    if (isset($_POST['ubah'])) {

        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $gambar = $_POST['gambar'];

        $query = "UPDATE barang SET nama_barang='$nama_barang',kategori='$kategori',harga='$harga',stok='$stok',gambar='$gambar' WHERE id_barang='$id_barang'";

        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terupdate!');</script>";
            echo "<script>location='index.php?halaman=datamenu';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }
    }

   if (isset($_POST['hapus'])) {
        $id = $_POST['id_barang'];
        $query = "DELETE FROM barang WHERE id_barang='$id'";
        
        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terhapus!');</script>";
            echo "<script>location='index.php?halaman=datamenu';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data.');</script>";
        }
    }

?>