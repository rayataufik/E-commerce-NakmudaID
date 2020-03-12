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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-nak fixed-top">
    <div class="container">
    <a class="navbar-brand brand-nak" href="index.php">NakmudaID</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-align-left mr-2"></i>Kategori</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <form class="form-inline">
        <div class="input-group main">
            <input type="text" class="form-control lebarform" placeholder="Cari produk...">
            <div class="input-group-append">
              <button class="btn btn-light" type="button">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
      </form>
      <div class="icon ml-4 mt-2">
          <h5>
              <i class="fa fa-shopping-cart mr-3"  data-toggle="tooltip" title="Keranjang"></i>
          </h5>
      </div>
      <div class="collapse navbar-collapse" id="navbar-list-4">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="../member/foto_member/sprite.png" width="40" height="40" class="rounded-circle">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Dashboard</a>
              <a class="dropdown-item" href="#">Edit Profile</a>
              <a class="dropdown-item" href="#">Log Out</a>
            </div>
          </li>   
        </ul>
      </div>
      <?php if(isset($_SESSION["pelanggan"])): ?>
        <div class="icon ml-4 mt-2">
          <h5>
              <i class="fa fa-indent mr-3 mt-1" data-toggle="tooltip" title="Transaksi"></i>
          </h5>
      </div>
            <a href="logout.php" type="button" class="btn btn-nak btn-nak-login">Logout</a>
            <?php else: ?>
            <button data-toggle="modal" data-target="#login" type="button" class="btn btn-nak btn-nak-login">Login</button>
            <button data-toggle="modal" data-target="#register" type="button" class="btn btn-outline-secondary btn-nak btn-nak-reg">Daftar</button>
            <?php endif ?>
    </div>
  </nav>


  <!-- javascript -->
<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>
