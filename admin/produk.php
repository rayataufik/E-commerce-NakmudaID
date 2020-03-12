
<div class="row">
  <div class="col-10"><span><h2>Data Produk</h2></span></div>
  <div class="col-2"><span><a href="index.php?halaman=tambahproduk" class="btn btn-primary ">Tambah Produk</a></span></div>
</div>
<hr>

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("select * from produk"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>"width="100">
            </td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['kategori']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['berat_produk'];?> gr</td>
            <td><?php echo $pecah['stok_produk'];?></td>
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger btn-sm">Hapus</a>
                <a href="index.php?halaman=editproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-success btn-sm">Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php
        }
        ?>
    </tbody>
</table>