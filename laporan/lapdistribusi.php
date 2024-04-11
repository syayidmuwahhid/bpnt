<h1 class="page-header">Laporan Data Distribusi<hr></h1>
<div class="text-right"><a href="assets/pdf/cetakdatadistribusi.php" type="button" class="btn btn-success" target='_blank'>Cetak</a></div><br>
<div class="adv-table table-responsive">
    <table class="table table-bordered">
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
			<td>".$row['nodistribusi']."</td>";
			$tanggal=date('d F Y', strtotime($row['tanggal']));
			echo "
			<td>".$tanggal."</td>
			<td>".$row['kodebarang']."</td>
			<td>".$row['namabarang']."</td>
			<td>".$row['stokawal']."</td>
			<td>".$row['stokakhir']."</td>
			<td>".$row['sisastok']."</td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>
