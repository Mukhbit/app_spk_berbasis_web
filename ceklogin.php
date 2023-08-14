<?php
$error = '';

require_once("koneksi.php");

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	// $q = mysqli_query($con, "SELECT * FROM admin WHERE username='" . $username . "' AND password='" . $password . "'");
	$update = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

	// var_dump($password, $update);
	// die;
	$q = mysqli_query($con, $update);

	if (mysqli_num_rows($q) == 0) {
		$error = 'Username dan password salah!';
	}
	if (empty($error)) {
		$r = mysqli_fetch_array($q);
		// $_SESSION['LOG_USER'] = $r['id_admin'];
		$_SESSION['LOG_USER'] = $r['level'];

		if ($r['level'] == 'admin') {
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:index.php");
		} elseif ($r['level'] == 'karyawan') {
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "karyawan";
			// alihkan ke halaman dashboard karyawan
			header("location:halaman_karyawan.php");
		} else {
			// alihkan ke halaman login kembali
			header("location:index.php?pesan=gagal_login");
		}
		// header('location:index.php');
	}
}
