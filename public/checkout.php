<?php
    include("../masterpages/navbar.php");
    $koneksi = new mysqli("localhost","root","","nakmudaid");

    if(!isset($_SESSION["pelanggan"])){
        echo "<script>alert('Silahkan login sebelum checkout!')</script>";
        echo "<script>location='index.php';</script>";
        exit();
    }

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
        <h1>Checkout</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                <?php
                    if(empty($_SESSION["keranjang"])){
                        echo "<script>alert('Tidak ada produk dikeranjang!')</script>";
                        echo "<script>location='index.php';</script>";
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
                    <?php $total=0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                    <?php 
                        $ambil = $koneksi->query("SELECT * from produk where id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"]*$jumlah;
                    ?>
                        <tr>
                            <td><img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100"></td>
                            <td><?php echo $pecah['nama_produk'];?></td>
                            <td>Rp <?php echo number_format($pecah['harga_produk']);?></td>
                            <td class="text-center"><?php echo $jumlah;?></td>
                            <td class="text-center">Rp <?php echo number_format($subharga);?></td>
                            <td></td>
                        </tr>
                        <?php $total+=$subharga; ?>
                    <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Belanja</th>
                            <th class="text-right">Rp. <?php echo number_format($total);?></th>
                        </tr>
                    </tfoot>
                </table>
            </div><br>
            <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"];?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["no_pelanggan"];?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" rows="10" placeholder="Masukan alamat"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>provinsi</label>
                    <select name="id_ongkir" class="form-control">
                        <option value="">Pilih provinsi</option>
                        <?php 
                            $ambil = $koneksi->query("select * from ongkir");
                            while($peronkir = $ambil->fetch_assoc()){
                        ?>
                        <option value="<?php echo $peronkir['id_ongkir'];?>">
                        <?php echo $peronkir['nama_kota'];?> , Ongkir :
                        <?php echo number_format($peronkir['tarif']);?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                <label>kode pos</label>
                <input type="text" class="form-control" name="kodepos">
                </div>
                <div class="col-md-2 mt-4 ml-5">
                <button class="btn btn-lg  btn-success" name="checkout">Checkout</button>
                </div>
            </div>
            </form>
            <?php
                if(isset($_POST["checkout"])){
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    $id_ongkir = $_POST["id_ongkir"];
                    $tanggalpembelian = date("Y-m-d");
                    $alamat_pengiriman = $_POST['alamat_pengiriman'];
                    $kodepos = $_POST['kodepos'];

                    $ambil = $koneksi->query("select * from ongkir where id_ongkir='$id_ongkir'");
                    $arrayongkir = $ambil->fetch_assoc();
                    $namakota = $arrayongkir['nama_kota'];
                    $tarif = $arrayongkir['tarif'];


                    $totalpembelian= $total + $tarif;

                    $koneksi->query("insert into pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman,kodepos)value('$id_pelanggan','$id_ongkir','$tanggalpembelian','$totalpembelian','$namakota','$tarif','$alamat_pengiriman','$kodepos')");


                    $id_pembelian_terbaru = $koneksi->insert_id;
                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                    $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['nama_produk'];
                    $harga = $perproduk['harga_produk'];
                    $berat = $perproduk['berat_produk'];

                    $subberat = $perproduk['berat_produk']*$jumlah;
                    $subbharga = $perproduk['harga_produk']*$jumlah;
                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)VALUES ('$id_pembelian_terbaru','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah') ");
                    }

                    $koneksi->query("UPDATE produk set stok_produk=stok_produk - $jumlah where id_produk='$id_produk'");

                    unset($_SESSION["keranjang"]);

                    echo "<div class='alert alert-success' role='alert'><strong>Pembelian berhasil</div>";
                    echo "<meta http-equiv='refresh' content='1;url=invoice.php?id=$id_pembelian_terbaru'>";
                }
            ?>
        </div>
    </div>
</div>

<?php include("../config/javalink.php"); ?>



