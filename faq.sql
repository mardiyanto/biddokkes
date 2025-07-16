-- Tabel untuk menyimpan FAQ (Frequently Asked Questions)
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk optimasi query
CREATE INDEX idx_status ON faq(status);
CREATE INDEX idx_urutan ON faq(urutan);

-- Sample data untuk testing
INSERT INTO `faq` (`pertanyaan`, `jawaban`, `urutan`, `status`) VALUES
('Bagaimana cara mendaftar untuk layanan kesehatan di Biddokkes POLRI?', 'Untuk mendaftar layanan kesehatan, Anda dapat menghubungi kami melalui telepon atau datang langsung ke kantor kami. Tim kami akan membantu proses pendaftaran dan memberikan informasi lengkap tentang layanan yang tersedia.', 1, 'aktif'),
('Apakah layanan kesehatan tersedia 24 jam?', 'Layanan darurat tersedia 24 jam untuk kasus-kasus tertentu. Namun untuk layanan umum, kami beroperasi sesuai jam kerja yang telah ditentukan. Silakan hubungi kami untuk informasi lebih lanjut.', 2, 'aktif'),
('Dokter spesialis apa saja yang tersedia?', 'Kami memiliki berbagai dokter spesialis termasuk dokter umum, spesialis penyakit dalam, spesialis bedah, spesialis jantung, spesialis mata, dan lainnya. Silakan hubungi kami untuk jadwal konsultasi.', 3, 'aktif'),
('Bagaimana cara mengajukan keluhan atau saran?', 'Anda dapat mengajukan keluhan atau saran melalui form kontak di halaman ini, email, atau datang langsung ke kantor kami. Tim kami akan merespons dan menindaklanjuti setiap keluhan atau saran yang masuk.', 4, 'aktif'),
('Apakah ada layanan pemeriksaan laboratorium?', 'Ya, kami menyediakan layanan pemeriksaan laboratorium lengkap untuk berbagai jenis pemeriksaan kesehatan. Silakan hubungi kami untuk informasi jadwal dan jenis pemeriksaan yang tersedia.', 5, 'aktif'),
('Bagaimana prosedur pendaftaran online?', 'Untuk pendaftaran online, Anda dapat mengakses sistem pendaftaran kami melalui website atau aplikasi mobile. Silakan siapkan dokumen yang diperlukan sebelum melakukan pendaftaran.', 6, 'aktif'); 