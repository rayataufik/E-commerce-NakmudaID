<h2>Edit Produk</h2>
<hr>

<?php
$ambil = $koneksi->query("SELECT * from produk where id_produk='$_GET[id]'");
$pecah = $ambil ->fetch_assoc();
?>

<?php
    if(isset($_POST['ubah'])){
        $namafoto=$_FILES['foto']['name'];
        $lokasifoto=$_FILES['foto']['tmp_name'];
        if(!empty($lokasifoto)){
            move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");
            $koneksi->query("update produk set nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',nama_produk='$_POST[nama]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]' where id_produk='$_GET[id]'");
        }
        else{
            $koneksi->query("update produk set nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',nama_produk='$_POST[nama]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]' where id_produk='$_GET[id]'");
        }
        echo "<div class='alert alert-success' role='alert'><strong>Success! </strong>Data Telah Tersimpan!</div>";
        echo "<br>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    }
?>


<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-control-label">Nama Produk</label>
        <input class="form-control" type="text" name="nama" value="<?php echo $pecah['nama_produk'];?>" >
    </div>
    <div class="form-group">
        <label class="form-control-label">Harga Produk (Rp)</label>
        <input class="form-control" type="number" name="harga" value="<?php echo $pecah['harga_produk'];?>">
    </div>
    <div class="form-group">
        <label class="form-control-label">Berat Produk (Gr)</label>
        <input class="form-control" type="number" name="berat" value="<?php echo $pecah['berat_produk'];?>">
    </div>
    <div class="form-group">
        <label class="form-control-label">Stok produk</label>
        <input class="form-control" type="number" name="stok" value="<?php echo $pecah['stok_produk'];?>">
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="300">
    </div>
    <div class="form-group">
        <label class="form-control-label">Ganti foto</label>
        <input class="form-control" type="file" rows="10" name="foto" >
    </div>
    <div class="form-group">
        <label class="form-control-label">Deskripsi Produk</label>
        <textarea class="form-control deskripsi" type="text" rows="10" name="deskripsi" id="deskripsi"><?php echo $pecah['deskripsi_produk'];?></textarea> 
    </div>
    <button class="btn btn-success" name="ubah">Simpan</button>
</form>


<script src="assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#deskripsi'
      });
    </script>