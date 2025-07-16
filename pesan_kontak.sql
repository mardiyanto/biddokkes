-- Tabel untuk menyimpan pesan kontak dari frontend
CREATE TABLE IF NOT EXISTS `pesan_kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('baru','dibaca','dibalas') DEFAULT 'baru',
  `tanggal_kirim` timestamp DEFAULT CURRENT_TIMESTAMP,
  `tanggal_dibaca` timestamp NULL DEFAULT NULL,
  `tanggal_dibalas` timestamp NULL DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk optimasi query
CREATE INDEX idx_status ON pesan_kontak(status);
CREATE INDEX idx_tanggal_kirim ON pesan_kontak(tanggal_kirim);
CREATE INDEX idx_email ON pesan_kontak(email);

-- Sample data untuk testing
INSERT INTO `pesan_kontak` (`nama`, `email`, `telepon`, `subjek`, `pesan`, `status`, `tanggal_kirim`) VALUES
('Ahmad Rizki', 'ahmad@email.com', '081234567890', 'Informasi Umum', 'Saya ingin bertanya tentang layanan kesehatan yang tersedia di Biddokkes POLRI. Apakah ada layanan pemeriksaan kesehatan umum?', 'baru', NOW()),
('Siti Nurhaliza', 'siti@email.com', '081234567891', 'Layanan Kesehatan', 'Mohon informasi tentang jadwal dokter spesialis jantung. Kapan bisa melakukan konsultasi?', 'dibaca', NOW() - INTERVAL 1 DAY),
('Budi Santoso', 'budi@email.com', '081234567892', 'Pendaftaran', 'Saya ingin mendaftar untuk pemeriksaan kesehatan rutin. Bagaimana prosedurnya?', 'dibalas', NOW() - INTERVAL 2 DAY),
('Dewi Sartika', 'dewi@email.com', '081234567893', 'Keluhan', 'Ada keluhan tentang pelayanan di bagian pendaftaran. Mohon ditindaklanjuti.', 'baru', NOW() - INTERVAL 3 HOUR),
('Rudi Hermawan', 'rudi@email.com', '081234567894', 'Saran', 'Saran untuk meningkatkan pelayanan: mungkin bisa ditambah fasilitas online booking.', 'dibaca', NOW() - INTERVAL 1 HOUR); 