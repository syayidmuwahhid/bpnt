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
$pdf->Cell(190,7,'LAPORAN DATA PENERIMA',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,6,'No KTP',1,0,'C');
$pdf->Cell(48,6,'Nama',1,0,'C');
$pdf->Cell(20,6,'Jabatan',1,0,'C');
$pdf->Cell(55,6,'Alamat',1,0,'C');
$pdf->Cell(32,6,'Tlp',1,1,'C');

$pdf->SetFont('Arial','',10);

include '../../admin/koneksi.php';
$getdata = mysqli_query($koneksi, "select * from tb_penerima");
while ($row = mysqli_fetch_array($getdata)){
    $pdf->Cell(35,6,$row['noktp'],1,0);
    $pdf->Cell(48,6,$row['nama'],1,0);
    $pdf->Cell(20,6,$row['jabatan'],1,0);
    $pdf->Cell(55,6,$row['alamat'],1,0); 
    $pdf->Cell(32,6,$row['tlp'],1,1); 
}

$pdf->Output('I','laporan Data Penerima');
?>