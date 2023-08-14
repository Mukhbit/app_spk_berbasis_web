<?php
switch ($page) {
  case 'penilaian':
    include "penilaian.php";
    break;
  case 'hasilakhir':
    include "hasilakhir.php";
    break;
  case 'data_pdf':
    include "data_pdf.php";
    break;
  case 'password':
    include "password.php";
    break;

  default:
    include "beranda.php";
    break;
}
