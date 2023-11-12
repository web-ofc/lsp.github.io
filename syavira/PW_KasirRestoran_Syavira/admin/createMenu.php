  		<h1 class="center">ADD MENU</h1><br><br>

  <form method="post" enctype="multipart/form-data">
  	
  	 <div class="center">
		<input type="text" name="menu" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Menu" required="required">
     </div><br>
      <div class="center">
    <input type="text" name="kategori" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Category" required="required">
     </div><br>
     <div class="center">
    <input type="text" name="harga" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Price" required="required">
     </div><br>
     <div class="center">
		<input type="text" name="stok" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Stock" required="required">
     </div><br>
     <div class="center">
    <input type="text" name="img" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Image" required="required">
     </div><br>
     <br>
     <div class="center">
        <button name="add" style="border-radius: 20px; height: 35px; text-align: center; width: 90px; background-color: lightgreen;" >ADD</button>
        <br>
        <br>
      </div>
  </form>
  <?php
  if (isset($_POST['add']))
  {
  	$koneksi->query("INSERT INTO menu (menu,kategori,harga,stok,img) 
  		VALUES ('$_POST[menu]','$_POST[kategori]','$_POST[harga]','$_POST[stok]','$_POST[img]') ");

  	echo "<script>alert('Data ter add!');</script>";
    echo "<script>location='index.php?halaman=menu';</script>";
  }
  ?>

  