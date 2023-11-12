 
  		<h1 class="center">HISTORY ORDER</h1><br>

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
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<?php $nomor=1; ?>
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
			<td>
				<p>
				<a href="deleteOrder.php?id=<?php echo $id_menu ?>" ><button style="border-radius: 20px; height: 35px; text-align: center; width: 110px; background-color: tomato;">Delete</button></a>
				</p>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php endforeach ?>
		</tbody>
	    </table><br> <br>
	    <a href="index.php?halaman=menu"><button style="border-radius: 20px; height: 40px; text-align: center; width: 160px; background-color: lavender; margin-right: 25px;">Add Order</button></a>
	    <a href="index.php?halaman=transaksi"><button style="border-radius: 20px; height: 40px; text-align: center; width: 140px; background-color: azure;">Transaksi</button></a>
  	</div>
  </section>

  </div>