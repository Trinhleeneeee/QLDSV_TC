-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2014 at 04:05 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanlisinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `diemmonhoc`
--

CREATE TABLE IF NOT EXISTS `diemmonhoc` (
  `MaMH` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `MaSV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `diemlan1` int(11) NOT NULL,
  `diemlan2` int(11) NOT NULL,
  PRIMARY KEY (`MaMH`,`MaSV`),
  KEY `MaSV` (`MaSV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `diemmonhoc`
--

INSERT INTO `diemmonhoc` (`MaMH`, `MaSV`, `diemlan1`, `diemlan2`) VALUES
('MAT', 'C1122H047', 3, 9),
('MAT', 'C44335', 4, 10),
('XDPM', 'C1122H047', 2, 6),
('XDPM', 'C44335', 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE IF NOT EXISTS `lop` (
  `Malop` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `Tenlop` text COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`Malop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`Malop`, `Tenlop`) VALUES
('CNTT', '22.6');

-- --------------------------------------------------------

--
-- Table structure for table `lopsinhvien`
--

CREATE TABLE IF NOT EXISTS `lopsinhvien` (
  `Malop` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `MaSV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`Malop`,`MaSV`),
  KEY `MaSV` (`MaSV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `lopsinhvien`
--

INSERT INTO `lopsinhvien` (`Malop`, `MaSV`) VALUES
('CNTT', ''),
('', 'C1122H047'),
('', 'C44335');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE IF NOT EXISTS `monhoc` (
  `MaMH` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenMH` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodonvihoctrinh` int(11) NOT NULL,
  PRIMARY KEY (`MaMH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MaMH`, `TenMH`, `sodonvihoctrinh`) VALUES
('MAT', 'ToÃ¡n Rá»i Ráº¡c', 3),
('XDPM', 'XÃ¢y dá»±ng pháº§n m', 4);

-- --------------------------------------------------------

--
-- Table structure for table `thongtinsinhvien`
--

CREATE TABLE IF NOT EXISTS `thongtinsinhvien` (
  `MaSV` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `Hoten` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Ngaysinh` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `Gioitinh` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `Quequan` text COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`MaSV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `thongtinsinhvien`
--

INSERT INTO `thongtinsinhvien` (`MaSV`, `Hoten`, `Ngaysinh`, `Gioitinh`, `Quequan`) VALUES
('C1122H047', 'Nguyá»…n Tháº¿ Anh', '10/07/1991', '', ''),
('C44335', 'Nguyá»…n Minh ChÃ¢u', '7/1990', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `SoTT` int(11) NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`SoTT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`SoTT`, `Username`, `Password`, `Email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');


CREATE TABLE IF NOT EXISTS `user` (
  `SoTT` int(11) NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`SoTT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

