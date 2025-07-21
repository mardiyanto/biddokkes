-- Tabel untuk menyimpan halaman statis
CREATE TABLE IF NOT EXISTS `halaman` (
  `id_halaman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT 'Admin',
  `tanggal_publish` date DEFAULT CURRENT_DATE,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_halaman`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample data untuk testing
INSERT INTO `halaman` (`judul`, `slug`, `konten`, `gambar`, `penulis`, `tanggal_publish`) VALUES
('Profil Biddokkes POLRI', 'profil', '<h2>Tentang Biddokkes POLRI</h2>
<p>Biddokkes POLRI (Bidang Kedokteran dan Kesehatan Kepolisian Republik Indonesia) adalah unit yang bertanggung jawab atas layanan kesehatan bagi anggota Polri dan masyarakat.</p>

<h3>Visi</h3>
<p>Menjadi pusat layanan kesehatan terdepan yang profesional dan terpercaya dalam mendukung tugas Polri.</p>

<h3>Misi</h3>
<ul>
<li>Menyelenggarakan layanan kesehatan yang berkualitas</li>
<li>Mengembangkan sumber daya manusia kesehatan yang profesional</li>
<li>Meningkatkan fasilitas dan teknologi kesehatan</li>
<li>Memberikan pelayanan kesehatan yang terjangkau</li>
</ul>

<h3>Layanan Kami</h3>
<p>Biddokkes POLRI menyediakan berbagai layanan kesehatan termasuk:</p>
<ul>
<li>Layanan rawat jalan</li>
<li>Layanan rawat inap</li>
<li>Layanan gawat darurat</li>
<li>Layanan laboratorium</li>
<li>Layanan radiologi</li>
<li>Layanan farmasi</li>
</ul>', 'profil-biddokkes.jpg', 'Admin', '2024-01-01'),

('Sejarah Biddokkes', 'sejarah', '<h2>Sejarah Biddokkes POLRI</h2>
<p>Biddokkes POLRI memiliki sejarah panjang dalam memberikan layanan kesehatan bagi anggota Polri dan masyarakat Indonesia.</p>

<h3>Awal Mula</h3>
<p>Biddokkes POLRI didirikan dengan tujuan untuk memberikan layanan kesehatan yang berkualitas bagi anggota Polri dalam menjalankan tugasnya.</p>

<h3>Perkembangan</h3>
<p>Seiring berjalannya waktu, Biddokkes POLRI terus berkembang dan meningkatkan layanan kesehatannya untuk memberikan pelayanan terbaik.</p>

<h3>Pencapaian</h3>
<p>Biddokkes POLRI telah berhasil memberikan layanan kesehatan yang berkualitas dan terpercaya selama bertahun-tahun.</p>', 'sejarah-biddokkes.jpg', 'Admin', '2024-01-01'),

('Struktur Organisasi', 'struktur', '<h2>Struktur Organisasi Biddokkes POLRI</h2>
<p>Biddokkes POLRI memiliki struktur organisasi yang jelas untuk menjalankan tugas dan fungsinya dengan baik.</p>

<h3>Kepala Biddokkes</h3>
<p>Dibantu oleh Wakil Kepala dan sejumlah staf untuk mengelola berbagai aspek layanan kesehatan.</p>

<h3>Divisi-divisi</h3>
<ul>
<li>Divisi Pelayanan Medis</li>
<li>Divisi Pelayanan Keperawatan</li>
<li>Divisi Pelayanan Penunjang</li>
<li>Divisi Pelayanan Farmasi</li>
<li>Divisi Pelayanan Administrasi</li>
</ul>

<h3>Unit-unit Kerja</h3>
<p>Setiap divisi memiliki unit-unit kerja yang spesifik untuk memberikan layanan yang optimal.</p>', 'struktur-organisasi.jpg', 'Admin', '2024-01-01'),

('Fasilitas Kesehatan', 'fasilitas', '<h2>Fasilitas Kesehatan Biddokkes POLRI</h2>
<p>Biddokkes POLRI dilengkapi dengan fasilitas kesehatan modern untuk memberikan layanan terbaik.</p>

<h3>Fasilitas Medis</h3>
<ul>
<li>Ruang pemeriksaan dokter</li>
<li>Ruang rawat inap</li>
<li>Ruang operasi</li>
<li>Ruang gawat darurat</li>
<li>Ruang ICU</li>
</ul>

<h3>Fasilitas Penunjang</h3>
<ul>
<li>Laboratorium</li>
<li>Radiologi</li>
<li>Farmasi</li>
<li>Ruang tunggu</li>
<li>Parkir kendaraan</li>
</ul>

<h3>Teknologi Modern</h3>
<p>Dilengkapi dengan peralatan medis modern untuk mendukung diagnosis dan pengobatan yang akurat.</p>', 'fasilitas-kesehatan.jpg', 'Admin', '2024-01-01'); 