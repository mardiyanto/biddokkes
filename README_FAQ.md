# Fitur FAQ (Frequently Asked Questions) - Biddokkes POLRI

## Deskripsi
Fitur FAQ memungkinkan admin untuk mengelola pertanyaan umum yang ditampilkan di halaman kontak frontend. Admin dapat menambah, edit, hapus, dan mengatur urutan FAQ.

## Struktur Database

### Tabel: `faq`
```sql
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
```

## File yang Dibuat

### 1. Model
- `app/Models/FaqModel.php` - Model untuk mengelola data FAQ

### 2. Controller
- `app/Controllers/Faq.php` - Controller untuk CRUD FAQ di backend

### 3. View Backend
- `app/Views/backend/faq/index.php` - Halaman daftar FAQ
- `app/Views/backend/faq/create.php` - Form tambah FAQ
- `app/Views/backend/faq/edit.php` - Form edit FAQ

### 4. View Frontend
- `app/Views/frontend/contact.php` - Diupdate untuk mengambil data FAQ dari database

### 5. Routes
- Ditambahkan di `app/Config/Routes.php`

### 6. Menu
- Ditambahkan di `app/Views/backend/headeradmin.php`

## Fitur yang Tersedia

### Backend (Admin)
1. **Dashboard**
   - Statistik FAQ (total, aktif, nonaktif)
   - Grafik FAQ per bulan

2. **Kelola FAQ**
   - Daftar semua FAQ dengan filter status
   - Pencarian berdasarkan pertanyaan atau jawaban
   - Tambah FAQ baru
   - Edit FAQ
   - Hapus FAQ
   - Toggle status aktif/nonaktif

3. **Bulk Actions**
   - Aktifkan multiple FAQ
   - Nonaktifkan multiple FAQ
   - Hapus multiple FAQ

4. **Export Data**
   - Export ke CSV berdasarkan filter

5. **Urutan FAQ**
   - Pengaturan urutan tampilan
   - Drag & drop untuk reorder

### Frontend
1. **Accordion FAQ**
   - Tampilan accordion yang rapi
   - Data dari database
   - Fallback data jika tidak ada FAQ

## Cara Penggunaan

### 1. Import Database
```bash
# Jalankan file SQL untuk membuat tabel
mysql -u username -p database_name < faq.sql
```

### 2. Akses Menu
- **Backend**: `/faq` - Kelola FAQ (admin)
- **Frontend**: `/contact` - Halaman kontak dengan FAQ

### 3. Workflow Admin
1. Login sebagai admin
2. Akses menu "FAQ"
3. Tambah FAQ baru dengan pertanyaan dan jawaban
4. Atur urutan dan status
5. FAQ akan otomatis muncul di halaman kontak

### 4. Workflow Frontend
1. Pengunjung membuka halaman kontak
2. FAQ ditampilkan dalam format accordion
3. Pengunjung dapat mengklik pertanyaan untuk melihat jawaban

## Validasi

### Backend Validation
- Pertanyaan: required, min 10 karakter, max 500 karakter
- Jawaban: required, min 20 karakter, max 2000 karakter
- Urutan: required, integer, greater than 0
- Status: required, in_list[aktif,nonaktif]

### Frontend Validation
- Character counter untuk pertanyaan dan jawaban
- Form validation sebelum submit
- Konfirmasi sebelum hapus/update

## Keamanan
- CSRF protection
- Input sanitization
- Session validation untuk admin
- Role-based access control

## Fitur Tambahan
1. **Character Counter**
   - Real-time counter untuk pertanyaan dan jawaban
   - Maksimal karakter yang diizinkan

2. **Auto Urutan**
   - Otomatis set urutan berikutnya saat tambah FAQ
   - Manual override jika diperlukan

3. **Status Management**
   - Toggle status aktif/nonaktif
   - Bulk status update

4. **Search & Filter**
   - Pencarian berdasarkan pertanyaan/jawaban
   - Filter berdasarkan status

5. **Export Data**
   - Export ke CSV
   - Filter berdasarkan status

## Statistik Dashboard
- Total FAQ
- FAQ aktif
- FAQ nonaktif
- Grafik FAQ per bulan

## Fallback Data
Jika tidak ada FAQ di database, sistem akan menampilkan FAQ default:
1. Cara mendaftar layanan kesehatan
2. Jam operasional layanan
3. Dokter spesialis yang tersedia
4. Cara mengajukan keluhan/saran

## Responsive Design
- Accordion yang responsif
- Tampilan yang optimal di mobile dan desktop
- Smooth animation saat expand/collapse 