<?php 
include_once "../config/koneksi.php";

if(isset($_POST['insert'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $result = mysqli_query($conn, "INSERT INTO user (username, email, password, role) VALUES('$username', '$email', '$password', '$role')");

    header("location:../../src/dashboard_admin.php?content=pengguna");
} elseif(isset($_POST['update'])) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $result = mysqli_query($conn, "UPDATE user SET username = '$username', email = '$email', password = '$password', role = '$role'  WHERE id_user = '$id_user'");
    header("location:../../src/dashboard_admin.php?content=pengguna");

} elseif (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
 
    $result = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'");
    header("location:../../src/dashboard_admin.php?content=pengguna");
}
 ?>