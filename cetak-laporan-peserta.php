<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cetak Rekapitulasi Customer</title>
    <link rel="shorcut icon" type="text/css" href="img/logo-01.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css"/>
    <style>
      tr>th{text-align: center; height: 35px; border: 2px solid;}
      tr>td{padding-left: 5px; vertical-align: middle!important;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
    </style>
  </head>

  <body onload="window.print(); window.onafterprint = window.close; ">
    <span style="margin-left: 10px; font-size: 24px;">REKAPITULASI DATA PESERTA LELANG</span>
    <table class="table table-bordered table-hover" style="width:60%; margin-left:10px;">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Nama Peserta</th>
          <th>Telp</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $no = 1;
        $sql = "SELECT * FROM masyarakat";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {?>
          <tr>
            <td align="center" width="4%"><?= $no++; ?>.</td>
            <td width="20%"><?= $data['nama_lengkap']; ?></td>
            <td width="15%"><?= $data['telp']; ?></td>
          </tr>
          <?php
        } ?>
      </tbody>
    </table>
  </body>
</html>

