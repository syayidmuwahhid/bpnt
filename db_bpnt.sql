-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2021 pada 05.07
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpnt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblogin`
--

CREATE TABLE `tblogin` (
  `iduser` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblogin`
--

INSERT INTO `tblogin` (`iduser`, `username`, `password`, `namauser`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kodebarang` varchar(30) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `satuan` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kodebarang`, `namabarang`, `satuan`, `jumlah`) VALUES
('003', 'minyak', 'liter', 100),
('132', 'lasjd', '1', 12093);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_distribusi`
--

CREATE TABLE `tb_distribusi` (
  `nodistribusi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kodebarang` varchar(30) NOT NULL,
  `stokawal` bigint(20) NOT NULL,
  `stokakhir` bigint(20) NOT NULL,
  `sisastok` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_distribusi`
--

INSERT INTO `tb_distribusi` (`nodistribusi`, `tanggal`, `kodebarang`, `stokawal`, `stokakhir`, `sisastok`) VALUES
(92, '2021-04-08', '003', 0, 1, 0),
(123, '2021-04-08', '003', 8, 2, 0),
(983, '2021-04-14', '132', 0, 12387, -294),
(984, '2021-04-07', '003', 6, 3, 0),
(985, '2021-04-16', '003', 3, 1, 0),
(986, '2021-04-17', '003', 7, 3, 0),
(987, '2021-04-01', '003', 4, 0, 4),
(988, '2021-04-01', '003', 4, 1, 3),
(989, '2021-04-02', '003', 3, 1, 0),
(990, '2021-04-07', '003', 2, 90, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerima`
--

CREATE TABLE `tb_penerima` (
  `noktp` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` text NOT NULL,
  `alamat` text NOT NULL,
  `tlp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penerima`
--

INSERT INTO `tb_penerima` (`noktp`, `nama`, `jabatan`, `alamat`, `tlp`) VALUES
('320206746862666', 'asep sukandar', 'presiden', 'kp.pasir jati', '081523874312'),
('3209826472821382', 'ROMEO VALENTINO', 'aksjd', 'khkhad739ajndj. .asd', '081523874312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_terima`
--

CREATE TABLE `tb_terima` (
  `kodeterima` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `noktp` varchar(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_terima`
--

INSERT INTO `tb_terima` (`kodeterima`, `tanggal`, `noktp`, `total`) VALUES
('123', '2021-04-13', '320206746862666', 0),
('1231', '2021-04-13', '3209826472821382', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_terimabarang`
--

CREATE TABLE `tb_terimabarang` (
  `idbarang` int(11) NOT NULL,
  `kodebarang` varchar(30) NOT NULL,
  `jml` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `kodeterima` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_terimabarang`
--

INSERT INTO `tb_terimabarang` (`idbarang`, `kodebarang`, `jml`, `harga`, `subtotal`, `kodeterima`) VALUES
(11, '003', 1000, 1, 1000, '123'),
(12, '132', 2000, 2, 4000, '123'),
(13, '003', 1000, 1, 1000, '123'),
(14, '132', 2000, 2, 4000, '123'),
(15, '003', 1000, 1, 1000, '123'),
(16, '003', 2, 1, 2, '1231');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indeks untuk tabel `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  ADD PRIMARY KEY (`nodistribusi`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indeks untuk tabel `tb_penerima`
--
ALTER TABLE `tb_penerima`
  ADD PRIMARY KEY (`noktp`);

--
-- Indeks untuk tabel `tb_terima`
--
ALTER TABLE `tb_terima`
  ADD PRIMARY KEY (`kodeterima`),
  ADD KEY `noktp` (`noktp`);

--
-- Indeks untuk tabel `tb_terimabarang`
--
ALTER TABLE `tb_terimabarang`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  MODIFY `nodistribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991;

--
-- AUTO_INCREMENT untuk tabel `tb_terimabarang`
--
ALTER TABLE `tb_terimabarang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  ADD CONSTRAINT `tb_distribusi_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `tb_barang` (`kodebarang`);

--
-- Ketidakleluasaan untuk tabel `tb_terima`
--
ALTER TABLE `tb_terima`
  ADD CONSTRAINT `tb_terima_ibfk_1` FOREIGN KEY (`noktp`) REFERENCES `tb_penerima` (`noktp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
