<h1 class="page-header">Laporan Data Penerimaan<hr></h1>
<div class="text-right"><a href="assets/pdf/cetakdatapenerima.php" type="button" class="btn btn-success" target='_blank'>Cetak</a></div><br>
<div class="adv-table table-responsive">
    <table class="table table-bordered table-responsive">
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
			<td>".$row['noktp']."</td>
			<td>".$row['nama']."</td>
			<td>".$row['jabatan']."</td>
			<td>".$row['alamat']."</td>
			<td>".$row['tlp']."</td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>
