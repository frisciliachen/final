-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Des 2016 pada 12.24
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelbarang`
--

CREATE TABLE `tabelbarang` (
  `kode` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelbarang`
--

INSERT INTO `tabelbarang` (`kode`, `nama`, `harga`, `stok`, `gambar`) VALUES
(23, 'PAN Y ACEITE', 30, 0, 'gambar/gambar11.png'),
(24, 'ACEITUNAS', 50, 0, 'gambar/gambar12.png'),
(25, 'TORTILLA DE PATATAS', 60, 0, 'gambar/gambar13.png'),
(26, 'BRUSELAS', 80, 0, 'gambar/gambar14.png'),
(27, 'POLLO AL AJILL', 80, 0, 'gambar/gambar15.png'),
(28, 'COSTILLAS', 90, 0, 'gambar/gambar16.png'),
(29, 'GAMBAS A LA PARILLA', 120, 0, 'gambar/gambar17.png'),
(30, 'CALAMARES FRITOS', 80, 0, 'gambar/gambar18.png'),
(31, 'REMOLACHA', 90, 0, 'gambar/gambar19.png'),
(32, 'COL RIZADA', 80, 0, 'gambar/gambar20.png'),
(33, 'TORTA DE ACEITE CON HELADO', 80, 0, 'gambar/gambar1.png'),
(34, 'PASTEL DE CHOCOLATE', 80, 0, 'gambar/gambar2.png'),
(35, 'CREMA CATALANA', 90, 0, 'gambar/gambar3.png'),
(36, 'CHURROS CON CHOCOLATE', 70, 0, 'gambar/gambar4.png'),
(37, 'QUESOS', 250, 0, 'gambar/gambar5.png'),
(38, 'Ponce Buena Pinta Moravia Agria/Garnacha, Manchuela', 130, 0, 'gambar/gambar21.png'),
(39, 'Urban Legend Cellars Barbera Rosado, Clarksburg California', 80, 0, 'gambar/gambar22.png'),
(40, 'Urban Legend Cellars Tempranillo, Clarksburg California (red)', 80, 0, 'gambar/gambar23.png'),
(41, 'Arabako Xarmant Hondarribi Zuri, Txakolina', 110, 0, 'gambar/gambar24.png'),
(42, 'Equipo Navazos Ovni Pedro Ximenez, Montilla-Moriles', 110, 0, 'gambar/gambar25.png'),
(43, 'Marc Isart La MaldiciÃ³n Tempranillo/Malvar, Madrid', 100, 0, 'gambar/gambar26.png'),
(44, 'Ermita de San Felices Reserva Tempranillo, Rioja', 170, 0, 'gambar/gambar27.png'),
(45, 'Marc Isart El Malvar de la Olla Malvar, Madrid (Orange)', 140, 0, 'gambar/gambar28.png'),
(46, 'NV Nit Del Foc Brut Nature Macabeo/Chardonnay, Cava', 100, 0, 'gambar/gambar29.png'),
(47, 'Adega Algueira Mencia, Ribeira Sacra', 120, 0, 'gambar/gambar30.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelpesan`
--

CREATE TABLE `tabelpesan` (
  `nomor` int(10) NOT NULL,
  `iduser` varchar(255) NOT NULL,
  `idtransaksi` varchar(20) NOT NULL,
  `idproduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelpesan`
--

INSERT INTO `tabelpesan` (`nomor`, `iduser`, `idtransaksi`, `idproduk`, `jumlah`, `harga`) VALUES
(1, '', '161120091443', 46, 1, 100),
(2, '', '161120091443', 44, 5, 850),
(5, 'agusbambang', '161202121007', 47, 1, 120),
(6, 'agusbambang', '161202121007', 35, 1, 90),
(7, 'budi', '161202121536', 46, 1, 100),
(8, 'budi', '161202121536', 40, 1, 80),
(9, 'budi', '161202121956', 45, 1, 140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelbarang`
--
ALTER TABLE `tabelbarang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tabelpesan`
--
ALTER TABLE `tabelpesan`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelbarang`
--
ALTER TABLE `tabelbarang`
  MODIFY `kode` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tabelpesan`
--
ALTER TABLE `tabelpesan`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
