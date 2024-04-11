<?php
    session_start();
    include 'admin/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'assets/layout/head.php'; ?>
  <title>BPNT</title>
</head>

<body>
  <section id="container">
    <?php 
      include 'assets/layout/header.php';
      include 'assets/layout/sidebar.php';
    ?>
    
    
     <section id="main-content">
      <section class="wrapper site-min-height">

    
        <div class="row ">
          <div class="col-lg-12 mt-0">

          <?php
            if (empty($_SESSION['username'])){
              include 'admin/login.php';
            }
            
            switch (@$_GET['pg']) {
              case 'barang':
                include 'file/barang.php';
                break;
              case 'penerima':
                include 'file/penerima.php';
                break;
              case 'terima':
                include 'transaksi/terima.php';
                break;
              case 'detailterima':
                include 'transaksi/detailterima.php';
                break;
              case 'distribusi':
                include 'transaksi/distribusi.php';
                break;
              case 'laporanbarang':
                include 'laporan/lapdatabarang.php';
                break;
              case 'laporanpenerima':
                include 'laporan/lapdatapenerima.php';
                break;
              case 'laporandataterima':
                include 'laporan/lapdataterima.php';
                break;
              case 'laporandistribusi':
                include 'laporan/lapdistribusi.php';
                break;

              default:
                include 'dashboard/dashboard.php'; 
                break;
            }
          ?>
          
                
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <?php include 'assets/layout/footer.php'?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include 'assets/layout/js.php'?>

  <!--script for this page-->

</body>

</html>
