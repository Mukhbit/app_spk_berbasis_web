<?php
// $db_host 		= 'localhost';
// $db_user 		= 'root';
// $db_password 	= '';
// $db_name 		= 'wp';

// $con = @mysqli_connect($db_host,$db_user,$db_password) or die('<center><strong>Gagal koneksi ke server database</strong></center>');
// mysqli_select_db($con,$db_name) or die('<center><strong>Database tidak ditemukan</strong></center>');

$con = mysqli_connect("localhost", "root", "", "wp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
