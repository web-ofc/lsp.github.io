<h1 class="fw-bold text-center mt-5">History Order</h1>
<div class="table-responsive col-9 mx-auto text-center mt-5">
    <table class="table table-light table-striped table-hover">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Kasir</th>
                <th>Nama Customer</th>
                <th>Total Poin Member</th>
                <th>Total Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th class="no-print">Aksi</th>
            </tr>
        </thead>
        <tbody>

       
           <?php $ambil = $koneksi->query("SELECT * FROM transaksi 
           JOIN kasir ON transaksi.id_kasir=kasir.id_kasir JOIN member ON transaksi.id_member=member.id_member");
            while($pecah = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?= $pecah['id_transaksi']; ?></td>
                    <td><?= $pecah['nama']; ?></td>
                    <td><?= $pecah['nama_member']; ?></td>
                    <td><?= $pecah['jumlah_poin']; ?></td>
                    <td><?= $pecah['total_harga']; ?></td>
                    <td><?= $pecah['tanggal']; ?></td>
                   <td>
                        <a class="btn btn-primary" href="index.php?halaman=detailTransaksi&id=<?= $pecah['id_transaksi'] ?>">Detail</a>
                        <a class="btn btn-dark" href="nota.php?&id=<?= $pecah['id_transaksi'] ?>">Print</a>
                    </td>
                </tr>
            <?php } ?>
                                    
        </tbody>
    </table>
</div>