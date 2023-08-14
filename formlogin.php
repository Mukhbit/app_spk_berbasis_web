<?php
include "ceklogin.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi SPK Menetukan Supplier Obat Terbaik Metode WP </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> -->
  <style>
    .background-img {
      background-image: url(assets/img/login.jpeg);
      background-repeat: no-repeat;
      background-size: cover;
    }

    .title-login {
      text-align: center;
    }

    .logo {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .parent {
      display: grid;
      place-items: center;
    }

    /* Style Button */
    .button-custom {
      display: inline-block;
      background: #4285F4;
      color: #fff;
      width: 240px;
      height: 50px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
      font-size: 16px;
      font-weight: normal;
      font-family: 'Roboto', sans-serif;
      margin: 2rem 0;
    }
  </style>
</head>

<body class="hold-transition login-page background-img">
  <div class="login-box ">
    <img src="assets/img/apotek-removebg-preview.png" alt="apotek" width="100" height="70" class="logo">
    <h3 class="title-login">APOTEK ANNISA AULIA</h3>
    <div class="login-box-body">
      <p class="login-box-msg">Masukkan username dan password</p>
      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <a href="register.php" class="btn btn-success">Daftar</a>
          </div>
          <div class="col-xs-4"></div>
          <div class="col-xs-4">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs parent">
            <a type="submit" name="msg" class="btn btn-primary btn-block custom" href="forgotpass.php">Forgot Password</a>
          </div>
        </div>
      </form>
    </div>
    <?php
    if (!empty($error)) {
      echo '<div class="alert bg-danger text-center" role="alert">' . $error . '</div>';
    }
    ?>
  </div>

  <!-- jQuery 2.1.4 -->
  <script src="assets/js/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>