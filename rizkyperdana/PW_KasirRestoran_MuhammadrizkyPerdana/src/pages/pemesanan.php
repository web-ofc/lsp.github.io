
<?php 

include_once "../app/config/koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM user where user.username='$username' OR user.email='$username'")

?>

<div class="container">
<form action="landing_page.php?page=pemesanan" method="post" name="autoSumForm">
    <main>
      <div class="py-5 text-center">
        <h2>Pemesanan Menu</h2>
      </div>
      <?php

      ?>
      <div class="row g-5">
        <div class="col-md-12 col-lg-12 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
          </h4>
          
            <div class="row g-3">
              <div class="col-sm-12">
                <input type="hidden" name="id_menu" id="" value="<?= $_POST['id_menu'] ?>">
                <input type="hidden" class="form-control" name="status_pesanan" id="" value="Menunggu Konfirmasi" required readonly>
               </div>
               <div class="col-sm-12">
                    <label for="firstName" class="form-label">Atas Nama</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="" required>
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>
               <div class="col-sm-12">
                    <label for="firstName" class="form-label">Pesanan</label>
                    <input type="text" class="form-control" name="nama_menu" id="" value="<?= $_POST['nama_menu'] ?>" required readonly>
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>
               <div class="col-sm-12">
                    <label for="firstName" class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga_menu" id="" value="<?= $_POST['harga_menu'] ?>" onFocus="startCalc();" onBlur="stopCalc();" required readonly>
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>
               <div class="col-sm-4">
                    <label for="firstName" class="form-label">Jumlah Pesanan</label>
                    <input type="text" class="form-control" name="qty" id="" placeholder="" onFocus="startCalc();" onBlur="stopCalc();" required>
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>
               <div class="col-sm-8">
                    <label for="firstName" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" id="" required readonly>
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>
            </div>
        </div>

      </div>
      <div class="row">
        <hr class="my-4">
            <button type="button" class="w-100 btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Pesan
              </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin Memesan?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="Submit" class="btn btn-primary">Iya</button>
                    </div>
                  </div>
                </div>
              </div>
      </form>
    </main>

    <?php 
    
    if(isset($_POST['Submit'])) {
      $nama_pelanggan = $_POST['nama_pelanggan'];
      $id_menu = $_POST['id_menu'];
      $total_harga = $_POST['total_harga'];
      $qty = $_POST['qty'];
      $status_pesanan = $_POST['status_pesanan'];
      
              
      $result = mysqli_query($conn, "INSERT INTO pesanan (id_pesanan, nama_pelanggan, id_menu, total_harga, qty, status_pesanan, tgl_pesanan) VALUES('', '$nama_pelanggan','$id_menu', '$total_harga', '$qty', '$status_pesanan', now())");
      

      echo "<br> <div class='alert alert-success'> Pesanan Sukses. Silahkan menuju meja kasir untuk melakukan pembayaran.</div>";
      // <a href='landing_page.php?page=histori'>Lihat Histori</a>
  }

    ?>

    <script>

      function startCalc(){

      interval = setInterval("calc()",1);}

      function calc(){

      one = document.autoSumForm.harga_menu.value;

      two = document.autoSumForm.qty.value;

    //   tree = document.autoSumForm.bayar.value

      document.autoSumForm.total_harga.value = (one * 1) * (two * 1);

    //   document.autoSumForm.kembali.value = (-(one * 1) * (two * 1)) + (tree * 1)

      }

      function stopCalc(){

      clearInterval(interval);}

    </script>
    
  </div>
  
