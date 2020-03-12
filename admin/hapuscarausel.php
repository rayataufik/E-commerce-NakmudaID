<?php
$ambil = $koneksi->query("select * from carausel where id_carausel='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotocarausel = $pecah['foto_carausel'];
if (file_exists("../carausel/$fotocarausel")){
    unlink("../carausel/$fotocarausel");
}

$koneksi->query("delete from carausel where id_carausel='$_GET[id]'");

echo "<div class='alert alert-danger' role='alert'><strong>Foto Berhasil Dihapus</strong></div>";
echo "<meta http-equiv='refresh' content='1;url=index.php'>";

?>