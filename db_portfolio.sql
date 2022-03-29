-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2021 at 03:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nidn` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `keahlian` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nidn`, `nik`, `nama_dosen`, `keahlian`, `password`) VALUES
('D1', '1877154678765124', 'Ahmad', 'Programmer Mobile', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon_wa` varchar(20) NOT NULL,
  `ig` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`nim`, `nama_mhs`, `email`, `alamat`, `telepon_wa`, `ig`, `foto`, `password`) VALUES
('M1', 'Arman', 'arman@gmail.com', 'Jl. Ikan Nila, USA', '086512347654', 'arman.id', 'logo.jpeg', '123'),
('M2', 'Amin', 'amin@gmail.com', 'Depok', '081312', '@amin', 'autor3.jpeg', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_portfolio`
--

CREATE TABLE `tb_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tahun_karya` int(4) NOT NULL,
  `deskripsi_karya` text NOT NULL,
  `bidang_keahlian` varchar(50) NOT NULL,
  `foto_karya1` varchar(50) DEFAULT NULL,
  `foto_karya2` varchar(50) DEFAULT NULL,
  `foto_karya3` varchar(50) DEFAULT NULL,
  `foto_karya4` varchar(50) DEFAULT NULL,
  `file_paper` varchar(50) DEFAULT NULL,
  `link_video` varchar(50) DEFAULT NULL,
  `link_paper` varchar(50) DEFAULT NULL,
  `dosen_pem1` varchar(20) DEFAULT NULL,
  `dosen_pem2` varchar(20) DEFAULT NULL,
  `sertifikat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
