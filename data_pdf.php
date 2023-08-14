<?php

include "wp.php"; //panggil hasil perhitungan metode WP

?>
<style>
  .page-header {
    text-align: center;
  }

  .kopsurat {
    border-bottom: 5px solid #000;
    padding: 2px;
    width: 100%;
  }

  .tengah {
    text-align: center;
    line-height: 5px;
  }

  .logo {
    display: block;
    margin-left: auto;
    /* margin-right: auto; */

  }
</style>
<div class="rangka-kopsurat">
  <table class="kopsurat">
    <tr>
      <td width="20%">
        <img src="assets/img/apotek-removebg-preview.png" alt="apotek" width="100" height="70" class="logo">
      </td>
      <td class="tengah" width="60%">
        <h3><b> Apotek Annisa Aulia </b></h3>
        <h5>Jl. Raya Bogor KM 40 Pabuaran Cibinong Kab. Bogor <br> (021)5545263, 5545262 Kenangan.modern@gmail.com</h5>
      </td>
      <td width="20%">
        &nbsp;
      </td>
    </tr>
  </table>
</div>
<!-- <div class=" box box-success"> -->
<div class="info-box">
  <div class="box-body">
    <h3 class="page-header">Data Hasil Akhir</h3>
    <div class='table-responsive'>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Alternatif</th>
            <th>Nilai</th>
            <th>Rangking</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $list_rekomendasi; ?>
        </tbody>
      </table>

      <?php
      function tgl_indo($tanggal){
        $bulan = array (
          1 =>   'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
       
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
      }
      ?>
      <br><br><br><br><br><br><br><br><br>
      <br><br><br>
      <p align="right"><b>Jakarta,&nbsp; <?php echo tgl_indo(date('Y-m-d'));?></b></p>
      <br><br><br>
      <p align="right"><b>Beny Aprius, M.A.P.</b></p>
    </div>
  </div>
  <script>
    window.print();
  </script>
</div>