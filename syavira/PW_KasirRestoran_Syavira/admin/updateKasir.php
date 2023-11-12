      <h1 class="center">UPDATE KASIR</h1><br><br>

<?php
$ambil = $koneksi->query("SELECT * FROM kasir WHERE id_kasir='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    
     <div class="center">
    <input type="text" name="nama" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['nama']; ?>">
     </div><br>
     <div class="center">
    <input type="text" name="email" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['email']; ?>">
     </div><br>
     <div class="center">
    <input type="text" name="password" style="border-radius: 20px; height: 30px; width: 270px; text-align: center;" value="<?php echo $pecah['password']; ?>">
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
    $koneksi->query("UPDATE kasir SET nama='$_POST[nama]', email='$_POST[email]', 
      password='$_POST[password]' WHERE id_kasir='$_GET[id]' ");

    echo "<script>alert('Data terupdate!');</script>";
    echo "<script>location='index.php?halaman=dataKasir';</script>";
  }
  ?>