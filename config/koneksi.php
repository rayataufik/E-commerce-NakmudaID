
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "nakmudaid";
$k = mysqli_connect($server,$username,$password);
$connect_error = "koneksi gagal";
mysqli_select_db($k,$database) or die($connect_error);
?>