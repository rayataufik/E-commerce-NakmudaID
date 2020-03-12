<?php include("../masterpages/navbar.php");?>
<?php
  $id_produk =$_GET["id"];
  $koneksi = new mysqli("localhost","root","","nakmudaid");
  $ambil = $koneksi->query("SELECT * from produk where id_produk='$id_produk'");
  $detail = $ambil->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NakmudaId</title>

 <style type="text/css">
        img {
          max-width: 100%; }

        .preview {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
          -webkit-flex-direction: column;
              -ms-flex-direction: column;
                  flex-direction: column; }
          @media screen and (max-width: 996px) {
            .preview {
              margin-bottom: 20px; } }

        .preview-pic {
          -webkit-box-flex: 1;
          -webkit-flex-grow: 1;
              -ms-flex-positive: 1;
                  flex-grow: 1; }

        .preview-thumbnail.nav-tabs {
          border: none;
          margin-top: 15px; }
          .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%; }
            .preview-thumbnail.nav-tabs li img {
              max-width: 100%;
              display: block; }
            .preview-thumbnail.nav-tabs li a {
              padding: 0;
              margin: 0; }
            .preview-thumbnail.nav-tabs li:last-of-type {
              margin-right: 0; }

        .tab-content {
          overflow: hidden; }
          .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
                    animation-name: opacity;
            -webkit-animation-duration: .3s;
                    animation-duration: .3s; }

        .card {
          margin-top: 90px;
          background: #eee;
          padding: 3em;
          line-height: 1.5em; }

        @media screen and (min-width: 997px) {
          .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } }

        .details {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
          -webkit-flex-direction: column;
              -ms-flex-direction: column;
                  flex-direction: column; }

        .colors {
          -webkit-box-flex: 1;
          -webkit-flex-grow: 1;
              -ms-flex-positive: 1;
                  flex-grow: 1; }

        .product-title, .sizes, .colors {
          text-transform: UPPERCASE;
          font-weight: bold; }

        .checked {
          color: #ff9f1a; }

        .product-title, .rating, .product-description, .price, .vote, .sizes {
          margin-bottom: 15px; }

        .product-title {
          margin-top: 0; }

        .size {
          margin-right: 10px; }
          .size:first-of-type {
            margin-left: 40px; }

        .color {
          display: inline-block;
          vertical-align: middle;
          margin-right: 10px;
          height: 2em;
          width: 2em;
          border-radius: 2px; }
          .color:first-of-type {
            margin-left: 20px; }

        .add-to-cart{
          background: #ff9f1a;
          padding: 1.2em 1.5em;
          border: none;
          text-transform: UPPERCASE;
          font-weight: bold;
          color: #fff;
          -webkit-transition: background .3s ease;
                  transition: background .3s ease; }
          .add-to-cart:hover {
            background: #b36800;
            color: #fff; }
        .beli-sekarang{
          background: #7FC459;
          padding: 1.2em 1.5em;
          border: none;
          text-transform: UPPERCASE;
          font-weight: bold;
          color: #fff;
          -webkit-transition: background .3s ease;
          transition: background .3s ease; }
          .beli-sekarang:hover {
          background: #5a9439;
          color: #fff; }
        }
        .not-available {
          text-align: center;
          line-height: 2em; }
          .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff; }

        .orange {
          background: #ff9f1a; }

        .green {
          background: #85ad00; }

        .blue {
          background: #0076ad; }

        .tooltip-inner {
          padding: 1.3em; }

        @-webkit-keyframes opacity {
          0% {
            opacity: 0;
            -webkit-transform: scale(3);
                    transform: scale(3); }
          100% {
            opacity: 1;
            -webkit-transform: scale(1);
                    transform: scale(1); } }

        @keyframes opacity {
          0% {
            opacity: 0;
            -webkit-transform: scale(3);
                    transform: scale(3); }
          100% {
            opacity: 1;
            -webkit-transform: scale(1);
                    transform: scale(1); } }
    
    
    </style>

  </head>

  <body>
    
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                          <div class="tab-pane active" id="pic-1"><img src="../foto_produk/<?php echo $detail['foto_produk']; ?>" /></div><br>
                        </div>
                    </div>
                    <div class="details col-md-6">
                    <?php
                          if(isset($_POST["tkeranjang"])){
                            $jumlah = $_POST["jumlah"];
                            $_SESSION["keranjang"][$id_produk]= $jumlah;

                            echo "<div class='alert alert-success' role='alert'>Produk berhasil dimasukan ke keranjang !</div>";
                            echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
                          }
                        ?>
                        <h3 class="product-title"><?php echo $detail['nama_produk']; ?></h3>
                        <h4 class="price">Rp <span><?php echo number_format($detail['harga_produk']); ?></span></h4>
                        <p class="product-description">Berat : <?php echo $detail['berat_produk']; ?> gr</p>
                        <p class="product-description">Stok : <?php echo $detail['stok_produk']; ?></p>
                        <form action="" method="post">
                          <div class="form-group">
                            <input type="number" name="jumlah" class="form-control ctrlf" min="1" max="<?php echo $detail['stok_produk']; ?>" value="1"> 
                          </div>
                          <button class="add-to-cart btn btn-default" name="tkeranjang">Tambahkan Ke Keranjang</button>
                        </form>
                    </div>
                    <div class="detail col-md-12">
                    <h4>Deskripsi</h4>
                    <?php echo $detail['deskripsi_produk']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<!-- javascript -->
<?php include("../config/javalink.php"); ?>