<?php
  $judul = "Laporan";
  include "koneksi.php";
  include "templates/template.php";
?>

<div class="container-fluid pt-3 pb-5">
  <div class="row mt-3">
    <div class="col-xl-8 table-responsive">
      <a href="cetak-laporan-pemenang.php" class="btn btn-sm btn-success text-white mb-3" target="_blank">&nbsp;<i class="fas fa-print"></i>&nbsp;&nbsp;Cetak Pemenang Lelang&nbsp;&nbsp;</a>

      <table class="table table-bordered table-hover" id="laporanBarang">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Nama Pemenang</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no 		= 1;
          $sql 		= "SELECT * FROM lelang a INNER JOIN masyarakat b ON a.id_user=b.id_user INNER JOIN barang c ON a.id_barang=c.id_barang WHERE a.status='ditutup'";
          $query 	= mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td><?= strtoupper($data['nama_lengkap']); ?></td>
              <td><?= strtoupper($data['nama_barang']); ?></td>
              <td align="right">Rp. <?= number_format($data['harga_awal']); ?></td>
              <td align="right">Rp. <?= number_format($data['harga_akhir']); ?></td>
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