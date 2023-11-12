<?php
session_start();

$id_barang=$_GET["id"];
unset($_SESSION["order"][$id_barang]);

echo "<script>alert('Menu di delete!');</script>";
echo "<script>location='index.php?halaman=order';</script>";

?>