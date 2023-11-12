<?php 
include_once "../app/config/koneksi.php";
$data = $_SESSION['id_user'];
$result = mysqli_query($conn, "SELECT * FROM pesanan, menu, user WHERE pesanan.id_menu=menu.id_menu AND pesanan.id_user= user.id_user AND pesanan.id_user LIKE '%$data%'")

?>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Menu Yang Dipilih</th>
      <th scope="col">Jumlah Pemesanan</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Waktu Pemesanan</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no = 1;
    while ($view = mysqli_fetch_array($result)) {
    ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $view['nama_menu'] ?></td>
      <td><?= $view['qty'] ?></td>
      <td><?= $view['total_harga'] ?></td>
      <td><?= $view['tgl_pesanan'] ?></td>
      <td><span><?= $view['status_pesanan'] ?></span></td>
      <td>
        <!-- <a href="print/print.php?id_pesanan=<= $view['id_pesanan'] ?>" class="btn btn-sm btn-success">Cetak</a> -->
        <?php 
        if ($view['status_pesanan'] == "Menunggu Konfirmasi") {
          echo '<a href="print/print.php?id_pesanan=' . $view['id_pesanan'] . '" class="btn btn-sm btn-success disabled" disable>Cetak</a>';
        } else {
          echo '<a href="print/print.php?id_pesanan=' . $view['id_pesanan'] . '" class="btn btn-sm btn-success">Cetak</a>';
        }
        ?>
      </td>
    </tr>
    <?php 
    } ?>
  </tbody>
</table>
</div>