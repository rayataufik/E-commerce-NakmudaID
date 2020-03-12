<h2>Data pembayaran</h2>

<?php 
    $id_pembelian = $_GET['id'];

    $ambil = $koneksi->query("SELECT * from pembayaran where id_pembelian='$id_pembelian'");
    $detail = $ambil->fetch_assoc();
?><br>
<?php
    if (isset($_POST["submit"])) {

        $resi = $_POST["resi"];
        $status = $_POST["status"];

        $koneksi->query("UPDATE pembelian set resi_pengiriman='$resi', status_pembayaran='$status' where id_pembelian='$id_pembelian'");
        echo "<div class='alert alert-success' role='alert'><strong>Success! </strong>Data pembelian terupdate!</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penjualan'>";
    }
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detail["nama"] ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detail["bank"] ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th><?php echo number_format($detail["jumlah"]) ?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6 ">
        <img src="../bukti_pembayaran/<?php echo $detail["bukti"] ?>" width="50%">
    </div>
</div>

<div class="col-md-6">
    <form action="" method="post">
        <div class="form-group">
            <label class="form-control-label">Input resi</label>
            <input class="form-control" type="text" name="resi" placeholder="Boleh dikosongkan jika barang belum dikirim">
        </div>
        <div class="form-group">
            <select class="form-control" name="status">
                <option>Pilih status</option>
                <option value="Lunas">Lunas</option>
                <option value="Barang dikirim">Barang dikirim</option>
                <option value="Dibatalkan">Batalkan</option>
            </select>
        </div>
        <button class="btn btn-primary" name="submit">Proses</button>
    </form>
</div>

