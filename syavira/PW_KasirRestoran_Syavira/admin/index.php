<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_kasirrestoran_syavira");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet"  href="../css/style.css">
	<style>
		
	</style>
</head>

<body>
  <div class="jud">
  <h2 style="text-align: left;">Dashboard <br>
  Admin</h2>
  <h1 class="center">RESTAURANT BRACHIOSAURUS</h1>
  </div>
  <div class="das">
  <div class="menu center">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="index.php?halaman=menu">DATA MENU</a></li>
      <li><a href="index.php?halaman=dataTransaksi">DATA TRANSAKSI</a></li>
      <li><a href="index.php?halaman=customers">DATA CUSTOMERS</a></li>
      <li><a href="index.php?halaman=dataKasir">DATA KASIR</a></li>
      <li><a href="../logout.php">LOGOUT</a></li>
    </ul>
  </div><br>

  <section class="konten">
  	<div class="container"><br>

  		<?php
  		if (isset($_GET['halaman']))
  		{
  			if ($_GET['halaman']=='menu')
  			{
  				include 'menu.php';
  			}
  			elseif ($_GET['halaman']=='dataTransaksi')
  			{
  				include 'dataTransaksi.php';
  			}
        elseif ($_GET['halaman']=='detailTransaksi')
        {
          include 'detailTransaksi.php';
        }
  			elseif ($_GET['halaman']=='customers')
  			{
  				include 'customers.php';
  			}
        elseif ($_GET['halaman']=='createCustomers')
        {
          include 'createCustomers.php';
        }
        elseif ($_GET['halaman']=='updateCustomers')
        {
          include 'updateCustomers.php';
        }
         elseif ($_GET['halaman']=='deleteCustomers')
        {
          include 'deleteCustomers.php';
        }
        elseif ($_GET['halaman']=='dataKasir')
        {
          include 'dataKasir.php';
        }
        elseif ($_GET['halaman']=='createKasir')
        {
          include 'createKasir.php';
        }
        elseif ($_GET['halaman']=='updateKasir')
        {
          include 'updateKasir.php';
        }
        elseif ($_GET['halaman']=='deleteKasir')
        {
          include 'deleteKasir.php';
        }
  			elseif ($_GET['halaman']=='createMenu')
  			{
  				include 'createMenu.php';
  			}
  			elseif ($_GET['halaman']=='deleteMenu')
  			{
  				include 'deleteMenu.php';
  			}
  			elseif ($_GET['halaman']=='updateMenu')
  			{
  				include 'updateMenu.php';
  			}
  			elseif ($_GET['halaman']=='../logout')
  			{
  				include '../logout.php';
  			}
  		}
  		else
  		{
  			include 'admin.php';
  		}
  		?>
  	
  		
  	</div>
  </section>

  </div>
</body>
</html> 