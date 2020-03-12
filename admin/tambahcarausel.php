<h2>Tambah Foto Carausel</h2>
<hr>

<?php
    if(isset($_POST['save']))
    {
        $fotocarausel = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../carausel/".$fotocarausel);
        $koneksi->query("insert into carausel (foto_carausel)VALUE('$fotocarausel')");

        echo "<div class='alert alert-success' role='alert'><strong>Success! </strong>Data Telah Tersimpan!</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
?>


<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-control-label">Tambah Foto Carausel</label>
        <input class="form-control" type="file" rows="10" name="foto" >
    </div>
    <button class="btn btn-success" name="save">Simpan</button>
</form>

