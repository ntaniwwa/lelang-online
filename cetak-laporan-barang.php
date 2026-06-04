<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cetak Barang Lelang</title>
    <link rel="shorcut icon" type="text/css" href="img/logo-01.png">
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
    <span style="margin-left: 10px; font-size: 24px;">REKAPITULASI BARANG LELANG</span>
    <table class="table table-bordered" style="width:60%">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Photo</th>
          <th>Nama Barang</th>
          <th>Harga Awal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $no 		= 1;
        $ttl 		= 0;
        $sql 		= "SELECT * FROM barang";
        $query 	= mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) { 
          $ttl = $ttl + $data['harga_awal'];
          ?>
          <tr>
            <td align="center" width="5%"><?= $no++; ?>.</td>
            <td><img src="photo/<?= $data['photo']; ?>" width="100px" height="60px"></td>
            <td><?= $data['nama_barang']; ?></td>
            <td align="right">Rp. <?= number_format($data['harga_awal']); ?></td>
          </tr>
        <?php
        } ?>
        <tr>
          <td align="center" colspan="3">Total</td>
          <td align="right">Rp. <?= number_format($ttl); ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>

