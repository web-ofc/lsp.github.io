  		<h1 class="center">Data Transaksi</h1>
  		<br>

  		<?php 
  		if(empty($_SESSION["order"]) OR !isset($_SESSION["order"]))
			{
				echo "<script>alert('History order kosong silahkan pilih menu');</script>";
				echo "<script>location='index.php?halaman=menu';</script>";
			}
  		 ?>

  		
  		<table border="1" style="text-align: center; width: 100%">
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
		<?php foreach ($_SESSION["order"] as $id_menu => $qty): ?>
		<?php
		 $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
		 $pecah = $ambil->fetch_assoc();
		 $subprice = $pecah["harga"]*$qty;
		?>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['menu']; ?></td>
			<td><?php echo $pecah ['kategori']; ?></td>
			<td>Rp.<?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $qty; ?></td>
			<td>Rp.<?php echo number_format($subprice); ?></td>
		</tr>
		<?php $nomor++;?>
		<?php $totaltransaksi+=$subprice; ?>
		<?php endforeach ?>
		</tbody>
		<tfoot>
		<tr>
			<th colspan="5">Total Transaksi</th>
			<th>Rp. <?php echo number_format($totaltransaksi)?></th>
		</tr>
		</tfoot>
	    </table><br> <br>
	    
	    <form method="post">
	    	<div>
	    		<select name="id_pelanggan" style="border-radius: 20px; height: 40px; text-align: center; width: 255px; margin-right: 35px;">
	    			<option>...</option>
	    			<?php $ambil = $koneksi->query("SELECT * FROM pelanggan");
	    			 while($pecah = $ambil->fetch_assoc()){
	    			 	echo "<option value=$pecah[id_pelanggan]> $pecah[nama] </option>";
	    			 }?>
	    		</select>

				<input type="text" name="uang_bayar"  placeholder="Uang Bayar" required="required" style="border-radius: 20px; height: 35px; width: 250px; text-align: center; margin-right: 325px;">
	    		
	    		<button style="border-radius: 20px; height: 40px; text-align: center; width: 140px; background-color:azure;" name="transaksi">Transaksi</button>
	    	</div><br>
	    </form>

	    <?php
	    if (isset($_POST["transaksi"]))
	    {
	    	$id_pelanggan = $_POST["id_pelanggan"];
	    	$total_transaksi = $totaltransaksi;
	    	$uang_bayar = $_POST["uang_bayar"];
	    	$uang_kembali = $uang_bayar-$totaltransaksi;
	    	$tanggal_transaksi = date("Y-m-d");

	    	// 1. Menyimpan data ke table transaksi
	    	$koneksi->query("INSERT INTO transaksi (id_pelanggan,total_transaksi,uang_bayar,uang_kembali,tanggal_transaksi) VALUES 
	    		('$id_pelanggan','$total_transaksi','$uang_bayar','$uang_kembali','$tanggal_transaksi')");


	    	// Mendapatkan id_transaksi barusan atau table transaksi menu
	    	$id_transaksi_barusan = $koneksi->insert_id;
	    	

	    	foreach ($_SESSION["order"] as $id_menu => $qty)
	    	{
	    		$koneksi->query("INSERT INTO transaksi_menu (id_transaksi,id_menu,qty) VALUES 
	    			('$id_transaksi_barusan','$id_menu','$qty')");
	    	}

	    	// Mengkosongkan history order yang sudah di transaksi
	    	unset($_SESSION["order"]);

	    	//nota
	    	echo "<script>alert('Transaksi berhasil!');</script>";
			echo "<script>location='nota.php?id=$id_transaksi_barusan';</script>";

	    }
	    ?>

