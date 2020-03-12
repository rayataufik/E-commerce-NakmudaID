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
                    <div class='alert alert-secondary' role='alert'>Keranjang masih kosong!</div>
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