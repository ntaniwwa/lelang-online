<?php
session_start();
include 'koneksi.php';


$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if($cek > 0){
    $d = mysqli_fetch_assoc($data);

    $_SESSION['username'] = $d['username'];
    $_SESSION['level'] = $d['level'];

    if($d['level'] == "administrator"){
        header("location:admin/index.php");
    }else{
        header("location:petugas/index.php");
    }
}else{
    header("location:login_petugas.php?pesan=gagal");
}
?>
<?php include "templates/header.php"; ?>
<?php include "templates/sidebar.php"; ?>