<?php
    include("../masterpages/navbar.php");

?>

<style>
    .foto-member{
        margin-top: 30px;
    }
    .judul{
        margin-top: 70px;
    }
    .form{
        margin-top: 30px;
    }
</style>

<section>
    <div class="container">
        <div class="col-12 d-flex justify-content-center">
            <div class="section-title judul">
                <span class="text-biru">Profile</span>
            </div>
        </div>
        <div class="row">
        <div class="col-3">
            <img src="../member/foto_member/<?php echo $_SESSION["pelanggan"]["foto_pelanggan"]; ?>" class="img-thumbnail foto-member">
        </div>
        <div class="col-9">

<?php
$koneksi = new mysqli("localhost","root","","nakmudaid");

$idpel = $_SESSION["pelanggan"]["id_pelanggan"];

if(isset($_POST['ubahfoto'])){
$namafoto=$_FILES['fotop']['name'];
$lokasifoto=$_FILES['fotop']['tmp_name'];
if(!empty($lokasifoto)){
    move_uploaded_file($lokasifoto,"../member/foto_member/$namafoto");
    $koneksi->query("update pelanggan set foto_pelanggan='$namafoto' where id_pelanggan='$idpel'");
}
if(empty($namafoto)){
    echo "<div class='alert alert-warning' role='alert'>Foto tidak boleh kosong!</div>";
    echo "<meta http-equiv='refresh' content='1;url=profile.php'>";
}else{
    
    echo "<div class='alert alert-success' role='alert'><strong>Success! </strong>Data Telah Tersimpan, Silahkan Re-log untuk pembaruan!</div>";
    echo "<meta http-equiv='refresh' content='1;url=profile.php'>";
    }
}
?>

        <form method="post" enctype="multipart/form-data">
            <div class="form-row form">
                <div class="form-group col-md-6">
                    <input type="text" readonly  value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"];?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["no_pelanggan"];?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text"  placeholder="<?php echo $_SESSION["pelanggan"]["email_pelanggan"];?>" class="form-control">
                </div>
                <div class="col-md-6">
                <button type="button" class="btn btn-secondary" name="ubahemail">Ubah</button>
                </div>
                <div class="form-group col-md-6">
                    <input type="text"  placeholder="Masukan Password baru" class="form-control">
                </div>
                <div class="col-md-6">
                <button type="button" class="btn btn-secondary" name="ubahpass">Ubah</button>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="custom-file form-group col-md-6">
                    <input type="file" name="fotop" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Ganti foto profil</label>
                    <p class="text-danger">File foto max 2MB</p>
                </div>
                <div class="col-md-6">
                <button type="submit" class="btn btn-secondary"  name="ubahfoto">Ubah</button>
                </div>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</section>


<?php include("../config/javalink.php"); ?>