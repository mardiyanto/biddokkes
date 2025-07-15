-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2025 at 08:16 AM
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
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(11) NOT NULL,
  `id_kategori_download` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `download_count` int(11) DEFAULT 0,
  `nama_file` varchar(255) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `tipe_file` varchar(50) DEFAULT NULL,
  `hits` int(11) DEFAULT 0,
  `tanggal_upload` date DEFAULT curdate(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `id_kategori_download`, `judul`, `deskripsi`, `download_count`, `nama_file`, `ukuran_file`, `tipe_file`, `hits`, `tanggal_upload`, `created_at`, `updated_at`) VALUES
(3, 1, 'RESTRA', 'FUNGSI DAN JABATAN', 0, '1752499044_5b7b5fc16b1e2884c6e0.pdf', 2082728, 'pdf', 0, '2025-07-14', '2025-07-14 20:17:24', '2025-07-14 20:17:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`),
  ADD KEY `id_kategori` (`id_kategori_download`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `download`
--
ALTER TABLE `download`
  ADD CONSTRAINT `download_ibfk_1` FOREIGN KEY (`id_kategori_download`) REFERENCES `kategori_download` (`id_kategori_download`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
