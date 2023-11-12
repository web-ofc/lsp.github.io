<div class="container">
    <form method="post" name="autoSumForm">
      <div class="py-5 text-center">
        <h2>Pemesanan Lapangan</h2>
      </div>

      <div class="row g-5">
        <div class="col-md-12 col-lg-12 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3"></h4>
          
            <div class="row g-3">
              <div class="col-sm-12">
                <input type="hidden" name="id_lapangan" id="" value="<?= $_POST['id_lapangan'] ?>">
                <input type="hidden" class="form-control" name="status_pesanan" id="" value="Menunggu Konfirmasi" required readonly>
               </div>
               <div class="row">
                 <div class="col-sm-6">
                      <input type="text" class="form-control" name="nama_pelanggan" required placeholder="Atas Nama">
                  </div>
                 <div class="col-6">
                      <select class="form-select form-select-md col-5" name="id_kasir" id="">
                          <option selected required>Nama Kasir</option>
                          <?php $ambil = $koneksi->query("SELECT * FROM kasir");
                              while($pecah = $ambil->fetch_assoc()){
                              echo "<option value=$pecah[id_kasir]> $pecah[nama] </option>";
                          }?>
                      </select>
                  </div>
               </div>
               <div class="col-sm-12">
                    <label class="form-label">Jenis Lapangan</label>
                    <input type="text" class="form-control" name="jenis" id="" value="<?= $_POST['jenis'] ?>" required readonly>
                </div>
               <div class="col-sm-12">
                    <label class="form-label">Harga Perjam</label>
                    <input type="text" class="form-control" name="harga" id="" value="<?= $_POST['harga'] ?>" onFocus="startCalc();" onBlur="stopCalc();" required readonly>
                </div>
               <div class="col-sm-4">
                    <label class="form-label">Jumlah Jam Diboking</label>
                    <input type="text" class="form-control" name="jam_sewa" id="" placeholder="" onFocus="startCalc();" onBlur="stopCalc();" required>
                </div>
               <div class="col-sm-8">
                    <label class="form-label">Total Harga</label>
                    <input type="text" class="form-control" name="totalbayar" id="" required readonly>
                </div>
            </div>
        </div>

      </div>
        
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

    
    <?php 
    
    if(isset($_POST['Submit'])) {
     $koneksi->query("INSERT INTO boking (id_lapangan,id_kasir,nama_pelanggan,totalbayar,jam_sewa,status_pesanan,tanggal) VALUES ('$_POST[id_lapangan]','$_POST[id_kasir]','$_POST[nama_pelanggan]','$_POST[totalbayar]','$_POST[jam_sewa]','$_POST[status_pesanan]',now() )");
    
  	echo "<script>alert('Data Berhasil diboking!');</script>";
    echo "<script>location='index.php?halaman=transaksi';</script>";
  }

    ?>

  <script>

    function startCalc(){
      interval = setInterval("calc()",1); 
    }

    function calc(){
      one = document.autoSumForm.harga.value;
      two = document.autoSumForm.jam_sewa.value;

      document.autoSumForm.totalbayar.value = (one * 1) * (two * 1);
    }

    function stopCalc(){
      clearInterval(interval);
    }

  </script>
    
  </div>
