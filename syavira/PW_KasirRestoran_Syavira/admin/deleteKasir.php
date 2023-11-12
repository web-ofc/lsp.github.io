<?php

$koneksi->query("DELETE FROM kasir WHERE id_kasir='$_GET[id]'");

echo "<script>alert('Data terdelete!');</script>";
echo "<script>location='index.php?halaman=dataKasir';</script>";

?>