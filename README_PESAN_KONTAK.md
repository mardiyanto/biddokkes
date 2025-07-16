# Fitur Pesan Kontak - Biddokkes POLRI

## Deskripsi
Fitur pesan kontak memungkinkan pengunjung website untuk mengirim pesan melalui form kontak di frontend, dan admin dapat mengelola pesan tersebut di backend.

## Struktur Database

### Tabel: `pesan_kontak`
```sql
CREATE TABLE `pesan_kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('baru','dibaca','dibalas') DEFAULT 'baru',
  `tanggal_kirim` timestamp DEFAULT CURRENT_TIMESTAMP,
  `tanggal_dibaca` timestamp NULL DEFAULT NULL,
  `tanggal_dibalas` timestamp NULL DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```

## File yang Dibuat

### 1. Model
- `app/Models/PesanKontakModel.php` - Model untuk mengelola data pesan kontak

### 2. Controller
- `app/Controllers/PesanKontak.php` - Controller untuk CRUD pesan kontak di backend
- `app/Controllers/Frontend.php` - Ditambahkan method `sendContact()` untuk menangani pengiriman form

### 3. View Backend
- `app/Views/backend/pesan_kontak/index.php` - Halaman daftar pesan kontak
- `app/Views/backend/pesan_kontak/show.php` - Halaman detail pesan
- `app/Views/backend/pesan_kontak/reply.php` - Form balas pesan

### 4. View Frontend
- `app/Views/frontend/contact.php` - Diupdate untuk menangani form submission

### 5. Routes
- Ditambahkan di `app/Config/Routes.php`

## Fitur yang Tersedia

### Frontend
1. **Form Kontak**
   - Input nama, email, telepon, subjek, dan pesan
   - Validasi form (client-side dan server-side)
   - Pesan sukses/error
   - Auto-hide alerts

2. **Subjek yang Tersedia**
   - Informasi Umum
   - Layanan Kesehatan
   - Pendaftaran
   - Keluhan
   - Saran
   - Lainnya

### Backend (Admin)
1. **Dashboard**
   - Statistik pesan (total, baru, dibaca, dibalas)
   - Grafik pesan per bulan
   - Pesan terbaru

2. **Kelola Pesan**
   - Daftar semua pesan dengan filter status
   - Pencarian berdasarkan nama, email, subjek, atau pesan
   - Detail pesan dengan timeline
   - Tandai sebagai dibaca/dibalas
   - Hapus pesan

3. **Bulk Actions**
   - Tandai multiple pesan sebagai dibaca
   - Tandai multiple pesan sebagai dibalas
   - Hapus multiple pesan

4. **Export Data**
   - Export ke CSV berdasarkan filter

5. **Template Balasan**
   - Template otomatis berdasarkan subjek
   - Template untuk berbagai jenis pesan

## Cara Penggunaan

### 1. Import Database
```bash
# Jalankan file SQL untuk membuat tabel
mysql -u username -p database_name < pesan_kontak.sql
```

### 2. Akses Menu
- **Frontend**: `/contact` - Form kontak untuk pengunjung
- **Backend**: `/pesan-kontak` - Kelola pesan (admin)

### 3. Workflow Admin
1. Login sebagai admin
2. Akses menu "Pesan Kontak"
3. Lihat daftar pesan dengan status
4. Klik "Lihat" untuk detail pesan
5. Tandai sebagai "Dibaca" atau "Dibalas"
6. Tambahkan catatan admin jika diperlukan

### 4. Workflow Frontend
1. Pengunjung mengisi form kontak
2. Sistem validasi input
3. Pesan disimpan dengan status "baru"
4. Admin dapat melihat dan menindaklanjuti

## Validasi

### Frontend Validation
- Nama: required, min 3 karakter, max 255 karakter
- Email: required, valid email format, max 255 karakter
- Telepon: optional, max 20 karakter
- Subjek: required, max 255 karakter
- Pesan: required, min 10 karakter
- Setuju: required checkbox

### Backend Validation
- Validasi server-side menggunakan CodeIgniter validation
- Pesan error yang informatif
- Redirect dengan input data jika ada error

## Keamanan
- CSRF protection
- Input sanitization
- Session validation untuk admin
- Role-based access control

## Template Balasan
Sistem menyediakan template otomatis berdasarkan subjek:
- **Informasi Umum**: Template untuk pertanyaan umum
- **Layanan Kesehatan**: Template untuk layanan kesehatan
- **Pendaftaran**: Template untuk proses pendaftaran
- **Keluhan**: Template untuk penanganan keluhan
- **Saran**: Template untuk saran dan masukan

## Notifikasi
- Alert sukses/error di frontend
- Auto-hide setelah 5 detik
- Flash message untuk feedback user

## Statistik Dashboard
- Total pesan
- Pesan baru (belum dibaca)
- Pesan sudah dibaca
- Pesan sudah dibalas
- Grafik pesan per bulan

## Export Data
- Export ke CSV
- Filter berdasarkan status
- Format: ID, Nama, Email, Telepon, Subjek, Pesan, Status, Tanggal Kirim, Tanggal Dibaca, Tanggal Dibalas, Catatan Admin 