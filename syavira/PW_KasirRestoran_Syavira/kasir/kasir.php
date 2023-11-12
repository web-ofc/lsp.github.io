  		  		<h1 class="center">DATA KASIR</h1><br><br>

<table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Kasir</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<?php $ambil = $koneksi->query("SELECT * FROM kasir"); ?>
  		<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<td><?php echo $pecah ['id_kasir']; ?></td>
			<td><?php echo $pecah ['nama']; ?></td>
			<td><?php echo $pecah ['email']; ?></td>
		</tr>
		<?php } ?>
		</tbody>
	    </table>

