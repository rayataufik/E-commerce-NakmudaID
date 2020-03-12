<?php
    include("../masterpages/navbar.php");
    $koneksi = new mysqli("localhost","root","","nakmudaid");

    if (!isset($_SESSION["pelanggan"])OR empty($_SESSION["pelanggan"])) {
        echo "<script>location='index.php';</script>";
        exit();
    }

    $idpem = $_GET["id"];
    $ambil = $koneksi->query("SELECT * from pembelian where id_pembelian='$idpem'");
    $detpem = $ambil->fetch_assoc();

?>
<?php 
    // id pelanggan login 
    $idpelangganyangbeli = $detpem["id_pelanggan"];
    // id pelanggan session 
    $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

    if($idpelangganyanglogin!==$idpelangganyangbeli){

        echo "<script>location='../error404/index.php';</script>";
        exit();
    }

?>

<div class="container"><br><br><br>
<?php 
    if (isset($_POST["submit"])) {
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti,"../bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        $koneksi->query("INSERT into pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)values ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

        $koneksi->query("UPDATE pembelian set status_pembayaran='Verifikasi Pembayaran' where id_pembelian='$idpem'");

        echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>Bukti pembayaran berhasil diupload!</h4><hr><p>Admin akan memverifikasi pembayaran kamu secepatnya</p></div>";
        echo "<meta http-equiv='refresh' content='2;url=rtransaksi.php'>";
    }
?>
    <h2>Konfirmasi Pembayaran</h2>
    <p>Kirim bukti pembayaran anda disini</p>
    <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Penyetor</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label>Bank</label>
            <input type="text" name="bank" class="form-control">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" min="1" class="form-control">
        </div>
        <div class="custom-file form-group">
            <input type="file" class="custom-file-input" id="customFile" name="bukti">
            <label class="custom-file-label" for="customFile">Upload bukti pembayaran</label>
            <p class="text-danger">File foto max 2MB</p><br>
        </div>
        <button class="btn btn-primary" name="submit">Kirim</button>
    </form>
</div>

<?php include("../config/javalink.php"); ?>