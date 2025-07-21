-- Tabel untuk Checkerboard Carousel Section
CREATE TABLE `checkerboard_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(255) NOT NULL,
  `deskripsi` text,
  `ikon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data awal untuk Checkerboard Carousel
INSERT INTO `checkerboard_carousel` (`nama_layanan`, `deskripsi`, `ikon`, `slug`, `link`, `urutan`, `status`) VALUES
('Poli Jantung', 'Layanan spesialis jantung dengan teknologi modern dan dokter berpengalaman', 'fas fa-heartbeat', 'poli-jantung', '/layanan/poli-jantung', 1, 'aktif'),
('Poli Gigi', 'Layanan kesehatan gigi dan mulut dengan peralatan modern', 'fas fa-tooth', 'poli-gigi', '/layanan/poli-gigi', 2, 'aktif'),
('Poli Anak', 'Layanan kesehatan anak dengan pendekatan ramah anak', 'fas fa-baby', 'poli-anak', '/layanan/poli-anak', 3, 'aktif'),
('Poli Umum', 'Layanan kesehatan umum untuk semua usia', 'fas fa-user-md', 'poli-umum', '/layanan/poli-umum', 4, 'aktif'),
('Laboratorium', 'Layanan pemeriksaan laboratorium dengan akurasi tinggi', 'fas fa-flask', 'laboratorium', '/layanan/laboratorium', 5, 'aktif'),
('Radiologi', 'Layanan pemeriksaan radiologi dengan teknologi canggih', 'fas fa-x-ray', 'radiologi', '/layanan/radiologi', 6, 'aktif'),
('Farmasi', 'Layanan apotek dengan obat-obatan berkualitas', 'fas fa-pills', 'farmasi', '/layanan/farmasi', 7, 'aktif'),
('IGD', 'Layanan gawat darurat 24 jam', 'fas fa-ambulance', 'igd', '/layanan/igd', 8, 'aktif'),
('Rawat Inap', 'Layanan rawat inap dengan kenyamanan maksimal', 'fas fa-bed', 'rawat-inap', '/layanan/rawat-inap', 9, 'aktif'),
('Konsultasi Online', 'Layanan konsultasi kesehatan secara online', 'fas fa-laptop-medical', 'konsultasi-online', '/layanan/konsultasi-online', 10, 'aktif'),
('Vaksinasi', 'Layanan vaksinasi untuk semua usia', 'fas fa-syringe', 'vaksinasi', '/layanan/vaksinasi', 11, 'aktif'),
('Poli Mata', 'Layanan kesehatan mata dengan teknologi terkini', 'fas fa-eye', 'poli-mata', '/layanan/poli-mata', 12, 'aktif'); 