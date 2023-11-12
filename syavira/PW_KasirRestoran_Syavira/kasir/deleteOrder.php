<?php
session_start();

$id_menu=$_GET["id"];
unset($_SESSION["order"][$id_menu]);

echo "<script>alert('Menu di delete!');</script>";
echo "<script>location='index.php?halaman=order';</script>";

?>