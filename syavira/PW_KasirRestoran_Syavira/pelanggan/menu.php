  		<h1 class="center">DATA MENU</h1><br><br>

  <table border="1" style="text-align: center; width: 100%">
  	    <thead>
		<tr>
			<th>ID Menu</th>
			<th>Menu</th>
			<th>Category</th>
			<th>Price</th>
			<th>Stock</th>
			<th>Image</th>
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
			<td><img src="../gambar/<?php echo $pecah['img'] ?>" style="width: 90px; height: 80px;"></td>
		</tr>
		<?php } ?>
		</tbody>
  </table>

