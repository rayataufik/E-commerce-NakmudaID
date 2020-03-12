<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","nakmudaid");
?>

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

<div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="password" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin" name="login">Login</button>
                            </form>
                            <?php
                            if(isset($_POST['login'])){
                                $ambil = $koneksi->query("select * from admin where username='$_POST[username]' and password='$_POST[password]'");
                                $benar = $ambil->num_rows;
                                if($benar==1){
                                    $_SESSION['admin']=$ambil->fetch_assoc();
                                    echo "<div class='alert alert-success' role='alert'><strong>Login Berhasil</strong></div>";
                                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                }
                                else{
                                    echo "<div class='alert alert-danger' role='alert'><strong>Username Atau Password Salah</strong></div>";
                                    echo "<meta http-equiv='refresh' content='1;url=login.php'>";

                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
