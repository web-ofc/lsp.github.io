<?php 
        include_once "../app/config/koneksi.php"; 
        $appetizer = mysqli_query($conn, "SELECT * FROM menu WHERE kategori_menu LIKE '%Appetizer%'");

        $maincourse = mysqli_query($conn, "SELECT * FROM menu WHERE kategori_menu LIKE '%Main Course%'");

        $dessert = mysqli_query($conn, "SELECT * FROM menu WHERE kategori_menu LIKE '%Dessert%'");

        $drink = mysqli_query($conn, "SELECT * FROM menu WHERE kategori_menu LIKE '%Drink%'");
    
        ?>


<section style="background-color: #D6CDA4; border-radius: 18px;">
  <div class="text-center container py-5">
    <h4 class="mt-4 mb-3" style="color: #3D8361;"><strong>List Menu Kasir Resto</strong></h4>

    <h5 class="mt-4 mb-5" style="color: #1C6758;">- Appetizer -</h5>
    
    <div class="row">
    <?php 
    while ($view = mysqli_fetch_array($appetizer)) {
    ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="background-color: #EEF2E6;">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    data-mdb-ripple-color="light">
                    <img src="../public/img/appetizer.png"
                    class="w-50"/>
                </div>
                <div class="card-body" style="background-color: #EEF2E6;">
                    <a href="" class="text-reset text-decoration-none">
                    <h5 class="card-title mb-3" style="color: #1C6758;"><?= $view["nama_menu"] ?></h5>
                    </a>
                    <a href="" class="text-reset text-decoration-none">
                    <p><?= $view["kategori_menu"] ?></p>
                    <p>
                        <!-- ?= $view["stok_menu"] ?> -->
                        <?php 
                        if ($view['stok_menu'] == "0") {
                        echo 'Stok Habis';
                        } else {
                        echo 'Stok tersisa ' . $view["stok_menu"];
                        }
                        ?>
                    </p>
                    </a>
                    <h6 class="mb-3">Rp.<?= $view["harga_menu"] ?>,-</h6>
                    <form action="landing_page.php?page=pemesanan" method="post">
                    <input type="hidden" name="id_menu" value="<?= $view["id_menu"] ?>">
                    <input type="hidden" name="nama_menu" value="<?= $view["nama_menu"] ?>">
                    <input type="hidden" name="harga_menu" value="<?= $view["harga_menu"] ?>">
                    
                    <?php 
                    if ($view['stok_menu'] == "0") {
                    echo '<input type="submit" value="Beli" class="btn btn-primary disabled" disable>';
                    } else {
                    echo '<input type="submit" value="Beli" class="btn btn-primary">';
                    }
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <?php 
      } ?>
    </div>

        <h5 class="mt-4 mb-5" style="color: #1C6758;">- Main Course -</h5>
    
        <div class="row">
    <?php 
    while ($view = mysqli_fetch_array($maincourse)) {
    ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="background-color: #EEF2E6;">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    data-mdb-ripple-color="light">
                    <img src="../public/img/maincourse.png"
                    class="w-50"/>
                </div>
                <div class="card-body">
                    <a href="" class="text-reset text-decoration-none">
                    <h5 class="card-title mb-3" style="color: #1C6758;"><?= $view["nama_menu"] ?></h5>
                    </a>
                    <a href="" class="text-reset text-decoration-none">
                    <p><?= $view["kategori_menu"] ?></p>
                    <p>
                        <!-- ?= $view["stok_menu"] ?> -->
                        <?php 
                        if ($view['stok_menu'] == "0") {
                        echo 'Stok Habis';
                        } else {
                        echo 'Stok tersisa ' . $view["stok_menu"];
                        }
                        ?>
                    </p>
                    </a>
                    <h6 class="mb-3">Rp.<?= $view["harga_menu"] ?>,-</h6>
                    <form action="landing_page.php?page=pemesanan" method="post">
                    <input type="hidden" name="id_menu" value="<?= $view["id_menu"] ?>">
                    <input type="hidden" name="nama_menu" value="<?= $view["nama_menu"] ?>">
                    <input type="hidden" name="harga_menu" value="<?= $view["harga_menu"] ?>">
                    <input type="submit" value="Beli" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <?php 
      } ?>
    </div>

        <h5 class="mt-4 mb-5" style="color: #1C6758;">- Dessert -</h5>
    
        <div class="row">
    <?php 
    while ($view = mysqli_fetch_array($dessert)) {
    ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="background-color: #EEF2E6;">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    data-mdb-ripple-color="light">
                    <img src="../public/img/dessert.png"
                    class="w-50"/>
                </div>
                <div class="card-body">
                    <a href="" class="text-reset text-decoration-none">
                    <h5 class="card-title mb-3" style="color: #1C6758;"><?= $view["nama_menu"] ?></h5>
                    </a>
                    <a href="" class="text-reset text-decoration-none">
                    <p><?= $view["kategori_menu"] ?></p>
                    <p>
                        <!-- ?= $view["stok_menu"] ?> -->
                        <?php 
                        if ($view['stok_menu'] == "0") {
                        echo 'Stok Habis';
                        } else {
                        echo 'Stok tersisa ' . $view["stok_menu"];
                        }
                        ?>
                    </p>
                    </a>
                    <h6 class="mb-3">Rp.<?= $view["harga_menu"] ?>,-</h6>
                    <form action="landing_page.php?page=pemesanan" method="post">
                    <input type="hidden" name="id_menu" value="<?= $view["id_menu"] ?>">
                    <input type="hidden" name="nama_menu" value="<?= $view["nama_menu"] ?>">
                    <input type="hidden" name="harga_menu" value="<?= $view["harga_menu"] ?>">
                    <input type="submit" value="Beli" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <?php 
      }  ?>
    </div>

    <h5 class="mt-4 mb-5" style="color: #1C6758;">- Drink -</h5>
    
        <div class="row">
    <?php 
    while ($view = mysqli_fetch_array($drink)) {
    ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="background-color: #EEF2E6;">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    data-mdb-ripple-color="light">
                    <img src="../public/img/drink.png"
                    class="w-50"/>
                </div>
                <div class="card-body">
                    <a href="" class="text-reset text-decoration-none">
                    <h5 class="card-title mb-3" style="color: #1C6758;"><?= $view["nama_menu"] ?></h5>
                    </a>
                    <a href="" class="text-reset text-decoration-none">
                    <p><?= $view["kategori_menu"] ?></p>
                    <p>
                        <!-- ?= $view["stok_menu"] ?> -->
                        <?php 
                        if ($view['stok_menu'] == "0") {
                        echo 'Stok Habis';
                        } else {
                        echo 'Stok tersisa ' . $view["stok_menu"];
                        }
                        ?>
                    </p>
                    </a>
                    <h6 class="mb-3">Rp.<?= $view["harga_menu"] ?>,-</h6>
                    <form action="landing_page.php?page=pemesanan" method="post">
                    <input type="hidden" name="id_menu" value="<?= $view["id_menu"] ?>">
                    <input type="hidden" name="nama_menu" value="<?= $view["nama_menu"] ?>">
                    <input type="hidden" name="harga_menu" value="<?= $view["harga_menu"] ?>">
                    <input type="submit" value="Beli" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <?php 
      }  ?>
    </div>

    </div>
  </div>
</section>