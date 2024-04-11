<?php
	include 'admin/koneksi.php';
	$valkodebarang=null;$valsatuan=null;$valnamabarang=null;$valjumlah=null;$read=null;
	
	if (isset($_GET['view'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_barang WHERE kodebarang='".$_GET['view']."'"))->fetch_array();
		$valkodebarang=$getvalue['kodebarang'];
		$valsatuan=$getvalue['satuan'];
		$valnamabarang=$getvalue['namabarang'];
		$valjumlah=$getvalue['jumlah'];
		$read="readonly";


		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=barang';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_barang WHERE kodebarang='".$_GET['view']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=barang';</script>";
			}
			
		}elseif (isset($_POST['edit'])) {
			echo "<script>window.location='?pg=barang&edit=".$_GET['view']."';</script>";
		}
	}elseif (isset($_GET['edit'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_barang WHERE kodebarang='".$_GET['edit']."'"))->fetch_array();
		$valkodebarang=$getvalue['kodebarang'];
		$valsatuan=$getvalue['satuan'];
		$valnamabarang=$getvalue['namabarang'];
		$valjumlah=$getvalue['jumlah'];

		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=barang';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_barang WHERE kodebarang='".$_GET['edit']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=barang';</script>";
			}	
		}elseif (isset($_POST['input'])) {
			$simpan=$koneksi->query("UPDATE tb_barang SET kodebarang='".$_POST['kodebarang']."', namabarang='".$_POST['namabarang']."', satuan='".$_POST['satuan']."', jumlah='".$_POST['jumlah']."'
				WHERE kodebarang='".$_GET['edit']."'");
			if ($simpan) {
				echo"<script>window.location='?pg=barang';</script>";
			}
		}
	}elseif(isset($_POST['input'])){
		$kodebarang=$_POST['kodebarang'];
		$satuan=$_POST['satuan'];
		$namabarang=$_POST['namabarang'];
		$jumlah=$_POST['jumlah'];

		$input=$koneksi->query("INSERT INTO tb_barang (kodebarang, satuan, namabarang, jumlah) VALUES ('$kodebarang','$satuan','$namabarang','$jumlah')");
	}
?>
<h1 class="page-header">Barang<hr></h1>
<form class="form-horizontal style-form" method="post">
    <div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Kd. Barang</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="kodebarang" value="<?=$valkodebarang?>" <?=$read?>>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Satuan</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="satuan" value="<?=$valsatuan?>" <?=$read?>>
        </div>
	</div>
	<div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Nama Barang</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="namabarang" value="<?=$valnamabarang?>" <?=$read?>>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Jumlah</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="number" class="form-control" name="jumlah" value="<?=$valjumlah?>" <?=$read?>>
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
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Kode Barang</th>
				<th class="text-center">Nama Barang</th>
				<th class="text-center">Satuan</th>
				<th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
	<?php
		$getdata=$koneksi->query("SELECT * FROM tb_barang");
		while ($row=$getdata->fetch_array()) {
			echo "<tr class='text-center'>
			<td><a href='?pg=barang&view=".$row['kodebarang']."'>".$row['kodebarang']."</a></td>
			<td><a href='?pg=barang&view=".$row['kodebarang']."'>".$row['namabarang']."</a></td>
			<td><a href='?pg=barang&view=".$row['kodebarang']."'>".$row['satuan']."</a></td>
			<td><a href='?pg=barang&view=".$row['kodebarang']."'>".$row['jumlah']."</a></td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>
