<?php
    include("../masterpages/navbar.php");
    $koneksi = new mysqli("localhost","root","","nakmudaid");
?>
<?php
    $ambil = $koneksi->query("SELECT * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();

    if (!isset($_SESSION["pelanggan"])OR empty($_SESSION["pelanggan"])) {
        echo "<script>location='index.php';</script>";
        exit();
    }
?>
<?php 
   
    $idpelangganyangbeli = $detail["id_pelanggan"];
    
    $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

    if($idpelangganyangbeli!==$idpelangganyanglogin){

        echo "<script>location='../error404/index.php';</script>";
        exit();
    }

?>

<section class="konten">
    <div class="container">
        <br><br>
    <h2>Detail Pembelian</h2>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h3>Pembelian</h3>
            <strong>No. Invoice: INV/<?php echo date("dmY", strtotime($detail['tanggal_pembelian'])); ?>/<?php echo $detail['id_pembelian']; ?></strong>
            <p>Tanggal: <?php echo date("d-m-Y", strtotime($detail['tanggal_pembelian'])); ?><br>
            Total  : Rp.<?php echo number_format($detail['total_pembelian']); ?><br>
            No. Resi : <?php
                        if(empty($detail['resi_pengiriman'])){
                            echo "-";
                        }
                        else{
                            echo $detail['resi_pengiriman'];
                            echo "<br><strong>JNE-REGULER</strong>";
                        }
                        ?>
            </p>
        </div>
        <div class="col-md-4">
            <h3>Pelanggan</h3>
            <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
            <p><?php echo $detail['no_pelanggan']; ?><br>
            <?php echo $detail['email_pelanggan']; ?>
            </p>
        </div>
        <div class="col-md-4">
            <h3>Pengiriman</h3>
            Ongkos Kirim: Rp. <?php echo $detail['tarif']; ?><br>
            Alamat: <?php echo $detail['alamat_pengiriman']; ?> <?php echo $detail['nama_kota']; ?> <?php echo $detail['kodepos']; ?>
        </div>
    </div><br>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil = $koneksi->query("select * from pembelian_produk where id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td>Rp.<?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['berat']; ?> gr</td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp.
            <?php echo number_format($pecah['subharga']); ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php
        }
        ?>
    </tbody>
    </table>
        <?php 
                if ($detail['status_pembayaran']=="Menunggu pembayaran"):
            ?>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Silahkan melakukan pembayaran Rp.<?php echo number_format($detail['total_pembelian']); ?> Ke <br>
                            <strong>BANK BNI 000000 AN. MUHAMMAD RAYA TAUFIK</strong><br><br>
                            <a href="pembayaran.php?id=<?php echo $detail["id_pembelian"] ?>" class="btn btn-success btn-sm">Upload Pembayaran</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif ?>
    </div>
</section>

<?php include("../config/javalink.php"); ?>