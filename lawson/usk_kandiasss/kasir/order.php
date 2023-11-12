 <style>
    body{
        background-color: #eaeaea;
    }
 </style>
  		<h1 class="text-center fw-bold">HISTORY ORDER</h1><br>

  		<?php 
  		if(empty($_SESSION["order"]) OR !isset($_SESSION["order"]))
			{
				echo "<script>alert('History order kosong silahkan pilih menu');</script>";
				echo "<script>location='index.php?halaman=menu';</script>";
			}
  		 ?>



<div class="table-responsive col-9 mx-auto text-center">
    <table class="table table-light table-striped table-hover shadow-lg">
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
                <?php foreach ($_SESSION["order"] as $id_barang => $qty): ?> 
                <?php
                $ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                $pecah = $ambil->fetch_assoc();
                $subprice = $pecah["harga"]*$qty;
                ?>
                <td><?= $nomor; ?></td>
                <td><?= $pecah ['nama_barang']; ?></td>
                <td><?= $pecah ['kategori']; ?></td>
                <td>Rp.<?= number_format($pecah['harga']); ?></td>
                <td><?= $qty; ?></td>
                <td>Rp.<?= number_format($subprice); ?></td>
                <td>
                    <p>
                    <a href="deleteOrder.php?id=<?= $id_barang ?>" ><button class="btn btn-danger">Delete</button></a>
                    </p>
                </td>
            </tr>
		    <?php $nomor++;?>
		    <?php endforeach ?>
		</tbody>
    </table>
        <a href="index.php?halaman=menu"><button class="btn btn-success">Add Order</button></a>
	    <a href="index.php?halaman=transaksi"><button class="btn btn-warning mb-5">Pembayaran</button></a>
</div>












  		
  		
	  