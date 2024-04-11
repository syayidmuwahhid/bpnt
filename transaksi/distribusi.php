<?php
	include 'admin/koneksi.php';
	$valnodistribusi=null;$valtanggal=null;$valkodebarang=null;$valstokawal=null;$valnamabarang=null;$valstokakhir=null;$valsisastok=null;$valstokterakhir=null;
	$read=null;
	
	if (isset($_GET['view'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_distribusi JOIN tb_barang ON tb_distribusi.kodebarang=tb_barang.kodebarang	WHERE nodistribusi='".$_GET['view']."'"))->fetch_array();
		$valnodistribusi=$getvalue['nodistribusi'];
		$valtanggal=$getvalue['tanggal'];
		$valkodebarang=$getvalue['kodebarang'];
		$valnamabarang=$getvalue['namabarang'];
		$valstokawal=$getvalue['jumlah'];
		$valstokterakhir=$getvalue['stokawal'];
		$valstokakhir=$getvalue['stokakhir'];
		$valsisastok=$getvalue['sisastok'];
		$read="readonly";


		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=distribusi';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_distribusi WHERE nodistribusi='".$_GET['view']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=distribusi';</script>";
			}
			
		}elseif (isset($_POST['edit'])) {
			echo "<script>window.location='?pg=distribusi&edit=".$_GET['view']."';</script>";
		}
	}elseif (isset($_GET['edit'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_distribusi JOIN tb_barang ON tb_distribusi.kodebarang=tb_barang.kodebarang WHERE nodistribusi='".$_GET['edit']."'"))->fetch_array();
		$valnodistribusi=$getvalue['nodistribusi'];
		$valtanggal=$getvalue['tanggal'];
		$valkodebarang=$getvalue['kodebarang'];
		$valnamabarang=$getvalue['namabarang'];
		$valstokterakhir=$getvalue['stokawal'];
		$valstokawal=$getvalue['jumlah'];
		$valstokakhir=$getvalue['stokakhir'];
		$valsisastok=$getvalue['sisastok'];
		$sisastok=$valstokawal-$valstokakhir;

		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=distribusi';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_distribusi WHERE nodistribusi='".$_GET['edit']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=distribusi';</script>";
			}	
		}elseif (isset($_POST['input'])) {
			$simpan=$koneksi->query("UPDATE tb_distribusi SET nodistribusi='".$_POST['nodistribusi']."', tanggal='".$_POST['tanggal']."', kodebarang='".$_POST['kodebarang']."',  stokakhir='".$_POST['stokakhir']."', sisastok='$sisastok'
				WHERE nodistribusi='".$_GET['edit']."'");
			if ($simpan) {
				echo"<script>window.location='?pg=distribusi';</script>";
			}
		}
	}elseif(isset($_POST['input'])){
		$nodistribusi=$_POST['nodistribusi'];
		$tanggal=$_POST['tanggal'];
		$kodebarang=$_POST['kodebarang'];
		$getstok=($koneksi->query("SELECT * FROM tb_barang	WHERE kodebarang='$kodebarang'"))->fetch_array();
		$valstokawal=$getstok['jumlah'];
		$stokakhir=$_POST['stokakhir'];
		if ($valstokawal<$stokakhir) {
			echo"<script>alert('Stok Kurang');window.location='?pg=barang';</script>";
		}else{
			$sisastok=$valstokawal-$stokakhir;
		}


		$input=$koneksi->query("INSERT INTO tb_distribusi (nodistribusi,tanggal,kodebarang, stokawal, stokakhir,sisastok) VALUES ('$nodistribusi','$tanggal','$kodebarang','$valstokawal','$stokakhir','$sisastok')");
		$input2=$koneksi->query("UPDATE tb_barang SET jumlah='$sisastok' WHERE kodebarang='$kodebarang'");

		echo"<script>window.location='?pg=distribusi';</script>";
		

	}
?>
<h1 class="page-header">Distribusi<hr></h1>
<form class="form-horizontal style-form" method="post">
    <div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">No Distribusi</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="nodistribusi" value="<?=$valnodistribusi?>" <?=$read?>>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Stok Awal</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="number" class="form-control" value="<?=$valstokterakhir?>" readonly id="stokawal">
        </div>
	</div>
	<div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Tanggal</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="date" class="form-control" name="tanggal" value="<?=$valtanggal?>" <?=$read?> required>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Stok Akhir</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="number" class="form-control" name="stokakhir" value="<?=$valstokakhir?>" <?=$read?>>
        </div>
	</div>
    <div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Kode Barang</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<select name="kodebarang" class="form-control" <?=$read?> onchange="changeValuedistribusi(this.value)">
        		<option disabled="" selected="">Pilih</option>
        		<?php
        			if (isset($_GET['view']) OR isset($_GET['edit'])) {
        				echo "<option value='".$valkodebarang."'>".$valkodebarang."</option>";
        			}
        			$qbarang=$koneksi->query("SELECT * FROM tb_barang");
        			$jsArraydistribusi = "var namabarang = new Array();\n";
        			while ($getbarang=$qbarang->fetch_array()) {
        				echo "
        					<option value='".$getbarang['kodebarang']."'>".$getbarang['kodebarang']."</option>
        				";

        				$jsArraydistribusi .= "namabarang['" . $getbarang['kodebarang'] . "'] = {namabarang:'" . addslashes($getbarang['namabarang']) . "'};\n";
        				$jsArraydistribusi .= "stokawal['" . $getbarang['kodebarang'] . "'] = {stokawal:'" . addslashes($getbarang['jumlah']) . "'};\n";
        			}
        		?>
        	</select>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Sisa Stok</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="number" class="form-control" value="<?=$valsisastok?>" readonly>
        </div>
    </div>
	<div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Nama Barang</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="namabarang" value="<?=$valnamabarang?>" readonly id="namabarang">
        </div>
	</div>
	<div class="form-group text-center">
		<button class="btn btn-success" type="submit" name="input">Input</button>
		<button class="btn btn-success" type="submit" name="edit">Edit</button>
		<button class="btn btn-success" type="submit" name="hapus">Hapus</button>
		<button class="btn btn-success" type="submit" name="tutup">Tutup</button>
	</div>
</form>
<br>

<div class="adv-table table-responsive">
    <table id="example" class="table table-striped" style="width:100%" >
        <thead>
            <tr>
            	<th class="text-center">No Distribusi</th>
            	<th class="text-center">Tanggal</th>
            	<th class="text-center">Kode Barang</th>
                <th class="text-center">Nama Barang</th>
				<th class="text-center">Stok Awal</th>
				<th class="text-center">Stok Akhir</th>
				<th class="text-center">Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
	<?php
		$getdata=$koneksi->query("SELECT * FROM tb_distribusi JOIN tb_barang ON tb_distribusi.kodebarang=tb_barang.kodebarang");
		while ($row=$getdata->fetch_array()) {
			echo "<tr class='text-center'>
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$row['nodistribusi']."</a></td>";
			$tanggal=date('d F Y', strtotime($row['tanggal']));
			echo "
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$tanggal."</a></td>
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$row['kodebarang']."</a></td>
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$row['namabarang']."</a></td>
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$row['stokawal']."</a></td>
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$row['stokakhir']."</a></td>
			<td><a href='?pg=distribusi&view=".$row['nodistribusi']."'>".$row['sisastok']."</a></td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>
