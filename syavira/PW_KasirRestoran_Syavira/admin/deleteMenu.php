<?php

$koneksi->query("DELETE FROM menu WHERE id_menu='$_GET[id]'");

echo "<script>alert('Data terdelete!');</script>";
echo "<script>location='index.php?halaman=menu';</script>";

?>