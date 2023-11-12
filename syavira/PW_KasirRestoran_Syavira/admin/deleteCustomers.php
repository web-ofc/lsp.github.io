<?php

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('Data terdelete!');</script>";
echo "<script>location='index.php?halaman=customers';</script>";

?>