<?php 
include_once "../config/koneksi.php";
if (isset($_GET['id_pesanan'])) {
    $id_pesanan = $_GET['id_pesanan'];
 
    $result = mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan='$id_pesanan'");
    header("location:../../src/dashboard_admin.php?content=pemesanan");
} elseif (isset($_POST['updatePemesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $total_harga = $_POST['total_harga'];
    $uang_bayar = $_POST['uang_bayar'];
    $uang_kembali = ($uang_bayar - $total_harga);
    $status_pesanan = $_POST['status_pesanan'];

    $result = mysqli_query($conn, "UPDATE pesanan SET uang_bayar = '$uang_bayar', uang_kembali = '$uang_kembali', status_pesanan = '$status_pesanan' WHERE id_pesanan = '$id_pesanan';");

    header("location:../../src/print/struk_pesanan.php?id_pesanan=".$id_pesanan);
} 
?>