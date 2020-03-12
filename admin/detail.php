<h2>Detail Penjualan</h2>
<hr>

<?php
    $ambil = $koneksi->query("select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>
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
            Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
            Alamat: <?php echo $detail['alamat_pengiriman']; ?> <?php echo $detail['nama_kota']; ?> <?php echo $detail['kodepos']; ?>
        </div>
    </div>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil = $koneksi->query("select * from pembelian_produk join produk on pembelian_produk.id_produk=produk.id_produk where pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp. 
             <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php
        }
        ?>
    </tbody>