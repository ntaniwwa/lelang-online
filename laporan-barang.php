<?php
  $judul = "Laporan";
  include "koneksi.php";
  include "templates/template.php";
?>

<div class="container-fluid pt-3 pb-5">
  <div class="row mt-3">
    <div class="col-xl-6 table-responsive">
      <a href="cetak-laporan-barang.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Barang&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanBarang">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Photo</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no 		= 1;
          $sql 		= "SELECT * FROM barang";
          $query 	= mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td><img src="photo/<?= $data['photo']; ?>" alt="<?= $data['photo']; ?>" width="100px" height="60px"></td>
              <td><?= strtoupper($data['nama_barang']); ?></td>
              <td align="right">Rp. <?= number_format($data['harga_awal']); ?></td>
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
		$('#laporanBarang').dataTable();
	});
</script>