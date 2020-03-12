<?php
    $koneksi = new mysqli("localhost","root","","nakmudaid");
?>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
          <div class="form-group">
            <label for="login" class="col-form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="login" name="nama">
          </div>
          <div class="form-group">
            <label for="login" class="col-form-label">Nomor ponsel</label>
            <input type="number" class="form-control" id="login" name="nomor">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="daftar">Register</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>




<?php
    if(isset($_POST["daftar"])){
        $nama = $_POST["nama"];
        $nomor = $_POST["nomor"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $ambil = $koneksi->query("SELECT * from pelanggan where email_pelanggan='$email'");
        $akunyangsama = $ambil->num_rows;

        if($akunyangsama==1){
          echo "<script>alert('Pendaftaran gagal, emmail sudah digunakan!')</script>";
          echo "<script>location='index.php';</script>";
        }
        else{
            $koneksi->query("INSERT into pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,no_pelanggan)values('$email','$password','$nama','$nomor')");
            echo "<script>alert('Pendaftran berhasil, silahkan login!')</script>";
            echo "<script>location='index.php';</script>";
        }
        
    }
?>