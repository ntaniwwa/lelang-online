<?php
session_start();
include "koneksi.php";
// ==========================
// AKSI BUKA / TUTUP / WAKTU
// ==========================

if(isset($_GET['aksi']) && isset($_GET['id'])){

    $id = (int)$_GET['id'];

    if($_GET['aksi'] == 'buka'){

        mysqli_query($koneksi,"
            UPDATE lelang
            SET status='dibuka'
            WHERE id_lelang='$id'
        ");

        header("Location: dashboard-petugas.php");
        exit;
    }

    if($_GET['aksi'] == 'tutup'){

        mysqli_query($koneksi,"
            UPDATE lelang
            SET status='ditutup'
            WHERE id_lelang='$id'
        ");

        header("Location: dashboard-petugas.php");
        exit;
    }

    if($_GET['aksi'] == 'waktu'){

        mysqli_query($koneksi,"
            UPDATE lelang
            SET tgl_lelang =
            DATE_ADD(tgl_lelang, INTERVAL 10 MINUTE)
            WHERE id_lelang='$id'
        ");

        header("Location: dashboard-petugas.php");
        exit;
    }
}

/*
=========================================
CEK LOGIN PETUGAS
=========================================
*/

if(!isset($_SESSION['id_petugas'])){
    header("Location: login-petugas.php");
    exit;
}

$nama_petugas = $_SESSION['nama_petugas'];

/*
=========================================
JUMLAH USER
=========================================
*/

$sqlUser = mysqli_query($koneksi, "SELECT * FROM masyarakat");
$jumlahUser = mysqli_num_rows($sqlUser);

/*
=========================================
JUMLAH BARANG
=========================================
*/

$sqlBarang = mysqli_query($koneksi, "SELECT * FROM barang");
$jumlahBarang = mysqli_num_rows($sqlBarang);

/*
=========================================
JUMLAH LELANG
=========================================
*/

$sqlLelang = mysqli_query($koneksi, "SELECT * FROM lelang");
$jumlahLelang = mysqli_num_rows($sqlLelang);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Petugas</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

body{
    background:#f5f6fa;
    font-family:sans-serif;
}

/* SIDEBAR */
.sidebar{
    width:250px;
    height:100vh;
    background:linear-gradient(180deg,#6a11cb,#9d50bb);
    position:fixed;
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
    margin-left:250px;
    padding:30px;
}

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
    border-radius:15px;
    overflow:hidden;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h3>Petugas Panel</h3>

    <a href="index.php">
        <i class="fas fa-home"></i>
        Dashboard
    </a>

    <a href="barang.php">
        <i class="fas fa-box"></i>
        Tambah Barang
    </a>

    <a href="#lelang">
        <i class="fas fa-gavel"></i>
        Kelola Lelang
    </a>

    <a href="#user">
        <i class="fas fa-users"></i>
        User Bergabung
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
        <?= strtoupper($nama_petugas); ?>
    </h2>

    <p class="text-muted">
        Dashboard Petugas Lelang Online
    </p>

    <!-- CARD -->
    <div class="row mt-4">

        <!-- USER -->
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard p-4 text-center">

                <i class="fas fa-users text-primary"></i>

                <h3><?= $jumlahUser; ?></h3>

                <p>User Bergabung</p>

            </div>
        </div>

        <!-- BARANG -->
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard p-4 text-center">

                <i class="fas fa-box text-success"></i>

                <h3><?= $jumlahBarang; ?></h3>

                <p>Barang Hari Ini</p>

            </div>
        </div>

        <!-- LELANG -->
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard p-4 text-center">

                <i class="fas fa-gavel text-danger"></i>

                <h3><?= $jumlahLelang; ?></h3>

                <p>Sesi Lelang</p>

            </div>
        </div>

    </div>

    <!-- TAMBAH BARANG -->
    <div class="card mt-4" id="barang">

        <div class="card-header bg-primary text-white">
            Tambah Barang Hari Ini
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

    <!-- KELOLA LELANG -->
    <div class="card mt-4" id="lelang">

        <div class="card-header bg-danger text-white">
            Kelola Sesi Lelang
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $no = 1;

                $sql = mysqli_query($koneksi,"
                    SELECT * FROM lelang a
                    INNER JOIN barang b
                    ON a.id_barang=b.id_barang
                ");

                while($data = mysqli_fetch_array($sql)){
                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $data['nama_barang']; ?></td>

                        <td>

                            <?php
                            if($data['status']=="dibuka"){
                                echo "<span class='badge badge-success'>Dibuka</span>";
                            }else{
                                echo "<span class='badge badge-danger'>Ditutup</span>";
                            }
                            ?>

                        </td>

                        <td>
                            <td>

    <a href="?aksi=buka&id=<?= $data['id_lelang']; ?>"
       class="btn btn-success btn-sm">
       Buka
    </a>

    <a href="?aksi=tutup&id=<?= $data['id_lelang']; ?>"
       class="btn btn-danger btn-sm">
       Tutup
    </a>

    <a href="?aksi=waktu&id=<?= $data['id_lelang']; ?>"
       class="btn btn-warning btn-sm">
       +10 Menit
    </a>

</td>

                           
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- USER BERGABUNG -->
    <div class="card mt-4" id="user">

        <div class="card-header bg-info text-white">
            User Yang Bergabung
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

                $user = mysqli_query($koneksi,"
                    SELECT * FROM masyarakat
                ");

                while($u = mysqli_fetch_array($user)){
                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $u['nama_lengkap']; ?></td>

                        <td><?= $u['username']; ?></td>

                        <td><?= $u['telp']; ?></td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>