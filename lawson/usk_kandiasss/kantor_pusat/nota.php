<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nota</title>
     <link rel="stylesheet" href="../public/bootstrap-5.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/fontawesome-6.2.1/css/all.min.css">
</head>
<style>
    *{
        font-family: monospace;
    }
</style>

<body>
   
    <div class="container col-5 mx-auto">
        
        <h2 class="text-center">STRUK PEMBAYARAN</h2>
        <p class="text-center">-----------------------------------------------------------------------------</p>
            <?php
            $koneksi = new mysqli("localhost", "root", "", "kandias_minimarket");
            if ($koneksi->connect_error) {
                die("Connection failed: " . $koneksi->connect_error);
            }

            $ambil = $koneksi->query("SELECT * FROM transaksi JOIN member 
			ON transaksi.id_member=member.id_member
			WHERE transaksi.id_transaksi='$_GET[id]'");

            $detail = $ambil->fetch_assoc();
            ?>
            
        <div class="col-12 mx-auto mb-5">
            <table border="0" class="mb-4" cellspacing="20">
                <tr>
                    <td class="ms-4">Tanggal Transaksi : <br> 
                        <?= $detail['tanggal']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ms-4">Atas Nama : <br> 
                        <?= $detail['nama_member']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ms-4">Member Gift Poin : <br> 
                        <?= $detail['poin']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ms-4">Jumlah Poin Anda saat ini : <br> 
                        <?= $detail['jumlah_poin']; ?>
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="5" class="mb-4"> 
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subprice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ambil = $koneksi->query("SELECT * FROM transaksi_menu JOIN barang 
                           ON transaksi_menu.id_barang=barang.id_barang
                           WHERE transaksi_menu.id_transaksi='$_GET[id]'"); ?>
                       <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                           <tr>
                               <td><?= $pecah['nama_barang']; ?></td>
                               <td>Rp.<?= number_format($pecah['harga']); ?></td>
                               <td><?= number_format($pecah['qty']); ?></td>
                               <td>
                                   Rp.<?= $pecah['harga'] * $pecah['qty']; ?>
                               </td>
                           </tr>
                     <?php } ?>
                </tbody>
                
                
            </table>
            <p>---------------------------------------</p>
            <table cellpadding="5">
                <tfoot>
                 
                    <tr>
                        <th colspan="4">Total Transaksi</th>
                        <th>Rp.<?= number_format($detail['total_harga']); ?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Nomimal Pembayaran</th>
                        <th>Rp.<?= number_format($detail['uang_jumlah']); ?></th>
                    </tr>
                     <tr>
                        <th colspan="3">Nomimal Kembalian</th>
                        <th>Rp.<?= number_format($detail['uang_kembali']); ?></th>
                    </tr>
                </tfoot>
            </table>
           

            <script>
                window.print();
            </script>

    </div>

  
    <script src="../public/js/login.js"></script>
    <script src="../public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="../public/fontawesome-6.2.1/js/all.js"></script>
</body>

</html>
