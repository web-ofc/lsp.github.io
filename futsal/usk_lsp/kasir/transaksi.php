
<?php $tabel1 = $koneksi->query("SELECT * FROM boking, lapangan, kasir WHERE boking.status_pesanan='Menunggu Konfirmasi' AND boking.id_lapangan=lapangan.id_lapangan AND boking.id_kasir=kasir.id_kasir ORDER BY tanggal ASC"); ?>
<?php $tabel2 = $koneksi->query("SELECT * FROM boking, lapangan, kasir WHERE boking.id_lapangan=lapangan.id_lapangan AND boking.id_kasir=kasir.id_kasir  ORDER BY tanggal DESC"); ?>

<h3 class="text-center mt-5 fw-bold">Pembayaran Lapangan PowerPlay Arena Bandung</h3>

<!-- table 1 -->
<div class="container mt-5">
    <div class="card mb-4">
         <div class="card-header">
             <i class="fas fa-table me-1"></i>
             Data Pesanan Yang Belum Melakukan Transaksi
         </div>
         <div class="card-body">
             <table id="datatablesSimple" class="table table-responsive table-bordered">
             <thead>
                     <tr>
                         <th>No</th>
                         <th>Atas Nama</th>
                         <th>Nama Kasir</th>
                         <th>Jenis Lapangan</th>
                         <th>Lama Permainan</th>
                         <th>Total Harga</th>
                         <th>Status</th>
                         <th>Tanggal Pemesanan</th>
                         <th class="no-print">Aksi</th>
                     </tr>
                 </thead>
                 
                 <tbody>
      
                 <?php 
                 $no = 1;
                 while($pecah = $tabel1->fetch_assoc()){ ?>
                 
                     <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $pecah["nama_pelanggan"] ?></td>
                         <td><?= $pecah["nama"] ?></td>
                         <td><?= $pecah["jenis"] ?></td>
                         <td><?= $pecah["jam_sewa"] ?> Jam</td>
                         <td>Rp.<?= $pecah["totalbayar"] ?></td>
                         <td><?= $pecah["status_pesanan"] ?></td>
                         <td><?= $pecah["tanggal"] ?></td>
                         <td>
                             <div class="no-print">
                             <button class="btn btn-success btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#status<?= $pecah["id_boking"] ?>">Lakukan Pembayaran</button>
                             <div class="modal fade" id="status<?= $pecah["id_boking"] ?>" tabindex="-1" aria-hidden="true">
                                 <form method="post">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title">Transaksi Pembayaran</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                     <div class="row">
                                                         <input type="hidden" name="id_boking" value="<?= $pecah['id_boking'] ?>">
                                                         <input type="hidden" name="status_pesanan" value="Sudah Dibayar">
                                                         <label class="form-label mt-2">Total Harga</label>
                                                         <input type="text" class="form-control" name="totalbayar" id="" value="<?= $pecah["totalbayar"] ?>" required readonly>
                                                         <label class="form-label mt-3">Uang Bayar</label>
                                                         <input type="number" min="<?= $pecah["totalbayar"] ?>" class="form-control" name="uang_jumlah" placeholder="Masukan uang" required>
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
                     <?php } ?>

                     

                 </tbody>
             </table>
         </div>
     </div>
</div>
<!-- akhir table 1 -->

<!-- table 2 -->
<div class="container mt-5">
    <div class="card mb-4">
         <div class="card-header">
             <i class="fas fa-table me-1"></i>
             Data Pesanan Transaksi Keseluruhan
         </div>
         <div class="card-body">
             <table id="datatablesSimple" class="table table-responsive table-bordered">
             <thead>
                     <tr>
                         <th>No</th>
                         <th>Atas Nama</th>
                         <th>Nama Kasir</th>
                         <th>Jenis Lapangan</th>
                         <th>Lama Permainan</th>
                         <th>Status</th>
                         <th>Tanggal Pemesanan</th>
                         <th>harga</th>
                         <th>Diskon</th>
                         <th>Subprice</th>
                         <th>Uang Bayar</th>
                         <th>Uang Kembali</th>
                         <th class="no-print">Aksi</th>
                     </tr>
                 </thead>
                 
                 <tbody>
      
                 <?php 
                 $no = 1;
                 while($pecah = $tabel2->fetch_assoc()){ ?>
                 
                     <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $pecah["nama_pelanggan"] ?></td>
                         <td><?= $pecah["nama"] ?></td>
                         <td><?= $pecah["jenis"] ?></td>
                         <td><?= $pecah["jam_sewa"] ?> Jam</td>
                         <td><?= $pecah["status_pesanan"] ?></td>
                         <td><?= $pecah["tanggal"] ?></td>
                         <td><?= $pecah["harga"] ?></td>
                         <td><?= $pecah["diskon"] ?></td>
                         <td>Rp.<?= $pecah["totalbayar"] ?></td>
                         <td><?= $pecah["uang_jumlah"] ?></td>
                         <td><?= $pecah["uang_kembali"] ?></td>
                         <td>
                             <div class="no-print">
                             <button class="btn btn-dark btn-sm small mb-2" data-bs-toggle="modal" data-bs-target="#statuspemesan<?= $pecah["id_boking"] ?>">Detail</button>
                             <div class="modal fade" id="statuspemesan<?= $pecah["id_boking"] ?>" tabindex="-1" aria-hidden="true">
                                 <form method="post">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title">Transaksi Pembayaran</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                     <div class="row">
                                                         <input type="hidden" name="id_boking" value="<?= $pecah['id_boking'] ?>">
                                                         <label class="form-label mt-2">Nama Pelanggan</label>
                                                         <input type="text" class="form-control" name="nama_pelanggan" id="" value="<?= $pecah["nama_pelanggan"] ?>" required readonly>
                                                         <label class="form-label mt-2">Lama Permainan</label>
                                                         <input type="text" class="form-control" name="jam_sewa" id="" value="<?= $pecah["jam_sewa"] ?> Jam" required readonly>
                                                         <label class="form-label mt-2">Tanggal</label>
                                                         <input type="text" class="form-control" name="tanggal" id="" value="<?= $pecah["tanggal"] ?>" required readonly>
                                                         <label class="form-label mt-2">Total Diskon</label>
                                                         <input type="text" class="form-control" name="diskon" id="" value="<?= $pecah["diskon"] ?>" required readonly>
                                                         <label class="form-label mt-2">Total Harga</label>
                                                         <input type="text" class="form-control" name="totalbayar" id="" value="<?= $pecah["totalbayar"] ?>" required readonly>
                                                         <label class="form-label mt-2">Status Pesanan</label>
                                                         <input type="text" class="form-control" name="status_pesanan" id="" value="<?= $pecah["status_pesanan"] ?>" required readonly>
                                                         <label class="form-label mt-2">Uang Jumlah</label>
                                                         <input type="text" class="form-control" name="uang_jumlah" id="" value="<?= $pecah["uang_jumlah"] ?>" required readonly>
                                                         <label class="form-label mt-2">Uang Kembali</label>
                                                         <input type="text" class="form-control" name="uang_kembali" id="" value="<?= $pecah["uang_kembali"] ?>" required readonly>
                                                        
                                                     </div>
                                                 
                                             </div>
                                             <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="nota.php?id=<?= $pecah['id_boking'] ?>" class="btn btn-success">Print</a>
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
<!-- akhir table 2 -->


<?php 

 if (isset($_POST['updatePemesanan'])) {               
        $id_boking = $_POST['id_boking'];
        $totalbayar = $_POST['totalbayar'];
        $status_pesanan = $_POST['status_pesanan'];
        $uang_jumlah = $_POST['uang_jumlah'];

        $diskon = 0;
        if ($totalbayar > 60000 && $totalbayar <= 120000) {
            $diskon = 1000;
        } else if ($totalbayar > 120000) {
            $diskon = 2000;
        }
        $subtotal = $totalbayar - $diskon;
        $uang_kembali = $uang_jumlah - $subtotal;

         $query = "UPDATE boking SET status_pesanan='$status_pesanan', totalbayar='$subtotal',uang_jumlah='$uang_jumlah',uang_kembali='$uang_kembali',diskon='$diskon' WHERE id_boking='$id_boking'";

        if ($koneksi->query($query) === TRUE) {
            echo "<script>alert('Data terupdate!');</script>";
            echo "<script>location='index.php?halaman=transaksi';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }
    }
 
?>