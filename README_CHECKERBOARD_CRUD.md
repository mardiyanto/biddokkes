# CRUD Checkerboard Carousel - Dokumentasi

## Deskripsi
CRUD (Create, Read, Update, Delete) untuk Checkerboard Carousel adalah sistem manajemen layanan yang akan ditampilkan dalam format carousel grid 2x2 di frontend website. Sistem ini memungkinkan admin untuk mengelola layanan-layanan yang ditampilkan dalam section "Layanan Kami" di halaman utama.

## Fitur CRUD
- ✅ **Create**: Tambah layanan baru dengan ikon, deskripsi, dan link
- ✅ **Read**: Lihat daftar semua layanan dengan statistik
- ✅ **Update**: Edit layanan yang sudah ada
- ✅ **Delete**: Hapus layanan yang tidak diperlukan
- ✅ **Toggle Status**: Aktif/nonaktif layanan
- ✅ **Reorder**: Mengatur urutan tampilan
- ✅ **Icon Picker**: Pilih ikon Font Awesome dengan modal
- ✅ **Preview**: Preview ikon dan nama layanan
- ✅ **Statistics**: Dashboard statistik layanan

## Struktur Database

### Tabel: `checkerboard_carousel`
```sql
CREATE TABLE `checkerboard_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(255) NOT NULL,
  `deskripsi` text,
  `ikon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## File yang Dibuat

### 1. Model
- `app/Models/CheckerboardCarouselModel.php`

### 2. Controller
- `app/Controllers/CheckerboardCarousel.php`

### 3. Views
- `app/Views/backend/checkerboard_carousel/index.php`
- `app/Views/backend/checkerboard_carousel/create.php`
- `app/Views/backend/checkerboard_carousel/edit.php`

### 4. Database
- `checkerboard_carousel.sql`

### 5. Routes
- Ditambahkan di `app/Config/Routes.php`

## Cara Penggunaan

### 1. Import Database
```sql
-- Jalankan file checkerboard_carousel.sql di database
```

### 2. Akses Menu
- Login sebagai admin
- Menu: **Konten Website** > **Checkerboard Carousel**

### 3. Menambah Layanan Baru
1. Klik tombol "Tambah Layanan"
2. Isi form:
   - **Nama Layanan**: Nama layanan (contoh: Poli Jantung)
   - **Ikon**: Klik "Pilih Ikon" untuk memilih ikon Font Awesome
   - **Deskripsi**: Deskripsi singkat layanan
   - **Link**: Link ke halaman detail (opsional)
   - **Urutan**: Urutan tampilan dalam carousel
   - **Status**: Aktif/Nonaktif
3. Klik "Simpan Layanan"

### 4. Mengedit Layanan
1. Klik ikon edit (pensil) pada layanan yang ingin diedit
2. Ubah data yang diperlukan
3. Klik "Update Layanan"

### 5. Menghapus Layanan
1. Klik ikon hapus (tempat sampah) pada layanan yang ingin dihapus
2. Konfirmasi penghapusan
3. Layanan akan dihapus permanen

### 6. Toggle Status
1. Klik ikon toggle (on/off) untuk mengubah status
2. Layanan aktif akan ditampilkan di frontend
3. Layanan nonaktif tidak akan ditampilkan

## Integrasi Frontend

### 1. Controller Frontend
Tambahkan di `app/Controllers/Frontend.php`:
```php
public function index()
{
    $checkerboardCarouselModel = new \App\Models\CheckerboardCarouselModel();
    $data = [
        'layanan' => $checkerboardCarouselModel->getActiveLayanan(),
        // ... data lainnya
    ];
    
    return view('frontend/home', $data);
}
```

### 2. View Frontend
Gunakan data layanan di view `frontend/home.php`:
```php
<?php if (!empty($layanan)): ?>
    <!-- Checkerboard Carousel Section -->
    <section class="checkerboard-section py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h6 class="text-primary fw-bold mb-2">LAYANAN KAMI</h6>
                <h2 class="section-title">Fasilitas & Layanan Unggulan</h2>
                <div class="title-line mx-auto"></div>
            </div>
            
            <div id="checkerboardCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel content -->
                <?php 
                $slides = array_chunk($layanan, 4);
                foreach ($slides as $slideIndex => $slideItems): 
                ?>
                <div class="carousel-item <?= $slideIndex === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <?php foreach ($slideItems as $index => $item): ?>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="checkerboard-item <?= ($index % 2 == 0) ? 'primary-item' : 'secondary-item' ?>">
                                <div class="item-content">
                                    <div class="item-icon">
                                        <i class="<?= esc($item['ikon']) ?>"></i>
                                    </div>
                                    <h4><?= esc($item['nama_layanan']) ?></h4>
                                    <p><?= esc($item['deskripsi']) ?></p>
                                    <?php if ($item['link']): ?>
                                    <a href="<?= esc($item['link']) ?>" class="btn btn-sm btn-outline-light">Selengkapnya</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
```

## Statistik Dashboard

### Cards Statistik
- **Total Layanan**: Jumlah semua layanan
- **Aktif**: Jumlah layanan yang aktif
- **Nonaktif**: Jumlah layanan yang nonaktif
- **Slide**: Jumlah slide yang akan ditampilkan (4 layanan per slide)

### Data Tables
- Tabel dengan fitur search, sort, dan pagination
- Kolom: No, Ikon, Nama Layanan, Deskripsi, Slug, Link, Urutan, Status, Aksi

## Validasi dan Keamanan

### 1. Validasi Input
- Nama layanan wajib diisi
- Ikon wajib diisi
- Deskripsi wajib diisi
- Urutan harus berupa angka positif
- Status harus 'aktif' atau 'nonaktif'

### 2. Keamanan
- CSRF protection
- XSS protection dengan `esc()`
- Role-based access control (admin only)
- Session validation

### 3. File Upload
- Tidak ada file upload untuk layanan ini
- Hanya menggunakan ikon Font Awesome

## Icon Picker

### Fitur
- Modal popup untuk memilih ikon
- Search ikon berdasarkan nama
- Preview ikon yang dipilih
- Daftar ikon Font Awesome yang umum digunakan

### Ikon yang Tersedia
- Medical icons: heartbeat, tooth, baby, user-md, stethoscope
- Laboratory icons: flask, microscope, vial, test-tube
- Hospital icons: hospital, clinic-medical, ambulance, bed
- And many more...

## Troubleshooting

### 1. Menu Tidak Muncul
- Pastikan routes sudah ditambahkan
- Pastikan menu sudah ditambahkan di headeradmin.php
- Refresh cache browser

### 2. Error Database
- Pastikan tabel sudah dibuat
- Pastikan struktur tabel sesuai
- Cek koneksi database

### 3. Ikon Tidak Muncul
- Pastikan Font Awesome sudah dimuat
- Cek nama class ikon
- Pastikan tidak ada typo

### 4. Carousel Tidak Berfungsi
- Pastikan Bootstrap JS sudah dimuat
- Cek console browser untuk error
- Pastikan data layanan tidak kosong

## Customization

### 1. Mengubah Jumlah Item per Slide
```php
// Di model
public function getLayananPerSlide($itemsPerSlide = 6) // Ubah dari 4 ke 6
```

### 2. Mengubah Warna Theme
```css
.checkerboard-item.primary-item {
    background: linear-gradient(135deg, #your-color 0%, #your-dark-color 100%);
}
```

### 3. Menambah Field Baru
1. Tambah kolom di database
2. Update model `$allowedFields`
3. Update form create/edit
4. Update view index

## Dependencies
- CodeIgniter 4
- Bootstrap 4/5
- Font Awesome 5/6
- DataTables
- SweetAlert2
- jQuery

## Browser Support
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Version History
- v1.0.0: Initial release dengan CRUD lengkap
- v1.1.0: Tambah icon picker dan preview
- v1.2.0: Tambah statistik dashboard 