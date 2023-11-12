<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_kasirrestoran_syavira");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet"  href="../css/style.css">
</head>
<body>
  <div class="jud">
  <h1 class="center">RESTAURANT BRACHIOSAURUS</h1>
  </div>
  <div class="das"><br><br>
  <div class="log center" style="text-align: center;">
         <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
 
		<form method="post">
        <div>
			<input type="text" name="email" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Email" required="required">
        </div><br>
        <div>
			<input type="password" name="password" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Password" required="required">
        </div><br>
        
        <button name="login" style="border-radius: 20px; height: 35px; text-align: center; width: 90px; background-color: pink;" >Login</button><br><br>
   </form>	
	</div>
  </div>

   <?php
  if (isset($_POST["login"]))
  {
    $email = $_POST["email"];
    $password = $_POST["password"];

      $kasir = mysqli_query($koneksi,"select * from kasir where email='$email' and password='$password'");
      $k = mysqli_fetch_array ($kasir);
      $admin = mysqli_query($koneksi,"select * from admin where email='$email' and password='$password'");
      $a = mysqli_fetch_array ($admin);
      $pelanggan = mysqli_query($koneksi,"select * from pelanggan where email='$email' and password='$password'");
      $p = mysqli_fetch_array ($pelanggan);

          if (mysqli_num_rows($kasir) == 1) {
             $_SESSION['email'] = $k['email'];
             $_SESSION['password'] = $k['password'];
             $_SESSION['level'] = 'kasir';
             echo "<script>alert('Anda sukses login!!!');</script>";
             echo "<script>location='../kasir/index.php';</script>";
          }elseif (mysqli_num_rows($admin) == 1) {
             $_SESSION['email'] = $a['email'];
             $_SESSION['password'] = $a['password'];
             $_SESSION['level'] = 'admin';
             echo "<script>alert('Anda sukses login!!!');</script>";
             echo "<script>location='../admin/index.php';</script>";
          }elseif (mysqli_num_rows($pelanggan) == 1) {
             $_SESSION['email'] = $p['email'];
             $_SESSION['password'] = $p['password'];
             $_SESSION['level'] = 'pelanggan';
             echo "<script>alert('Anda sukses login!!!');</script>";
             echo "<script>location='../pelanggan/index.php';</script>";
          }else {
             echo "<script>alert('Anda gagal login!!!');</script>";
             echo "<script>location='index.php';</script>";
          }

  }
  ?>


</body>

</html> 