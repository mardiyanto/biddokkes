<?= $this->include('frontend/layout/header') ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content text-center">
                    <h1 class="page-title">Hubungi Kami</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-4 mb-5" data-aos="fade-right">
                <div class="contact-info">
                    <h3 class="section-title mb-4">Informasi Kontak</h3>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Alamat</h5>
                            <p><?= $profilWebsite['alamat'] ?? 'Jl. Trunojoyo No.3, Jakarta Pusat<br>DKI Jakarta 10310' ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Telepon</h5>
                            <p><?= $profilWebsite['telepon'] ?? '(021) 721-1234' ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Email</h5>
                            <p><?= $profilWebsite['email'] ?? 'info@biddokkes.polri.go.id' ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Jam Operasional</h5>
                            <p><?= nl2br($profilWebsite['jam_operasional'] ?? 'Senin - Jumat: 08:00 - 16:00<br>Sabtu: 08:00 - 12:00<br>Minggu & Hari Libur: Tutup') ?></p>
                        </div>
                    </div>
                    
                    <div class="social-links mt-4">
                        <h5 class="mb-3">Ikuti Kami</h5>
                        <div class="social-buttons">
                            <?php if (!empty($profilWebsite['facebook'])): ?>
                            <a href="<?= $profilWebsite['facebook'] ?>" target="_blank" class="social-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <?php endif; ?>
                            <?php if (!empty($profilWebsite['twitter'])): ?>
                            <a href="<?= $profilWebsite['twitter'] ?>" target="_blank" class="social-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <?php endif; ?>
                            <?php if (!empty($profilWebsite['instagram'])): ?>
                            <a href="<?= $profilWebsite['instagram'] ?>" target="_blank" class="social-btn instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <?php endif; ?>
                            <?php if (!empty($profilWebsite['youtube'])): ?>
                            <a href="<?= $profilWebsite['youtube'] ?>" target="_blank" class="social-btn youtube">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-left">
                <div class="contact-form">
                    <h3 class="section-title mb-4">Kirim Pesan</h3>
                    <p class="text-muted mb-4">Silakan isi form di bawah ini untuk menghubungi kami. Tim kami akan segera merespons pesan Anda.</p>
                    
                    <form id="contactForm" action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="tel" class="form-control" id="telepon" name="telepon">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subjek" class="form-label">Subjek *</label>
                                <select class="form-select" id="subjek" name="subjek" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="Informasi Umum">Informasi Umum</option>
                                    <option value="Layanan Kesehatan">Layanan Kesehatan</option>
                                    <option value="Pendaftaran">Pendaftaran</option>
                                    <option value="Keluhan">Keluhan</option>
                                    <option value="Saran">Saran</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan *</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" required placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="setuju" name="setuju" required>
                                <label class="form-check-label" for="setuju">
                                    Saya setuju dengan <a href="#" class="text-primary">kebijakan privasi</a> dan <a href="#" class="text-primary">syarat penggunaan</a>
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <h3 class="section-title">Lokasi Kami</h3>
                    <div class="title-line mx-auto"></div>
                    <p class="text-muted mt-3">Kunjungi kantor pusat Biddokkes POLRI</p>
                </div>
                
                <div class="map-container" data-aos="fade-up">
                    <?php if (!empty($profilWebsite['map_embed'])): ?>
                        <div class="map-embed">
                            <?= $profilWebsite['map_embed'] ?>
                        </div>
                    <?php else: ?>
                        <div class="map-placeholder">
                            <div class="map-content">
                                <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                                <h5>Peta Lokasi</h5>
                                <p class="text-muted">Peta akan ditampilkan di sini</p>
                                <?php if (!empty($profilWebsite['map_url'])): ?>
                                <a href="<?= $profilWebsite['map_url'] ?>" target="_blank" class="btn btn-outline-primary">
                                    <i class="fas fa-external-link-alt me-2"></i>Buka di Google Maps
                                </a>
                                <?php else: ?>
                                <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary">
                                    <i class="fas fa-external-link-alt me-2"></i>Buka di Google Maps
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <h3 class="section-title">Pertanyaan Umum</h3>
                    <div class="title-line mx-auto"></div>
                    <p class="text-muted mt-3">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="faqAccordion" data-aos="fade-up">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                        Bagaimana cara mendaftar untuk layanan kesehatan di Biddokkes POLRI?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Untuk mendaftar layanan kesehatan, Anda dapat menghubungi kami melalui telepon atau datang langsung ke kantor kami. Tim kami akan membantu proses pendaftaran dan memberikan informasi lengkap tentang layanan yang tersedia.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                        Apakah layanan kesehatan tersedia 24 jam?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Layanan darurat tersedia 24 jam untuk kasus-kasus tertentu. Namun untuk layanan umum, kami beroperasi sesuai jam kerja yang telah ditentukan. Silakan hubungi kami untuk informasi lebih lanjut.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                        Dokter spesialis apa saja yang tersedia?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Kami memiliki berbagai dokter spesialis termasuk dokter umum, spesialis penyakit dalam, spesialis bedah, spesialis jantung, spesialis mata, dan lainnya. Silakan hubungi kami untuk jadwal konsultasi.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                        Bagaimana cara mengajukan keluhan atau saran?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Anda dapat mengajukan keluhan atau saran melalui form kontak di halaman ini, email, atau datang langsung ke kantor kami. Tim kami akan merespons dan menindaklanjuti setiap keluhan atau saran yang masuk.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Contact Form Validation
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simple validation
        const nama = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const subjek = document.getElementById('subjek').value;
        const pesan = document.getElementById('pesan').value;
        const setuju = document.getElementById('setuju').checked;
        
        if (!nama || !email || !subjek || !pesan || !setuju) {
            alert('Mohon lengkapi semua field yang wajib diisi');
            return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Mohon masukkan email yang valid');
            return;
        }
        
        // Simulate form submission
        alert('Terima kasih! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
        this.reset();
    });
    
    // Character counter for message
    document.getElementById('pesan').addEventListener('input', function() {
        const maxLength = 1000;
        const currentLength = this.value.length;
        const remaining = maxLength - currentLength;
        
        if (remaining < 0) {
            this.value = this.value.substring(0, maxLength);
        }
    });
</script>

<?= $this->include('frontend/layout/footer') ?> 