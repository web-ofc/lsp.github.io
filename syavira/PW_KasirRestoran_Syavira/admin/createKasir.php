  		<h1 class="center">ADD KASIR</h1><br><br>

  <form method="post" enctype="multipart/form-data">
  	
  	 <div class="center">
		<input type="text" name="nama" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Name Kasir" required="required">
     </div><br>
      <div class="center">
    <input type="text" name="email" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Email" required="required">
     </div><br>
     <div class="center">
		<input type="text" name="password" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" placeholder="Password" required="required">
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
  	$koneksi->query("INSERT INTO kasir (nama,email,alamat,password) 
  		VALUES ('$_POST[nama]','$_POST[email]','$_POST[alamat]','$_POST[password]')");

  	echo "<script>alert('Data ter add!');</script>";
    echo "<script>location='index.php?halaman=dataKasir';</script>";
  }
  ?>

  