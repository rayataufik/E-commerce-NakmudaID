<?php
    include("../masterpages/navbar.php");
    $koneksi = new mysqli("localhost","root","","nakmudaid");

    if (!isset($_SESSION["pelanggan"])OR empty($_SESSION["pelanggan"])) {
        echo "<script>location='index.php';</script>";
        exit();
    }
?>

<section class="rtransaksi">
    <div class="container"><br><br><br><br>
        <h3>Riwayat Transaksi <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Order</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $nomor=1;
                $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                while($pecah = $ambil->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo date("d-m-Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
                    <td>Rp. <?php echo number_format($pecah["total_pembelian"]); ?></td>
                    <td><?php echo $pecah["status_pembayaran"]; ?>
                        <br>
                        <?php if(!empty($pecah['resi_pengiriman'])): ?>
                        Resi: <?php echo $pecah["resi_pengiriman"]; ?>
                        <?php endif ?>
                    </td>
                    <td>
                        <a href="invoice.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info btn-sm">Invoice</a>
                        <?php 
                            if ($pecah['status_pembayaran']=="Menunggu pembayaran"):
                        ?>
                        <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success btn-sm">Upload Pembayaran</a>
                            <?php else: ?>
                            <a href="lpembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-warning btn-sm">Lihat Pembayaran</a>
                        <?php endif ?>
                        
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>


<?php include("../config/javalink.php"); ?>