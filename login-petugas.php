<?php
session_start();
include "koneksi.php";

/*
====================================
KONEKSI DATABASE
Database : db_lelang
Table    : petugas
====================================
*/

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_lelang"
);
?>

<?php 



$koneksi = mysqli_connect("localhost","root","","db_lelang");

if(!$koneksi){
    die("Koneksi gagal");
}

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = ($_POST['password']);

    $sql = "SELECT * FROM petugas
            WHERE username='$username'
            AND password='$password'
            AND id_level='2'";

    $query = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_array($query);

        $_SESSION['id_petugas']   = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['id_level']     = $data['id_level'];

        header("Location: dashboard-petugas.php");
        exit;

    }else{

        echo "
        <script>
            alert('Username atau Password Salah!');
            window.location='login-petugas.php';
        </script>
        ";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Petugas</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#d8c9ef;
    font-family:sans-serif;
}

/* CARD LOGIN */
.login-box{
    width:360px;
    text-align:center;
}

/* ICON */
.login-icon{
    width:120px;
    height:120px;
    background:#9d84c8;
    border-radius:50%;
    margin:auto;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-bottom:30px;
}

.login-icon i{
    font-size:70px;
    color:white;
}

/* INPUT */
.form-control{
    border:none;
    border-radius:0;
    height:45px;
    background:white;
    margin-bottom:15px;
    box-shadow:none !important;
}

/* BUTTON */
.btn-login{
    width:100%;
    height:45px;
    background:#9d84c8;
    border:none;
    color:white;
    font-size:18px;
    transition:0.3s;
}

.btn-login:hover{
    background:#8669b8;
}

/* TEXT */
.login-text{
    color:#6c5b8b;
    margin-top:15px;
    font-size:14px;
}

.title-login{
    color:#6c5b8b;
    font-weight:bold;
    margin-bottom:25px;
}

</style>

</head>

<body>

<div class="login-box">

    <!-- ICON -->
    <div class="login-icon">
        <i class="fas fa-user"></i>
    </div>

    <!-- TITLE -->
    <h3 class="title-login">
        Login Petugas
    </h3>

    <!-- FORM LOGIN -->
    <form method="POST">

        <!-- USERNAME -->
        <input 
            type="text"
            name="username"
            class="form-control"
            placeholder="User name"
            required
        >

        <!-- PASSWORD -->
        <input 
            type="password"
            name="password"
            class="form-control"
            placeholder="Password"
            required
        >

        <!-- BUTTON -->
        <button 
            type="submit"
            name="login"
            class="btn btn-login">

            <i class="fas fa-arrow-right"></i>
        </button>

    </form>

    <div class="login-text">
        Sign in options
    </div>

</div>

</body>
</html>