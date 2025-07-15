# Frontend Biddokkes POLRI

## Deskripsi
Frontend website Biddokkes POLRI yang responsif dan modern dengan gradasi warna navy, meniru desain website Pusdokkes Polri. Dibuat menggunakan Bootstrap 5, Font Awesome, dan berbagai library JavaScript untuk memberikan pengalaman pengguna yang optimal.

## Fitur Utama

### 🎨 Design & UI/UX
- **Gradasi Warna Navy**: Menggunakan gradasi warna navy yang elegan dan profesional
- **Responsif**: Fully responsive untuk desktop, tablet, dan mobile
- **Modern UI**: Menggunakan Bootstrap 5 dengan custom styling
- **Animasi**: AOS (Animate On Scroll) untuk animasi yang smooth
- **Typography**: Google Fonts Poppins untuk tipografi yang modern

### 📱 Halaman Utama
- **Hero Slider**: Carousel dengan slide yang dinamis
- **Statistik**: Quick stats dengan animasi
- **Profil**: Bagian tentang Biddokkes POLRI
- **Galeri**: Preview galeri terbaru
- **Berita Terbaru**: Berita terbaru dengan card yang menarik

### 📰 Berita
- **Daftar Berita**: Grid layout dengan filter kategori
- **Detail Berita**: Halaman detail dengan berita terkait
- **Pencarian**: Fitur pencarian berita
- **Kategori**: Filter berdasarkan kategori

### 🖼️ Galeri
- **Grid Gallery**: Layout grid yang responsif
- **Lightbox**: Preview gambar dengan lightbox
- **Pencarian**: Fitur pencarian galeri
- **Sorting**: Sort berdasarkan tanggal dan judul

### 📥 Download
- **File Management**: Manajemen file download
- **Kategori**: Filter berdasarkan kategori
- **Pencarian**: Fitur pencarian file
- **Download Tracking**: Tracking jumlah download

### 📄 Halaman Statis
- **Profil**: Halaman profil Biddokkes
- **Kontak**: Halaman kontak dengan form
- **Halaman Dinamis**: Sistem halaman yang fleksibel

### 🔍 Pencarian
- **Global Search**: Pencarian di semua konten
- **Filter**: Filter berdasarkan jenis konten
- **Highlight**: Highlight kata kunci pencarian

## Struktur File

```
app/Views/frontend/
├── layout/
│   ├── header.php          # Header template
│   └── footer.php          # Footer template
├── home.php               # Halaman utama
├── berita.php            # Daftar berita
├── berita_detail.php     # Detail berita
├── galeri.php            # Galeri
├── download.php          # Download
├── halaman.php           # Halaman statis
├── contact.php           # Halaman kontak
└── search.php            # Halaman pencarian
```

## Controller

### FrontendController
- `index()`: Halaman utama
- `berita()`: Daftar berita
- `beritaDetail($slug)`: Detail berita
- `galeri()`: Galeri
- `download()`: Download
- `halaman($slug)`: Halaman statis
- `contact()`: Halaman kontak
- `search()`: Pencarian

## Routes

```php
// Frontend routes
$routes->get('/', 'Frontend::index');
$routes->get('berita', 'Frontend::berita');
$routes->get('berita/(:segment)', 'Frontend::beritaDetail/$1');
$routes->get('galeri', 'Frontend::galeri');
$routes->get('halaman/(:segment)', 'Frontend::halaman/$1');
$routes->get('download', 'Frontend::download');
$routes->get('download/file/(:num)', 'Frontend::downloadFile/$1');
$routes->get('contact', 'Frontend::contact');
$routes->get('search', 'Frontend::search');
```

## Dependencies

### CSS Libraries
- Bootstrap 5.3.0
- Font Awesome 6.4.0
- Google Fonts (Poppins)
- Lightbox 2.11.4
- AOS 2.3.1

### JavaScript Libraries
- jQuery 3.7.1
- Bootstrap 5.3.0 JS
- Lightbox 2.11.4 JS
- AOS 2.3.1 JS

## Color Scheme

```css
:root {
    --primary-navy: #1e3a8a;
    --secondary-navy: #1e40af;
    --accent-blue: #3b82f6;
    --light-blue: #dbeafe;
    --white: #ffffff;
    --gray-100: #f8fafc;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-600: #475569;
    --gray-800: #1e293b;
}
```

## Komponen UI

### Header
- Top header dengan informasi kontak dan social media
- Main header dengan logo dan search box
- Navigation menu yang responsif

### Footer
- Informasi Biddokkes POLRI
- Menu utama
- Layanan
- Kontak
- Social media links
- Back to top button

### Cards
- News cards dengan hover effects
- Gallery cards dengan lightbox
- Download cards dengan file icons
- Stat cards dengan animations

### Forms
- Search forms dengan styling yang konsisten
- Contact form dengan validasi
- Newsletter subscription

## Responsive Breakpoints

- **Desktop**: 1200px+
- **Tablet**: 768px - 1199px
- **Mobile**: < 768px
- **Small Mobile**: < 576px

## Animations

### AOS Animations
- `fade-up`: Fade in dari bawah
- `fade-right`: Fade in dari kanan
- `fade-left`: Fade in dari kiri
- `fade-down`: Fade in dari atas

### CSS Transitions
- Hover effects pada cards
- Button hover effects
- Navigation hover effects
- Image zoom effects

## SEO Features

- Meta tags yang dinamis
- Open Graph tags
- Structured data
- Sitemap ready
- Clean URLs dengan slug

## Performance

- Lazy loading untuk images
- Optimized CSS dan JS
- Minified assets
- CDN untuk external libraries
- Image optimization

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Installation & Setup

1. **Pastikan struktur folder sudah benar**
   ```
   Biddokkes/
   ├── app/
   │   ├── Controllers/
   │   │   └── Frontend.php
   │   ├── Models/
   │   │   ├── BeritaModel.php
   │   │   ├── HalamanModel.php
   │   │   ├── DownloadModel.php
   │   │   └── GaleriModel.php
   │   └── Views/
   │       └── frontend/
   └── public/
       └── assets/
           └── images/
   ```

2. **Update Routes**
   - Pastikan routes frontend sudah ditambahkan di `app/Config/Routes.php`

3. **Database**
   - Pastikan tabel sudah memiliki field yang diperlukan
   - Tambahkan field `slug` dan `view_count` di tabel berita jika belum ada

4. **Assets**
   - Buat folder `public/assets/images/` untuk gambar default
   - Tambahkan logo dan gambar placeholder

## Customization

### Mengubah Warna
Edit variabel CSS di `header.php`:
```css
:root {
    --primary-navy: #your-color;
    --secondary-navy: #your-color;
    --accent-blue: #your-color;
}
```

### Mengubah Font
Ganti Google Fonts di `header.php`:
```html
<link href="https://fonts.googleapis.com/css2?family=YourFont:wght@300;400;500;600;700&display=swap" rel="stylesheet">
```

### Menambah Halaman Baru
1. Buat method di `FrontendController`
2. Buat view di `app/Views/frontend/`
3. Tambahkan route di `Routes.php`

## Troubleshooting

### Masalah Umum

1. **Gambar tidak muncul**
   - Periksa path folder uploads
   - Pastikan permission folder benar
   - Cek apakah file ada di server

2. **CSS tidak load**
   - Periksa CDN links
   - Pastikan internet connection
   - Cek browser console untuk errors

3. **JavaScript tidak berfungsi**
   - Periksa jQuery sudah load
   - Cek browser console untuk errors
   - Pastikan script tags benar

4. **Responsive tidak bekerja**
   - Periksa viewport meta tag
   - Pastikan Bootstrap CSS load
   - Test di berbagai device

### Debug Mode

Aktifkan debug mode di `app/Config/Boot/production.php`:
```php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
```

## Maintenance

### Regular Tasks
- Update dependencies secara berkala
- Backup database dan files
- Monitor performance
- Update content secara rutin

### Security
- Update CodeIgniter ke versi terbaru
- Monitor error logs
- Backup secara berkala
- Validasi input user

## Support

Untuk bantuan dan support:
- Email: info@biddokkes.polri.go.id
- Phone: (021) 721-1234
- Website: https://biddokkes.polri.go.id

## License

© 2024 Biddokkes POLRI. All rights reserved. 