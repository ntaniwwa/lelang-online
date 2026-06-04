<?php
  $judul = "BARANG";
  include "koneksi.php";
  include "templates/template.php";
  $query = mysqli_query($koneksi, "SELECT * FROM barang");
  $tglHariIni = date('Y-m-d');
?>
//singkat padat lelang barang ygy//
<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ 
  echo $_SESSION['info']; 
  } 
  unset($_SESSION['info']); ?>">
</div>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row">
    <div class="col-xl-12">
      <h3 class="text-center text-uppercase">Rekapitulasi BARANG LELANG</h3>
      <hr class="hr">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-xl-12 table-responsive">
      <button type="button" class="btn btn-primary btn-sm p-1 mb-3" data-toggle="modal" data-target="#staticBackdrop">&nbsp;
        <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah&nbsp;&nbsp;
      </button>

      <table class="table table-bordered table-hover" id="barang">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Tanggal</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no 		= 1;
          $sql 		= "SELECT *, a.id_barang FROM barang a LEFT JOIN lelang b ON a.id_barang=b.id_barang";
          $query 	= mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { 
            $status = $data['status'];
            $img = $data['photo'];
            if($img==""){$img="no-logo.png";}?>
            <img src="<?= $img; ?>" width="30" height="30">
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td><?= $data['tgl']; ?></td>
              <td align="center" width="8%"><img src="photo/<?= $img; ?>" alt="menu" width="30px" height="30px"></td>
              <td><?= $data['nama_barang']; ?></td>
              <td align="right"><?= number_format($data['harga_awal']); ?></td>
              <td ><?= $data['deskripsi']; ?></td>
              <td align="center" width="12%">
                <?php 
                if($status==""){?>
                  <a href="barang-edit.php?id_barang=<?= $data['id_barang']; ?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="barang-delete.php?id_barang=<?= $data['id_barang']; ?>" class="badge badge-danger p-2 delete-data" title='Delete'><i class="fas fa-trash"></i></a>
                  <?php 
                }?> 
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
      </table>
		</div>
	</div>
</div>

<?php include "templates/sticky-footer.php"; ?>
<?php include "templates/footer.php"; ?>


<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Input Barang Lelang
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="barang-simpan.php" method="post" enctype="multipart/form-data">

          <!-- Tanggal -->
          <div class="input-group mb-1">
            <span class="input-group-text lebar"> Tanggal</span>
            <input type="date" name="tgl" class="form-control form-control-sm" value="<?= $tglHariIni; ?>" autocomplete="off" required>
          </div>

          <!-- ireummi bwoya? Nama Barang -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Barang</span>
						<input type="text" name="nama_barang" class="form-control form-control-sm" placeholder="Input Nama Barang" autocomplete="off" required>
					</div>

          <!-- TEH TARIK 3? Harga Awal-->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Harga Awal</span>
						<input type="text" name="harga_awal" class="form-control form-control-sm text-right money angkaSemua" placeholder="Input Harga" autocomplete="off" required>
					</div>

          <!-- Deskripri nya nga depripiim -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Deskripsi</span>
            <textarea name="deskripsi" cols="30" rows="10" class="form-control form-control-sm" ></textarea>
					</div>

          <!-- meh aya isian di Photo -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Photo</span>
						<input type="file" name="img" class="form-control form-control-sm" accept="image/*">
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;Simpan&nbsp;</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#barang').dataTable();
	});
</script>