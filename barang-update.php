<?php
  session_start();
  include "koneksi.php";
  $id_barang    = $_POST['id_barang'];
  $tgl	        = $_POST['tgl'];
  $nama_barang  = $_POST['nama_barang'];
  $harga_awal   = str_replace(',','', mysqli_escape_string($koneksi, $_POST['harga_awal']));
  $deskripsi	  = $_POST['deskripsi'];

  $namaBaru = date('dmYHis');
  $img 		  = $_FILES['img']['name'];
  if($img !=""){$imgBaru = $namaBaru.$_FILES['img']['name'];};

  $sql      = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
  $query    = mysqli_query($koneksi, $sql);
  $data     = mysqli_fetch_array($query);
  $imgLama  = $data['photo'];

  if($img==""){
    $sql = "UPDATE barang SET 
      tgl         = '$tgl',
      nama_barang = '$nama_barang',
      harga_awal  = '$harga_awal',
      deskripsi   = '$deskripsi'
    WHERE id_barang  = '$id_barang'";
    mysqli_query($koneksi, $sql);
    $_SESSION['info'] = 'Diupdate';
  }else{
    $sql = "UPDATE barang SET 
      tgl         = '$tgl',
      nama_barang = '$nama_barang',
      harga_awal  = '$harga_awal',
      deskripsi   = '$deskripsi',
      photo       = '$imgBaru'
    WHERE id_barang   = '$id_barang'";
    $hsl=mysqli_query($koneksi, $sql);
    if($hsl==1){
      if($img!=""){unlink("photo/".$imgLama);}
      move_uploaded_file($_FILES['img']['tmp_name'], "photo/".$imgBaru);
       $_SESSION['info'] = 'Diupdate';
    }else{
      $_SESSION['info'] = 'Gagal Diupdate';
    }
  }
  header("location:barang.php");
?>
// perlu di apdet kan moal hayeuh bae nu eta?//
