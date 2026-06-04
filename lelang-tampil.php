<?php
include "koneksi.php";?>
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
   
<script>
	$(document).ready(function() {
		$('#lelang').dataTable();
  });
</script>
