  		<h1 class="text-center">DETAIL TRANSAKSI</h1><br><br>
<div class="table-responsive col-9 mx-auto text-center">
    <table class="table table-light table-striped table-hover">
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
                    JOIN barang ON transaksi_menu.id_barang=barang.id_barang
                WHERE transaksi.id_transaksi='$_GET[id]'");?>
                <?php while($pecah = $ambil->fetch_assoc()){ ?>
                    <td><?php echo $pecah ['id_transaksi_menu']; ?></td>
                    <td><?php echo $pecah ['nama_barang']; ?></td>
                    <td><?php echo $pecah ['kategori']; ?></td>
                    <td>Rp.<?php echo number_format($pecah ['harga']); ?></td>
                    <td><?php echo $pecah ['qty']; ?></td>
                    <td>Rp.<?php echo number_format($pecah ['harga']*$pecah['qty']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
              <tr>
		  	<?php $ambil = $koneksi->query("SELECT * FROM transaksi JOIN member
				ON transaksi.id_member=member.id_member
				WHERE transaksi.id_transaksi='$_GET[id]'"); ?>
  			<?php while($pecah = $ambil->fetch_assoc()){ ?>
  			<th colspan="5">Total Transaksi</th>
		  	<th colspan="1">Rp. <?php echo number_format($pecah['total_harga']);?></th>
		  </tr>
		  <tr>
		  	<th colspan="5">Payment</th>
		  	<th colspan="1">Rp. <?php echo number_format($pecah['uang_jumlah']);?></th>
		  </tr>
		   <tr>
		   	<th colspan="5">Change</th>
		  	<th colspan="1">Rp. <?php echo number_format($pecah['uang_kembali']);?></th>
		  </tr>
		  <tr>
			<th colspan="2">Name Member</th>
			<th colspan="2">ID Transaksi</th>
			<th colspan="2">Tanggal</th>
		  </tr>
		  <tr>
			<td colspan="2"><?php echo $pecah ['nama_member']; ?></td>
			<td colspan="2"><?php echo $pecah ['id_transaksi']; ?></td>
			<td colspan="2"><?php echo $pecah ['tanggal']; ?></td>
		  </tr>
			<?php } ?>
        </tfoot>
    </table>
</div>
