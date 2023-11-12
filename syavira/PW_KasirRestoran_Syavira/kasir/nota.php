<?php
$koneksi = new mysqli("localhost", "root", "", "db_kasirrestoran_syavira");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet"  href="style.css">
	<title>Nota</title>
</head>

<body> <br><br>

  
  <section class="konten">
  	<div class="center">
  		<h2 style="text-align: center;">RESTAURANT BRACHIOSAURUS</h2>
  		<?php
  		$ambil = $koneksi->query("SELECT * FROM transaksi JOIN pelanggan 
  			ON transaksi.id_pelanggan=pelanggan.id_pelanggan
  			WHERE transaksi.id_transaksi='$_GET[id]'");
  		$detail = $ambil->fetch_assoc();
  		?>

  		<strong>Name Customers : <?php echo $detail['nama'];?><br>
  			    Email : <?php echo $detail['email'];?><br>
  				Date : <?php echo $detail['tanggal_transaksi'];?><br>
  				ID Transaksi : <?php echo $detail['id_transaksi'];?>
  		</strong><br><br>

  		<table border="1" class="center" >
  			<thead>
  				<tr>
  					<th>No</th>
            <th>Menu</th>
  					<th>Category</th>
  					<th>Price</th>
  					<th>Qty</th>
  					<th>Subprice</th>
  				</tr>
  			</thead>
  			<tbody style="text-align: center;">
          <?php $nomor=1;?>
          <?php $ambil=$koneksi->query("SELECT * FROM transaksi_menu JOIN menu 
            ON transaksi_menu.id_menu=menu.id_menu
            WHERE transaksi_menu.id_transaksi='$_GET[id]'");?>
          <?php while($pecah=$ambil->fetch_assoc()){?>
          <tr>
            <td ><?php echo $nomor;?></td>
            <td><?php echo $pecah['menu'];?></td>
            <td><?php echo $pecah['kategori'];?></td>
            <td>Rp.<?php echo number_format($pecah['harga']);?></td>
            <td><?php echo number_format($pecah['qty']);?></td>
            <td>
              <?php echo $pecah['harga']*$pecah['qty'];?>
            </td>
          </tr>
          <?php $nomor++; ?>
            <?php } ?>
        </tbody>
  			<tfoot>
				<tr>
					<th colspan="5">Total Transaksi</th>
					<th>Rp. <?php echo number_format($detail['total_transaksi']);?></th>
				</tr>
        <tr>
          <th colspan="5">Uang Bayar</th>
          <th>Rp. <?php echo number_format($detail['uang_bayar']);?></th>
        </tr>
        <tr>
          <th colspan="5">Uang Kembali</th>
          <th>Rp. <?php echo number_format($detail['uang_kembali']);?></th>
        </tr>
		</tfoot>
  		</table>

  		  <script>
			 window.print();
 		  </script>

  	</div>
  </section>

  </div>

</body>

</html> 