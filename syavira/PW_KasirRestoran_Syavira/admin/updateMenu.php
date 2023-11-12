  		<h1 class="center">UPDATE MENU</h1><br><br>

<?php
$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
  	
  	 <div class="center">
		<input type="text" name="menu" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['menu']; ?>">
     </div><br>
     <div class="center">
		<input type="text" name="kategori" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['kategori']; ?>">
     </div><br>
     <div class="center">
		<input type="text" name="harga" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['harga']; ?>">
     </div><br>
     <div class="center">
    <input type="text" name="stok" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['stok']; ?>">
     </div><br>
      <div class="center">
    <input type="text" name="img" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['img']; ?>">
     </div><br>
     <div class="center">
        <button name="ubah" style="border-radius: 20px; height: 35px; text-align: center; width: 90px; background-color: lightgreen;" >UPDATE</button>
        <br>
        <br>
      </div>
  </form>

  <?php
  if (isset($_POST['ubah']))
  {
  	$koneksi->query("UPDATE menu SET menu='$_POST[menu]', kategori='$_POST[kategori]', 
  		harga='$_POST[harga]', stok='$_POST[stok]', img='$_POST[img]' WHERE id_menu='$_GET[id]' ");

  	echo "<script>alert('Data terupdate!');</script>";
    echo "<script>location='index.php?halaman=menu';</script>";
  }
  ?>