<?php 
$koneksi = new mysqli("localhost", "root", "", "db_futsal");

$sintetis = mysqli_query($koneksi, "SELECT * FROM lapangan WHERE jenis LIKE '%Sintetis%'");
$vinyl = mysqli_query($koneksi, "SELECT * FROM lapangan WHERE jenis LIKE '%Vinyl%'");
$outdoor = mysqli_query($koneksi, "SELECT * FROM lapangan WHERE jenis LIKE '%Outdoor%'");

?>

<section>
    <div class="text-center container py-5">
        <h2 class="mt-4 mb-3"  style="color: #000;"><strong>List Lapangan</strong></h2>
            <div class="row mb-5">
                <?php while ($view = mysqli_fetch_array($sintetis)) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_lapangan"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-100"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                <h6>Tersedia Dari Jam 07.00 - 17.00</h6>
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["jenis"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['max_jam_perhari'] == "0") {
                                        echo 'Max Jam Habis';
                                        } else {
                                        echo 'Jam Tersisa ' . $view["max_jam_perhari"] . 'jam';
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <form action="index.php?halaman=pemesan" method="post">
                                    <input type="hidden" name="id_lapangan" value="<?= $view["id_lapangan"] ?>">
                                    <input type="hidden" name="jenis" value="<?= $view["jenis"] ?>">
                                    <input type="hidden" name="harga" value="<?= $view["harga"] ?>">
                                    <input type="submit" value="Boking" class="btn btn-warning col-12 text-white">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php  } ?>

                <?php while ($view = mysqli_fetch_array($vinyl)) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_lapangan"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-100"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["jenis"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['max_jam_perhari'] == "0") {
                                        echo 'Stok Habis';
                                        } else {
                                        echo 'Jam tersisa ' . $view["max_jam_perhari"] . 'jam';
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <form action="index.php?halaman=pemesan" method="post">
                                    <input type="hidden" name="id_lapangan" value="<?= $view["id_lapangan"] ?>">
                                    <input type="hidden" name="jenis" value="<?= $view["jenis"] ?>">
                                    <input type="hidden" name="harga" value="<?= $view["harga"] ?>">
                                    <input type="submit" value="Boking" class="btn btn-warning col-12 text-white">
                                </form>

                            </div>
                        </div>
                    </div>
                <?php  } ?>

                <?php while ($view = mysqli_fetch_array($outdoor)) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_lapangan"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-100"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["jenis"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['max_jam_perhari'] == "0") {
                                        echo 'Stok Habis';
                                        } else {
                                        echo 'Jam tersisa ' . $view["max_jam_perhari"] . 'jam';
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <form action="index.php?halaman=pemesan" method="post">
                                    <input type="hidden" name="id_lapangan" value="<?= $view["id_lapangan"] ?>">
                                    <input type="hidden" name="jenis" value="<?= $view["jenis"] ?>">
                                    <input type="hidden" name="harga" value="<?= $view["harga"] ?>">
                                    <input type="submit" value="Boking" class="btn btn-warning col-12 text-white">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
    </div>
</section>
    
