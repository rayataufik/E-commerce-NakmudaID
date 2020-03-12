<?php

    include("../masterpages/navbar.php");

    $koneksi = new mysqli("localhost","root","","nakmudaid");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NakmudaId</title>
<style>
    .texts{
        margin-top :50px;
        margin-bottom: 30px;
    }
</style>
</head>

<section class="text-center texts">
    <div class="container">
        <h1>Keranjang Belanjaan</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <?php
                    if(empty($_SESSION["keranjang"])){
                        echo "<script>location='keranjang1.php';</script>";
                    }
                    ?>
                    <thead>
                        <tr>
                            <th scope="col">Gambar</th>
                            <th scope="col">Product</th>
                            <th scope="col">Harga</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-center">Subtotal</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                    <?php 
                        $ambil = $koneksi->query("select * from produk where id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"]*$jumlah;
                    ?>
                        <tr>
                            <td><img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100"></td>
                            <td><?php echo $pecah['nama_produk'];?></td>
                            <td>Rp <?php echo number_format($pecah['harga_produk']);?></td>
                            <td class="text-center"><?php echo $jumlah;?></td>
                            <td class="text-center">Rp <?php echo number_format($subharga);?></td>
                            <td class="text-right"><a href="hapuskeranjang.php?id=<?php echo $id_produk;?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> </a></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="index.php" class="btn btn-lg btn-block btn-light" type="button">Lanjutkan Belanja</a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="checkout.php" class="btn btn-lg btn-block btn-success" type="button">Lanjut ke Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../config/javalink.php"); ?>
