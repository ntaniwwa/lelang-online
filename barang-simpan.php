<?php
  session_start();
  include "koneksi.php";
  $tgl	        = $_POST['tgl'];
  $nama_barang	= $_POST['nama_barang'];
  $harga_awal   = str_replace(',','', mysqli_escape_string($koneksi, $_POST['harga_awal']));
  $deskripsi	  = $_POST['deskripsi'];

  $namaBaru = date('dmYHis');
  $img 	    = $_FILES['img']['name'];
  if($img !=""){$img = $namaBaru.$_FILES['img']['name'];};
  $temp	    = $namaBaru.$_FILES['img']['tmp_name'];

  $sql = "INSERT INTO barang(nama_barang, photo, tgl, harga_awal, deskripsi) VALUES('$nama_barang', '$img', '$tgl', '$harga_awal', '$deskripsi')";
    $hsl=mysqli_query($koneksi, $sql);
  if($hsl==1){
    move_uploaded_file($_FILES['img']['tmp_name'], "photo/".$img);
    $_SESSION['info'] = 'Disimpan';
  }else{
    $_SESSION['info'] = 'Gagal Disimpan';
  }
  header("location:barang.php");
?>
// barang perlu di simpen kan? di simpen na kanu diluhur//
