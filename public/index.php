<?php

  $koneksi = new mysqli("localhost","root","","nakmudaid");
  $result = $koneksi->query("select foto_carausel from carausel");
?>
<?php
    include("../masterpages/navbar.php");
?>


<!-- header -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $i = 0;
    foreach($result as $row){
      $actives ='';
      if($i==0){
        $actives = 'active';
      }
    ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $actives ?>"></li>
    <?php $i++; }?>
  </ol>
  
  <div class="carousel-inner">
  <?php
    $i = 0;
    foreach($result as $row){
      $actives ='';
      if($i==0){
        $actives = 'active';
      }
    ?>
    <div class="carousel-item <?= $actives ?>">
      <img src="../carausel/<?php echo $row['foto_carausel']; ?>" class="d-block w-100" height="500px" alt="..." style="object-fit: cover; object-position:50% 50%">
    </div>
    <?php $i++; } ?>
  </div>


  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- header -->


<!-- produk -->
<section id="terlaris" class="section bottom-padding">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="section-title">
          <span class="text-biru">Produk</span>
        </div>
      </div>
      <?php 
      $ambil = $koneksi->query("select * from produk");
      while($perproduk = $ambil->fetch_assoc()){
      ?>
        <div class="col-md-3 col-6 d-flex align-items-stretch">
          <a class="tdc" href="detailproduk.php?id=<?php echo $perproduk['id_produk'];?>">
            <div class="card produk">
              <img src="../foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
            </div>
            <div class="card-footer">
              <small class="text-muted">Rp. <?php echo number_format($perproduk['harga_produk']); ?></small>
            </div>
            </div>
          </a>
        </div>
      <?php }?>
    </div>
  </div>
</section>
<!-- produk end -->

<?php
  include("../masterpages/footer_contact.php");
?>

<!-- return to top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<?php include("../config/javalink.php"); ?>