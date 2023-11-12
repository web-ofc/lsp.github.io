<style>
    body{
        background-color: #eaeaea;
    }
    .form-select:hover{
        background-color: #eaeaea;
    }
</style>

<h1 class="text-center mb-5 mt-5 fw-bold">Data Transaksi</h1>

<?php 
if(empty($_SESSION["order"]) OR !isset($_SESSION["order"]))
    {
        echo "<script>alert('History order kosong silahkan pilih menu');</script>";
        echo "<script>location='index.php?halaman=menu';</script>";
    }
    ?>



<div class="table-responsive col-9 mx-auto text-center " style="overflow-x: hidden;">
    <table class="table table-light table-striped table-hover shadow-lg">
        <thead>
            <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Category</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subprice</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <?php $nomor=1; ?>
                <?php $totaltransaksi = 0; ?>
                <?php foreach ($_SESSION["order"] as $id_barang => $qty): ?>
                <?php
                $ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                $pecah = $ambil->fetch_assoc();
                $subprice = $pecah["harga"]*$qty;
                ?>
                
                <td><?= $nomor; ?></td>
                <td><?= $pecah ['nama_barang']; ?></td>
                <td><?= $pecah ['kategori']; ?></td>
                <td>Rp.<?= number_format($pecah['harga']); ?></td>
                <td><?= $qty; ?></td>
                <td>Rp.<?= number_format($subprice); ?></td>
            </tr>
                <?php $nomor++;?>
                <?php $totaltransaksi+=$subprice; ?>
                <?php endforeach ?>

         
                <?php 
                    $diskon = 0; 
                    if ($totaltransaksi >= 10000 && $totaltransaksi < 20000) {
                        $diskon = 1000; // Mengurangi diskon awal
                    } elseif ($totaltransaksi >= 20000 && $totaltransaksi < 30000) {
                        $diskon = 2000; // Mengurangi diskon selanjutnya
                    } elseif ($totaltransaksi >= 30000) {
                        $diskon = 3000; // Diskon untuk jumlah tertentu
                    } else {
                        $diskon = 0; // Jika tidak memenuhi kondisi di atas, maka tidak ada
                    }

                    $voucher = 0; 
                    if ($totaltransaksi >= 10000 && $totaltransaksi < 20000) {
                        $voucher = 200; // Mengurangi vou$voucher awal
                    } elseif ($totaltransaksi >= 20000 && $totaltransaksi < 30000) {
                        $voucher = 500; // Mengurangi vou$voucher selanjutnya
                    } elseif ($totaltransaksi >= 30000) {
                        $voucher = 1000; // vou$voucher untuk jumlah tertentu
                    } else {
                        $voucher = 0; // Jika tidak memenuhi kondisi di atas, maka tidak ada
                    }

                    $ppn = 0; 
                    if ($totaltransaksi >= 10000 && $totaltransaksi < 20000) {
                        $ppn = 1100; // Mengurangi ppn awal
                    } elseif ($totaltransaksi >= 20000 && $totaltransaksi < 30000) {
                        $ppn = 1500; // Mengurangi ppn selanjutnya
                    } elseif ($totaltransaksi >= 30000) {
                        $ppn = 1700; // ppn untuk jumlah tertentu
                    } else {
                        $ppn = 0; // Jika tidak memenuhi kondisi di atas, maka tidak ada
                    }

                    $poin = 0; 
                    if ($totaltransaksi >= 10000 && $totaltransaksi < 20000) {
                        $poin = 10; // Mengurangi poin awal
                    } elseif ($totaltransaksi >= 20000 && $totaltransaksi < 30000) {
                        $poin = 30; // Mengurangi poin selanjutnya
                    } elseif ($totaltransaksi >= 30000) {
                        $poin = 70; // poin untuk jumlah tertentu
                    } else {
                        $poin = 0; // Jika tidak memenuhi kondisi di atas, maka tidak ada
                    }

                    $total_harga = $totaltransaksi - $diskon - $voucher + $ppn
                ?>
              

                
        </tbody>

        <tfoot>
            <tr>
                <th colspan="5">Diskon</th>
                <th>Rp. <?= number_format($diskon)?></th>
            </tr>
            <tr>
                <th colspan="5">Voucher</th>
                <th>Rp. <?= number_format($voucher)?></th>
            </tr>
            <tr>
                <th colspan="5">ppn</th>
                <th>Rp. <?= number_format($ppn)?></th>
            </tr>
            <tr>
                <th colspan="5">Member Gift Poin</th>
                <th><?= number_format($poin)?></th>
            </tr>
            <tr>
                <th colspan="5">Total Transaksi</th>
                <th>Rp. <?= number_format($total_harga)?></th>
            </tr>
        </tfoot>
    </table>

    <form method="post">
        <div class="row">
            <div class="col-3">
                <div class="mb-3">
                    <select class=" form-select form-select-md col-5" name="id_member">
                        <option selected required>Nama Member</option>
                        <?php $ambil = $koneksi->query("SELECT * FROM member");
                            while($pecah = $ambil->fetch_assoc()){
                            echo "<option value=$pecah[id_member]> $pecah[nama_member] </option>";
                        }?>
                    </select>
                </div>
            </div>

            <div class="col-3">
                <div class="mb-3">
                    <select class="form-select form-select-md col-5" name="id_kasir" id="">
                        <option selected required>Nama Kasir</option>
                        <?php $ambil = $koneksi->query("SELECT * FROM kasir");
                            while($pecah = $ambil->fetch_assoc()){
                            echo "<option value=$pecah[id_kasir]> $pecah[nama] </option>";
                        }?>
                    </select>
                </div>
            </div>
            
            <div class="col-6">
                <input type="text" class="form-control form-control-md" name="uang_jumlah"  placeholder="Masukan Uang" required="required">
            </div>
               
            <button class="col-12 btn btn-success mb-5"  name="transaksi">Transaksi</button>
        </div>
	</form>

	    <?php
        
        
	    if (isset($_POST["transaksi"]))
	    {
	    	$id_kasir = $_POST["id_kasir"];
	    	$id_member = $_POST["id_member"];
	    	$total_harga = $total_harga;
	    	$diskon = $diskon;
	    	$voucher = $voucher;
	    	$ppn = $ppn;
	    	$poin = $poin;
	    	$uang_jumlah = $_POST["uang_jumlah"];
	    	$uang_kembali = $uang_jumlah-$total_harga;

	    	$koneksi->query("INSERT INTO transaksi (id_kasir, id_member, tanggal, total_harga, diskon, voucher, ppn, poin, uang_jumlah, uang_kembali) VALUES 
                                                    ('$id_kasir', '$id_member', NOW(), '$total_harga', '$diskon', '$voucher', '$ppn', '$poin', '$uang_jumlah', '$uang_kembali')");

            // Mendapatkan id_transaksi barusan atau table transaksi menu
	    	$id_transaksi_barusan = $koneksi->insert_id;
	    	

	    	foreach ($_SESSION["order"] as $id_barang => $qty)
	    	{
	    		$koneksi->query("INSERT INTO transaksi_menu (id_transaksi,id_barang,qty) VALUES 
	    			('$id_transaksi_barusan','$id_barang','$qty')");
	    	}




	    	// Mengkosongkan history order yang sudah di transaksi
	    	unset($_SESSION["order"]);

	    	//nota
	    	echo "<script>alert('Transaksi berhasil!');</script>";
			echo "<script>location='nota.php?id=$id_transaksi_barusan';</script>";

	    }
	    ?>
    
</div>



  		
  	