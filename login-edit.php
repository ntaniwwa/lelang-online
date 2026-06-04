<?php
$judul = "Edit Petugas";
include "koneksi.php";
include "templates/template.php";

$id_petugas   = $_GET['id_petugas'];
$sql          = "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'";
$query        = mysqli_query($koneksi, $sql);
$data         = mysqli_fetch_array($query);
$nama_petugas = $data['nama_petugas'];
$level        = $data['id_level'];?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row pb-3">
    <div class="col-xl-12">	
      <h3 class="text-center text-uppercase text-dark">Edit Petugas</h3>
      <hr class="hr">
    </div>
  </div>
  <div class="row ml-5">
    <div class="col-xl-5">
      <form action="login-update.php" method="post">
        <input type="text" name="id_petugas" value="<?= $id_petugas;?>" hidden>

        <div class="input-group mb-1">
          <span class="input-group-text lebar" >Nama Petugas</span>
          <input type="text" name="nama_petugas" class="form-control form-control-sm" value="<?= $nama_petugas; ?>" >
        </div>

        <div class="input-group mb-1">
          <span class="input-group-text lebar" >Username</span>
          <input  type="text" name="username" class="form-control form-control-sm" required autocomplete="off" value="<?= $data['username'];?>">
        </div>

        <div class="input-group mb-1">
          <span class="input-group-text lebar" >Password</span>
          <input type="password" name="password" class="form-control form-control-sm" required >
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text lebar" >level</span>
          <select name="level" class="form-control form-control-sm" required>
            <option value=1 <?php if ($level == 1) {
                            echo 'selected="selected"';
                          } ?>>Administrator</option>
            <option value=2 <?php if ($level == 2) {
                            echo 'selected="selected"';
                          } ?>>Petugas</option>
          </select>
        </div>

        <div class="input-group mb-1">
          <button type="submit" class="btn btn-success btn-sm">&nbsp;<i class="fas fa-save"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;</button>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="login.php" class="btn btn-sm btn-warning">&nbsp;<i class="fas fa-redo"></i>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
        </div>
      </form>
		</div>
	</div>
</div>

<?php include "templates/sticky-footer.php"; ?>    
<?php include "templates/footer.php"; ?>
