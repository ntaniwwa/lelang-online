<?php
  session_start();
  include "koneksi.php";
echo  $id_petugas	  = $_POST['id_petugas'];
  $nama_petugas = $_POST['nama_petugas'];
  $username 	  = htmlspecialchars($_POST['username']);
  $password 	  = htmlspecialchars($_POST['password']);
  $id_level 	  = $_POST['level'];
  
  if($username=="admin"){
    $_SESSION['info'] = 'Gagal Diupdate';
  }else{
    $sql = "UPDATE petugas SET 
      nama_petugas = '$nama_petugas', 
      username     = '$username', 
      password     = '$password', 
      id_level     = '$id_level' 
    WHERE id_petugas = 2";
    mysqli_query($koneksi, $sql);
    $_SESSION['info'] = 'Diupdate';
  }
  header("location:login.php");
?>
