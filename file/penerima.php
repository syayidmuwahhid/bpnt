<?php
	include 'admin/koneksi.php';
	$valnoktp=null;$valnama=null;$valalamat=null;$valtlp=null;$read=null;$valjabatan=null;
	
	if (isset($_GET['view'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_penerima WHERE noktp='".$_GET['view']."'"))->fetch_array();
		$valnoktp=$getvalue['noktp'];
		$valnama=$getvalue['nama'];
		$valalamat=$getvalue['alamat'];
		$valtlp=$getvalue['tlp'];
		$valjabatan=$getvalue['jabatan'];
		$read="readonly";


		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=penerima';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_penerima WHERE noktp='".$_GET['view']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=penerima';</script>";
			}
			
		}elseif (isset($_POST['edit'])) {
			echo "<script>window.location='?pg=penerima&edit=".$_GET['view']."';</script>";
		}
	}elseif (isset($_GET['edit'])) {
		$getvalue=($koneksi->query("SELECT * FROM tb_penerima WHERE noktp='".$_GET['edit']."'"))->fetch_array();
		$valnoktp=$getvalue['noktp'];
		$valnama=$getvalue['nama'];
		$valalamat=$getvalue['alamat'];
		$valtlp=$getvalue['tlp'];
		$valjabatan=$getvalue['jabatan'];

		if (isset($_POST['tutup'])) {
			echo "<script>window.location='?pg=penerima';</script>";
		}elseif (isset($_POST['hapus'])) {
			$hapus=$koneksi->query("DELETE FROM tb_penerima WHERE noktp='".$_GET['edit']."'");
			if ($hapus) {
				echo "<script>window.location='?pg=penerima';</script>";
			}	
		}elseif (isset($_POST['input'])) {
			$simpan=$koneksi->query("UPDATE tb_penerima SET noktp='".$_POST['noktp']."', nama='".$_POST['nama']."', jabatan='".$_POST['jabatan']."', alamat='".$_POST['alamat']."', tlp='".$_POST['tlp']."'
				WHERE noktp='".$_GET['edit']."'");
			if ($simpan) {
				echo"<script>window.location='?pg=penerima';</script>";
			}
		}
	}elseif(isset($_POST['input'])){
		$noktp=$_POST['noktp'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$tlp=$_POST['tlp'];
		$jabatan=$_POST['jabatan'];

		$input=$koneksi->query("INSERT INTO tb_penerima (noktp, nama, alamat, tlp, jabatan) VALUES ('$noktp','$nama','$alamat','$tlp','$jabatan')");
	}
?>
<h1 class="page-header">Penerima<hr></h1>
<form class="form-horizontal style-form" method="post">
    <div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">No. KTP</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="number" class="form-control" name="noktp" value="<?=$valnoktp?>" <?=$read?>>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Alamat</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<textarea type="text" class="form-control" name="alamat" value="<?=$valalamat?>" <?=$read?>></textarea>
        </div>
	</div>
	<div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Nama</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="nama" value="<?=$valnama?>" <?=$read?>>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Tlp</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="number" class="form-control" name="tlp" value="<?=$valtlp?>" <?=$read?>>
        </div>
	</div>
	<div class="form-group">
    	<label class="col-sm-2 col-md-2 col-lg-2 col-2 control-label"><div class="text-right">Jabatan</div></label>
        <div class="col-sm-4 col-md-4 col-lg-4 col-4">
        	<input type="text" class="form-control" name="jabatan" value="<?=$valjabatan?>" <?=$read?>>
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
                <th class="text-center">No KTP</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Jabatan</th>
				<th class="text-center">alamat</th>
				<th class="text-center">Tlp</th>
            </tr>
        </thead>
        <tbody>
	<?php
		$getdata=$koneksi->query("SELECT * FROM tb_penerima");
		while ($row=$getdata->fetch_array()) {
			echo "<tr class='text-center'>
			<td><a href='?pg=penerima&view=".$row['noktp']."'>".$row['noktp']."</a></td>
			<td><a href='?pg=penerima&view=".$row['noktp']."'>".$row['nama']."</a></td>
			<td><a href='?pg=penerima&view=".$row['noktp']."'>".$row['jabatan']."</a></td>
			<td><a href='?pg=penerima&view=".$row['noktp']."'>".$row['alamat']."</a></td>
			<td><a href='?pg=penerima&view=".$row['noktp']."'>".$row['tlp']."</a></td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>
