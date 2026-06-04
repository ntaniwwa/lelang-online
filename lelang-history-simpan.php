<?php
session_start();
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$tglHariIni = date('Y-m-d');

$id_lelang      = $_POST['id_lelang'];
$id_barang      = $_POST['id_barang'];
$id_user	      = $_POST['id_user'];
$harga_awal     = str_replace(',','', mysqli_escape_string($koneksi, $_POST['harga_awal']));
$penawaran_harga= str_replace(',','', mysqli_escape_string($koneksi, $_POST['harga_akhir']));

if($harga_awal>=$penawaran_harga){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO history_lelang(id_lelang, id_barang, id_user, penawaran_harga) VALUES('$id_lelang', '$id_barang', '$id_user', '$penawaran_harga')";
  mysqli_query($koneksi, $sql);

  $sql = "UPDATE lelang SET 
    harga_akhir = '$penawaran_harga',
    id_user     = '$id_user',
    tgl_lelang  = '$tglHariIni'
  WHERE id_lelang = '$id_lelang'";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:index.php");
