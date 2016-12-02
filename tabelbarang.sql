-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2010 at 08:12 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabelbarang`
--

CREATE TABLE `tabelbarang` (
  `kode` int(5) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY  (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tabelbarang`
--

INSERT INTO `tabelbarang` (`kode`, `nama`, `harga`, `stok`, `gambar`) VALUES
(1, 'Pakaian #1', 20000, 5, 'gambar/gambar1.jpg'),
(2, 'Pakaian #2', 30000, 20, 'gambar/gambar2.jpg'),
(3, 'Pakaian #3', 120000, 10, 'gambar/gambar3.jpg'),
(4, 'Pakaian #4', 30000, 2, 'gambar/gambar4.jpg'),
(5, 'Pakaian #5', 200000, 5, 'gambar/gambar5.jpg');
