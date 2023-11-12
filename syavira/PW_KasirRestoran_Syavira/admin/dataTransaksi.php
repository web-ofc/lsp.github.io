  		<h1 class="center">DATA TRANSAKSI</h1><br><br>

<table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Transaksi</th>
			<th>Name Customers</th>
			<th>Total Transaksi</th>
			<th>Tanggal Transaksi</th>
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<?php $ambil = $koneksi->query("SELECT * FROM transaksi JOIN pelanggan
		ON transaksi.id_pelanggan=pelanggan.id_pelanggan"); ?>
  		<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<td><?php echo $pecah ['id_transaksi']; ?></td>
			<td><?php echo $pecah ['nama']; ?></td>
			<td>Rp.<?php echo number_format($pecah ['total_transaksi']); ?></td>
			<td><?php echo $pecah ['tanggal_transaksi']; ?></td>
			<td>
				<p>
				<a href="index.php?halaman=detailTransaksi&id=<?php echo $pecah['id_transaksi'] ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 110px; background-color: plum;">Detail</button></a>
				<a href="nota.php?&id=<?php echo $pecah['id_transaksi'] ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 110px; background-color: lightblue;">Print</button></a>
				</p>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	    </table>

