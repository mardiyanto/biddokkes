-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2025 at 07:05 AM
-- Server version: 10.4.32-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dokkes`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori_download`
--

CREATE TABLE `sub_kategori_download` (
  `id_sub_kategori_download` int(11) NOT NULL,
  `id_kategori_download` int(11) NOT NULL,
  `nama_sub_kategori_download` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_kategori_download`
--

INSERT INTO `sub_kategori_download` (`id_sub_kategori_download`, `id_kategori_download`, `nama_sub_kategori_download`, `created_at`) VALUES
(1, 1, 'Surat Keputusan', '2025-08-01 07:05:00'),
(2, 1, 'Peraturan', '2025-08-01 07:05:00'),
(3, 1, 'Formulir', '2025-08-01 07:05:00'),
(4, 3, 'Produk Intelijen', '2025-08-01 07:05:00'),
(5, 3, 'Produk Deteksi', '2025-08-01 07:05:00'),
(6, 5, 'Produk REN A', '2025-08-01 07:05:00'),
(7, 5, 'Produk REN B', '2025-08-01 07:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_kategori_download`
--
ALTER TABLE `sub_kategori_download`
  ADD PRIMARY KEY (`id_sub_kategori_download`),
  ADD KEY `id_kategori_download` (`id_kategori_download`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_kategori_download`
--
ALTER TABLE `sub_kategori_download`
  MODIFY `id_sub_kategori_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_kategori_download`
--
ALTER TABLE `sub_kategori_download`
  ADD CONSTRAINT `sub_kategori_download_ibfk_1` FOREIGN KEY (`id_kategori_download`) REFERENCES `kategori_download` (`id_kategori_download`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 