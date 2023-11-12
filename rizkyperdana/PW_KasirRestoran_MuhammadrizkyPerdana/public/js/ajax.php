<?php 
include "../../app/config/koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tgl_pesanan ASC");
?>

<table id="datatablesSimple" class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Terakhir Transaksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Terakhir Transaksi</th>
        </tr>
    </tfoot>
    <tbody>
    <?php 
    $no = 1;
    while ($view = mysqli_fetch_array($result)) {
    ?>
    <tr>
            <td><?= $no++; ?></td>
            <td><?= $view["nama_pelanggan"] ?></td>
            <td><?= $view["tgl_pesanan"] ?></td>
        </tr>
    <?php } ?>
    </tbody>
    
</table>