<?= $this->include('frontend/layout/header') ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content text-center">
                    <h1 class="page-title">Detail Berita</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('frontberita') ?>">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $berita['judul'] ?? 'Berita' ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Detail Section -->
<section class="news-detail-section py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8 mb-5">
                <article class="news-detail" data-aos="fade-up">
                    <!-- News Header -->
                    <div class="news-header mb-4">
                        <div class="news-meta mb-3">
                            <span class="category-badge"><?= $berita['nama_kategori'] ?? 'Kategori' ?></span>
                            <span class="news-date">
                                <i class="fas fa-calendar me-1"></i>
                                <?= date('d F Y', strtotime($berita['created_at'] ?? '')) ?>
                            </span>
                            <span class="news-author">
                                <i class="fas fa-user me-1"></i>
                                <?= $berita['penulis'] ?? 'Penulis' ?>
                            </span>
                            <span class="news-views">
                                <i class="fas fa-eye me-1"></i>
                                <?= $berita['view_count'] ?? 0 ?> views
                            </span>
                        </div>
                        
                        <h1 class="news-title"><?= $berita['judul'] ?? 'Judul Berita' ?></h1>
                        
                        <?php if ($berita['gambar']): ?>
                        <div class="news-image-wrapper mb-4">
                            <img src="<?= base_url('uploads/artikel/' . $berita['gambar']) ?>" 
                                 alt="<?= $berita['judul'] ?? 'Gambar Berita' ?>" 
                                 class="img-fluid rounded">
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- News Content -->
                    <div class="news-content">
                        <?= $berita['konten'] ?? 'Tidak ada konten berita.' ?>
                    </div>
                    
                    <!-- News Footer -->
                    <div class="news-footer mt-5">
                        <div class="news-tags">
                            <h6 class="mb-3">Tag:</h6>
                            <div class="tag-list">
                                <span class="tag">Biddokkes</span>
                                <span class="tag">POLRI</span>
                                <span class="tag">Kesehatan</span>
                                <span class="tag"><?= $berita['nama_kategori'] ?? 'Kategori' ?></span>
                            </div>
                        </div>
                        
                        <div class="news-share mt-4">
                            <h6 class="mb-3">Bagikan:</h6>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" 
                                   target="_blank" class="share-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($berita['judul'] ?? 'Berita') ?>" 
                                   target="_blank" class="share-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text=<?= urlencode(($berita['judul'] ?? 'Berita') . ' - ' . current_url()) ?>" 
                                   target="_blank" class="share-btn whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject=<?= urlencode($berita['judul'] ?? 'Berita') ?>&body=<?= urlencode('Baca berita ini: ' . current_url()) ?>" 
                                   class="share-btn email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Related News -->
                <?php if (!empty($berita_terkait)): ?>
                <div class="sidebar-widget mb-5" data-aos="fade-left">
                    <h4 class="widget-title">Berita Terkait</h4>
                    <div class="related-news">
                        <?php foreach ($berita_terkait as $related): ?>
                        <div class="related-news-item">
                            <div class="related-news-image">
                                <?php if ($related['gambar']): ?>
                                <img src="<?= base_url('uploads/artikel/' . $related['gambar']) ?>" 
                                     alt="<?= $related['judul'] ?? 'Gambar Berita Terkait' ?>" 
                                     class="img-fluid">
                                <?php else: ?>
                                <img src="<?= base_url('assets/images/default-news.jpg') ?>" 
                                     alt="<?= $related['judul'] ?? 'Gambar Berita Terkait' ?>" 
                                     class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <div class="related-news-content">
                                <h6 class="related-news-title">
                                    <a href="<?= base_url('frontberita/' . $related['slug']) ?>"><?= $related['judul'] ?? 'Judul Berita Terkait' ?></a>
                                </h6>
                                <div class="related-news-meta">
                                    <span><i class="fas fa-calendar me-1"></i><?= date('d M Y', strtotime($related['created_at'] ?? '')) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Latest News -->
                <div class="sidebar-widget mb-5" data-aos="fade-left" data-aos-delay="100">
                    <h4 class="widget-title">Berita Terbaru</h4>
                    <div class="latest-news">
                        <?php 
                        $beritaModel = new \App\Models\BeritaModel();
                        $latest_news = $beritaModel->getLatest(5);
                        foreach ($latest_news as $latest): 
                        ?>
                        <div class="latest-news-item">
                            <div class="latest-news-image">
                                <?php if ($latest['gambar']): ?>
                                <img src="<?= base_url('uploads/artikel/' . $latest['gambar']) ?>" 
                                     alt="<?= $latest['judul'] ?? 'Gambar Berita Terbaru' ?>" 
                                     class="img-fluid">
                                <?php else: ?>
                                <img src="<?= base_url('assets/images/default-news.jpg') ?>" 
                                     alt="<?= $latest['judul'] ?? 'Gambar Berita Terbaru' ?>" 
                                     class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <div class="latest-news-content">
                                <h6 class="latest-news-title">
                                    <a href="<?= base_url('frontberita/' . $latest['slug']) ?>"><?= $latest['judul'] ?? 'Judul Berita Terbaru' ?></a>
                                </h6>
                                <div class="latest-news-meta">
                                    <span><i class="fas fa-calendar me-1"></i><?= date('d M Y', strtotime($latest['created_at'] ?? '')) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="sidebar-widget" data-aos="fade-left" data-aos-delay="200">
                    <h4 class="widget-title">Kategori</h4>
                    <div class="category-list">
                        <?php 
                        $kategoriModel = new \App\Models\KategoriModel();
                        $kategoris = $kategoriModel->findAll();
                        foreach ($kategoris as $kat): 
                        ?>
                        <a href="<?= base_url('berita?kategori=' . $kat['id_kategori']) ?>" class="category-item">
                            <span class="category-name"><?= $kat['nama_kategori'] ?? 'Nama Kategori' ?></span>
                            <span class="category-count">(<?= $kategoriModel->getBeritaCountByKategori($kat['id_kategori']) ?? 0 ?>)</span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <div class="newsletter-content">
                    <h3 class="section-title text-white mb-3">Berlangganan Newsletter</h3>
                    <p class="text-light mb-4">Dapatkan berita terbaru dan informasi penting dari Biddokkes POLRI langsung ke email Anda.</p>
                    
                    <form class="newsletter-form" id="newsletterForm">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Masukkan email Anda..." required>
                                    <button class="btn btn-light" type="submit">
                                        <i class="fas fa-paper-plane me-2"></i>Berlangganan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Newsletter form
    document.getElementById('newsletterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('input[type="email"]').value;
        
        // Simple email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Mohon masukkan email yang valid');
            return;
        }
        
        // Simulate subscription
        alert('Terima kasih! Anda telah berlangganan newsletter kami.');
        this.reset();
    });
    
    // Share button functionality
    document.querySelectorAll('.share-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Analytics tracking could be added here
            console.log('Share button clicked:', this.className);
        });
    });
    
    // Update view count (simulated)
    document.addEventListener('DOMContentLoaded', function() {
        // In a real application, you would send an AJAX request to update view count
        console.log('News article viewed:', '<?= $berita['judul'] ?? 'Berita' ?>');
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<?= $this->include('frontend/layout/footer') ?> 