<?php
session_start();
include "koneksi.php";
$id_petugas   = $_SESSION['id_petugas'];
$id_barang    = $_POST['id_barang'];

$sql    = "SELECT id_barang FROM lelang WHERE id_barang = '$id_barang' AND status='dibuka'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)=='10'){
  $sql = "INSERT INTO lelang(id_barang, id_petugas, status) VALUES('$id_barang', '$id_petugas', 'dibuka')";
  mysqli_query($koneksi, $sql);
}else{
  $sql = "UPDATE lelang SET status = 'ditutup' WHERE id_barang = '$id_barang'";
  mysqli_query($koneksi, $sql);
}?>
