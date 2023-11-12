<?php 
include_once "../config/koneksi.php";

if (isset($_POST['updatePemesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $total_harga = $_POST['total_harga'];
    $uang_bayar = $_POST['uang_bayar'];
    $uang_kembali = ($uang_bayar - $total_harga);
    $status_pesanan = $_POST['status_pesanan'];

    $result = mysqli_query($conn, "UPDATE pesanan SET uang_bayar = '$uang_bayar', uang_kembali = '$uang_kembali', status_pesanan = '$status_pesanan' WHERE id_pesanan = '$id_pesanan';");

    header("location:../../src/kasir/pesanan.php");
} elseif (isset($_POST['tambahMenu'])) {
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $stok_menu = $_POST['stok_menu'];
    $kategori_menu = $_POST['kategori_menu'];

    $result = mysqli_query($conn, "INSERT INTO menu VALUES('', '$nama_menu', '$kategori_menu', '$harga_menu', '$stok_menu')");

    // var_dump($result);

    header("location:../../src/kasir/menu.php");
} elseif(isset($_POST['editMenu'])) {
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $kategori_menu = $_POST['kategori_menu'];

    $result = mysqli_query($conn, "UPDATE menu SET nama_menu = '$nama_menu', kategori_menu = '$kategori_menu', harga_menu = '$harga_menu' WHERE id_menu = '$id_menu';");

    header("location:../../src/kasir/menu.php");

}elseif (isset($_GET['id_menu'])) {
    $id_menu = $_GET['id_menu'];
 
    $result = mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$id_menu'");
    header("location:../../src/kasir/menu.php");
}
?>