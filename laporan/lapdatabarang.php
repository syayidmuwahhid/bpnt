<h1 class="page-header">Laporan Data Barang<hr></h1>
<div class="text-right"><a href="assets/pdf/cetakdatabarang.php" type="button" class="btn btn-success" target='_blank'>Cetak</a></div><br>
<div class="adv-table table-responsive">
    <table class="table table-bordered table-responsive">
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
			<td>".$row['kodebarang']."</td>
			<td>".$row['namabarang']."</td>
			<td>".$row['satuan']."</td>
			<td>".$row['jumlah']."</td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>