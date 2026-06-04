<style>
  .display-5{
    position: relative;
    color: black !important;
    font-weight: bold;
    margin-bottom: -5px;
    text-align: center;
  }
  p.lead{
    color: blue;
    font-size: 24px;
    text-align: center;
  }
  .smk{
    text-align: right !important;
    margin-top: -15px;
    font-size: 14px;
    margin-right: 30px;
  }
</style>

<?php
  $judul = "HOME";
  include "koneksi.php";
  include "templates/template.php";
  
  // Jumlah Peserta Lelang
  $jml = 0;
  $query  = "SELECT count(id_user) AS jml FROM masyarakat";
  $sql    = mysqli_query($koneksi, $query);
  if(mysqli_num_rows($sql)>0){
    $data = mysqli_fetch_assoc($sql);
    $jml  = $data['jml'];
  } 

  // Jumlah Barang
  $sql   = "SELECT sum(id_barang) as jml FROM barang";
  $query = mysqli_query($koneksi, $sql);
  $data  = mysqli_fetch_array($query);
  $ttl   = $data['jml'];
?>

<div class="container-fluid backGambar">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 pt-5 text-dark">Dashboard</h1> -->
  </div>

  <!-- Content -->
  <?php
    if($level==1){?>
      <div class="row mt-5 pt-3">
        <div class="col-md-7 jumbotron m-5">
          <h1 class="display-5">APLIKASI LELANG ONLINE</h1>
          <p class="lead">UJI KOMPETENSI KEAHLIAN</p>
          <hr class="hr" style="width:100%; margin-top: -10px">
          <p class="smk">SMK BISA <?= date('Y'); ?></p>
        </div>
      </div>
      <?php  
    }
  ?>

  <?php
    if($level==2){?>
      <div class="row mt-4">
        <!-- Jumlah Peserta Lelang -->
        <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-primary text-uppercase mb-1">
                  Peserta lelang</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($jml); ?> Orang</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Jumlah Barang -->
        <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-success text-uppercase mb-1">
                  Jumlah Barang</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($jml); ?> buah</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-cog fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-4">
        <!-- Nama Peserta Lelang -->
        <div class="col-xl-4 col-md-6 mb-2">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-danger text-uppercase mb-1">
                  Nama Peserta lelang</div>
                  <ul class="list-group list-group-flush">
                    <?php
                    $no = 1;
                    $query  = "SELECT nama_lengkap, telp FROM masyarakat";
                    $sql    = mysqli_query($koneksi, $query);
                    if(mysqli_num_rows($sql)>0){
                      while($data=mysqli_fetch_array($sql)){?>
                        <li class="list-group-item"><?= $no++; ?>. &nbsp;<?= strtoupper($data['nama_lengkap']); ?> - <?= $data['telp']; ?></li>
                        <?php 
                      }
                    }?>
                   </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Nama Barang Lelang -->
        <div class="col-xl-8 col-md-6 mb-2">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-info text-uppercase mb-1">
                  Nama Nama Barang lelang</div>
                  <table class="table table-responsive">
                    <thead>
                      <td>No.</td>
                      <td>Tgl Lelang</td>
                      <td>Nama Barang</td>
                      <td>Harga Awal</td>
                      <td>Harga Akhir</td>
                      <td>Nama Pemenang</td>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query  = "SELECT a.nama_barang, a.harga_awal, b.tgl_lelang, b.harga_akhir, b.status, c.nama_lengkap FROM barang a LEFT JOIN lelang b ON a.id_barang=b.id_barang LEFT JOIN masyarakat c ON b.id_user=c.id_user";
                      $sql    = mysqli_query($koneksi, $query);
                      if(mysqli_num_rows($sql)>0){
                        while($data=mysqli_fetch_array($sql)){
                          $status = $data['status'];?>
                          <tr>
                            <td align="right"><?= $no++; ?></td>
                            <td><?= $data['tgl_lelang']; ?></td>
                            <td><?= $data['nama_barang']; ?></td>
                            <td>Rp. <?= number_format($data['harga_awal']); ?></td>
                            <td>Rp. <?= number_format($data['harga_akhir']); ?></td>
                            <td>
                              <?php 
                              if($status=="ditutup"){
                                echo $data['nama_lengkap']; 
                              }?>
                            </td>
                          </tr>
                          <?php 
                        }
                      }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </div>

      <?php  
    }
  ?>

</div>

<?php include "templates/sticky-footer.php"; ?>    
<?php include "templates/footer.php"; ?>