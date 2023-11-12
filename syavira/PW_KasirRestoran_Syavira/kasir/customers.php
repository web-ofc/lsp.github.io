  		<h1 class="center">DATA CUSTOMERS</h1><br><br>

<table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Customers</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
  		<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<td><?php echo $pecah ['id_pelanggan']; ?></td>
			<td><?php echo $pecah ['nama']; ?></td>
			<td><?php echo $pecah ['email']; ?></td>
			<td><?php echo $pecah ['alamat']; ?></td>
		</tr>
		<?php } ?>
		</tbody>
	    </table>

