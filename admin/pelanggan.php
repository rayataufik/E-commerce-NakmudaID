<h2>Data Pelanggan</h2>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("select * from pelanggan"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            <td><?php echo $pecah['no_pelanggan']; ?></td>
            <td>
                <a href="" type="button" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php
        }
        ?>
    </tbody>
</table>