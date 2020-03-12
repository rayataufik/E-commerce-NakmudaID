<?php
    include("../masterpages/navbar.php");
    $koneksi = new mysqli("localhost","root","","nakmudaid");

    $kat = $_GET["kat"];

    $semuadata = array();
    $ambil = $koneksi->query("SELECT * from produk where kategori like '%$kat%'");
    while ($pecah = $ambil ->fetch_assoc()) {
        $semuadata[]=$pecah;
    }
?>

<section id="terlaris" class="section bottom-padding">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="section-title">
          <span class="text-biru">Kategori <?php echo $kat ?></span>
        </div>
      </div>
      <div class="col-12">
      <?php
      if(empty($semuadata)){
        echo "<div class='alert alert-secondary' role='alert'>Produk tidak ditemukan!</div>";
      }
      ?>
      </div>
      <?php foreach ($semuadata as $key => $value): ?>
        <div class="col-md-3 col-6 d-flex align-items-stretch">
          <a class="tdc" href="detailproduk.php?id=<?php echo $value['id_produk'];?>">
            <div class="card produk">
              <img src="../foto_produk/<?php echo $value['foto_produk']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $value['nama_produk']; ?></h5>
            </div>
            <div class="card-footer">
              <small class="text-muted">Rp. <?php echo number_format($value['harga_produk']); ?></small>
            </div>
            </div>
          </a>
        </div>
    <?php endforeach ?>
    </div>
  </div>
</section>


<?php include("../config/javalink.php"); ?>