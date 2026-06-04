<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cetak Pemenang Lelang</title>
    <link rel="shorcut icon" type="text/css" href="img/logo-01.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css"/>
   
    <style>
      .box-header{margin-left: 30px; margin-top: 20px; margin-bottom: 5px;}
      tr>th{text-align: center; height: 35px; border: 2px solid;}
      tr>td{padding-left: 5px; vertical-align: middle!important;}
      tr>td>img{margin-top: 3px; margin-bottom: 3px;}
      #cetak{margin-left: 30px; margin-right: 30px;}
    </style>
  </head>
  <body onload="window.print(); window.onafterprint = window.close; ">
    <span style="margin-left: 10px; font-size: 24px;">REKAPITULASI DAFTAR PEMENANG LELANG</span>
    <table class="table table-bordered table-hover" style="width: 80%; margin-left: 10px">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Nama Pemenang</th>
          <th>Nama Barang</th>
          <th>Harga Awal</th>
          <th>Harga Akhir</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $no 		= 1;
        $sql 		= "SELECT * FROM lelang a INNER JOIN masyarakat b ON a.id_user=b.id_user INNER JOIN barang c ON a.id_barang=c.id_barang WHERE a.status='ditutup'";
        $query 	= mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td align="center" width="5%"><?= $no++; ?>.</td>
            <td><?= strtoupper($data['nama_lengkap']); ?></td>
            <td><?= strtoupper($data['nama_barang']); ?></td>
            <td align="right">Rp. <?= number_format($data['harga_awal']); ?></td>
            <td align="right">Rp. <?= number_format($data['harga_akhir']); ?></td>
          </tr>
          <?php
        }?>
      </tbody>
    </table>
  </body>
</html>

