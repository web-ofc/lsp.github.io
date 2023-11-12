

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="window.print()">
    
<?php 
include "../../app/config/koneksi.php";
$id = $_GET['id_pesanan'];
$table = mysqli_query($conn, "SELECT * FROM pesanan, menu WHERE pesanan.id_menu=menu.id_menu AND pesanan.id_pesanan = '$id'");
?>
<center>
<style>
    *{
        font-family: monospace;
    }
</style>
<h1>STRUK PEMBAYARAN</h1>
<p>-------------------------------------------</p>
<table border="0">
<?php 
    $no = 1;
    while ($view = mysqli_fetch_array($table)) {
?>
    <tr>
        <td>Tanggal Transaksi : <br><?= $view["tgl_pesanan"] ?></td>
    </tr>
    <tr>
        <td>Atas Nama : <br><?= $view["nama_pelanggan"] ?></td>
    </tr>
    <tr>
        <td>Menu Yang Dipilih : <br><?= $view["nama_menu"] ?></td>
    </tr>
    <tr>
        <td>Banyak Barang : <br><?= $view["qty"] ?></td>
    </tr>
    <tr>
        <td><p>-------------------------------------------</p></td>
    </tr>
    <tr>
        <td>Total Harga : <br>Rp.<?= $view["total_harga"] ?></td>
    </tr>
    <tr>
        <td>Nominal Pembayaran : <br>Rp.<?= $view["uang_bayar"] ?></td>
    </tr>
    <tr>
        <td>Nominal Kembalian : <br>Rp.<?= $view["uang_kembali"] ?></td>
    </tr>
<?php 
    }
?>
</table>
</center>
</body>
</html>