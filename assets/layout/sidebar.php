<?php
  $namauser=null;
  if (isset($_SESSION['namauser'])) {
    $namauser=$_SESSION['namauser'];
  }
?>
<aside>
<div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="assets/img/logo.jpeg" class="img-circle" width="90"></a></p>
          <h5 class="centered"><?=$namauser?></h5>
          
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Data</span>
              </a>
            <ul class="sub">
              <li><a href="?pg=barang">Barang</a></li>
              <li><a href="?pg=penerima">Penerima</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-shopping-bag"></i>
              <span>Transaksi</span>
              </a>
            <ul class="sub">
                <li><a href="?pg=terima">Terima</a></li>
                <li><a href="?pg=distribusi">Distribusi</a></li>
            </ul>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Laporan</span>
            </a>
            <ul class="sub">
              <li><a href="?pg=laporanbarang">Laporan Data Barang</a></li>
              <li><a href="?pg=laporanpenerima">Laporan Data Penerimaan</a></li>
              <li><a href="?pg=laporandataterima">Laporan Data Terima</a></li>
              <li><a href="?pg=laporandistribusi">Laporan Pendistribusian</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
</aside>