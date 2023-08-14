<?php

require_once("koneksi.php");

if (isset($_POST['register'])) {

  // filter data yang diinputkan
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  // enkripsi password
  $password = md5($_POST["password"]);
  $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_STRING);

  // menyiapkan query
  $stmt = $con->prepare("INSERT INTO admin (level, username, password) VALUES (?, ?, ?)");

  // bind parameter ke query
  $stmt->bind_param("sss", $level, $username, $password);

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute();

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if ($saved) header("Location: formlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

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
  </style>
</head>

<body class="hold-transition login-page background-img">
  <div class="login-box ">
    <img src="assets/img/apotek-removebg-preview.png" alt="apotek" width="100" height="70" class="logo">
    <h3 class="title-login">APOTIK ANNISA AULIA</h3>
    <div class="login-box-body">
      <p class="login-box-msg"><b> REGISTRASI </b></p>
      <form action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="username" placeholder="Username" />
        </div>
        <div class="form-group">
          <!-- <label for="level">Level</label> -->
          <input class="form-control" type="hidden" name="level" value="karyawan" />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" type="password" name="password" placeholder="Password" />
        </div>
        <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
      </form>
      <br>
      <div class="row">
        <div class="col-xs-4">
          <button onclick="history.back()">Go Back</button>
        </div>
        <div class="col-xs-8">
          <p>Sudah punya akun? <a href="formlogin.php">Login di sini</a></p>
        </div>
      </div>
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