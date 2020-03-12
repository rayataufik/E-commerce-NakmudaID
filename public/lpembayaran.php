<?php
    include("../masterpages/navbar.php");
    $koneksi = new mysqli("localhost","root","","nakmudaid");

    $id_pembelian = $_GET["id"];
    $ambil = $koneksi->query("SELECT * from pembayaran left join pembelian on pembayaran.id_pembelian=pembelian.id_pembelian where pembelian.id_pembelian='$id_pembelian'");
    $detbay = $ambil->fetch_assoc();

    if (!isset($_SESSION["pelanggan"])OR empty($_SESSION["pelanggan"])) {
        echo "<script>location='index.php';</script>";
        exit();
    }
?>
<?php 
    // id pelanggan login 
    $idpelangganyangbeli = $detbay["id_pelanggan"];
    // id pelanggan session 
    $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

    if($idpelangganyanglogin!==$idpelangganyangbeli){

        echo "<script>location='../error404/index.php';</script>";
        exit();
    }
    if (empty($detbay)) {
        echo "<script>location='../error404/index.php';</script>";
    }

?>
<br><br>
<div class="container">
<h2>Detail Pembayaran</h2><br>
<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detbay["nama"] ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detbay["bank"] ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th><?php echo number_format($detbay["jumlah"]) ?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6 ">
        <img src="../bukti_pembayaran/<?php echo $detbay["bukti"] ?>" width="50%">
    </div>
</div>
</div>


<?php include("../config/javalink.php"); ?>