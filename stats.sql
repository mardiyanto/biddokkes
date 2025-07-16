-- Tabel untuk menyimpan Quick Stats
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `angka` varchar(50) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk optimasi query
CREATE INDEX idx_status ON stats(status);
CREATE INDEX idx_urutan ON stats(urutan);

-- Sample data untuk testing
INSERT INTO `stats` (`judul`, `angka`, `ikon`, `deskripsi`, `urutan`, `status`) VALUES
('Dokter Spesialis', '150+', 'fas fa-user-md', 'Dokter spesialis yang siap melayani', 1, 'aktif'),
('Rumah Sakit', '25+', 'fas fa-hospital', 'Rumah sakit yang tersebar di seluruh Indonesia', 2, 'aktif'),
('Pasien Dilayani', '50K+', 'fas fa-users', 'Pasien yang telah kami layani', 3, 'aktif'),
('Tahun Pengalaman', '30+', 'fas fa-award', 'Tahun pengalaman dalam layanan kesehatan', 4, 'aktif'),
('Fasilitas Modern', '100+', 'fas fa-medical-kit', 'Fasilitas kesehatan modern', 5, 'nonaktif'),
('Tim Medis', '500+', 'fas fa-user-nurse', 'Tim medis profesional', 6, 'nonaktif'); 