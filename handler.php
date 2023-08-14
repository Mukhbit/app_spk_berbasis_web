<?php
// $req = $_POST;
$username = $_POST['username'];
// $con = mysqli_connect('hostname', 'username', 'password', 'database');
require_once("koneksi.php");

session_start();
if ($_POST['object'] == 'forgot') {
  if ($_POST['newpassword'] == $_POST['confirmpassword']) {
    $hash = md5($_POST['newpassword']);
    // md5($_POST['password']);
    $update = "UPDATE admin SET password = '$hash' WHERE username = '$username' ";

    $result = mysqli_query($con, $update);
    // var_dump($update);
    // print_r($con);
    // die;
    // $_SESSION['msg'] = 'Your new password has reset successfully, you can now login.';
    echo "<script> 
      function myFunction() {
      alert('Your new password has reset successfully, you can now login.');
      }
      </script>";
    header("Location: formlogin.php");
  } else {
    // $_SESSION['msg'] = 'Password does not match';
    echo "<script> 
      function myFunction() {
      alert('Password does not match.');
      }
      </script>";
    header("Location: formlogin.php");
  }
}
