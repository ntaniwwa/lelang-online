<?php
$dataLelang = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['namaBarang'];
    $harga = $_POST['hargaAwal'];

    if (!empty($nama) && !empty($harga)) {
        $dataLelang[] = [
            'nama' => $nama,
            'harga' => $harga
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Lelang Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Admin Lelang Online</h1>

    <form method="POST">
        <input type="text" name="namaBarang" placeholder="Nama Barang">
        <input type="number" name="hargaAwal" placeholder="Harga Awal">
        <button type="submit">Tambah</button>
    </form>

    <h2>Daftar Lelang</h2>
    <ul>
        <?php foreach ($dataLelang as $item): ?>
            <li>
                <b><?= $item["nama"]; ?></b><br>
                Harga awal: Rp <?= $item["harga"]; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    
</body>
</html>