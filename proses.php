<?php 
session_start();
include "koneksi.php";
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $_POST['password']);

$sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query)>0){
	$data       = mysqli_fetch_array($query);
    
  // Membuat session < mun ek ngajiun sisi lelang ti dieu hla>
  $_SESSION['id_petugas']   = $data['id_petugas'];
  $_SESSION['nama_petugas'] = $data['nama_petugas'];
  $_SESSION['level']        = $data['id_level'];
	header("location:dashboard.php");
}else{
  $sql1 = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
  $query1 = mysqli_query($koneksi, $sql1);
  if (mysqli_num_rows($query1)>0){
    $data1 = mysqli_fetch_array($query1);
    $_SESSION['id_login']     = "sudahLogin";
    $_SESSION['id_user']      = $data1['id_user'];
    $_SESSION['id_petugas']   = $data1['id_user'];
    
    $_SESSION['nama_lengkap'] = $data1['nama_lengkap'];
    $_SESSION['nama_petugas'] = $data1['nama_lengkap'];
    $_SESSION['level']        = 'masyarakat';
  }else{
    $_SESSION['info'] = 'Salah';
  }
  header("location:index.php");
}