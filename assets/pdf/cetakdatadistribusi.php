<?php
	session_start();
	if (empty($_SESSION['username'])){
       echo "<script>window.location='../../index.php';</script>";
	}

// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(273,7,'LAPORAN DATA DISTRIBUSI',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(41,6,'No Distribusi',1,0,'C');
$pdf->Cell(38,6,'Tanggal',1,0,'C');
$pdf->Cell(48,6,'Kode Barang',1,0,'C');
$pdf->Cell(56,6,'Nama Barang',1,0,'C');
$pdf->Cell(28,6,'Stok Awal',1,0,'C');
$pdf->Cell(33,6,'Stok Akhir',1,0,'C');
$pdf->Cell(33,6,'Sisa Stok',1,1,'C');

$pdf->SetFont('Arial','',11);

include '../../admin/koneksi.php';
$getdata = mysqli_query($koneksi, "SELECT * FROM tb_distribusi JOIN tb_barang ON tb_distribusi.kodebarang=tb_barang.kodebarang");
while ($row = mysqli_fetch_array($getdata)){
	$tanggal=date('d F Y', strtotime($row['tanggal']));
    $pdf->Cell(41,6,$row['nodistribusi'],1,0,'C');
    $pdf->Cell(38,6,$tanggal,1,0,'C');
    $pdf->Cell(48,6,$row['kodebarang'],1,0,'C');
    $pdf->Cell(56,6,$row['namabarang'],1,0);
    $pdf->Cell(28,6,$row['stokawal'],1,0,'C'); 
    $pdf->Cell(33,6,$row['stokakhir'],1,0,'C');
    $pdf->Cell(33,6,$row['sisastok'],1,1,'C');
}

$pdf->Output('I','laporan Data Penerima');
?>