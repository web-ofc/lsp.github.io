<?php 
include_once "../config/koneksi.php";
if(isset($_POST['update'])) {
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $kategori_menu = $_POST['kategori_menu'];

    $result = mysqli_query($conn, "UPDATE menu SET nama_menu = '$nama_menu', kategori_menu = '$kategori_menu', harga_menu = '$harga_menu' WHERE id_menu = '$id_menu';");

    header("location:../../src/dashboard_admin.php?content=menu");

} elseif (isset($_POST['insert'])) {
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $stok_menu = $_POST['stok_menu'];
    $kategori_menu = $_POST['kategori_menu'];
    

    $result = mysqli_query($conn, "INSERT INTO menu VALUES('', '$nama_menu', '$kategori_menu', '$harga_menu', '$stok_menu')");

    header("location:../../src/dashboard_admin.php?content=menu");
} elseif (isset($_GET['id_menu'])) {
    $id_menu = $_GET['id_menu'];
 
    $result = mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$id_menu'");
    header("location:../../src/dashboard_admin.php?content=menu");
} elseif (isset($_POST['insertPemasukan'])) {
    $id_menu = $_POST['id_menu'];
    $stok_masuk = $_POST['stok_masuk'];
    $result = mysqli_query($conn, "INSERT INTO pemasukan VALUES('', '$id_menu', '$stok_masuk', now())");
    header("location:../../src/dashboard_admin.php?content=pemasukan");
}
?>