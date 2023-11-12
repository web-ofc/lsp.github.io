<style>
    *,body,html{
        scroll-behavior: smooth;
    }
    /* nav{
        margin-top: 100px;
    } */
    nav ul .li{
        
        right: 350px;
        position: relative;
        display: inline-block;
        margin: 0 30px;

    }
    nav ul .li a{
        text-decoration: none;
        color: #fff;
    }

    .btn{
        border-radius: 2px;
        position: relative;
        
    }
</style>

<?php 

$koneksi = new mysqli("localhost", "root", "", "kandias_minimarket");

$seafood = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori LIKE '%seafood%'");
$meat = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori LIKE '%meat%'");
$noodles = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori LIKE '%noodles%'");
$drinks = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori LIKE '%drinks%'");


?>

<section>
      <div class="text-center container py-5">
         <h2 class="mt-4 mb-3"  style="color: #fff;"><strong>List Menu Lawson Station</strong></h2>

         <nav style="margin-top: 100px;margin-bottom:50px">
            <ul>
                <li class="li"><a href="#seafood">seafood</a></li>
                <li class="li"><a href="#meat">meat</a></li>
                <li class="li"><a href="#noodles">noodles</a></li>
                <li class="li"><a href="#drinks">drink</a></li>
            </ul>
         </nav>
            <h5 class="mt-5 mb-2 text-white text-start" id="seafood"> - Seafood - </h5>
            <div class="row">
                <?php while ($view = mysqli_fetch_array($seafood)) { ?>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px;">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_barang"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-50"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["kategori"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['stok'] == "0") {
                                        echo 'Stok Habis';
                                        } else {
                                        echo 'Stok tersisa ' . $view["stok"];
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <a href="buy.php?id=<?= $view ['id_barang']; ?>" class="btn w-100 text-white col-12" style="background-color: #fa8e35;">Masukan Keranjang</a>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>

            <h5 class="mt-5 mb-2 text-white text-start" id="meat"> - Meat - </h5>
            <div class="row">
                <?php while ($view = mysqli_fetch_array($meat)) { ?>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_barang"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-50"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["kategori"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['stok'] == "0") {
                                        echo 'Stok Habis';
                                        } else {
                                        echo 'Stok tersisa ' . $view["stok"];
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <a href="buy.php?id=<?= $view ['id_barang']; ?>" class="btn w-100 text-white col-12" style="background-color: #fa8e35;">Masukan Keranjang</a>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>

             <h5 class="mt-5 mb-2 text-white text-start" id="noodles"> - Noodles - </h5>
            <div class="row">
                <?php while ($view = mysqli_fetch_array($noodles)) { ?>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_barang"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-50"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["kategori"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['stok'] == "0") {
                                        echo 'Stok Habis';
                                        } else {
                                        echo 'Stok tersisa ' . $view["stok"];
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <a href="buy.php?id=<?= $view ['id_barang']; ?>" class="btn w-100 text-white col-12" style="background-color: #fa8e35;">Masukan Keranjang</a>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>

              <h5 class="mt-5 mb-2 text-white text-start" id="drinks"> - Drinks - </h5>
            <div class="row ">
                <?php while ($view = mysqli_fetch_array($drinks)) { ?>
                    <div class="col-lg-3 col-md-6 mb-5 ">
                        <div class="card" style="background-color: #fff; height:350px;padding-top:40px">
                            <a href="" class="text-reset text-decoration-none">
                                <h5 class="card-title mb-3 " style="color: #1C6758;"><?= $view["nama_barang"] ?></h5>
                                </a>
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../img/<?= $view["gambar"] ?>" class="w-50"/>
                            </div>
                            <!-- Product details-->
                            <div class="card-body" style="background-color: #EEF2E6;">
                                
                                <a href="" class="text-reset text-decoration-none text-start fs-6 display-4">
                                    <p><?= $view["kategori"] ?></p>
                                    <p style="margin-top: -10px;" class="mb-4">
                                        <!-- ?= $view["stok"] ?> -->
                                        <?php 
                                        if ($view['stok'] == "0") {
                                        echo 'Stok Habis';
                                        } else {
                                        echo 'Stok tersisa ' . $view["stok"];
                                        }
                                        ?>
                                    </p>
                                </a>

                                <h6 class="mb-3 display-6 fs-4 fw-bold text-danger">Rp.<?= $view["harga"] ?>,-</h6>
                                <a href="buy.php?id=<?= $view ['id_barang']; ?>" class="btn w-100 text-white col-12" style="background-color: #fa8e35;">Masukan Keranjang</a>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>

            
      </div>
    </section>
    
