<?php
session_destroy();

echo "<div class='alert alert-danger' role='alert'><strong>Anda berhasil Logout</strong></div>";
echo "<meta http-equiv='refresh' content='1;url=login.php'>";
?>