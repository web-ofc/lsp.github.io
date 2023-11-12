<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "db_kasirrestoran_mrizkyperdana";
$conn= mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>