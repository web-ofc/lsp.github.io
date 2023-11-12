  		<h1 class="center">DATA KASIR</h1><br><br>


<a href="index.php?halaman=createKasir"><button style="border-radius: 20px; 
height: 35px; text-align: center; width: 180px; background-color: lightgreen;">Add Kasir</button></a><br><br>

<table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Kasir</th>
			<th>Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<?php $ambil = $koneksi->query("SELECT * FROM kasir"); ?>
  		<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<td><?php echo $pecah ['id_kasir']; ?></td>
			<td><?php echo $pecah ['nama']; ?></td>
			<td><?php echo $pecah ['email']; ?></td>
			<td><?php echo $pecah ['password']; ?></td>
			<td>
				<p>
				<a href="index.php?halaman=updateKasir&id=<?php echo $pecah ['id_kasir']; ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 100px; background-color: skyblue;">Update</button></a>
				<a href="index.php?halaman=deleteKasir&id=<?php echo $pecah['id_kasir']; ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 100px; background-color: tomato;">Delete</button></a>
				</p>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	    </table>

