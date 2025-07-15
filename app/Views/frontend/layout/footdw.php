    <!-- Footer -->
    <footer class="footer mt-5">
        <!-- Main Footer -->
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-widget">
                            <div class="footer-logo mb-3">
                             
                                <img src="<?= base_url('assets/images/logo-polri.png') ?>" alt="Logo Polri" class="me-2" style="max-height: 50px;">
                                
                                <h5 class="text-dark mb-0">BIDDOKKES POLRI</h5>
                            </div>
                            <p class="text-dark mb-3">
                            Pusat Kesehatan Kepolisian Republik Indonesia yang berkomitmen memberikan layanan kesehatan terbaik bagi anggota Polri dan masyarakat
                            </p>
                            <div class="social-links">
                               
                                <a href="" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
                             
                                <a href="" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
                               
                                <a href="" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                              
                                <a href="" target="_blank" class="social-link"><i class="fab fa-youtube"></i></a>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="text-dark mb-3">Menu Utama</h5>
                            <ul class="footer-links">
                                <li><a href="<?= base_url() ?>">Beranda</a></li>
                                <li><a href="<?= base_url('fronthalaman/profil') ?>">Profil</a></li>
                                <li><a href="<?= base_url('frontberita') ?>">Berita</a></li>
                                <li><a href="<?= base_url('frontgaleri') ?>">Galeri</a></li>
                                <li><a href="<?= base_url('frontdownload') ?>">Download</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="text-dark mb-3">Layanan</h5>
                            <ul class="footer-links">
                                <li><a href="#">Layanan Kesehatan</a></li>
                                <li><a href="#">Pemeriksaan Medis</a></li>
                                <li><a href="#">Konsultasi Dokter</a></li>
                                <li><a href="#">Laboratorium</a></li>
                                <li><a href="#">Farmasi</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="text-dark mb-3">Kontak</h5>
                            <div class="contact-info">
                                <div class="contact-item mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span class="text-dark">Jl. Trunojoyo No.3, Jakarta Pusat</span>
                                </div>
                                <div class="contact-item mb-2">
                                    <i class="fas fa-phone text-primary me-2"></i>
                                    <span class="text-dark">(021) 721-1234</span>
                                </div>
                                <div class="contact-item mb-2">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <span class="text-dark">info@biddokkes.polri.go.id</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    <span class="text-dark">Senin - Jumat: 08:00 - 16:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="text-dark mb-0">
                            &copy; <?= date('Y') ?> Biddokkes POLRI. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="text-dark mb-0">
                            Designed with <i class="fas fa-heart text-danger"></i> for Polri
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Back to Top Button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#backToTop').addClass('show');
            } else {
                $('#backToTop').removeClass('show');
            }
        });
        
        $('#backToTop').click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
        });
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
        
        // Add loading animation
        $(window).on('load', function() {
            $('body').addClass('loaded');
        });
        
        // Mobile menu toggle
        $('.navbar-nav .nav-link').on('click', function() {
            if ($(window).width() < 992) {
                $('.navbar-collapse').collapse('hide');
            }
        });
    </script>
</body>
</html> 