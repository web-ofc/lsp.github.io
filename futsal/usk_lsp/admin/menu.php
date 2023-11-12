<h1 class="text-center mt-5">List Lapangan</h1><br><br>

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
                <th>ID Lapangan</th>
                <th>Nama Lapangan</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Max Jam Perhari</th>
                <th>Image</th>
                <th class="no-print">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_POST['cari'])) {
                    $keyword = $_POST['keyword'];
                    $ambil = $koneksi->query("SELECT * FROM lapangan WHERE nama_lapangan LIKE '%$keyword%' OR jenis LIKE '%$keyword%'");
                    
                } else {
                    $ambil = $koneksi->query("SELECT * FROM lapangan");
                }

                while ($pecah = $ambil->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $pecah['id_lapangan']; ?></td>
                    <td><?= $pecah['nama_lapangan']; ?></td>
                    <td><?= $pecah['jenis']; ?></td>
                    <td><?= $pecah['harga']; ?></td>
                    <td><?= $pecah['max_jam_perhari']; ?></td>
                    <td><img src="../img/<?= $pecah['gambar']; ?>" width="150"></td>
                    <td>
                        <!-- update modal -->
                        <div class="update">
                            <button class="btn btn-primary btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#modal<?= $pecah['id_lapangan'] ?>">Update</button>
                            <div class="modal fade" id="modal<?= $pecah["id_lapangan"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_lapangan" value="<?= $pecah['id_lapangan'] ?>">
                                                    <div class="form-group col-12 text-start mb-3">
                                                        <label for="" class="form-label mt-2">nama lapangan</label>
                                                        <input type="text" name="nama_lapangan" class="form-control" value="<?= $pecah["nama_lapangan"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">jenis</label>
                                                        <input type="text" name="jenis" class="form-control" value="<?= $pecah["jenis"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">harga</label>
                                                        <input type="text" name="harga" class="form-control" value="<?= $pecah["harga"] ?>">
                                                    </div>
                                                    <div class="form-group col-12 text-start">
                                                        <label for="" class="form-label mt-2 ">max_jam_perhari</label>
                                                        <input type="text" name="max_jam_perhari" class="form-control" value="<?= $pecah["max_jam_perhari"] ?>">
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
                            <input type="hidden" name="id_lapangan" value="<?= $pecah['id_lapangan'] ?>">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah lapangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">nama lapangan</label>
                                <input type="text" name="nama_lapangan" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">jenis</label>
                                <input type="text" name="jenis" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">harga</label>
                                <input type="text" name="harga" class="form-control" >
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="form-label mt-2">max jam perhari</label>
                                <input type="text" name="max_jam_perhari" class="form-control" >
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
        $koneksi->query("INSERT INTO lapangan (nama_lapangan,jenis,harga,max_jam_perhari,gambar) VALUES ('$_POST[nama_lapangan]','$_POST[jenis]','$_POST[harga]','$_POST[max_jam_perhari]','$_POST[gambar]')");

        echo "<script>alert('Berhasil!');</script>";
        echo "<script>location='index.php?halaman=menu';</script>";
    }

    if (isset($_POST['ubah'])) {

        $id_lapangan = $_POST['id_lapangan'];
        $nama_lapangan = $_POST['nama_lapangan'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $max_jam_perhari = $_POST['max_jam_perhari'];
        $gambar = $_POST['gambar'];

        $query = "UPDATE lapangan SET nama_lapangan='$nama_lapangan',jenis='$jenis',harga='$harga',max_jam_perhari='$max_jam_perhari',gambar='$gambar' WHERE id_lapangan='$id_lapangan'";

        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terupdate!');</script>";
            echo "<script>location='index.php?halaman=menu';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }
    }

   if (isset($_POST['hapus'])) {
        $id = $_POST['id_lapangan'];
        $query = "DELETE FROM lapangan WHERE id_lapangan='$id'";
        
        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terhapus!');</script>";
            echo "<script>location='index.php?halaman=menu';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data.');</script>";
        }
    }

?>