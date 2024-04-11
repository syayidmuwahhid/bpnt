<?php 
// koneksi database
include '../admin/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from tb_terima where kodeterima='$id'");
$hapus2=mysqli_query($koneksi,"delete from tb_terimabarang where kodeterima='$id'");

// mengalihkan halaman kembali ke index.php
if($hapus AND $hapus2){
	header("location:../index.php?pg=terima");
}

?>