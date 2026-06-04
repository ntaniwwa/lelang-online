<?php
session_start();
include "koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $username     = $_POST['username2'] ?? '';
    $password     = $_POST['password2'] ?? '';
    $telp         = $_POST['telp'] ?? '';

    // Validasi
    if(
        empty($nama_lengkap) ||
        empty($username) ||
        empty($password) ||
        empty($telp)
    ){
        die("Semua data harus diisi!");
    }

    // Cek username di masyarakat
    $cek = mysqli_query($koneksi,
        "SELECT * FROM masyarakat WHERE username='$username'"
    );

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['info'] = 'Username Sudah Digunakan';
        header("Location:index.php");
        exit;

    }

    // Cek username di petugas
    $cek2 = mysqli_query($koneksi,
        "SELECT * FROM petugas WHERE username='$username'"
    );

    if(mysqli_num_rows($cek2) > 0){

        $_SESSION['info'] = 'Username Sudah Digunakan';
        header("Location:index.php");
        exit;

    }

    // Simpan data
    mysqli_query($koneksi,"
        INSERT INTO masyarakat
        (nama_lengkap,username,password,telp)
        VALUES
        ('$nama_lengkap','$username','$password','$telp')
    ");

    $id_user = mysqli_insert_id($koneksi);

    // Login otomatis
    $_SESSION['id_login']     = "sudahLogin";
    $_SESSION['id_user']      = $id_user;
    $_SESSION['nama_lengkap'] = $nama_lengkap;
    $_SESSION['level']        = 3;

    header("Location:index.php");
    exit;
}

header("Location:index.php");
exit;
?>