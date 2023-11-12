  		<h1 class="center">DETAIL TRANSAKSI</h1><br><br>

<table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Transaksi Menu</th>
			<th>Menu</th>
			<th>Category</th>
			<th>Price</th>
			<th>Qty</th>
			<th>Sub Price</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<?php $ambil = $koneksi->query("SELECT * FROM transaksi_menu 
			JOIN transaksi ON transaksi_menu.id_transaksi=transaksi.id_transaksi
			JOIN menu ON transaksi_menu.id_menu=menu.id_menu
		WHERE transaksi.id_transaksi='$_GET[id]'");?>
  		<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<td><?php echo $pecah ['id_transaksi_menu']; ?></td>
			<td><?php echo $pecah ['menu']; ?></td>
			<td><?php echo $pecah ['kategori']; ?></td>
			<td>Rp.<?php echo number_format($pecah ['harga']); ?></td>
			<td><?php echo $pecah ['qty']; ?></td>
			<td>Rp.<?php echo number_format($pecah ['harga']*$pecah['qty']); ?></td>
		</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		  <tr>
		  	<?php $ambil = $koneksi->query("SELECT * FROM transaksi JOIN pelanggan
				ON transaksi.id_pelanggan=pelanggan.id_pelanggan
				WHERE transaksi.id_transaksi='$_GET[id]'"); ?>
  			<?php while($pecah = $ambil->fetch_assoc()){ ?>
  			<th colspan="5">Total Transaksi</th>
		  	<th colspan="1">Rp. <?php echo number_format($pecah['total_transaksi']);?></th>
		  </tr>
		  <tr>
		  	<th colspan="5">Payment</th>
		  	<th colspan="1">Rp. <?php echo number_format($pecah['uang_bayar']);?></th>
		  </tr>
		   <tr>
		   	<th colspan="5">Change</th>
		  	<th colspan="1">Rp. <?php echo number_format($pecah['uang_kembali']);?></th>
		  </tr>
		  <tr>
			<th colspan="2">Name Customers</th>
			<th colspan="2">ID Transaksi</th>
			<th colspan="2">Tanggal</th>
		  </tr>
		  <tr>
			<td colspan="2"><?php echo $pecah ['nama']; ?></td>
			<td colspan="2"><?php echo $pecah ['id_transaksi']; ?></td>
			<td colspan="2"><?php echo $pecah ['tanggal_transaksi']; ?></td>
		  </tr>
			<?php } ?>
		</tfoot>
	    </table>

