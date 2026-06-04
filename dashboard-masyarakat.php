<?php
  $judul = "DASHBOARD";
  include "koneksi.php";
  include "templates/template.php";
  $id_user = $_SESSION['id_user'];
?>
<div class="container-fluid">
  <!--  mun ek di ganti perhatikeun anu lain Content -->
  <div class="row mt-5">
    <div class="col-xl-12 ml-1">
      <table class="table table-hover" id="lelang">
        <thead>
          <tr>
            <th width="5%">No.</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Harga Penawaran</th>
            <th>Harga Akhir</th>
            <th>Nama Pemenang</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $nomer  = 1;
          $sql1 = "SELECT * FROM history_lelang a INNER JOIN lelang b ON a.id_barang=b.id_barang INNER JOIN barang c on a.id_barang=c.id_barang INNER JOIN masyarakat d ON b.id_user = d.id_user WHERE a.id_user = '$id_user'";
          $query1 = mysqli_query($koneksi, $sql1);
          while ($data1   = mysqli_fetch_array($query1)) {?>
            <tr>
              <td align="center"><?= $nomer++; ?>.</td>
              <td align="center"><?= $data1['tgl_lelang']; ?></td>
              <td><?= $data1['nama_barang']; ?></td>
              <td align="right"><?= number_format($data1['harga_awal']); ?></td>
              <td align="right"><?= number_format($data1['penawaran_harga']); ?></td>
              <td align="right"><?= number_format($data1['harga_akhir']); ?></td>
              <td>
                <?php 
                if($data1['status']=="ditutup"){
                  echo $data1['nama_lengkap'];
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

<script>
  $(document).ready(function() {
  	$('#lelang').dataTable();

  });

</script>