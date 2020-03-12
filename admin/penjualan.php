<h2>Data Penjualan</h2>
<hr>

<div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo date("d-m-Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
            <td><?php echo $pecah['status_pembayaran']; ?></td>
            <td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" type="button" class="btn btn-info btn-sm">Detail</a>
                <?php 
                    if ($pecah['status_pembayaran']=="Verifikasi Pembayaran"):
                ?>
                <a href="index.php?halaman=datapembayaran&id=<?php echo $pecah['id_pembelian'];?>" type="button" class="btn btn-success btn-sm">Pembayaran</a>
                <?php endif ?>
                <?php 
                    if ($pecah['status_pembayaran']=="Lunas"):
                ?>
                <a href="index.php?halaman=datapembayaran&id=<?php echo $pecah['id_pembelian'];?>" type="button" class="btn btn-success btn-sm">Kirim barang</a>
                <?php endif ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php
        }
        ?>
    </tbody>
</table>
</div>