<?php
session_start();
include "koneksi.php";

// CEK LOGIN
if(!isset($_SESSION['id_petugas'])){
    header("Location: login-admin.php");
    exit;
}

// CEK LEVEL ADMIN
if($_SESSION['id_level'] != 1){
    header("Location: index.php");
    exit;
}

// HITUNG DATA
$jumlahUser = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM masyarakat")
);

$jumlahBarang = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM barang")
);

$jumlahPetugas = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM petugas WHERE id_level='2'")
);

$jumlahLelang = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM lelang")
);

$namaAdmin = $_SESSION['nama_petugas'];
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard Admin</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .section-admin{
    display:none;
}
    #dashboard{
    display:block;
}

body{
    background:#f4f6f9;
}

.sidebar{
    position:fixed;
    width:250px;
    height:100%;
    background:#4e73df;
    color:white;
    padding-top:20px;
}

.sidebar h3{
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#224abe;
}

.content{
    margin-left:250px;
    padding:25px;
}

.card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="sidebar">

    <h3>ADMIN</h3>

    <a href="index.php">
        <i class="fas fa-home"></i>
        Dashboard
    </a>

    <a href="#masyarakat">
        <i class="fas fa-users"></i>
        Data Masyarakat
    </a>

    <a href="#barang">
        <i class="fas fa-box"></i>
        Data Barang
    </a>

    <a href="#loginmasyarakat">
        <i class="fas fa-user-check"></i>
        Login-kan Masyarakat
    </a>

    <a href="#laporan">
        <i class="fas fa-print"></i>
        Generate Laporan
    </a>

    <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
    </a>

</div>

<div class="content">

    <h2>
        Selamat Datang,
        <?= $namaAdmin; ?>
    </h2>

    <hr>

    <div class="row">

        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h1><?= $jumlahUser ?></h1>
                    <h5>Masyarakat</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h1><?= $jumlahBarang ?></h1>
                    <h5>Barang</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <h1><?= $jumlahPetugas ?></h1>
                    <h5>Petugas</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <h1><?= $jumlahLelang ?></h1>
                    <h5>Lelang</h5>
                </div>
            </div>
        </div>

    </div>

    <br>

    <div class="card">

        <div class="card-header bg-dark text-white">
            Menu Cepat Administrator
        </div>

        <div class="card-body">

            <a href="#masyarakat"
               class="btn btn-primary">
               Data Masyarakat
            </a>

            <a href="#barang"
               class="btn btn-success">
               Data Barang
            </a>

            <a href="#laporan"
               class="btn btn-danger">
               Generate Laporan
            </a>

        </div>

    </div>

</div>
<!-- DATA MASYARAKAT -->
<div class="card mt-4 section-admin" id="masyarakat">
    <div class="card-header bg-primary text-white">
        Data Masyarakat
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Telp</th>
            </tr>

            <?php
            $no=1;
            $q = mysqli_query($koneksi,"SELECT * FROM masyarakat");

            while($d=mysqli_fetch_array($q)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama_lengkap']; ?></td>
                <td><?= $d['username']; ?></td>
                <td><?= $d['telp']; ?></td>
            </tr>
            <?php } ?>
        </table>

    </div>
</div>
<!-- DATA BARANG -->
<div class="card mt-4 section-admin" id="barang">

    <div class="card-header bg-success text-white">
        Data Barang
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Awal</th>
            </tr>

            <?php
            $no=1;
            $q = mysqli_query($koneksi,"SELECT * FROM barang");

            while($d=mysqli_fetch_array($q)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama_barang']; ?></td>
                <td>Rp <?= number_format($d['harga_awal']); ?></td>
            </tr>
            <?php } ?>

        </table>

    </div>

</div>
<!-- LOGIN-KAN MASYARAKAT -->
<div class="card mt-4 section-admin" id="loginmasyarakat">

    <div class="card-header bg-warning">
        Login-kan Masyarakat
    </div>

    <div class="card-body">

        <form action="proses.php" method="POST">

            <input type="text"
                   name="username"
                   class="form-control mb-2"
                   placeholder="Username">

            <input type="password"
                   name="password"
                   class="form-control mb-2"
                   placeholder="Password">

            <button class="btn btn-primary">
                Login
            </button>

        </form>

    </div>

</div>
<!-- LAPORAN -->
<div class="card mt-4 section-admin" id="laporan">

    <div class="card-header bg-danger text-white">
        Generate Laporan
    </div>

    <div class="card-body">

        <a href="#laporan"
           class="btn btn-danger">
           Cetak Laporan PDF
        </a>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll(".sidebar a").forEach(function(menu){

        menu.addEventListener("click", function(){

            document.querySelectorAll(".section-admin")
            .forEach(function(section){
                section.style.display = "none";
            });

            let target = this.getAttribute("href");

            if(target.startsWith("#")){

                let tujuan = document.querySelector(target);

                if(tujuan){
                    tujuan.style.display = "block";
                }

            }

        });

    });

});
</script>

</body>
</html>