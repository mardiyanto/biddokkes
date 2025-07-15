<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($halaman['judul']) ?> - Biddokkes</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        
        .page-header {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 60px 0;
            margin-bottom: 40px;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .page-meta {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        
        .page-content {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 40px;
            margin-bottom: 40px;
        }
        
        .page-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .page-content h2 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        
        .page-content h3 {
            color: #34495e;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        
        .page-content p {
            margin-bottom: 20px;
            text-align: justify;
        }
        
        .page-content ul {
            margin-bottom: 20px;
        }
        
        .page-content li {
            margin-bottom: 8px;
        }
        
        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }
        
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .back-to-top:hover {
            background: #2980b9;
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .page-content {
                padding: 20px;
            }
            
            .page-header {
                padding: 40px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-heartbeat me-2"></i>
                Biddokkes
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('download') ?>">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('halaman/tentang-kami') ?>">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('halaman/kontak-dan-lokasi') ?>">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="page-title"><?= esc($halaman['judul']) ?></h1>
                    <div class="page-meta">
                        <i class="fas fa-user me-2"></i><?= esc($halaman['penulis']) ?>
                        <span class="mx-3">|</span>
                        <i class="fas fa-calendar me-2"></i><?= date('d F Y', strtotime($halaman['tanggal_publish'])) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="page-content">
                    <?php if ($halaman['gambar']): ?>
                        <img src="<?= base_url('uploads/halaman/'.$halaman['gambar']) ?>" 
                             alt="<?= esc($halaman['judul']) ?>" 
                             class="page-image">
                    <?php endif; ?>
                    
                    <div class="content">
                        <?= $halaman['konten'] ?>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="text-center">
                    <a href="<?= base_url() ?>" class="btn btn-primary">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-heartbeat me-2"></i>Biddokkes</h5>
                    <p>Bidang Kedokteran dan Kesehatan</p>
                    <p>Menyediakan layanan kesehatan berkualitas untuk masyarakat.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-phone me-2"></i>(021) 1234-5000</p>
                    <p><i class="fas fa-envelope me-2"></i>info@biddokkes.go.id</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Jl. Kesehatan No. 123, Jakarta</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; <?= date('Y') ?> Biddokkes. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Back to top functionality
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide back to top button
        window.onscroll = function() {
            const backToTop = document.querySelector('.back-to-top');
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        };

        // Initialize back to top button
        document.addEventListener('DOMContentLoaded', function() {
            const backToTop = document.querySelector('.back-to-top');
            backToTop.style.display = 'none';
        });
    </script>
</body>
</html> 