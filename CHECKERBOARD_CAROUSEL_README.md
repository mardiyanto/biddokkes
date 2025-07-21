# Carousel Checkerboard - Dokumentasi

## Deskripsi
Carousel Checkerboard adalah komponen carousel yang menampilkan item dalam layout grid dengan pola visual yang bergantian (checkerboard pattern). Komponen ini dirancang untuk menampilkan layanan, fasilitas, atau item lainnya dalam format yang menarik dan responsif.

## Fitur
- ✅ Layout grid 2x2 per slide
- ✅ Pola visual bergantian (primary/secondary)
- ✅ Animasi hover yang smooth
- ✅ Responsif untuk semua ukuran layar
- ✅ Data dinamis dari database
- ✅ Fallback ke konten statis
- ✅ Kontrol carousel otomatis
- ✅ Indikator slide yang dinamis

## Struktur HTML

### Basic Structure
```html
<section class="checkerboard-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h6 class="text-primary fw-bold mb-2">LAYANAN KAMI</h6>
            <h2 class="section-title">Fasilitas & Layanan Unggulan</h2>
            <div class="title-line mx-auto"></div>
            <p class="text-muted mt-3">Deskripsi section</p>
        </div>
        
        <div id="checkerboardCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <!-- Dynamic indicators -->
            </div>
            
            <!-- Carousel Items -->
            <div class="carousel-inner">
                <!-- Dynamic slides -->
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#checkerboardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#checkerboardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
```

### Item Structure
```html
<div class="checkerboard-item primary-item">
    <div class="item-content">
        <div class="item-icon">
            <i class="fas fa-heartbeat"></i>
        </div>
        <h4>Judul Item</h4>
        <p>Deskripsi item</p>
        <a href="#" class="btn btn-sm btn-outline-light">Selengkapnya</a>
    </div>
</div>
```

## CSS Classes

### Main Classes
- `.checkerboard-section` - Container utama section
- `.checkerboard-grid` - Grid container untuk items
- `.checkerboard-item` - Item individual dalam grid
- `.primary-item` - Item dengan background primary color
- `.secondary-item` - Item dengan background secondary color

### Item Classes
- `.item-content` - Container konten item
- `.item-icon` - Container icon
- `.item-icon i` - Icon element

## Data Structure

### Untuk Data Dinamis
```php
$layanan = [
    [
        'nama_layanan' => 'Poli Jantung',
        'deskripsi' => 'Layanan spesialis jantung dengan teknologi modern',
        'ikon' => 'fas fa-heartbeat',
        'slug' => 'poli-jantung'
    ],
    // ... more items
];
```

### Fallback Data (Statis)
Jika tidak ada data dari database, carousel akan menampilkan 12 item layanan statis yang dibagi menjadi 3 slide.

## JavaScript Initialization

```javascript
// Checkerboard Carousel Initialization
const checkerboardCarousel = document.getElementById('checkerboardCarousel');
if (checkerboardCarousel) {
    const bsCheckerboardCarousel = new bootstrap.Carousel(checkerboardCarousel, {
        interval: 6000, // 6 seconds
        wrap: true,
        keyboard: true,
        pause: 'hover'
    });
}
```

## Responsive Behavior

### Desktop (≥992px)
- 4 items per slide (2x2 grid)
- Full height items (280px)
- Large icons (3rem)

### Tablet (768px - 991px)
- 4 items per slide (2x2 grid)
- Reduced height (240px)
- Medium icons (2.5rem)

### Mobile (≤767px)
- 4 items per slide (2x2 grid)
- Compact height (220px)
- Small icons (2rem)
- Smaller text and buttons

## Customization

### Mengubah Warna
```css
.checkerboard-item.primary-item {
    background: linear-gradient(135deg, #your-color 0%, #your-dark-color 100%);
}

.checkerboard-item.secondary-item {
    background: linear-gradient(135deg, #your-light-color 0%, #your-lighter-color 100%);
}
```

### Mengubah Jumlah Item per Slide
```php
$itemsPerSlide = 6; // Ubah dari 4 ke 6 untuk 3x2 grid
```

### Mengubah Interval Carousel
```javascript
interval: 8000, // Ubah dari 6000 ke 8000 untuk 8 detik
```

## Integrasi dengan Database

### Controller Example
```php
public function index()
{
    $data = [
        'layanan' => $this->layananModel->getActiveLayanan(),
        // ... other data
    ];
    
    return view('frontend/home', $data);
}
```

### Model Example
```php
public function getActiveLayanan()
{
    return $this->db->table('layanan')
                    ->where('status', 'aktif')
                    ->orderBy('urutan', 'ASC')
                    ->get()
                    ->getResultArray();
}
```

## Troubleshooting

### Carousel Tidak Muncul
1. Pastikan Bootstrap CSS dan JS sudah dimuat
2. Periksa console browser untuk error JavaScript
3. Pastikan ID `checkerboardCarousel` unik

### Item Tidak Responsif
1. Periksa CSS media queries
2. Pastikan Bootstrap grid classes digunakan dengan benar
3. Test di berbagai ukuran layar

### Animasi Tidak Berfungsi
1. Pastikan AOS (Animate On Scroll) sudah dimuat
2. Periksa apakah ada konflik CSS
3. Pastikan data-aos attributes sudah benar

## Browser Support
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Dependencies
- Bootstrap 5.x
- Font Awesome 5.x atau 6.x
- AOS (Animate On Scroll) - optional 