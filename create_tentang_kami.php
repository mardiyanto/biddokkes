<?php

// Script untuk membuat halaman "Tentang Kami" dengan ID 1
// Jalankan script ini jika halaman dengan ID 1 belum ada

require_once 'vendor/autoload.php';

use CodeIgniter\Config\Services;

// Load environment
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database configuration
$host = $_ENV['database.default.hostname'] ?? 'localhost';
$username = $_ENV['database.default.username'] ?? 'root';
$password = $_ENV['database.default.password'] ?? '';
$database = $_ENV['database.default.database'] ?? 'biddokkes';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Cek apakah halaman dengan ID 1 sudah ada
    $stmt = $pdo->prepare("SELECT id_halaman FROM halaman WHERE id_halaman = 1");
    $stmt->execute();
    $existing = $stmt->fetch();
    
    if ($existing) {
        echo "Halaman dengan ID 1 sudah ada.\n";
        echo "Judul: " . $existing['judul'] ?? 'Tidak diketahui' . "\n";
    } else {
        // Buat halaman "Tentang Kami"
        $judul = "Tentang Biddokkes POLRI";
        $slug = "tentang-biddokkes-polri";
        $konten = "<p>Biddokkes POLRI adalah Pusat Kesehatan Kepolisian Republik Indonesia yang bertugas memberikan layanan kesehatan terbaik bagi anggota Polri dan masyarakat.</p>
        
        <p>Dengan didukung oleh tenaga medis profesional dan fasilitas kesehatan modern, kami berkomitmen untuk memberikan pelayanan kesehatan yang berkualitas dan terjangkau.</p>
        
        <h3>Visi</h3>
        <p>Menjadi pusat kesehatan terdepan yang memberikan layanan kesehatan berkualitas tinggi bagi anggota Polri dan masyarakat.</p>
        
        <h3>Misi</h3>
        <ul>
            <li>Menyelenggarakan pelayanan kesehatan yang profesional dan berkualitas</li>
            <li>Mengembangkan sumber daya manusia kesehatan yang kompeten</li>
            <li>Menerapkan teknologi kesehatan modern dalam pelayanan</li>
            <li>Mengutamakan keselamatan dan kepuasan pasien</li>
        </ul>
        
        <h3>Fasilitas Unggulan</h3>
        <ul>
            <li><strong>Poli Spesialis:</strong> Jantung, Saraf, Ortopedi, Mata, Anak, Kebidanan, Gigi</li>
            <li><strong>Fasilitas Penunjang:</strong> Laboratorium, Radiologi, Apotek</li>
            <li><strong>Layanan Darurat:</strong> IGD 24 Jam dengan tim medis siap siaga</li>
            <li><strong>Rawat Inap:</strong> Fasilitas rawat inap nyaman dengan perawatan intensif</li>
        </ul>
        
        <p>Biddokkes POLRI siap melayani kebutuhan kesehatan Anda dengan standar pelayanan yang tinggi dan didukung oleh tim medis yang berpengalaman.</p>";
        $penulis = "Admin Biddokkes";
        $tanggal_publish = date('Y-m-d');
        
        $stmt = $pdo->prepare("INSERT INTO halaman (id_halaman, judul, slug, konten, penulis, tanggal_publish, created_at, updated_at) VALUES (1, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$judul, $slug, $konten, $penulis, $tanggal_publish]);
        
        echo "Halaman 'Tentang Kami' berhasil dibuat dengan ID 1.\n";
        echo "Judul: $judul\n";
        echo "Slug: $slug\n";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 