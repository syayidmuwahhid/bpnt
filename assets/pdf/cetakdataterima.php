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
$pdf->Cell(273,7,'LAPORAN DATA TERIMA',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(28,6,'Kode Terima',1,0,'C');
$pdf->Cell(25,6,'Tanggal',1,0,'C');
$pdf->Cell(35,6,'No KTP',1,0,'C');
$pdf->Cell(42,6,'Nama',1,0,'C');
$pdf->Cell(15,6,'Jabatan',1,0,'C');
$pdf->Cell(20,6,'Jumlah',1,0,'C');
$pdf->Cell(20,6,'Harga',1,0,'C');
$pdf->Cell(20,6,'Ongkos',1,0,'C');
$pdf->Cell(20,6,'Potongan',1,0,'C');
$pdf->Cell(20,6,'Sub Total',1,0,'C');
$pdf->Cell(32,6,'Ket',1,1,'C');

$pdf->SetFont('Arial','',10);

include '../../admin/koneksi.php';
$getdata = mysqli_query($koneksi, "select * from tb_terima JOIN tb_penerima ON tb_terima.noktp=tb_penerima.noktp");
while ($row = mysqli_fetch_array($getdata)){
	$tanggal=date('d F Y', strtotime($row['tanggal']));
    $pdf->Cell(28,6,$row['kodeterima'],1,0);
    $pdf->Cell(25,6,$tanggal,1,0);
    $pdf->Cell(35,6,$row['noktp'],1,0);
    $pdf->Cell(42,6,$row['nama'],1,0);
    $pdf->Cell(15,6,$row['jabatan'],1,0);
    $pdf->Cell(20,6,$row['jumlah'],1,0); 
    $pdf->Cell(20,6,$row['harga'],1,0);
    $pdf->Cell(20,6,$row['ongkos'],1,0);
    $pdf->Cell(20,6,$row['potongan'],1,0);
    $pdf->Cell(20,6,$row['subtotal'],1,0);
    $pdf->Cell(32,6,$row['ket'],1,1); 
}

$pdf->Output('I','laporan Data Penerima');
?>