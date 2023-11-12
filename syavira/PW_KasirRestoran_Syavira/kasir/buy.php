<?php
session_start();

$id_menu = $_GET['id'];

if(isset($_SESSION['order'][$id_menu]))
{
	$_SESSION['order'][$id_menu]+=1;
}
else
{
	$_SESSION['order'][$id_menu] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('Menu telah masuk ke history order');</script>";
echo "<script>location='index.php?halaman=order';</script>";

?>
