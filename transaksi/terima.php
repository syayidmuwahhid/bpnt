<?php
	include 'admin/koneksi.php';
	$valkodeterima=null;$valtanggal=null;$valnoktp=null;$valnama=null;$valjabatan=null;$valjumlah=null;$valharga=null;$valkodebarang=null;$valnamabarang=null;$tot=null;
	$read="readonly";
	$jml=1;

	if (isset($_GET['jml'])) {
		$read="";
		$jml=$_GET['jml'];
		if(isset($_POST['input'])){
		$kodeterima=$_POST['kodeterima'];
		$tanggal=$_POST['tanggal'];
		$noktp=$_POST['noktp'];
		$jumlah=$_POST['jumlah'];
		$harga=$_POST['harga'];
		$kodebarang=$_POST['kodebarang'];
		$jumla=0;
		$hrga=0;
		$tot=0;$kodebaran="";
		
		for($x=0; $x<$jml; $x++){
				$subtot=$jumlah[$x]*$harga[$x];
				$tot += ($jumlah[$x] * $harga[$x]);
				$input2=$koneksi->query("INSERT INTO tb_terimabarang (kodebarang,jml,harga, subtotal, kodeterima) VALUES ('$kodebarang[$x]','$jumlah[$x]','$harga[$x]','$subtot','$kodeterima')");
				}
				// echo "<script>
				// document.getElementById('total').innerHTML = ".$tot[$x].";
				// </script>";

				// echo "<p id='total'>u</p>";
		// $getstok=($koneksi->query("SELECT * FROM tb_barang	WHERE kodebarang='$kodebarang'"))->fetch_array();
		// if ($getstok['jumlah']<$jumlah) {
		// 	echo"<script>alert('Stok Kurang');window.location='?pg=terima';</script>";
		// }else{
		// }

		$input=$koneksi->query("INSERT INTO tb_terima (kodeterima,tanggal,noktp,total) VALUES ('$kodeterima','$tanggal','$noktp','$tot')");

		}
	}elseif (isset($_GET['view'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_terima JOIN tb_penerima ON tb_terima.noktp=tb_penerima.noktp JOIN tb_barang ON tb_terima.kodebarang=tb_barang.kodebarang
			WHERE kodeterima='".$_GET['view']."'"))->fetch_array();
		$valkodeterima=$getvalue['kodeterima'];
		$valtanggal=$getvalue['tanggal'];
		$valnoktp=$getvalue['noktp'];
		$valnama=$getvalue['nama'];
		$valjabatan=$getvalue['jabatan'];
		$valjumlah=$getvalue['jumlah'];
		$valharga=$getvalue['harga'];
		$valkodebarang=$getvalue['kodebarang'];
		$valnamabarang=$getvalue['namabarang'];
		$read="readonly";


		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=terima';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_terima WHERE kodeterima='".$_GET['view']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=terima';</script>";
			}
			
		}elseif (isset($_POST['edit'])) {
			echo "<script>window.location='?pg=terima&edit=".$_GET['view']."';</script>";
		}
	}elseif (isset($_GET['edit'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_terima JOIN tb_penerima ON tb_terima.noktp=tb_penerima.noktp JOIN tb_barang ON tb_terima.kodebarang=tb_barang.kodebarang 
			WHERE kodeterima='".$_GET['edit']."'"))->fetch_array();
		$valkodeterima=$getvalue['kodeterima'];
		$valtanggal=$getvalue['tanggal'];
		$valnoktp=$getvalue['noktp'];
		$valnama=$getvalue['nama'];
		$valjabatan=$getvalue['jabatan'];
		$valjumlah=$getvalue['jumlah'];
		$valharga=$getvalue['harga'];
		$valkodebarang=$getvalue['kodebarang'];
		$valnamabarang=$getvalue['namabarang'];
		$read="";

		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=terima';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_terima WHERE kodeterima='".$_GET['edit']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=terima';</script>";
			}	
		}elseif (isset($_POST['input'])) {
			$jumlah=$_POST['jumlah'];
			$harga=$_POST['harga'];
			$simpan=$koneksi->query("UPDATE tb_terima SET kodeterima='".$_POST['kodeterima']."', tanggal='".$_POST['tanggal']."', noktp='".$_POST['noktp']."', jumlah='".$_POST['jumlah']."', harga='".$_POST['harga']."'
				WHERE kodeterima='".$_GET['edit']."'");
			if ($simpan) {
				echo"<script>window.location='?pg=terima';</script>";
			}
		}
	}
?>
<h1 class="page-header">Terima<hr></h1>
<form class="form-horizontal style-form" method="post">
    <div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Kode Terima</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="kodeterima" value="<?=$valkodeterima?>" <?=$read?> required>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Tanggal</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="date" class="form-control" name="tanggal" value="<?=$valtanggal?>" <?=$read?> required>
        </div>
        
	</div>
	<div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">No. KTP</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<select name="noktp" class="form-control" <?=$read?> onchange="changeValuektp(this.value)">
        		<option disabled="" selected="">Pilih</option>
        		<?php 
        			if (isset($_GET['view']) OR isset($_GET['edit'])) {
        				echo "<option value='".$valnoktp."'>".$valnoktp."</option>";
        			}

       				$sql=$koneksi->query("SELECT * FROM tb_penerima");
       $jsArrayktp = "var nama = new Array();\n";
       while ($data=$sql->fetch_Array()) {
      
        echo '<option value="'.$data['noktp'].'">'.$data['noktp'].'</option> ';

        $jsArrayktp .= "nama['" . $data['noktp'] . "'] = {nama:'" . addslashes($data['nama']) . "'};\n";
        $jsArrayktp .= "jabatan['" . $data['noktp'] . "'] = {jabatan:'" . addslashes($data['jabatan']) . "'};\n";
      
       }
      ?>
        		
        	</select>

        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Pekerjaan</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" value="<?=$valjabatan?>" id="jabatan" readonly>
        </div>
        
        
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Nama</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="nama" value="<?=$valnama?>" id="nama" readonly>
        </div>
    	
        <!-- <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Total</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="total" value="<?=$tot?>" readonly>
        </div> -->
        
	</div>
    
	<div class="form-group table-responsive container">
		<table class="table">
			<tr>
				<th class="text-center">Kode Barang</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Harga</th>
			</tr>
			<?php 
			for($x=1; $x<=$jml; $x++){
				$i=1;
				?>
			<tr>
				<td><select name="kodebarang[]" class="js-example-basic-single form-control" <?=$read?> onchange="changeValuebarang(this.value)">

        		<option disabled="" selected="">Pilih</option>
        		<?php
        			if (isset($_GET['view']) OR isset($_GET['edit'])) {
        				echo "<option value='".$valkodebarang."'>".$valkodebarang."</option>";
        			}
        			$qbarang=$koneksi->query("SELECT * FROM tb_barang");
        			$jsArraybarang = "var namabarang".$i." = new Array();\n";
        			while ($getbarang=$qbarang->fetch_array()) {
        				echo "
        					<option value='".$getbarang['kodebarang']."'>".$getbarang['kodebarang']." - ".$getbarang['namabarang']."</option>
        				";
        				$jsArraybarang .= "namabarang".$i."['" . $getbarang['kodebarang'] . "'] = {namabarang".$i.":'" . addslashes($getbarang['namabarang']) . "'};\n";
        			}
        		?>
        		</select>
        		</td>
        		<td><input type="number" class="form-control" name="jumlah[]" value="<?=$valjumlah?>" <?=$read?>></td>
        		<td><input type="number" class="form-control" name="harga[]" value="<?=$valharga?>" <?=$read?>></td>
			</tr>
		<?php } ?>
		</table>
		<div class="form-group text-center container">
		<button class="btn btn-success form-control" type="submit" name="input">Input</button>
	</div>
	</div>
	
</form>
<br>

<div class="adv-table table-responsive">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            	<th class="text-center">Kode Terima</th>
            	<th class="text-center">Tanggal</th>
                <th class="text-center">No KTP</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Pekerjaan</th>
				<th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
	<?php
		$getdata=$koneksi->query("SELECT * FROM tb_terima JOIN tb_penerima ON tb_terima.noktp=tb_penerima.noktp");
		while ($row=$getdata->fetch_array()) {
			echo "<tr class='text-center'>
			<td>".$row['kodeterima']."</td>";
			$tanggal=date('d F Y', strtotime($row['tanggal']));
			echo "
			<td>".$tanggal."</td>
			<td>".$row['noktp']."</td>
			<td>".$row['nama']."</td>
			<td>".$row['jabatan']."</td>
			<td><a href='?pg=detailterima&view=".$row['kodeterima']."' type='button' class='btn btn-info'>Detail</a> <a href='transaksi/hapusterima.php?id=".$row['kodeterima']."' type='button' class='btn btn-danger'>Hapus</a></td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>

<!-- Modal -->
<?php if (empty($_GET['edit']) AND empty($_GET['view'])) { 
	if (empty($_GET['jml'])){?>
		<div class="modal fade" id="jumlahtransaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <!--  <div class="modal-header">
                       <CENTER> <h3>Masukan Jumlah Transaksi</h3></CENTER>
                      <a type="button" class="close" aria-hidden="true" href="">&times;</a> 
                    </div> -->
                    <div class="modal-body">
                      <form method="post" class="form-horizontal style-form">
                        <div class="form-group">
                          <label class="col-sm-3 col-md-3 col-lg-3 col-3 control-label"><div class="text-right">Banyak Barang</div></label>
                          <div class="col-sm-6 col-md-6 col-lg-6 col-6">
                            <input type="text" class="form-control" name="jml">
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3 col-3">
                      		<button type="submit" class="btn btn-primary" name="pilih">Pilih</button>
                      	</form>
                          </div>  
                        </div>
                    </div><!-- 
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Pilih</button>
                      </form>
                    </div> -->
                  </div>
                </div>
              </div>
              <?php
    if (isset($_POST['jml'])) {
    	echo "<script>window.location='?pg=terima&jml=".$_POST['jml']."'</script>";

    }
 }
 } ?>

              
        


