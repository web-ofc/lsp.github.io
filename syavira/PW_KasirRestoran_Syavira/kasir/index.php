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
  Kasir</h2>
  <h1 class="center">RESTAURANT BRACHIOSAURUS</h1>
  </div>
  <div class="das">
  <div class="menu center">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="index.php?halaman=menu">DATA MENU</a></li>
      <li><a href="index.php?halaman=order">HISTORY ORDER</a></li>
      <li><a href="index.php?halaman=transaksi">TRANSAKSI</a></li>
      <li><a href="index.php?halaman=customers">DATA CUSTOMERS</a></li>
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
        elseif ($_GET['halaman']=='buy')
        {
          include 'buy.php';
        }
        elseif ($_GET['halaman']=='order')
        {
          include 'order.php';
        }
        elseif ($_GET['halaman']=='deleteOrder')
        {
          include 'deleteOrder.php';
        }
        elseif ($_GET['halaman']=='transaksi')
        {
          include 'transaksi.php';
        }
        elseif ($_GET['halaman']=='customers')
        {
          include 'customers.php';
        }
        elseif ($_GET['halaman']=='../logout')
        {
          include '../logout.php';
        }
      }
      else
      {
        include 'kasir.php';
      }
      ?>
      
    </div>
  </section>

  </div>

</body>

</html> 