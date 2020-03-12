<h2>Tambah Produk</h2>
<hr>

<?php
    if(isset($_POST['save']))
    {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../foto_produk/".$nama);
        $koneksi->query("INSERT into produk (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,kategori)VALUE('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]','$_POST[kategori]')");

        echo "<div class='alert alert-success' role='alert'><strong>Success! </strong>Data Telah Tersimpan!</div>";
        echo "<br>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=produk'>";
    }
?>


<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-control-label">Nama Produk</label>
        <input class="form-control" type="text" name="nama" >
    </div>
    <div class="form-group">
        <label class="form-control-label">Harga Produk (Rp)</label>
        <input class="form-control" type="number" name="harga" >
    </div>
    <div class="form-group">
        <label class="form-control-label">Berat Produk (Gr)</label>
        <input class="form-control" type="number" name="berat" >
    </div>
    <div class="form-group">
        <label class="form-control-label">Stok produk</label>
        <input class="form-control" type="number" name="stok">
    </div>
    <div class="form-group">
        <select class="form-control" name="kategori">
            <option>Pilih Kategori</option>
            <option value="Samsung">Samsung</option>
            <option value="Xiaomi">Xiaomi</option>
            <option value="Oppo">Oppo</option>
            <option value="Vivo">Vivo</option>
            <option value="Realme">Realme</option>
        </select>
    </div>
    <div class="form-group">
        <label class="form-control-label">Deskripsi Produk</label>
        <textarea class="form-control deskripsi" type="text" rows="10" name="deskripsi" id="deskripsi"></textarea> 
    </div>
    <div class="form-group">
        <label class="form-control-label">Foto Produk</label>
        <input class="form-control" type="file" rows="10" name="foto" >
    </div>
    <button class="btn btn-success" name="save">Simpan</button>
</form>
<script src="assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
    selector: '#deskripsi'
    });
</script>