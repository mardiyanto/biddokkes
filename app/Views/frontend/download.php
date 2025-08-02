<?= $this->include('frontend/layout/header') ?>

<style>
.download-category {
    margin-bottom: 10px;
}

.category-badge {
    background-color: #007bff;
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    margin-right: 5px;
}

.sub-category-badge {
    background-color: #28a745;
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
}

.download-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    overflow: hidden;
}

.download-card:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.download-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 2rem;
}

.download-content {
    padding: 20px;
}

.download-title {
    color: #2d3748;
    margin-bottom: 10px;
    font-weight: 600;
}

.download-description {
    color: #718096;
    font-size: 0.9rem;
    margin-bottom: 15px;
    line-height: 1.5;
}

.download-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 15px;
}

.meta-item {
    display: flex;
    align-items: center;
    font-size: 0.8rem;
    color: #718096;
}

.meta-item i {
    margin-right: 5px;
    color: #a0aec0;
}

.download-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.btn-sm {
    font-size: 0.8rem;
    padding: 5px 10px;
}

.empty-download {
    padding: 60px 20px;
}

.stats-section {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.stat-item {
    padding: 20px;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 1rem;
    opacity: 0.9;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .download-controls .row {
        flex-direction: column;
    }
    
    .download-controls .col-lg-4 {
        margin-bottom: 15px;
    }
    
    .download-meta {
        flex-direction: column;
        gap: 5px;
    }
    
    .download-actions {
        flex-direction: column;
    }
    
    .download-actions .btn {
        width: 100%;
        margin-bottom: 5px;
    }
}
</style>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content text-center">
                    <h1 class="page-title">Si Duren</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SI DUREN</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login Status Alert -->
<?php if (!session()->get('logged_in')): ?>
<div class="container mt-4">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-triangle me-3 fa-lg"></i>
            <div>
                <strong>Perhatian!</strong> Anda harus login terlebih dahulu untuk mengunduh file.
                <a href="<?= base_url('userlogin') ?>" class="btn btn-sm btn-warning ms-3">
                    <i class="fas fa-sign-in-alt me-1"></i>Login Sekarang
                </a>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php else: ?>
<div class="container mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fa-lg"></i>
            <div>
                <strong>Selamat datang!</strong> Anda sudah login sebagai <strong><?= session()->get('nama') ?></strong>
                <a href="<?= base_url('userlogin/logout') ?>" class="btn btn-sm btn-outline-danger ms-3">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
                <a href="<?= base_url('dashboard/admin') ?>" class="btn btn-sm btn-outline-danger ms-3">
                    <i class="fas fa-user-alt me-1"></i>Dashboard User
                </a>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

<!-- Download Section -->
<section class="download-section py-5">
    <div class="container">
        <!-- Search and Filter -->
        <div class="download-controls mb-5" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-3">
                    <form action="<?= base_url('frontdownload') ?>" method="GET" class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari file download..." value="<?= htmlspecialchars($search ?? '') ?>">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="d-flex justify-content-center">
                        <select class="form-select w-auto" id="kategoriSelect" onchange="changeKategori(this.value)">
                            <option value="">Semua Kategori</option>
                            <?php if (!empty($kategoris)): ?>
                                <?php foreach ($kategoris as $kat): ?>
                                <option value="<?= htmlspecialchars($kat['id_kategori_download'] ?? '') ?>" <?= ($kategori ?? '') == ($kat['id_kategori_download'] ?? '') ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($kat['nama_kategori_download'] ?? 'Kategori') ?>
                                </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" disabled>Tidak ada kategori tersedia</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="d-flex justify-content-lg-end">
                        <select class="form-select w-auto" id="subKategoriSelect" onchange="changeSubKategori(this.value)" <?= empty($kategori) ? 'disabled' : '' ?>>
                            <option value="">Semua Sub Kategori</option>
                            <?php if (!empty($sub_kategoris)): ?>
                                <?php foreach ($sub_kategoris as $sub_kat): ?>
                                <option value="<?= htmlspecialchars($sub_kat['id_sub_kategori_download'] ?? '') ?>" <?= ($sub_kategori ?? '') == ($sub_kat['id_sub_kategori_download'] ?? '') ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($sub_kat['nama_sub_kategori_download'] ?? 'Sub Kategori') ?>
                                </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" disabled>Pilih kategori terlebih dahulu</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Download Grid -->
        <?php if (!empty($downloads)): ?>
        <div class="row" id="downloadGrid">
            <?php foreach ($downloads as $index => $item): ?>
            <div class="col-lg-6 col-md-6 mb-4 download-item-wrapper" data-aos="fade-up" data-aos-delay="<?= ($index % 2 + 1) * 100 ?>">
                <div class="download-card">
                    <div class="download-icon">
                        <?php
                        $fileName = $item['nama_file'] ?? $item['file'] ?? '';
                        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                        $iconClass = 'fas fa-file';
                        switch(strtolower($extension)) {
                            case 'pdf':
                                $iconClass = 'fas fa-file-pdf';
                                break;
                            case 'doc':
                            case 'docx':
                                $iconClass = 'fas fa-file-word';
                                break;
                            case 'xls':
                            case 'xlsx':
                                $iconClass = 'fas fa-file-excel';
                                break;
                            case 'ppt':
                            case 'pptx':
                                $iconClass = 'fas fa-file-powerpoint';
                                break;
                            case 'zip':
                            case 'rar':
                                $iconClass = 'fas fa-file-archive';
                                break;
                            case 'jpg':
                            case 'jpeg':
                            case 'png':
                            case 'gif':
                                $iconClass = 'fas fa-file-image';
                                break;
                        }
                        ?>
                        <i class="<?= $iconClass ?>"></i>
                    </div>
                    <div class="download-content">
                        <div class="download-category">
                            <span class="category-badge"><?= htmlspecialchars($item['nama_kategori_download'] ?? 'Umum') ?></span>
                            <?php if (!empty($item['nama_sub_kategori_download'])): ?>
                                <span class="sub-category-badge"><?= htmlspecialchars($item['nama_sub_kategori_download']) ?></span>
                            <?php endif; ?>
                        </div>
                        <h5 class="download-title"><?= htmlspecialchars($item['judul'] ?? 'File Download') ?></h5>
                        <p class="download-description"><?= htmlspecialchars($item['deskripsi'] ?? '') ?></p>
                        
                        <div class="download-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar me-1"></i>
                                <span><?= date('d M Y', strtotime($item['created_at'] ?? $item['tanggal_upload'] ?? 'now')) ?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-download me-1"></i>
                                <span><?= number_format($item['download_count'] ?? $item['hits'] ?? 0) ?> downloads</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-file me-1"></i>
                                <span><?= strtoupper($extension ?: 'FILE') ?></span>
                            </div>
                            <?php if (!empty($item['ukuran_file'])): ?>
                            <div class="meta-item">
                                <i class="fas fa-weight-hanging me-1"></i>
                                <span><?= formatFileSize($item['ukuran_file']) ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="download-actions">
                            <?php if (!empty($fileName) && !empty($item['id_download'])): ?>
                            <?php if (!session()->get('logged_in')): ?>
                                <!-- User belum login -->
                                <button class="btn btn-warning btn-sm me-1" onclick="showLoginAlert()">
                                    <i class="fas fa-lock me-1"></i>Login untuk Download
                                </button>
                                <a href="<?= base_url('userlogin') ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login Sekarang
                                </a>
                            <?php else: ?>
                                <!-- User sudah login -->
                                <?php if (strtolower($extension) === 'pdf'): ?>
                                    <a href="<?= base_url('frontdownload/preview/' . intval($item['id_download'])) ?>" 
                                       class="btn btn-warning btn-sm me-1" target="_blank">
                                        <i class="fas fa-eye me-1"></i>Preview
                                    </a>
                                    <a href="<?= base_url('frontdownload/force/' . intval($item['id_download'])) ?>" 
                                       class="btn btn-primary btn-sm download-btn"
                                       onclick="trackDownload(<?= intval($item['id_download']) ?>, '<?= htmlspecialchars($item['judul'] ?? 'File') ?>')">
                                        <i class="fas fa-download me-1"></i>Download
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('frontdownload/file/' . intval($item['id_download'])) ?>" 
                                       class="btn btn-primary btn-sm download-btn"
                                       onclick="trackDownload(<?= intval($item['id_download']) ?>, '<?= htmlspecialchars($item['judul'] ?? 'File') ?>')">
                                        <i class="fas fa-download me-1"></i>Download
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <button class="btn btn-secondary btn-sm" disabled>
                                <i class="fas fa-exclamation-triangle me-1"></i>File Tidak Tersedia
                            </button>
                            <?php endif; ?>
                            <button class="btn btn-outline-secondary btn-sm" 
                                    onclick="showFileInfo('<?= htmlspecialchars($item['judul'] ?? 'File') ?>', '<?= htmlspecialchars($item['deskripsi'] ?? '') ?>', '<?= $extension ?: 'FILE' ?>', '<?= number_format($item['download_count'] ?? $item['hits'] ?? 0) ?>', '<?= !empty($item['ukuran_file']) ? formatFileSize($item['ukuran_file']) : 'Tidak tersedia' ?>')">
                                <i class="fas fa-info-circle me-1"></i>Info
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php if (isset($pager) && $pager->getPageCount() > 1): ?>
        <div class="pagination-wrapper mt-5" data-aos="fade-up">
            <nav aria-label="Download pagination">
                <?= $pager->links() ?>
            </nav>
        </div>
        <?php endif; ?>
        
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <div class="empty-download">
                <i class="fas fa-download fa-4x text-muted mb-4"></i>
                <h4 class="text-muted mb-3">
                    <?= (!empty($search) || !empty($kategori)) ? 'Tidak ada file yang ditemukan' : 'Belum ada file tersedia' ?>
                </h4>
                <p class="text-muted mb-4">
                    <?= (!empty($search) || !empty($kategori)) ? 'Coba ubah kata kunci pencarian atau filter kategori Anda' : 'File download akan ditampilkan di sini' ?>
                </p>
                <?php if (!empty($search) || !empty($kategori)): ?>
                <a href="<?= base_url('frontdownload') ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Semua Download
                </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Download Stats -->
<?php if (!empty($downloads)): ?>
<section class="stats-section py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <i class="fas fa-download fa-2x text-primary mb-3"></i>
                    <h3 class="stat-number"><?= count($downloads) ?></h3>
                    <p class="stat-label">Total File</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <i class="fas fa-users fa-2x text-primary mb-3"></i>
                    <h3 class="stat-number"><?= number_format(array_sum(array_column($downloads, 'download_count'))) ?></h3>
                    <p class="stat-label">Total Download</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <i class="fas fa-folder fa-2x text-primary mb-3"></i>
                    <h3 class="stat-number"><?= count($kategoris) ?></h3>
                    <p class="stat-label">Kategori</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- File Info Modal -->
<div class="modal fade" id="fileInfoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informasi File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="fileInfoContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php
// Helper function untuk format ukuran file
function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}
?>

<script>
    // Category filter functionality
    function changeKategori(value) {
        const currentUrl = new URL(window.location);
        if (value) {
            currentUrl.searchParams.set('kategori', value);
        } else {
            currentUrl.searchParams.delete('kategori');
        }
        // Reset sub kategori ketika kategori berubah
        currentUrl.searchParams.delete('sub_kategori');
        currentUrl.searchParams.delete('page'); // Reset to first page
        window.location.href = currentUrl.toString();
    }
    
    // Sub-category filter functionality
    function changeSubKategori(value) {
        const currentUrl = new URL(window.location);
        if (value) {
            currentUrl.searchParams.set('sub_kategori', value);
        } else {
            currentUrl.searchParams.delete('sub_kategori');
        }
        currentUrl.searchParams.delete('page'); // Reset to first page
        window.location.href = currentUrl.toString();
    }
    
    // Load sub kategori berdasarkan kategori yang dipilih
    function loadSubKategoris(kategoriId) {
        const subKategoriSelect = document.getElementById('subKategoriSelect');
        
        if (!kategoriId) {
            subKategoriSelect.innerHTML = '<option value="">Pilih kategori terlebih dahulu</option>';
            subKategoriSelect.disabled = true;
            return;
        }
        
        // Tampilkan loading
        subKategoriSelect.innerHTML = '<option value="">Loading...</option>';
        subKategoriSelect.disabled = true;
        
        // Ajax request untuk mengambil sub kategori
        fetch('<?= base_url('download/get-sub-kategori-by-kategori') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id_kategori_download=' + kategoriId
        })
        .then(response => response.json())
        .then(data => {
            subKategoriSelect.disabled = false;
            
            if (data.success && data.data.length > 0) {
                subKategoriSelect.innerHTML = '<option value="">Semua Sub Kategori</option>';
                data.data.forEach(subKategori => {
                    const option = document.createElement('option');
                    option.value = subKategori.id_sub_kategori_download;
                    option.textContent = subKategori.nama_sub_kategori_download;
                    subKategoriSelect.appendChild(option);
                });
            } else {
                subKategoriSelect.innerHTML = '<option value="">Tidak ada sub kategori</option>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            subKategoriSelect.disabled = false;
            subKategoriSelect.innerHTML = '<option value="">Error loading sub kategori</option>';
        });
    }
    
    // Event listener untuk perubahan kategori
    document.getElementById('kategoriSelect').addEventListener('change', function() {
        loadSubKategoris(this.value);
    });
    
    // Search form enhancement
    document.querySelector('.search-form').addEventListener('submit', function(e) {
        const searchInput = this.querySelector('input[name="search"]');
        if (searchInput.value.trim() === '') {
            e.preventDefault();
            alert('Mohon masukkan kata kunci pencarian');
        }
    });
    
    // Track download
    function trackDownload(id, title) {
        console.log('Download started:', title, 'ID:', id);
        // Here you can add analytics tracking
        // For now, we'll just show a loading state
        const btn = event.target.closest('.download-btn');
        if (!btn) return;
        
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Downloading...';
        btn.disabled = true;
        
        // Simulate download delay
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-check me-1"></i>Downloaded';
            btn.classList.remove('btn-primary');
            btn.classList.add('btn-success');
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('btn-success');
                btn.classList.add('btn-primary');
            }, 2000);
        }, 1500);
    }
    
    // Show login alert
    function showLoginAlert() {
        Swal.fire({
            title: 'Login Diperlukan',
            text: 'Anda harus login terlebih dahulu untuk mengunduh file ini.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Login Sekarang',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('userlogin') ?>';
            }
        });
    }
    
    // Show file info modal
    function showFileInfo(title, description, extension, downloads, fileSize) {
        const modal = new bootstrap.Modal(document.getElementById('fileInfoModal'));
        const content = document.getElementById('fileInfoContent');
        
        content.innerHTML = `
            <div class="file-info">
                <h6 class="mb-3">${title}</h6>
                <p class="text-muted mb-3">${description || 'Tidak ada deskripsi'}</p>
                <div class="file-details">
                    <div class="detail-item mb-2">
                        <strong>Format:</strong> ${extension.toUpperCase()}
                    </div>
                    <div class="detail-item mb-2">
                        <strong>Total Download:</strong> ${downloads}
                    </div>
                    <div class="detail-item">
                        <strong>Ukuran:</strong> <span class="text-muted">${fileSize}</span>
                    </div>
                </div>
            </div>
        `;
        
        modal.show();
    }
    
    // Download card click tracking
    document.querySelectorAll('.download-card').forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.closest('a, button')) {
                const downloadBtn = this.querySelector('.download-btn');
                if (downloadBtn && !downloadBtn.disabled) {
                    downloadBtn.click();
                }
            }
        });
    });
    
    // File type icons and hover effects
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effects for download cards
        document.querySelectorAll('.download-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Add loading state for search form
        const searchForm = document.querySelector('.search-form');
        if (searchForm) {
            searchForm.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    submitBtn.disabled = true;
                }
            });
        }
    });
</script>

<?= $this->include('frontend/layout/footer') ?> 