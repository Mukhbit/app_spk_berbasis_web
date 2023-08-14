<?php

// -------------- PERHITUNGAN METODE WP ---------------------- START
$jml_nol_koma = 3; // jumlah angka pembulatan di belakang koma
$tampilkan_perhitungan = true; //ubah ke false jika tidak ingin menampilkan rumus perhitungan dan langsung tampil hasilnya
$var_rumus = ''; // variabel untuk menampilkan rumus perhitungan

$rjum = mysqli_fetch_array(mysqli_query($con, "select sum(bobot) as jumbobot from kriteria"));
$jumbobot = $rjum['jumbobot'];

//mencari nilai w
$rumus1 = "";
$rumus2 = "";
$rumus1 .= 'W = [';
$i = 1;
$query = mysqli_query($con, "select bobot from kriteria order by id_kriteria");
while ($r = mysqli_fetch_array($query)) {
	$w[$i] = round(($r['bobot'] / $jumbobot), $jml_nol_koma);
	$rumus1 .= $r['bobot'] . ", ";
	$rumus2 .= 'W<sub>' . $i . '</sub> = ' . $r['bobot'] . '/' . $jumbobot . ' = ' . $w[$i] . '<br>';
	$i++;
}
$rumus1 = substr($rumus1, 0, -2);
$rumus1 .= ']<br>';
$var_rumus .= '<h3 class="page-header">Bobot Preferensi W</h3>';
$var_rumus .= $rumus1;
$var_rumus .= '<br><h3 class="page-header">Proses Perbaikan Bobot Preferensi W</h3>';
$var_rumus .= $rumus2;

//mencari nilai s
$var_rumus .= '<br><h3 class="page-header">Menghitung Vektor S</h3>';
$jumv = 0;
$i = 1;
$query = mysqli_query($con, "select id_alternatif from alternatif order by id_alternatif");
while ($r = mysqli_fetch_array($query)) {
	$jums = 1;
	$j = 1;
	$var_rumus .= "S<sub>" . $i . "</sub> = ";
	$query2 = mysqli_query($con, "select id_kriteria,tipe from kriteria order by id_kriteria");
	while ($r2 = mysqli_fetch_array($query2)) {
		$rn = mysqli_fetch_array(mysqli_query($con, "select id_subkriteria from opt_alternatif where id_alternatif='" . $r['id_alternatif'] . "' AND id_kriteria='" . $r2['id_kriteria'] . "'"));
		$rsub = mysqli_fetch_array(mysqli_query($con, "select bobot from subkriteria where id_subkriteria=" . $rn['id_subkriteria']));
		$bobot = $rsub['bobot'];
		if ($r2['tipe'] == "benefit") {
			$jums = $jums * POW($bobot, $w[$j]);
			$var_rumus .= "(" . $bobot . "<sup>" . $w[$j] . "</sup>)";
		} elseif ($r2['tipe'] == "cost") {
			$jums = $jums * POW($bobot, (-1 * $w[$j]));
			$var_rumus .= "(" . $bobot . "<sup>-" . $w[$j] . "</sup>)";
		}
		$j++;
	}
	$s[$i] = round($jums, $jml_nol_koma);
	$var_rumus .= " = " . $s[$i] . "<br>";
	$jumv = $jumv + $jums;
	$i++;
}

//mencari nilai v
$hasil = array();
$i = 1;
$jumv = round($jumv, $jml_nol_koma);
$var_rumus .= '<br><h3 class="page-header">Menghitung Nilai V</h3>';
$query = mysqli_query($con, "select id_alternatif from alternatif order by id_alternatif");
while ($r = mysqli_fetch_array($query)) {
	$id_alternatif = $r['id_alternatif'];
	$v[$i] = round(($s[$i] / $jumv), $jml_nol_koma);
	$hasil[$i]["id_alternatif"] = $id_alternatif;
	$hasil[$i]["nilai"] = $v[$i];
	$var_rumus .= "V<sub>" . $i . "</sub> = " . $s[$i] . "/" . $jumv . " = " . $v[$i] . "<br>";
	$i++;
}

// -------------- PERHITUNGAN METODE WP ---------------------- END

// fungsi untuk mengurutkan nilai berdasarkan nilai terbesar
function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
{
	$sort_col = array();
	foreach ($arr as $key => $row) {
		$sort_col[$key] = $row[$col];
	}
	array_multisort($sort_col, $dir, $arr);
}
array_sort_by_column($hasil, 'nilai');

//tampilkan hasil penilaian kedalam tabel
$no = 0;
$i = 0;
$list_rekomendasi = '';
foreach ($hasil as $arr) {
	$no++;
	$i++;
	$ralternatif = mysqli_fetch_array(mysqli_query($con, "select nama_alternatif from alternatif where id_alternatif='" . $arr['id_alternatif'] . "'"));
	$list_rekomendasi .= '
	<tr>
	<td>' . $no . '</td>
	<td>' . $ralternatif['nama_alternatif'] . '</td>
	<td>' . round($arr['nilai'], $jml_nol_koma) . '</td>
	<td>' . $i . '</td>
	</tr>
	';
}
