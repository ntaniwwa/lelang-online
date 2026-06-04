<?php
session_start();
include "koneksi.php";

$username = htmlspecialchars($_POST['username']);
if($username=="admin"){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $password 		= htmlspecialchars($_POST['password']);
  $nama_petugas = $_POST['nama_petugas'];
  $id_level   = $_POST['level'];

  $sql = "INSERT INTO petugas(nama_petugas, username, password, id_level) VALUES('$nama_petugas', '$username', '$password', '$id_level')";
  $hsl = mysqli_query($koneksi, $sql);
  if($hsl==1){
    $_SESSION['info'] = 'Disimpan';
  }else{
    $_SESSION['info'] = 'Gagal Disimpan';
  }
}
header("location:login.php");

?>
