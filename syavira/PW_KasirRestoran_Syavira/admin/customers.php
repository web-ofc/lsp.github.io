  		<h1 class="center">DATA CUSTOMERS</h1><br><br>


<a href="index.php?halaman=createCustomers"><button style="border-radius: 20px; 
height: 35px; text-align: center; width: 180px; background-color: lightgreen;">Add Customers</button></a><br><br>

<table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Customers</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Password</th>
			<th>Opsi</th>
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
			<td><?php echo $pecah ['password']; ?></td>
			<td>
				<p>
				<a href="index.php?halaman=updateCustomers&id=<?php echo $pecah ['id_pelanggan']; ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 100px; background-color: skyblue;">Update</button></a>
				<a href="index.php?halaman=deleteCustomers&id=<?php echo $pecah['id_pelanggan']; ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 100px; background-color: tomato;">Delete</button></a>
				</p>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	    </table>

