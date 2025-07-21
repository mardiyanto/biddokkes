# Fitur Quick Stats - Biddokkes POLRI

## Deskripsi
Fitur Quick Stats memungkinkan admin untuk mengelola statistik yang ditampilkan di halaman utama (homepage) frontend. Admin dapat menambah, edit, hapus, dan mengatur urutan statistik yang akan ditampilkan di section "Quick Stats".

## Struktur Database

### Tabel: `stats`
```sql
CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `angka` varchar(50) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
```

## File yang Dibuat

### 1. Database
- `stats.sql` - File SQL untuk membuat tabel dan sample data

### 2. Model
- `app/Models/StatsModel.php` - Model untuk mengelola data Quick Stats

### 3. Controller
- `app/Controllers/Stats.php` - Controller untuk CRUD Quick Stats di backend

### 4. View Backend
- `app/Views/backend/stats/index.php` - Halaman daftar Quick Stats
- `app/Views/backend/stats/create.php` - Form tambah Quick Stats
- `app/Views/backend/stats/edit.php` - Form edit Quick Stats

### 5. Update Frontend
- `app/Controllers/Frontend.php` - Diupdate untuk mengambil data stats
- `app/Views/frontend/home.php` - Diupdate untuk menampilkan stats dari database

### 6. Routes & Menu
- `app/Config/Routes.php` - Ditambahkan route untuk stats
- `app/Views/backend/headeradmin.php` - Ditambahkan menu Quick Stats

### 7. Dashboard Integration
- `app/Controllers/Dashboard.php` - Ditambahkan statistik stats
- `app/Views/backend/admin.php` & `user.php` - Ditambahkan card statistik stats

## Fitur yang Tersedia

### Backend (Admin)
1. **Dashboard**
   - Statistik Quick Stats (total stats)
   - Card statistik di dashboard admin dan user

2. **Kelola Quick Stats**
   - Daftar semua stats dengan filter status
   - Pencarian berdasarkan judul, angka, atau deskripsi
   - Tambah stats baru
   - Edit stats
   - Hapus stats
   - Toggle status aktif/nonaktif

3. **Pilihan Ikon**
   - Dropdown dengan pilihan FontAwesome populer
   - Kategori: Kesehatan & Medis, Statistik & Data, Orang & Tim, Bangunan & Lokasi, Waktu & Pengalaman, Pencapaian & Penghargaan, Lainnya
   - Preview ikon yang dipilih

4. **Bulk Actions**
   - Aktifkan multiple stats
   - Nonaktifkan multiple stats
   - Hapus multiple stats

5. **Export Data**
   - Export ke CSV berdasarkan filter

6. **Urutan Stats**
   - Pengaturan urutan tampilan
   - Auto-set urutan berikutnya

### Frontend
1. **Dynamic Stats**
   - Tampilan stats dari database
   - Hanya menampilkan stats dengan status 'aktif'
   - Urut sesuai urutan yang ditentukan
   - Fallback data jika tidak ada stats

2. **Responsive Design**
   - Tampilan yang optimal di mobile dan desktop
   - AOS animation untuk efek fade-up

## Cara Penggunaan

### 1. Import Database
```bash
# Jalankan file SQL untuk membuat tabel
mysql -u username -p database_name < stats.sql
```

### 2. Akses Menu
- **Backend**: `/stats` - Kelola Quick Stats (admin)
- **Frontend**: `/` - Halaman utama dengan Quick Stats

### 3. Workflow Admin
1. Login sebagai admin
2. Akses menu "Quick Stats"
3. Tambah stats baru dengan:
   - Judul (contoh: "Dokter Spesialis")
   - Angka (contoh: "150+")
   - Ikon (pilih dari dropdown FontAwesome)
   - Deskripsi (opsional)
   - Urutan (1, 2, 3, dst)
   - Status (aktif/nonaktif)
4. Stats akan otomatis muncul di halaman utama

### 4. Workflow Frontend
1. Pengunjung membuka halaman utama
2. Quick Stats ditampilkan dalam format card
3. Hanya stats dengan status 'aktif' yang ditampilkan
4. Urutan sesuai dengan pengaturan di backend

## Validasi

### Backend Validation
- Judul: required, min 3 karakter, max 255 karakter
- Angka: required, max 50 karakter
- Ikon: required, max 100 karakter
- Urutan: required, integer, greater than 0
- Status: required, in_list[aktif,nonaktif]

### Frontend Validation
- Character counter untuk judul, angka, deskripsi
- Form validation sebelum submit
- Konfirmasi sebelum hapus/update
- Preview ikon yang dipilih

## Keamanan
- CSRF protection
- Input sanitization
- Session validation untuk admin
- Role-based access control

## Fitur Tambahan
1. **Character Counter**
   - Real-time counter untuk judul, angka, deskripsi
   - Maksimal karakter yang diizinkan

2. **Icon Preview**
   - Preview ikon yang dipilih secara real-time
   - Dropdown dengan kategori ikon yang terorganisir

3. **Auto Urutan**
   - Otomatis set urutan berikutnya saat tambah stats
   - Manual override jika diperlukan

4. **Status Management**
   - Toggle status aktif/nonaktif
   - Bulk status update

5. **Search & Filter**
   - Pencarian berdasarkan judul/angka/deskripsi
   - Filter berdasarkan status

6. **Export Data**
   - Export ke CSV
   - Filter berdasarkan status

## Statistik Dashboard
- Total Quick Stats
- Card statistik di dashboard admin dan user

## Fallback Data
Jika tidak ada stats di database, sistem akan menampilkan stats default:
1. 150+ Dokter Spesialis
2. 25+ Rumah Sakit
3. 50K+ Pasien Dilayani
4. 30+ Tahun Pengalaman

## Responsive Design
- Card stats yang responsif
- Tampilan yang optimal di mobile dan desktop
- AOS animation untuk efek fade-up
- Grid layout yang fleksibel

## Pilihan Ikon FontAwesome
Fitur ini menyediakan pilihan ikon FontAwesome yang populer untuk statistik:

### Kesehatan & Medis
- 👨‍⚕️ Dokter (`fas fa-user-md`)
- 👩‍⚕️ Perawat (`fas fa-user-nurse`)
- 🏥 Rumah Sakit (`fas fa-hospital`)
- 💊 Medical Kit (`fas fa-medical-kit`)
- 💓 Heartbeat (`fas fa-heartbeat`)
- 🩺 Stethoscope (`fas fa-stethoscope`)

### Statistik & Data
- 📊 Chart Bar (`fas fa-chart-bar`)
- 📈 Chart Line (`fas fa-chart-line`)
- 🥧 Chart Pie (`fas fa-chart-pie`)
- % Percentage (`fas fa-percentage`)
- 🧮 Calculator (`fas fa-calculator`)

### Orang & Tim
- 👥 Users (`fas fa-users`)
- 👤 User (`fas fa-user`)
- 👫 User Friends (`fas fa-user-friends`)
- 🎓 Graduate (`fas fa-user-graduate`)
- 👔 Business User (`fas fa-user-tie`)

### Dan masih banyak lagi... 