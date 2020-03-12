<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NakmudaID</title>
  <!-- css -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <!-- font -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">

</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-nak fixed-top">
    <div class="container">
      <a class="navbar-brand brand-nak" href="index.php">NakmudaID</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false"><i class="fa fa-align-left mr-2"></i>Kategori</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" name="kat" href="kategori.php?kat=samsung">Samsung</a>
              <a class="dropdown-item" name="kat" href="kategori.php?kat=xiaomi">Xiaomi</a>
              <a class="dropdown-item" name="kat" href="kategori.php?kat=oppo">Oppo</a>
              <a class="dropdown-item" name="kat" href="kategori.php?kat=vivo">Vivo</a>
              <a class="dropdown-item" name="kat" href="kategori.php?kat=realme">Realme</a>
            </div>
          </li>
        </ul>
      </div>
      <form action="pencarian.php" method="get" class="form-inline">
        <div class="input-group main">
          <input type="text" class="form-control" placeholder="Cari produk..." name="keyword">
          <div class="input-group-append">
            <button class="btn btn-light">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <div class="icon ml-3 mt-2">
        <h5>
          <a href="keranjang.php"><i class="fa fa-shopping-cart mr-3" data-toggle="tooltip" data-placement="bottom"
              title="Keranjang"></i></a>
        </h5>
      </div>
      <?php if(isset($_SESSION["pelanggan"])): ?>
      <div class="icon ml-2 mt-2">
        <h5>
          <a href="rtransaksi.php"><i class="fa fa-indent mr-3 mt-1" data-toggle="tooltip" data-placement="bottom"
              title="Transaksi"></i></a>
        </h5>
      </div>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="../member/foto_member/<?php echo $_SESSION["pelanggan"]["foto_pelanggan"]; ?>" width="40"
              height="40" class="rounded-circle">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <h6 class="dropdown-header">Welcome <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?> !</h6>
            <a class="dropdown-item" href="profile.php">Profile</a>
            <a class="dropdown-item" href="logout.php">Log Out</a>
          </div>
        </li>
      </ul>
      <?php else: ?>
      <button data-toggle="modal" data-target="#login" type="button" class="btn btn-nak btn-nak-login">Login</button>
      <button data-toggle="modal" data-target="#register" type="button"
        class="btn btn-outline-secondary btn-nak btn-nak-reg">Daftar</button>
      <?php endif ?>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- login -->
  <?php
  include("../public/login.php");
?>
  <!-- login end -->

  <!-- register -->
  <?php
  include("../public/register.php");
?>
  <!-- register end -->