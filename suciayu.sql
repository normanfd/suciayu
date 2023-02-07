-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2023 pada 02.33
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suciayu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbarang`
--

CREATE TABLE `tblbarang` (
  `Kode_Barang` int(20) NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Harga_Jual` int(11) NOT NULL,
  `Harga_Beli` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Satuan` int(11) NOT NULL,
  `Kode_suplier` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblbarang`
--

INSERT INTO `tblbarang` (`Kode_Barang`, `Nama_Barang`, `Harga_Jual`, `Harga_Beli`, `Stok`, `Satuan`, `Kode_suplier`) VALUES
(1, 'Pakaian', 10000, 5000, 50, 15, 111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkasir`
--

CREATE TABLE `tblkasir` (
  `NIK` varchar(8) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Jenkel` varchar(1) NOT NULL,
  `Tempat_lahir` varchar(15) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblkasir`
--

INSERT INTO `tblkasir` (`NIK`, `Nama`, `Jenkel`, `Tempat_lahir`, `Tanggal_lahir`, `Alamat`) VALUES
('12345678', 'Ayu', 'P', 'Jakarta', '2023-02-01', 'asdsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsuplier`
--

CREATE TABLE `tblsuplier` (
  `Kode_suplier` int(10) NOT NULL,
  `Nama_suplier` varchar(25) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblsuplier`
--

INSERT INTO `tblsuplier` (`Kode_suplier`, `Nama_suplier`, `Alamat`, `Telepon`) VALUES
(111, 'Tami', 'Jakarta', '00000897');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `idtransaksi` int(8) NOT NULL,
  `NIK` varchar(8) NOT NULL,
  `Kode_Barang` int(20) NOT NULL,
  `Tanggal_pembelian` datetime NOT NULL,
  `Jumlah_barang` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`idtransaksi`, `NIK`, `Kode_Barang`, `Tanggal_pembelian`, `Jumlah_barang`, `Total`) VALUES
(1, '12345678', 1, '2023-02-06 04:00:53', 9, 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `username` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=admin\r\n2=pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`username`, `password`, `role`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 1),
('cust', '202cb962ac59075b964b07152d234b70', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`Kode_Barang`),
  ADD KEY `Kode_suplier` (`Kode_suplier`);

--
-- Indeks untuk tabel `tblkasir`
--
ALTER TABLE `tblkasir`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `tblsuplier`
--
ALTER TABLE `tblsuplier`
  ADD PRIMARY KEY (`Kode_suplier`);

--
-- Indeks untuk tabel `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `Kode_Barang` (`Kode_Barang`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblbarang`
--
ALTER TABLE `tblbarang`
  MODIFY `Kode_Barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `idtransaksi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD CONSTRAINT `tblbarang_ibfk_1` FOREIGN KEY (`Kode_suplier`) REFERENCES `tblsuplier` (`Kode_suplier`);

--
-- Ketidakleluasaan untuk tabel `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD CONSTRAINT `tbltransaksi_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tblkasir` (`NIK`),
  ADD CONSTRAINT `tbltransaksi_ibfk_2` FOREIGN KEY (`Kode_Barang`) REFERENCES `tblbarang` (`Kode_Barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
