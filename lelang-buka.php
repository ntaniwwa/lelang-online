<?php

include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
    UPDATE lelang
    SET status='dibuka'
    WHERE id_lelang='$id'
");

header("Location: dashboard-petugas.php");

?>