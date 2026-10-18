-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2026 at 05:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bidang` enum('finance','marketing','hr') NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `email`, `bidang`, `alamat`) VALUES
(1, 'Dendy Kurniawan', 'dendy@gmail.com', 'marketing', 'Kendal'),
(2, 'Antoni', 'antoni@gmail.com', 'marketing', 'Semarang'),
(3, 'Bagas', 'bagas@gmail.com', 'hr', 'Ungaran'),
(4, 'Carla', 'carla@gmail.com', 'hr', 'Siliwangi'),
(5, 'Deviana', 'devi@gmail.com', 'marketing', 'Surabaya'),
(6, 'Eko Patrio', 'eko@gmail.com', 'marketing', 'Semarang'),
(7, 'Farida', 'farida@gmail.com', 'marketing', 'Surakarta'),
(8, 'Gabriel', 'gabriel@gmail.com', 'marketing', 'Kendal'),
(9, 'Haryanto', 'haryanto@gmail.com', 'hr', 'Ungaran'),
(10, 'Ihsan', 'ihsan@gmail.com', 'hr', 'Wolosi'),
(11, 'Jesika', 'jesika@gmail.com', 'hr', 'Batang'),
(13, 'Marwah', 'Marwah@gmail.com', 'hr', 'Bandung'),
(16, 'Musthofa', 'Musthofa@gmail.com', 'finance', 'Jogja'),
(17, 'Khana', 'Khana@gmail.com', 'finance', 'Jakarta'),
(18, 'Linawati', 'Lina@gmail.com', 'finance', 'Pontianak'),
(20, 'Kusuma', 'Kusuma@gmail.com', 'finance', 'Bogor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
