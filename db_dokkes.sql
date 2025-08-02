-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_dokkes
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `view_count` int(11) DEFAULT 0,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `id_kategori` (`id_kategori`),
  KEY `idx_berita_slug` (`slug`),
  KEY `idx_berita_created_at` (`created_at`),
  CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (3,3,'Biddokkes Polda Lampung Aktif Berikan Layanan Kesehatan di Berbagai Kegiatan Masyarakat dan Institusi','biddokkes-polda-lampung-aktif-berikan-layanan-kesehatan-di-berbagai-kegiatan-masyarakat-dan-institusi',1,'Bandar Lampung, Juli 2025 — Bidang Kedokteran dan Kesehatan (Biddokkes) Polda Lampung terus menunjukkan kiprahnya dalam memberikan pelayanan kesehatan yang cepat, sigap, dan humanis di berbagai kegiatan besar, baik di tingkat daerah, nasional, maupun internasional. Komitmen Biddokkes dalam menjaga kesehatan masyarakat dan personel kepolisian terlihat jelas dari kehadiran mereka di berbagai lokasi strategis, termasuk event olahraga, bencana alam, hingga turnamen internal institusi.\r\n\r\nPada 21 Juni 2025, Biddokkes Polda Lampung turut ambil bagian dalam mendukung kelancaran Turnamen Catur Kapolda Cup 2025 yang digelar di Mapolda Lampung. Tim medis disiagakan untuk memberikan pelayanan kesehatan seperti pemeriksaan tekanan darah, pemberian vitamin, serta penanganan awal bagi peserta dan panitia yang mengalami keluhan ringan. Kegiatan ini menjadi salah satu bentuk dukungan kesehatan terhadap peningkatan semangat sportivitas dan kebugaran di lingkungan kepolisian.\r\n\r\nTidak hanya di lingkup internal, Biddokkes juga hadir dalam kegiatan berskala internasional, yakni Kejuaraan Selancar Dunia WSL Krui Pro QS 6000 yang berlangsung di Pesisir Barat pada 10 hingga 17 Juni 2025. Selama kompetisi berlangsung, tim medis dari Biddokkes membuka pos kesehatan yang aktif melayani atlet selancar dari berbagai negara, panitia, hingga personel pengamanan. Total 60 orang telah dilayani selama event ini, termasuk pertolongan luka akibat gesekan karang, serta penanganan gejala seperti demam, pusing, dan kelelahan karena cuaca panas. Layanan ini mendapat apresiasi tinggi dari peserta maupun penyelenggara internasional.\r\n\r\nSelain kegiatan olahraga, peran Biddokkes juga sangat vital dalam situasi darurat seperti bencana alam. Pada 21 April 2025, saat banjir melanda kawasan Panjang, Bandar Lampung, Biddokkes Polda Lampung sigap mendirikan posko kesehatan darurat. Sebanyak 20 personel medis, termasuk tim DVI, diturunkan bersama lima kendaraan dinas untuk menjangkau warga terdampak. Mereka memberikan pelayanan pengobatan, pemeriksaan kesehatan, serta bantuan medis lainnya. Kegiatan ini merupakan bagian dari respons cepat Polri dalam memberikan perlindungan dan bantuan kemanusiaan di tengah musibah.\r\n\r\nKepala Biddokkes Polda Lampung menyatakan bahwa kehadiran tim medis di lapangan adalah bentuk nyata pelayanan prima kepada masyarakat. “Kami akan terus hadir di tengah masyarakat untuk memberikan bantuan kesehatan yang terbaik, kapan pun dan di mana pun dibutuhkan,” ujarnya.\r\n\r\nMelalui berbagai kegiatan tersebut, Biddokkes Polda Lampung membuktikan bahwa fungsi kesehatan dalam institusi kepolisian bukan sekadar pendukung, tetapi menjadi garda terdepan dalam menjaga keselamatan dan kesehatan seluruh lapisan masyarakat serta aparat di lapangan.','1752819477_1c815dca7fd3f450cc45.jpg','mardybest','2025-07-18','2025-07-18 13:17:58','2025-07-18 13:31:47'),(4,3,'Biddokkes Polda Lampung Siaga di Turnamen Catur Kapolda Cup 2025','biddokkes-polda-lampung-siaga-di-turnamen-catur-kapolda-cup-2025',0,'Bandar Lampung, 21 Juni 2025 — Dalam rangka mendukung kelancaran pelaksanaan Turnamen Catur Kapolda Cup 2025, Bidang Kedokteran dan Kesehatan (Biddokkes) Polda Lampung menerjunkan tim medis guna memberikan layanan kesehatan langsung di lokasi kegiatan.\r\n\r\nTurnamen yang berlangsung di Aula Polda Lampung ini diikuti oleh ratusan peserta dari berbagai kalangan, baik internal kepolisian maupun masyarakat umum. Biddokkes hadir dengan fasilitas layanan kesehatan seperti pemeriksaan tekanan darah, pemberian vitamin, dan penanganan medis ringan bagi peserta maupun panitia yang mengalami kelelahan atau gangguan kesehatan ringan.\r\n\r\nTim medis yang terdiri dari tenaga kesehatan terlatih disiagakan sejak pagi hari hingga turnamen berakhir. Langkah ini diambil untuk mengantisipasi kondisi darurat yang mungkin terjadi selama pertandingan berlangsung, mengingat sebagian peserta adalah usia lanjut maupun memiliki riwayat kesehatan tertentu.\r\n\r\nMenurut pernyataan resmi dari Kabid Humas Polda Lampung, kehadiran tim dari Biddokkes merupakan bagian dari standar pengamanan dan pelayanan dalam setiap kegiatan besar yang melibatkan masyarakat luas. \"Kami tidak hanya fokus pada pengamanan, tapi juga memastikan kesehatan seluruh peserta dan panitia terjaga dengan baik,\" ujarnya.\r\n\r\nTurnamen Catur Kapolda Cup 2025 ini tidak hanya menjadi ajang kompetisi, tetapi juga sarana mempererat silaturahmi dan meningkatkan budaya sportivitas di kalangan personel kepolisian dan masyarakat Lampung.\r\n\r\nDengan kehadiran Biddokkes, acara berlangsung lancar, aman, dan tanpa kendala berarti dari segi kesehatan. Hal ini menunjukkan kesiapsiagaan Biddokkes Polda Lampung dalam memberikan dukungan medis di setiap kegiatan strategis yang dilaksanakan di wilayah hukum Polda Lampung.','1752819554_e44e4ceb62f44c30d99a.jpg','mardybest','2025-07-18','2025-07-18 13:19:14','2025-07-18 13:31:19'),(5,3,'60 Peserta dan Panitia Dapat Layanan Medis Selama WSL Krui Pro','60-peserta-dan-panitia-dapat-layanan-medis-selama-wsl-krui-pro',0,'Pesisir Barat, 17 Juni 2025 — Bidang Kedokteran dan Kesehatan (Biddokkes) Polda Lampung kembali menunjukkan peran aktifnya dalam kegiatan bertaraf internasional. Kali ini, Biddokkes hadir memberikan pelayanan kesehatan selama perhelatan World Surf League (WSL) Krui Pro QS 6000 yang digelar pada 10–17 Juni 2025 di Pantai Tanjung Setia, Pesisir Barat, Lampung.\r\n\r\nSelama kompetisi berlangsung, Biddokkes membuka pos pelayanan kesehatan lengkap dengan ambulans dan personel medis di lokasi kegiatan. Posko ini menjadi garda terdepan dalam merespons kebutuhan medis para atlet selancar, panitia, personel pengamanan, serta pengunjung lokal dan mancanegara.\r\n\r\nTercatat sebanyak 60 orang telah menerima layanan medis dari tim Biddokkes. Rinciannya, 34 orang merupakan peserta kejuaraan, 18 orang dari personel Polri, dan 8 orang dari pihak panitia atau official. Keluhan yang ditangani pun bervariasi, mulai dari luka ringan akibat terbentur papan atau karang, pusing, kelelahan, hingga gangguan akibat cuaca ekstrem di tepi pantai.\r\n\r\nAKBP Sigit Lesmonojati selaku Kabid Dokkes Polda Lampung menjelaskan bahwa kehadiran Biddokkes dalam ajang internasional ini merupakan bentuk komitmen Polri untuk memberikan pelayanan terbaik, tidak hanya dalam pengamanan, tetapi juga di bidang kesehatan. “Kami ingin memastikan bahwa kegiatan berjalan lancar tanpa hambatan dari sisi medis. Ini juga menjadi bagian dari citra baik Indonesia sebagai tuan rumah event internasional,” ujarnya.\r\n\r\nKejuaraan selancar dunia WSL Krui Pro tahun ini diikuti oleh ratusan atlet profesional dari berbagai negara, dan menjadi magnet wisata baru bagi Provinsi Lampung. Kehadiran layanan kesehatan dari Biddokkes mendapat apresiasi dari peserta dan penyelenggara, karena membantu menjaga stamina dan keselamatan para atlet selama kompetisi berlangsung.\r\n\r\nDengan pelayanan yang cepat, ramah, dan sigap, Biddokkes Polda Lampung kembali membuktikan perannya sebagai mitra utama dalam menjaga kesehatan masyarakat dan mendukung suksesnya acara berskala nasional maupun internasional di wilayah hukum Polda Lampung.','1752820169_87d597b6cdfd9ef683dc.webp','Administrator','2025-07-18','2025-07-18 13:29:29','2025-07-18 13:29:29'),(6,3,'Posko Kesehatan Cepat Tanggap di Lokasi Banjir Panjang','posko-kesehatan-cepat-tanggap-di-lokasi-banjir-panjang',0,'Bandar Lampung, 21 April 2025 — Bencana banjir yang melanda wilayah Panjang, Bandar Lampung, mendapat respons cepat dari Polda Lampung melalui Bidang Kedokteran dan Kesehatan (Biddokkes). Guna membantu warga terdampak, Biddokkes Polda Lampung mendirikan posko kesehatan darurat sebagai bagian dari aksi tanggap bencana yang terkoordinasi bersama instansi terkait.\r\n\r\nSebanyak 20 personel kesehatan, termasuk tim DVI (Disaster Victim Identification), dikerahkan ke lokasi bencana bersama lima unit kendaraan dinas medis. Mereka bertugas memberikan pelayanan kesehatan langsung kepada warga yang terdampak banjir, termasuk lansia, anak-anak, serta kelompok rentan lainnya yang membutuhkan perhatian medis segera.\r\n\r\nPosko kesehatan ini menyediakan berbagai layanan, seperti pemeriksaan tekanan darah, pertolongan pertama, pembagian obat-obatan ringan, vitamin, hingga trauma healing bagi warga yang mengalami stres pasca bencana. Petugas medis juga melakukan pemeriksaan langsung dari rumah ke rumah di beberapa titik yang sulit dijangkau kendaraan besar.\r\n\r\nKabid Dokkes Polda Lampung, AKBP Sigit Lesmonojati, menyatakan bahwa langkah ini adalah wujud nyata dari komitmen Polri dalam melindungi dan melayani masyarakat, tidak hanya dalam kondisi aman, tetapi juga saat terjadi bencana. “Kami mengerahkan tim medis ke wilayah terdampak untuk memberikan pelayanan secara maksimal, cepat, dan merata. Harapannya, warga tetap terjaga kesehatannya meskipun dalam kondisi darurat,” ujarnya.\r\n\r\nRespons cepat ini mendapat apresiasi dari warga setempat yang merasa terbantu dengan kehadiran tenaga medis Polri. Banyak dari mereka yang tidak sempat memeriksakan diri ke puskesmas karena akses jalan yang terputus akibat banjir.\r\n\r\nKehadiran Biddokkes di lokasi bencana menjadi bukti nyata bahwa tugas Polri tidak hanya sebatas menjaga keamanan, tetapi juga turut hadir dalam upaya kemanusiaan, khususnya di masa-masa sulit seperti bencana alam.','1752820400_7a0b1e692029096dbb98.jpeg','Administrator','2025-07-18','2025-07-18 13:33:20','2025-07-18 13:33:20');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkerboard_carousel`
--

DROP TABLE IF EXISTS `checkerboard_carousel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkerboard_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `ikon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkerboard_carousel`
--

LOCK TABLES `checkerboard_carousel` WRITE;
/*!40000 ALTER TABLE `checkerboard_carousel` DISABLE KEYS */;
INSERT INTO `checkerboard_carousel` VALUES (1,'Poli Jantung','Layanan spesialis jantung dengan teknologi modern dan dokter berpengalaman','fas fa-heartbeat','poli-jantung','/layanan/poli-jantung',1,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(2,'Poli Gigi','Layanan kesehatan gigi dan mulut dengan peralatan modern','fas fa-tooth','poli-gigi','/layanan/poli-gigi',2,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(3,'Poli Anak','Layanan kesehatan anak dengan pendekatan ramah anak','fas fa-baby','poli-anak','/layanan/poli-anak',3,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(4,'Poli Umum','Layanan kesehatan umum untuk semua usia','fas fa-user-md','poli-umum','/layanan/poli-umum',4,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(5,'Laboratorium','Layanan pemeriksaan laboratorium dengan akurasi tinggi','fas fa-flask','laboratorium','/layanan/laboratorium',5,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(6,'Radiologi','Layanan pemeriksaan radiologi dengan teknologi canggih','fas fa-x-ray','radiologi','/layanan/radiologi',6,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(7,'Farmasi','Layanan apotek dengan obat-obatan berkualitas','fas fa-pills','farmasi','/layanan/farmasi',7,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(8,'IGD','Layanan gawat darurat 24 jam','fas fa-ambulance','igd','/layanan/igd',8,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(9,'Rawat Inap','Layanan rawat inap dengan kenyamanan maksimal','fas fa-bed','rawat-inap','/layanan/rawat-inap',9,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(10,'Konsultasi Online','Layanan konsultasi kesehatan secara online','fas fa-laptop-medical','konsultasi-online','/layanan/konsultasi-online',10,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(11,'Vaksinasi','Layanan vaksinasi untuk semua usia','fas fa-syringe','vaksinasi','/layanan/vaksinasi',11,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28'),(12,'Poli Mata','Layanan kesehatan mata dengan teknologi terkini','fas fa-eye','poli-mata','/layanan/poli-mata',12,'aktif','2025-07-18 04:41:28','2025-07-18 04:41:28');
/*!40000 ALTER TABLE `checkerboard_carousel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id_download` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub_kategori_download` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `download_count` int(11) DEFAULT 0,
  `nama_file` varchar(255) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `tipe_file` varchar(50) DEFAULT NULL,
  `hits` int(11) DEFAULT 0,
  `tanggal_upload` date DEFAULT curdate(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_download`),
  KEY `id_sub_kategori_download` (`id_sub_kategori_download`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
INSERT INTO `download` VALUES (9,2,'RENTRA DAN FILE','RENTRA DAN FILE',16,'1752661615_b10e3b41ac660218d232.pdf',2082728,'pdf',17,'2025-07-16','2025-07-16 17:26:55','2025-08-01 19:52:57'),(10,2,'rsbhayangkararuwajurai','rsbhayangkararuwajurai',4,'1752666752_cc6e3df44f90b1f3104b.pptx',4953216,'pptx',5,'2025-07-16','2025-07-16 18:52:32','2025-08-01 19:53:01'),(11,2,'JARINGAN KOMPUTER MASA DEPAN','JARINGAN KOMPUTER MASA DEPAN',6,'1752666933_e7cf572a82428ee08104.pptx',4258287,'pptx',7,'2025-07-22','2025-07-16 18:55:33','2025-08-01 19:52:53'),(12,2,'Peningkatan Keuntungan Industri Kecil melalui Implementasi Sistem Informasi Jasa Pemasangan Plafon PVC Berbasis Android pada Kecamatan Gadingrejo','Peningkatan Keuntungan Industri Kecil melalui Implementasi Sistem Informasi Jasa Pemasangan Plafon PVC Berbasis Android pada Kecamatan Gadingrejo',2,'1753622883_6098582880410abf0ffb.pdf',556519,'pdf',2,'2025-08-01','2025-07-27 20:28:03','2025-08-01 19:52:50'),(13,2,'Peningkatan Keuntungan Industri Kecil','melalui Implementasi Sistem Informasi Jasa Pemasangan Plafon PVC Berbasis Android pada Kecamatan Gadingrejo',0,'1754030324_7c2996aebea66379b0e0.pdf',79862,'pdf',0,'2025-08-02','2025-08-01 13:38:44','2025-08-01 19:52:44'),(15,2,'JARINGAN KOMPUTER MASA DEPAN','JARINGAN KOMPUTER MASA DEPAN',0,'1754051046_c318837b1da3568ffc52.pdf',129166,'pdf',0,'2025-08-01','2025-08-01 19:24:06','2025-08-01 19:24:06');
/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download_backup`
--

DROP TABLE IF EXISTS `download_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download_backup` (
  `id_download` int(11) NOT NULL DEFAULT 0,
  `id_kategori_download` int(11) NOT NULL,
  `id_sub_kategori_download` int(11) DEFAULT NULL,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download_backup`
--

LOCK TABLES `download_backup` WRITE;
/*!40000 ALTER TABLE `download_backup` DISABLE KEYS */;
INSERT INTO `download_backup` VALUES (9,1,NULL,'RENTRA DAN FILE','RENTRA DAN FILE',16,'1752661615_b10e3b41ac660218d232.pdf',2082728,'pdf',17,'2025-07-16','2025-07-16 17:26:55','2025-07-27 20:51:04'),(10,5,NULL,'rsbhayangkararuwajurai','rsbhayangkararuwajurai',4,'1752666752_cc6e3df44f90b1f3104b.pptx',4953216,'pptx',5,'2025-07-16','2025-07-16 18:52:32','2025-07-17 10:23:59'),(11,1,NULL,'JARINGAN KOMPUTER MASA DEPAN','JARINGAN KOMPUTER MASA DEPAN',6,'1752666933_e7cf572a82428ee08104.pptx',4258287,'pptx',7,'2025-07-22','2025-07-16 18:55:33','2025-07-27 21:03:58'),(12,1,NULL,'Peningkatan Keuntungan Industri Kecil melalui Implementasi Sistem Informasi Jasa Pemasangan Plafon PVC Berbasis Android pada Kecamatan Gadingrejo','Peningkatan Keuntungan Industri Kecil melalui Implementasi Sistem Informasi Jasa Pemasangan Plafon PVC Berbasis Android pada Kecamatan Gadingrejo',2,'1753622883_6098582880410abf0ffb.pdf',556519,'pdf',2,'2025-08-01','2025-07-27 20:28:03','2025-08-01 13:39:37'),(13,1,NULL,'Peningkatan Keuntungan Industri Kecil','melalui Implementasi Sistem Informasi Jasa Pemasangan Plafon PVC Berbasis Android pada Kecamatan Gadingrejo',0,'1754030324_7c2996aebea66379b0e0.pdf',79862,'pdf',0,'2025-08-02','2025-08-01 13:38:44','2025-08-01 13:38:44');
/*!40000 ALTER TABLE `download_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_urutan` (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'Bagaimana cara mendaftar untuk layanan kesehatan di Biddokkes POLRI?','Untuk mendaftar layanan kesehatan, Anda dapat menghubungi kami melalui telepon atau datang langsung ke kantor kami. Tim kami akan membantu proses pendaftaran dan memberikan informasi lengkap tentang layanan yang tersedia.',1,'aktif','2025-07-16 00:00:07','2025-07-16 00:00:07'),(2,'Apakah layanan kesehatan tersedia 24 jam?','Layanan darurat tersedia 24 jam untuk kasus-kasus tertentu. Namun untuk layanan umum, kami beroperasi sesuai jam kerja yang telah ditentukan. Silakan hubungi kami untuk informasi lebih lanjut.',2,'aktif','2025-07-16 00:00:07','2025-07-16 00:00:07'),(3,'Dokter spesialis apa saja yang tersedia?','Kami memiliki berbagai dokter spesialis termasuk dokter umum, spesialis penyakit dalam, spesialis bedah, spesialis jantung, spesialis mata, dan lainnya. Silakan hubungi kami untuk jadwal konsultasi.',3,'aktif','2025-07-16 00:00:07','2025-07-16 00:00:07'),(4,'Bagaimana cara mengajukan keluhan atau saran?','Anda dapat mengajukan keluhan atau saran melalui form kontak di halaman ini, email, atau datang langsung ke kantor kami. Tim kami akan merespons dan menindaklanjuti setiap keluhan atau saran yang masuk.',4,'aktif','2025-07-16 00:00:07','2025-07-16 00:00:07'),(5,'Apakah ada layanan pemeriksaan laboratorium?','Ya, kami menyediakan layanan pemeriksaan laboratorium lengkap untuk berbagai jenis pemeriksaan kesehatan. Silakan hubungi kami untuk informasi jadwal dan jenis pemeriksaan yang tersedia.',5,'aktif','2025-07-16 00:00:07','2025-07-16 00:00:07'),(6,'Bagaimana prosedur pendaftaran online?','Untuk pendaftaran online, Anda dapat mengakses sistem pendaftaran kami melalui website atau aplikasi mobile. Silakan siapkan dokumen yang diperlukan sebelum melakukan pendaftaran.',6,'aktif','2025-07-16 00:00:07','2025-07-16 00:00:07');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tanggal_upload` date DEFAULT curdate(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (1,'kegiatan ','adadda','1752590253_26c9c74805aee6fa1292.jpg','2025-07-14','2025-07-14 15:31:20','2025-07-15 21:37:33'),(3,'hut bayangkara','hut bayangkara','1752590272_3e7d2027674ff8fd5ec6.jpg','2025-07-15','2025-07-15 21:37:52','2025-07-15 21:37:52'),(4,'hari bhayangkara','hari bhayangkara','1752590377_11b1222a22bd56b2a60e.jpg','2025-07-15','2025-07-15 21:39:37','2025-07-15 21:39:37');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `halaman`
--

DROP TABLE IF EXISTS `halaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `halaman` (
  `id_halaman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT 'Admin',
  `tanggal_publish` date DEFAULT curdate(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_halaman`),
  UNIQUE KEY `slug` (`slug`),
  UNIQUE KEY `slug_2` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halaman`
--

LOCK TABLES `halaman` WRITE;
/*!40000 ALTER TABLE `halaman` DISABLE KEYS */;
INSERT INTO `halaman` VALUES (1,'Profil Biddokkes Polda','profil','<h2>Tentang Biddokkes POLRI</h2>\n<p>Biddokkes POLRI (Bidang Kedokteran dan Kesehatan Kepolisian Republik Indonesia) adalah unit yang bertanggung jawab atas layanan kesehatan bagi anggota Polri dan masyarakat.</p>\n\n<h3>Visi</h3>\n<p>Menjadi pusat layanan kesehatan terdepan yang profesional dan terpercaya dalam mendukung tugas Polri.</p>\n\n<h3>Misi</h3>\n<ul>\n<li>Menyelenggarakan layanan kesehatan yang berkualitas</li>\n<li>Mengembangkan sumber daya manusia kesehatan yang profesional</li>\n<li>Meningkatkan fasilitas dan teknologi kesehatan</li>\n<li>Memberikan pelayanan kesehatan yang terjangkau</li>\n</ul>\n\n<h3>Layanan Kami</h3>\n<p>Biddokkes POLRI menyediakan berbagai layanan kesehatan termasuk:</p>\n<ul>\n<li>Layanan rawat jalan</li>\n<li>Layanan rawat inap</li>\n<li>Layanan gawat darurat</li>\n<li>Layanan laboratorium</li>\n<li>Layanan radiologi</li>\n<li>Layanan farmasi</li>\n</ul>','profil-biddokkes.jpg','Admin','2024-01-01','2025-07-16 00:47:35','2025-07-16 00:55:45'),(2,'Sejarah Biddokkes','sejarah','<h2>Sejarah Biddokkes POLRI</h2>\r\n<p>Biddokkes POLRI memiliki sejarah panjang dalam memberikan layanan kesehatan bagi anggota Polri dan masyarakat Indonesia.</p>\r\n\r\n<h3>Awal Mula</h3>\r\n<p>Biddokkes POLRI didirikan dengan tujuan untuk memberikan layanan kesehatan yang berkualitas bagi anggota Polri dalam menjalankan tugasnya.</p>\r\n\r\n<h3>Perkembangan</h3>\r\n<p>Seiring berjalannya waktu, Biddokkes POLRI terus berkembang dan meningkatkan layanan kesehatannya untuk memberikan pelayanan terbaik.</p>\r\n\r\n<h3>Pencapaian</h3>\r\n<p>Biddokkes POLRI telah berhasil memberikan layanan kesehatan yang berkualitas dan terpercaya selama bertahun-tahun.</p>','sejarah-biddokkes.jpg','Admin','2024-01-01','2025-07-16 00:47:35','2025-07-16 00:47:35'),(3,'Struktur Organisasi','struktur','<h2>Struktur Organisasi Biddokkes POLRI</h2>\r\n<p>Biddokkes POLRI memiliki struktur organisasi yang jelas untuk menjalankan tugas dan fungsinya dengan baik.</p>\r\n\r\n<h3>Kepala Biddokkes</h3>\r\n<p>Dibantu oleh Wakil Kepala dan sejumlah staf untuk mengelola berbagai aspek layanan kesehatan.</p>\r\n\r\n<h3>Divisi-divisi</h3>\r\n<ul>\r\n<li>Divisi Pelayanan Medis</li>\r\n<li>Divisi Pelayanan Keperawatan</li>\r\n<li>Divisi Pelayanan Penunjang</li>\r\n<li>Divisi Pelayanan Farmasi</li>\r\n<li>Divisi Pelayanan Administrasi</li>\r\n</ul>\r\n\r\n<h3>Unit-unit Kerja</h3>\r\n<p>Setiap divisi memiliki unit-unit kerja yang spesifik untuk memberikan layanan yang optimal.</p>','struktur-organisasi.jpg','Admin','2024-01-01','2025-07-16 00:47:35','2025-07-16 00:47:35'),(4,'Fasilitas Kesehatan','fasilitas','<h2>Fasilitas Kesehatan Biddokkes POLRI</h2>\r\n<p>Biddokkes POLRI dilengkapi dengan fasilitas kesehatan modern untuk memberikan layanan terbaik.</p>\r\n\r\n<h3>Fasilitas Medis</h3>\r\n<ul>\r\n<li>Ruang pemeriksaan dokter</li>\r\n<li>Ruang rawat inap</li>\r\n<li>Ruang operasi</li>\r\n<li>Ruang gawat darurat</li>\r\n<li>Ruang ICU</li>\r\n</ul>\r\n\r\n<h3>Fasilitas Penunjang</h3>\r\n<ul>\r\n<li>Laboratorium</li>\r\n<li>Radiologi</li>\r\n<li>Farmasi</li>\r\n<li>Ruang tunggu</li>\r\n<li>Parkir kendaraan</li>\r\n</ul>\r\n\r\n<h3>Teknologi Modern</h3>\r\n<p>Dilengkapi dengan peralatan medis modern untuk mendukung diagnosis dan pengobatan yang akurat.</p>','fasilitas-kesehatan.jpg','Admin','2024-01-01','2025-07-16 00:47:35','2025-07-16 00:47:35');
/*!40000 ALTER TABLE `halaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (3,'INFORMASI','2025-07-14 09:24:54');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_download`
--

DROP TABLE IF EXISTS `kategori_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_download` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kategori_download`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_download`
--

LOCK TABLES `kategori_download` WRITE;
/*!40000 ALTER TABLE `kategori_download` DISABLE KEYS */;
INSERT INTO `kategori_download` VALUES (1,'Dokumen','2025-07-14 10:23:44'),(3,'PRODUK DOKKES','2025-07-15 15:54:51'),(5,'PRODUK REN','2025-07-15 16:18:24'),(6,'PRODUK REN TAHUNAN','2025-08-01 23:54:32');
/*!40000 ALTER TABLE `kategori_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesan_kontak`
--

DROP TABLE IF EXISTS `pesan_kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesan_kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('baru','dibaca','dibalas') DEFAULT 'baru',
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_dibaca` timestamp NULL DEFAULT NULL,
  `tanggal_dibalas` timestamp NULL DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_tanggal_kirim` (`tanggal_kirim`),
  KEY `idx_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan_kontak`
--

LOCK TABLES `pesan_kontak` WRITE;
/*!40000 ALTER TABLE `pesan_kontak` DISABLE KEYS */;
INSERT INTO `pesan_kontak` VALUES (1,'Ahmad Rizki','ahmad@email.com','081234567890','Informasi Umum','Saya ingin bertanya tentang layanan kesehatan yang tersedia di Biddokkes POLRI. Apakah ada layanan pemeriksaan kesehatan umum?','dibaca','2025-07-15 22:53:37','2025-07-15 23:15:19',NULL,NULL),(2,'Siti Nurhaliza','siti@email.com','081234567891','Layanan Kesehatan','Mohon informasi tentang jadwal dokter spesialis jantung. Kapan bisa melakukan konsultasi?','dibaca','2025-07-14 22:53:37',NULL,NULL,NULL),(3,'Budi Santoso','budi@email.com','081234567892','Pendaftaran','Saya ingin mendaftar untuk pemeriksaan kesehatan rutin. Bagaimana prosedurnya?','dibalas','2025-07-13 22:53:37',NULL,NULL,NULL),(4,'Dewi Sartika','dewi@email.com','081234567893','Keluhan','Ada keluhan tentang pelayanan di bagian pendaftaran. Mohon ditindaklanjuti.','baru','2025-07-15 19:53:37',NULL,NULL,NULL),(5,'Rudi Hermawan','rudi@email.com','081234567894','Saran','Saran untuk meningkatkan pelayanan: mungkin bisa ditambah fasilitas online booking.','dibaca','2025-07-15 21:53:37',NULL,NULL,NULL);
/*!40000 ALTER TABLE `pesan_kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `jam_operasional` text DEFAULT NULL,
  `map_url` varchar(500) DEFAULT NULL,
  `map_embed` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (1,'BIDDOKKES POLDA','Bidang Kedokteran dan Kesehatan Kepolisian Daerah Lampung','Jl.Wr. Suprapman No.1 Bandar Lampung','(021) 721-1234','info@biddokkes.polri.go.id','https://biddokkes.polri.go.id',NULL,NULL,'','','https://www.instagram.com/biddokkes_polda_lampung/','','Senin - Jumat: 08:00 - 16:00\r\nSabtu: 08:00 - 12:00\r\nMinggu & Hari Libur: Tutup','https://maps.google.com/?q=Jl.+Trunojoyo+No.3,+Jakarta+Selatan','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6666666666667!2d106.82222222222222!3d-6.175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTAnMzAuMCJTIDEwNsKwNDknMjAuMCJF!5e0!3m2!1sen!2sid!4v1234567890\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','2025-07-15 06:57:28','2025-07-15 08:32:57');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (1,'BIDDOKKES POLDA','Bidang Kedokteran dan Kesehatan Kepolisian Daerah Lampung','1752590042_d0953f6276e2d460d4f6.jpg','',1,'aktif','2025-07-14 20:23:10','2025-07-15 21:34:49'),(2,'BIDDOKKES POLDA','Bidang Kedokteran dan Kesehatan Kepolisian Daerah Lampung','1752590060_1b80f6cee41da2e6a1b4.jpg','',1,'aktif','2025-07-15 13:12:36','2025-07-15 21:34:52');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `angka` varchar(50) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_urutan` (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` VALUES (1,'Dokter Spesialis','150+','fas fa-user-md','Dokter spesialis yang siap melayani',1,'aktif','2025-07-16 00:04:59','2025-07-16 00:04:59'),(2,'Rumah Sakit','25+','fas fa-hospital','Rumah sakit yang tersebar di seluruh Indonesia',2,'aktif','2025-07-16 00:04:59','2025-07-16 00:04:59'),(3,'Pasien Dilayani','50K+','fas fa-users','Pasien yang telah kami layani',3,'aktif','2025-07-16 00:04:59','2025-07-16 00:04:59'),(4,'Tahun Pengalaman','30+','fas fa-award','Tahun pengalaman dalam layanan kesehatan',4,'aktif','2025-07-16 00:04:59','2025-07-16 00:29:57'),(5,'Fasilitas Modern','100+','fas fa-medical-kit','Fasilitas kesehatan modern',5,'nonaktif','2025-07-16 00:04:59','2025-07-16 00:04:59'),(6,'Tim Medis','500+','fas fa-user-nurse','Tim medis profesional',6,'nonaktif','2025-07-16 00:04:59','2025-07-16 00:04:59');
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_kategori_download`
--

DROP TABLE IF EXISTS `sub_kategori_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_kategori_download` (
  `id_sub_kategori_download` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_download` int(11) NOT NULL,
  `nama_sub_kategori_download` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_sub_kategori_download`),
  KEY `id_kategori_download` (`id_kategori_download`),
  CONSTRAINT `sub_kategori_download_ibfk_1` FOREIGN KEY (`id_kategori_download`) REFERENCES `kategori_download` (`id_kategori_download`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_kategori_download`
--

LOCK TABLES `sub_kategori_download` WRITE;
/*!40000 ALTER TABLE `sub_kategori_download` DISABLE KEYS */;
INSERT INTO `sub_kategori_download` VALUES (1,1,'Surat Keputusan','2025-08-01 07:05:00'),(2,1,'Peraturan','2025-08-01 07:05:00'),(4,3,'Produk Intelijen','2025-08-01 07:05:00'),(5,3,'Produk Deteksi','2025-08-01 07:05:00'),(6,6,'Produk REN A','2025-08-01 07:05:00'),(7,6,'Produk REN B','2025-08-01 07:05:00');
/*!40000 ALTER TABLE `sub_kategori_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'mardi','$2y$10$W9HRFECaB4kx5tNSUG6hneV8xT9H9ZHPKhOZ6YdJhvUwkcsUXnqf2','admin','mardi'),(7,'admin','$2y$10$GFF1D9i3q2EqzPnIUv/Hh.3xVxLjpgYvaoo1nwyfPsoYWBEEq4bGG','admin','Administrator'),(8,'user','$2y$10$GFF1D9i3q2EqzPnIUv/Hh.3xVxLjpgYvaoo1nwyfPsoYWBEEq4bGG','user','User Default');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-02  9:22:15
