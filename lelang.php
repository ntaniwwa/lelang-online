<?php
  $judul = "LELANG";
  include "koneksi.php";
  include "templates/template.php";
?>
<!-- SweetAlert2 -->
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

  <div class="row mt-3 tampilkanLelang">
    <div class="col-xl-12 table-responsive">

      <table class="table table-bordered table-hover" id="lelang">
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
          $sql 		= "SELECT *, a.id_barang as idB FROM barang a LEFT JOIN lelang b ON a.id_barang=b.id_barang";
          $query 	= mysqli_query($koneksi, $sql);
          while ($data = mysqli_fetch_array($query)) { 
            $id_barang  = $data['idB'];
            $status     = $data['status'];
            $img        = $data['photo'];
            if($img==""){$img="no-logo.png";}?>
            <tr>
              <td align="center" width="5%"><?= $no++; ?>.</td>
              <td><?= $data['tgl']; ?></td>
              <td align="center" width="8%"><img src="photo/<?= $img; ?>" alt="menu" width="30px" height="30px"></td>
              <td><?= $data['nama_barang']; ?></td>
              <td align="right"><?= number_format($data['harga_awal']); ?></td>
              <td ><?= $data['deskripsi']; ?></td>
              <td align="center" width="12%" class="bukaTutupLelang">
                <?php 
                if($status==""){?>
                  <a class="btn btn-danger btn-sm text-white" id="closeLelang" id1="<?= $id_barang; ?>" title="Tutup">
                    <i class="fas fa-question"></i>
                  </a>
                    <?php 
                }else if($status=="ditutup"){?>
                  <i class="fas fa-check"></i>
                  <?php 
                }else{?>
                  <a class="btn btn-success btn-sm text-white" id="openLelang" id1="<?= $id_barang; ?>" title="Dibuka">
                    <i class="fas fa-check"></i>
                  </a>
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

<script>
	$(document).ready(function() {
		$('#lelang').dataTable();
    $(document).on('click', '#closeLelang', function() {
      var id_barang = $(this).attr('id1');
      $.ajax({
        method: 'POST',
        data: {
          id_barang: id_barang
        },
        url: 'lelang-simpan-ajax.php',
        cache: false,
        success: function() {
          $('.tampilkanLelang').load('lelang-tampil.php', {
              id_barang: id_barang
            });
        }
      });      
    });
    $(document).on('click', '#openLelang', function() {
      var id_barang = $(this).attr('id1');
      $.ajax({
        method: 'POST',
        data: {
          id_barang: id_barang
        },
        url: 'lelang-simpan-ajax.php',
        cache: false,
        success: function() {
          $('.tampilkanLelang').load('lelang-tampil.php', {
              id_barang: id_barang
            });
        }
      });      
    });
	});
</script>