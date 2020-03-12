<h2>Dashboard</h2>
<hr>

<?php
  $koneksi = new mysqli("localhost","root","","nakmudaid");
?>

<div class="header pb-6">
<div class="container-fluid">
  <div class="header-body">
    <!-- Card stats -->
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">real-time</h5>
                <span class="h2 font-weight-bold mb-0">100</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="ni ni-active-40"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php foreach($koneksi->query('SELECT COUNT(*) FROM pelanggan') as $row) {?>
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
                <span class="h2 font-weight-bold mb-0"><?php echo $row['COUNT(*)'];} ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="ni ni-chart-pie-35"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php foreach($koneksi->query('SELECT COUNT(*) FROM pembelian') as $row) {?>
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Penjualan</h5>
                <span class="h2 font-weight-bold mb-0"><?php echo $row['COUNT(*)'];} ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                  <i class="ni ni-money-coins"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php foreach($koneksi->query('SELECT COUNT(*) FROM produk') as $row) {?>
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Produk</h5>
                <span class="h2 font-weight-bold mb-0"><?php echo $row['COUNT(*)'];} ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                  <i class="ni ni-app"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="row">
  <div class="col-10"><span><h2>Carausel</h2></span></div>
  <div class="col-2"><span><a href="index.php?halaman=tambahcarausel" class="btn btn-primary ">Tambah Foto</a></span></div>
</div>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto Carausel</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("select * from carausel"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td>
                <img src="../carausel/<?php echo $pecah['foto_carausel']; ?>"width="200">
            </td>
            <td>
                <a href="index.php?halaman=hapuscarausel&id=<?php echo $pecah['id_carausel'];?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php
        }
        ?>
    </tbody>
</table>