<style>
  #accordionSidebar{
    background: url("img/standing-banner-01.jpg");
    background-size:cover;
  }
  li.nav-item{
    margin-top: -10px !important;
    margin-bottom: -10px !important;
  }
  span{
    color: black !important;
    font-weight: bold;
  }
</style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
  <img src="img/logo-01.JPEG" alt="logo" width="60px" height="60px">
    <span class="sidebar-brand-text mx-3"><?= $judul; ?></span>
  </a>
 
  <hr class="sidebar-divider my-0">
  
  <?php
  $level = $_SESSION['level'] ?? '';
  if( $level==2){?>
  
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
   
    <hr class="sidebar-divider">
    <?php 
  }?>

   
    <?php 
    if($level==1){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master</span>
        </a>
                
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="login.php">
              <i class="fas fa-fw fa-users"></i>
              <span>Petugas</span>
            </a>
      
            
            <a class="collapse-item" href="barang.php">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Pendataan Barang</span>
            </a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <?php 
    }?>

    
    <?php 
    if($level==2){?>
     
      <li class="nav-item">
        <a class="nav-link" href="barang.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Pendataan Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lelang.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>LELANG</span>
        </a>
      </li>
      <?php 
    }?>
    
   
    <?php
    if($level==1 or $level==2){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-edit"></i>
          <span>Laporan-laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="laporan-barang.php">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Barang Lelang</span>
            </a>
            
            
            <a class="collapse-item" href="laporan-masyarakat.php">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Peserta Lelang</span>
            </a>
            
           
            <a class="collapse-item" href="laporan-pemenang-lelang.php">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Pemenang Lelang</span>
            </a>

          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <?php 
    }?>

 
  <hr class="sidebar-divider d-none d-md-block">
  
  <div class="text-center d-none d-md-inline mt-3">
    <button class="rounded-circle border-0 bg-warning" id="sidebarToggle"></button>
  </div>
</ul>

<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
  