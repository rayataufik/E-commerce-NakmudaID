<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","nakmudaid");
?>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
          <div class="form-group">
            <label class="col-form-label">Email</label>
            <input type="email" class="form-control" id="login" name="email">
          </div>
          <div class="form-group">
            <label class="col-form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="modal-footer">
        <button class="btn btn-primary" name="login">Login</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<?php
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $ambil = $koneksi->query("select * from pelanggan where email_pelanggan='$email' and password_pelanggan='$password'");

        $akunyangcocok = $ambil->num_rows;

        if($akunyangcocok==1){
            $akun = $ambil->fetch_assoc();
            $_SESSION["pelanggan"] =$akun;
            echo "<script>location='index.php';</script>";

            if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])){
              echo "<script>location='checkout.php';</script>";
            }
            else{
              echo "<script>location='index.php';</script>";
            }
        }
        else{
            echo "<script>alert('Email atau password anda salah!')</script>";
            echo "<script>location='index.php';</script>";
        }
        
    }
?>