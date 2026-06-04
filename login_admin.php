<?php
session_start();
include "koneksi.php";

/*
=========================================
CEK LOGIN ADMIN
=========================================
*/

if(!isset($_SESSION['id_petugas'])){
    header("Location: login-admin.php");
    exit;
}

/*
=========================================
CEK LEVEL ADMIN
id_level = 1
=========================================
*/

if($_SESSION['id_level'] != 1){
    header("Location: index.php");
    exit;
}

$nama_admin = $_SESSION['nama_petugas'];

/*
=========================================
JUMLAH DATA
=========================================
*/

$user = mysqli_query($koneksi,"SELECT * FROM masyarakat");
$jumlahUser = mysqli_num_rows($user);

$barang = mysqli_query($koneksi,"SELECT * FROM barang");
$jumlahBarang = mysqli_num_rows($barang);

$lelang = mysqli_query($koneksi,"SELECT * FROM lelang");
$jumlahLelang = mysqli_num_rows($lelang);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Administrator</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

body{
    background:#f4f6f9;
    font-family:sans-serif;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background:linear-gradient(180deg,#4e73df,#224abe);
    color:white;
    padding-top:20px;
}

.sidebar h3{
    text-align:center;
    margin-bottom:30px;
    font-weight:bold;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px 25px;
    text-decoration:none;
    transition:0.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.2);
}

/* CONTENT */
.content{
    margin-left:260px;
    padding:30px;
}

/* CARD */
.card-dashboard{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.card-dashboard i{
    font-size:40px;
    margin-bottom:10px;
}

.table{
    background:white;
    border-radius:10px;
    overflow:hidden;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h3>ADMIN PANEL</h3>
    <a href="dashboard.php">
        <i class="fas fa-home"></i>
        Dashboard
    </a>

    <a href="satu.php">
        <i class="fas fa-users"></i>
        Data Masyarakat
    </a>

    <a href="#barang">
        <i class="fas fa-box"></i>
        Pendataan Barang
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

<!-- CONTENT -->
<div class="content">

    <h2>
        Selamat Datang,
        <?= strtoupper($nama_admin); ?>
    </h2>

    <p class="text-muted">
        Dashboard Administrator Lelang
    </p>

    <!-- CARD -->
    <div class="row mt-4">

        <!-- USER -->
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard p-4 text-center">

                <i class="fas fa-users text-primary"></i>

                <h3><?= $jumlahUser; ?></h3>

                <p>Total Masyarakat</p>

            </div>
        </div>

        <!-- BARANG -->
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard p-4 text-center">

                <i class="fas fa-box text-success"></i>

                <h3><?= $jumlahBarang; ?></h3>

                <p>Total Barang</p>

            </div>
        </div>

        <!-- LELANG -->
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard p-4 text-center">

                <i class="fas fa-gavel text-danger"></i>

                <h3><?= $jumlahLelang; ?></h3>

                <p>Total Lelang</p>

            </div>
        </div>

    </div>

    <!-- DATA MASYARAKAT -->
    <div class="card mt-4" id="masyarakat">

        <div class="card-header bg-primary text-white">
            Data Masyarakat
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No Telp</th>
                    </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($m = mysqli_fetch_array($user)){
                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $m['nama_lengkap']; ?></td>

                        <td><?= $m['username']; ?></td>

                        <td><?= $m['telp']; ?></td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- PENDATAAN BARANG -->
    <div class="card mt-4" id="barang">

        <div class="card-header bg-success text-white">
            Pendataan Barang
        </div>

        <div class="card-body">

            <form action="barang-simpan.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Harga Awal</label>
                    <input type="number" name="harga_awal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Foto Barang</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Simpan Barang

                </button>

            </form>

        </div>

    </div>

    <!-- GENERATE LAPORAN -->
    <div class="card mt-4" id="laporan">

        <div class="card-header bg-danger text-white">
            Generate Laporan Lelang
        </div>

        <div class="card-body">

            <a href="laporan.php"
               target="_blank"
               class="btn btn-danger">

               <i class="fas fa-print"></i>
               Cetak Laporan

            </a>

        </div>

    </div>

</div>

</body>
</html>