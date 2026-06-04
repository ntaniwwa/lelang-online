<?php
  $judul = "Laporan";
  include "koneksi.php";
  include "templates/template.php";
?>

<div class="container-fluid pt-3 pb-5 backGambar">
  <div class="row mt-3">
    <div class="col-xl-12 table-responsive">
      <a href="cetak-laporan-peserta.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Peserta&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanPeserta">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Nama Peserta</th>
            <th>Telp</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql = "SELECT * FROM masyarakat";
          $query = mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) {?>
            <tr>
              <td align="center" width="4%"><?= $no++; ?>.</td>
              <td width="20%"><?= $data['nama_lengkap']; ?></td>
              <td width="15%"><?= $data['telp']; ?></td>
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

<script>
	$(document).ready(function() {
		$('#laporanPeserta').dataTable();
	});
</script>