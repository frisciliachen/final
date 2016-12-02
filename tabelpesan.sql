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
-- Table structure for table `tabelpesan`
--

CREATE TABLE `tabelpesan` (
  `nomor` int(10) NOT NULL auto_increment,
  `idtransaksi` varchar(20) NOT NULL,
  `idproduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` double NOT NULL,
  PRIMARY KEY  (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabelpesan`
--

