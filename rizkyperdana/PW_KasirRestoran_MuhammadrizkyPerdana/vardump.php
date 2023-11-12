<?php 
require_once('app/config/koneksi.php');

$result = mysqli_query($conn, "SELECT * FROM menu");

while ($view = mysqli_fetch_array($result)) {
    var_dump($view);
}
// DEBUGGING MENGGUNAKAN VAR_DUMP
// Menampilkan isi table menu