<?php
  session_start();
  include "koneksi.php";
  if (!isset($_SESSION['id_login'])){
    $id_login = "";
  }else{
    $id_login = $_SESSION['id_login'];
    $id_user  = $_SESSION['id_user'];
    if($id_login!="sudahLogin"){
      $id_login="";
    }else{
      $nama = $_SESSION['nama_lengkap'];
    }
  }
?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> I AND ME LELANG ONLINE</title>
    <link rel="shorcut icon" type="text/css" href="img/logo-02-min.jpeg">

    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css" >
    <link rel="stylesheet" href="css/styleku.css">
  </head>
  <body>
   
	  <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
    
  >
    <?php 
    if($id_login==""){?>
    
      <div class="jumbotron text-center">
        <img src="img/logo-02-min.jpeg" alt="Logo" class="rounded-circle" >
        <h1 class="textWarning"> I AND ME LELANG ONLINE</h1>
        <p class="kopi">Cepat, Aman, Terbaik </p>
      </div>
     
      <?php 
    }?>

  
    <nav class="navbar sticky-top navbar-expand-lg shadow">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-dark" href="#"><img src="img/logo-01.JPEG" alt="Logo" width="25px" height="25px" class="pt-1 mr-2"> 
        <?php 
        if($id_login==""){
          echo "I AND ME LELANG ONLINE";
        }else{
          echo "Selamat Datang <b>" .strtoupper($nama)."</b> di Lelang Online"; 
        }?>
      </a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mt-lg-0">
        
          <?php 
          if($id_login==""){?>
            <li><a href="#about" class="page-scroll">ABOUT</a></li>
            <li><a href="#portfolio" class="page-scroll">BARANG</a></li>
            <li><a href="#contact" class="page-scroll">REGISTRASI</a></li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">LOGIN
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
                <form action="proses.php" method="post">
                 
                  <div class="form-group mx-2 my-0 py-0">
                    <input type="text" name="username" class="form-control form-control-sm" placeholder="Username"  autocomplete="off" required>
                  </div>

                 
                  <div class="form-group mx-2 my-0 py-0">
                    <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" autocomplete="off" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm ml-2 py-1 my-0">&nbsp;<i class="fa fa-lock"></i>&nbsp;&nbsp;Login&nbsp;&nbsp;</button>
                </form>
              </div>
            </li>
            <?php 
          }else{?>
            
            <li><a href="dashboard-masyarakat.php" class="page-scroll"><i class="fa fa-shopping-cart" title="Daftar Belanja"></i></a></li>
            <li><a href="logout.php" class="page-scroll" title="LogOut">LOG OUT</a></li>
            <?php 
          }?>
        </ul>
      </div>
    </nav>
   
    <?php 
    if($id_login==""){?>
     
      <section class="about" id="about">
        <div class="container-fluid imgAbout">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="text-dark">About</h2>
              <hr class="hr">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-6">
              <p class="pKiri">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lelang di Indonesia sudah ada sejak Tahun 1908, ditandai dengan terbitnya Peraturan Lelang atau Vendu Reglement. Vendu Reglement yang diundangkan dalam Staatsblad Nomor 189 Tahun 1908 merupakan cikal bakal lahirnya mekanisme lelang di Indonesia. <br><br>
              
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Istilah lelang sebuah transaksi jual beli dengan sistematika khusus. Lelang didefinisikan sebagai penjualan barang yang terbuka untuk umum dengan penawaran harga secara tertulis dan/atau lisan yang semakin meningkat atau menurun untuk mencapai harga tertinggi, yang didahului dengan pengumuman lelang.<br><br>
              
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tujuan lelang atau tender yang sesuai dengan Petunjuk Teknis Keputusan Presiden Republik Indonesia adalah untuk mendapatkan kontraktor pelaksana proyek yang mempunyai tingkat resiko yang paling menguntungkan bagi negara. <br>
              </p>
            </div>
            <div class="col-md-6">
              <p class="pKanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peserta Lelang adalah orang atau badan hukum/badan usaha yang telah memenuhi syarat untuk mengikuti lelang. 22. Pembeli adalah orang atau badan hukum/badan usaha yang mengajukan penawaran tertinggi dan disahkan sebagai pemenang lelang oleh Pejabat Lelang. <br><br>
              
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lelang memiliki beberapa fungsi di antaranya fungsi publik, fungsi privat, dan fungsi budgeter. Fungsi Budgeter berarti proses lelang merupakan sarana mengumpulkan penerimaan negara melalui Bea Lelang, PPh, dan BPHTB dengan proses pelaporan sesuai dengan kewenangan berbagai instansi. <br>

              </p>
            </div>
          </div>
        </div>
      </section>
     
      <?php 
    }?>

   
    
   <?php 
$sql = "SELECT *, c.id_user 
        FROM lelang a 
        INNER JOIN barang b ON a.id_barang=b.id_barang 
        LEFT JOIN masyarakat c ON a.id_user=c.id_user";

$query = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($query);

if($jumlah > 0){ ?>
<section class="portfolio" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h2>BARANG LELANG</h2>
        <hr class="hr">
      </div>
    </div>

    <div class="row menuCustomerBeli">
      <?php while ($data = mysqli_fetch_array($query)) {

        $img = $data['photo'];
        if ($img == "") { $img = "no-logo.png"; }

        $id_lelang   = $data['id_lelang'];
        $id_barang   = $data['id_barang'];
        $id_user     = $data['id_user'];
        $nama_barang = strtoupper($data['nama_barang']);
        $harga_awal  = number_format($data['harga_awal']);
        $harga_akhir = number_format($data['harga_akhir']);

        if($harga_akhir == "" || $harga_akhir == "0"){
          $harga_akhir = $harga_awal;
        }

        $status = $data['status'];
      ?>

      <div class="col-sm-3 mb-1">
        <a class="gambar">
          <img src="img/<?= $img; ?>" class="img-responsive">

          <div class="lelangNamaBarang"><?= $nama_barang; ?></div>
          <div class="lelangHargaBarang">Penawaran : Rp. <?= $harga_akhir; ?></div>
          <div class="lelangNamaMasyarakat">Nama : <?= $data['nama_lengkap']; ?></div>

          
          <?php if($status=="dibuka"){ ?>
            <div class="menuPesan">
              <small class="btn btn-sm btn-success pesanMenu"
                id1="<?= $id_barang; ?>"
                id2="<?= $nama_barang; ?>"
                id3="<?= $harga_akhir; ?>"
                id4="<?= $id_lelang; ?>"
                id5="<?= $id_user; ?>"
                data-toggle="modal"
                data-target="#staticLelang">
                <i class="fa fa-plus"></i>
              </small>
            </div>
          <?php } else { ?>
            <div class="soldOut">
              <img src="img/soldOut.png" class="imgSold">
            </div>
          <?php } ?>
        </a>
      </div>

      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
  
    <?php 
    if($id_login==""){?>
     
      <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Registrasi</h2>
              <hr class="hr">
            </div>
          </div>

         

          <div class="row">
            <div class="col-sm-10">
              <form name="formContact" method="post" action="masyarakat-simpan.php">
               
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input name="nama_lengkap" type="text" class="form-control" placeholder="Masukan Nama Lengkap" autocomplete="off">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input name="username2" type="text" class="form-control" placeholder="masukan username" autocomplete="off">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input name="password2" type="password"  class="form-control"  placeholder="masukan password untuk login" autocomplete="off">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-3 control-label">No. Telp / WA</label>
                  <div class="col-sm-9">
                    <input name="telp" type="text" class="form-control" placeholder="masukan no telp" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-2">
                    <input name='buatAkun' type="submit" class="btn btn-primary buatAkun" value="Buat Akun" style="width:100px; display:inline-block; ">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      
      <?php 
    }?>

    
    <?php 
    if($jumlah>0 or $id_login==""){
      include "templates/sticky-footer.php";
      include "templates/footer.php"; 
    }?>
    

   <?php 
    if($id_login==""){?>
      <script src="js/script.js"></script>
      <?php 
    }else{?>
      <script src="js/script_login.js"></script>
      <?php 
    }?>
    <script>
      $(document).ready(function () {
        $(document).on("click", ".buatAkun", function () {
          var nama_lengkap  = $('[name="nama_lengkap"]').val();
          var username      = $('[name="username2"]').val();
          var password      = $('[name="password2"]').val();
          var telp          = $('[name="telp"]').val();
          if (nama_lengkap == "") {
            Swal.fire('Nama belum diisi!');
            return false;
          } else if (username == "") {
            Swal.fire('username belum diisi!');
            return false;
          } else if (password == "") {
            Swal.fire('Password belum diisi!');
            return false;
          } else if (telp == "") {
            Swal.fire('Telp belum diisi!');
            return false;
          }
        });

        $(document).on("click", ".pesanMenu", function () {
          var id_barang   = $(this).attr('id1');
          var nama_barang = $(this).attr('id2');
          var harga_awal  = $(this).attr('id3');
          var id_lelang   = $(this).attr('id4');
          var id_user     = $(this).attr('id5');
          $('[name="nama_barang"]').val(nama_barang);
          $('[name="harga_awal"]').val(harga_awal);
          $('[name="id_barang"]').val(id_barang);
          $('[name="id_lelang"]').val(id_lelang);
          $('[name="id_user"]').val(id_user);
          
        });

      });
    </script>
    
   </body>
</html>

<div class="modal fade" id="staticLelang" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">
					Penawaran Barang Lelang
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="lelang-history-simpan.php" method="post">
          <input type="text" name="id_lelang" hidden>
          <input type="text" name="id_user" hidden>
          <input type="text" name="id_barang" hidden>

         
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Nama Barang</span>
						<input type="text" name="nama_barang" class="form-control form-control-sm" readonly>
					</div>

          
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Harga Awalr</span>
						<input type="text" name="harga_awal" class="form-control form-control-sm text-right money angkaSemua" readonly>
					</div>

          
					<div class="input-group mb-1">
						<span class="input-group-text lebar">Harga Penawaran</span>
						<input type="text" name="harga_akhir" class="form-control form-control-sm text-right money angkaSemua" placeholder="Input Penawaran" autocomplete="off" required>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;Penawaran&nbsp;</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
if(isset($_SESSION['nama_petugas'])){
?>

<div class="petugasLelang">
    Petugas : <?= $_SESSION['nama_petugas']; ?>
</div>

<?php 
}
?>

<a href="login.php" class="btn btn-primary">
    Login sebagai Petugas/Admin
</a>