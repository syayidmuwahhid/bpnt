<h1 class="page-header">Laporan Data Terima<hr></h1>
<div class="text-right"><a href="laporan/laporanterima.php" type="button" class="btn btn-success" target='_blank'>Cetak</a></div><br>
<div class="adv-table table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
            	<th class="text-center">Kode Terima</th>
            	<th class="text-center">Tanggal</th>
                <th class="text-center">No KTP</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Jabatan</th>
				<th class="text-center">Kode Barang</th>
				<th class="text-center">Nama Barang</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Sub Total</th>
            </tr>
        </thead>
        <tbody>
	<?php
		$getdata=$koneksi->query("SELECT * FROM tb_terimabarang JOIN tb_terima ON tb_terimabarang.kodeterima=tb_terima.kodeterima JOIN tb_penerima ON tb_terima.noktp=tb_penerima.noktp JOIN tb_barang ON tb_terimabarang.kodebarang=tb_barang.kodebarang");
		while ($row=$getdata->fetch_array()) {
			echo "<tr class='text-center'>
			<td>".$row['kodeterima']."</td>";
			$tanggal=date('d F Y', strtotime($row['tanggal']));
			echo "
			<td>".$tanggal."</td>
			<td>".$row['noktp']."</td>
			<td>".$row['nama']."</td>
			<td>".$row['jabatan']."</td>
			<td>".$row['kodebarang']."</td>
			<td>".$row['namabarang']."</td>
			<td>".$row['jml']."</td>
			<td>".$row['harga']."</td>
			<td>".$row['subtotal']."</td>
			</tr>";
		}

	?>
</tbody>
</table>
</div>