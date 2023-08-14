<?php
$link_download = '?page=data_pdf';
include "wp.php"; //panggil hasil perhitungan metode WP

?>

<div class="box box-success">
  <div class="box-header with-border">
    <h1 class="box-title"><i class="fa fa-area-chart" aria-hidden="true"></i> &nbsp; Data Hasil Akhir</h1>
    <div class="button-right">
      <a href="<?= $link_download; ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp; Print Data</a>
    </div>
  </div>
  <div class="box-body">
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
    </div>
  </div>
</div>