<?php
$page = '';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
?>
<li <?php if ($page == "") echo 'class="active"'; ?>><a href="index.php"><i class="fa fa-tachometer"></i> <span>Beranda</span></a></li>
<li <?php if ($page == "kriteria" || $page == "update_kriteria" || $page == "subkriteria" || $page == "update_subkriteria") echo 'class="active"'; ?>><a href="?page=kriteria"><i class="fa fa-bar-chart "></i> <span>Kriteria</span></a></li>
<li <?php if ($page == "alternatif" || $page == "update_alternatif" || $page == "lihat_alternatif") echo 'class="active"'; ?>><a href="?page=alternatif"><i class="fa fa-random"></i> <span>Alternatif</span></a></li>
<li <?php if ($page == "penilaian") echo 'class="active"'; ?>><a href="?page=penilaian"><i class="fa fa-university"></i> <span>Perhitungan</span></a></li>
<li <?php if ($page == "hasilakhir") echo 'class="active"'; ?>><a href="?page=hasilakhir"><i class="fa fa-certificate "></i> <span>Data Hasil Akhir</span></a></li>
<li <?php if ($page == "admin" || $page == "update_admin") echo 'class="active"'; ?>><a href="?page=admin"><i class="fa fa-cog"></i> <span>Data User</span></a></li>
<li <?php if ($page == "password") echo 'class="active"'; ?>><a href="?page=password"><i class="fa fa-unlock"></i> <span>Ubah Password</span></a></li>
<li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Log out</span></a></li>