<?php
	session_start();
	if (empty($_SESSION['username'])){
       echo "<script>window.location='../../index.php';</script>";
	}
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,7,'LAPORAN DATA BARANG',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'Kode Barang',1,0,'C');
$pdf->Cell(85,6,'Nama Barang',1,0,'C');
$pdf->Cell(27,6,'Satuan',1,0,'C');
$pdf->Cell(25,6,'Jumlah',1,1,'C');

$pdf->SetFont('Arial','',12);

include '../../admin/koneksi.php';
$getdata = mysqli_query($koneksi, "select * from tb_barang");
while ($row = mysqli_fetch_array($getdata)){
    $pdf->Cell(50,6,$row['kodebarang'],1,0);
    $pdf->Cell(85,6,$row['namabarang'],1,0);
    $pdf->Cell(27,6,$row['satuan'],1,0);
    $pdf->Cell(25,6,$row['jumlah'],1,1); 
}

$pdf->Output('I','Laporan Data Barang');
?>