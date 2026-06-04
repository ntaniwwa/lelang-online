<?php
  session_start();
  include "koneksi.php";
  $id_barang = $_GET['id_barang'];

  $sql2   = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
  $query2 = mysqli_query($koneksi, $sql2);
  $dt2    = mysqli_fetch_array($query2);
  $photo  = $dt2['photo'];

  $sql = "DELETE FROM barang WHERE id_barang = '$id_barang'";
  $hsl = mysqli_query($koneksi, $sql);
  if($hsl==1){
    if($photo!="" && $photo!="no-logo.png"){unlink("photo/".$photo);}
    $_SESSION['info'] = 'Dihapus';
  }else{
    $_SESSION['info'] = 'Gagal Dihapus';
  }
  header("location:barang.php");
?>
// mun ek delete baran g twerus t bisa, ieu na salah// 