<?php
session_start();

$id_barang = $_GET['id'];

if(isset($_SESSION['order'][$id_barang]))
{
	$_SESSION['order'][$id_barang]+=1;
}
else
{
	$_SESSION['order'][$id_barang] = 1;
}

// echo "<br> <div class='alert alert-success'> Pesanan Sukses. Silahkan barangju meja kasir untuk melakukan pembayaran.</div>";

echo "<div class='alert alert-success'><script>alert('menu telah masuk ke history order');</script></div>";
echo "<script>location='index.php?halaman=order';</script>";

?>
