<?php
  $judul = "Edit MENU";
  include "koneksi.php";
  include "templates/template.php";

  $id_barang = $_GET['id_barang'];
  $sql   = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
  $query = mysqli_query($koneksi, $sql);
  $data  = mysqli_fetch_array($query);
  $img   = $data['photo'];
  if($img==""){$img="no-logo.png";}
?>
//ieu nu ngaruh naha si barang t bisa anu ieu anu itu teh//

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row mb-3">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase">Edit Barang Lelang</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row ml-5">
    <div class="col-xl-5 table-responsive">
      <form action="barang-update.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id_barang" value="<?= $id_barang;?>" hidden>
        
        <div class="input-group mb-1">
          <span class="input-group-text lebar"> Tanggal</span>
          <input type="date" name="tgl" class="form-control form-control-sm" value="<?= $data['tgl'] ?>" autocomplete="off" required>
        </div>

        
        <div class="input-group mb-1">
          <span class="input-group-text lebar" >Nama Barang</span>
          <input type="text" name="nama_barang" class="form-control form-control-sm" placeholder="Input Nama Barang" value="<?= $data['nama_barang'];?>" autocomplete="off" required >
        </div>

       
        <div class="input-group mb-1">
          <span class="input-group-text lebar" >Harga Awal</span>
          <input type="text" name="harga_awal" required autocomplete="off" class="form-control form-control-sm text-right money angkaSemua" placeholder="Input Harga" value="<?= $data['harga_awal'];?>">
        </div>

        
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Deskripsi</span>
          <textarea name="deskripsi" cols="30" rows="10" class="form-control form-control-sm" ><?= $data['deskripsi']; ?></textarea>
        </div>

       
        <div class="input-group my-3">
          <span class="input-group-text lebar">Gambar</span>
          <img src="photo/<?= $img; ?>" alt="Gambar" width="80" height="80">
        </div>

       
        <div class="input-group mb-1">
          <span class="input-group-text lebar">Photo</span>
          <input type="file" name="img" class="form-control form-control-sm" accept="image/*">
        </div>

        <div class="input-group my-3">
          <button type="submit" class="btn btn-success btn-sm">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;</button>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="barang.php" class="btn btn-sm btn-warning">&nbsp;<i class="fas fa-redo"></i> &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
        </div>
      
      </form>
		</div>
	</div>
</div>

<?php include "templates/sticky-footer.php"; ?>    
<?php include "templates/footer.php"; ?>