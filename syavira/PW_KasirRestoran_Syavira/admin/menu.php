  		<h1 class="center">DATA MENU</h1><br><br>

<a href="index.php?halaman=createMenu"><button style="border-radius: 20px; 
height: 35px; text-align: center; width: 180px; background-color: lightgreen;">Add Menu</button></a><br><br>

  <table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Menu</th>
			<th>Menu</th>
			<th>Category</th>
			<th>Price</th>
			<th>Stock</th>
			<th>Image</th>
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<?php $ambil = $koneksi->query("SELECT * FROM menu"); ?>
  		<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<td><?php echo $pecah ['id_menu']; ?></td>
			<td><?php echo $pecah ['menu']; ?></td>
			<td><?php echo $pecah ['kategori']; ?></td>
			<td>Rp.<?php echo number_format($pecah ['harga']); ?></td>
			<td><?php echo $pecah ['stok']; ?></td>
			<td><img src="../gambar/<?php echo $pecah['img'] ?>" style="width: 50%; height: 50px;"></td>
			<td>
				<p>
				<a href="index.php?halaman=updateMenu&id=<?php echo $pecah ['id_menu']; ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 100px; background-color: skyblue;">Update</button></a>
				<a href="index.php?halaman=deleteMenu&id=<?php echo $pecah['id_menu']; ?>"><button style="border-radius: 20px; height: 35px; text-align: center; width: 100px; background-color: tomato;">Delete</button></a>
				</p>
			</td>
		</tr>
		<?php } ?>
		</tbody>
  </table>

