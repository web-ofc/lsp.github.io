<?php
session_start();

// Unset semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang diinginkan setelah logout
header("Location: login.php");
exit();
?>
