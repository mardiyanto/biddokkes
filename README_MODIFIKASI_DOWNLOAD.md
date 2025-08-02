# Modifikasi Sistem Download dengan Sub Kategori

## Overview
Sistem download telah dimodifikasi untuk menggunakan sub kategori yang terkait dengan kategori utama. Perubahan ini memungkinkan organisasi file download yang lebih terstruktur.

## Perubahan yang Dilakukan

### 1. Database Structure
- **Tabel `download`**: Mengubah foreign key dari `id_kategori_download` menjadi `id_sub_kategori_download`
- **Relasi**: `download` → `sub_kategori_download` → `kategori_download`

### 2. Model Changes (`DownloadModel.php`)
- Mengubah `$allowedFields` dari `id_kategori_download` menjadi `id_sub_kategori_download`
- Memodifikasi semua method untuk join dengan `sub_kategori_download` dan `kategori_download`
- Menambahkan method `getByIdWithKategori()` untuk mengambil data dengan kategori dan sub kategori

### 3. Controller Changes (`Download.php`)
- Menambahkan `SubkategoriDownloadModel` ke constructor
- Mengubah validation rules untuk `id_sub_kategori_download`
- Menambahkan method AJAX `getSubKategoriByKategori()` untuk dropdown dinamis
- Memperbaiki method `create()` dan `edit()` untuk mengirim data kategori

### 4. View Changes

#### `create.php`
- Menambahkan dropdown untuk kategori dan sub kategori
- JavaScript untuk dropdown yang saling terkait
- AJAX untuk memuat sub kategori berdasarkan kategori yang dipilih

#### `edit.php`
- Dropdown kategori dan sub kategori yang sudah terisi
- JavaScript untuk memuat sub kategori saat halaman dimuat
- Handling untuk data yang sudah ada

#### `index.php`
- Menambahkan kolom "Sub Kategori" di tabel
- Menampilkan badge untuk kategori dan sub kategori

### 5. Routes (`Routes.php`)
- Menambahkan route untuk AJAX method: `download/get-sub-kategori-by-kategori`

## Cara Kerja

### Flow Create/Edit
1. User memilih kategori dari dropdown pertama
2. JavaScript mengirim AJAX request ke `getSubKategoriByKategori()`
3. Controller mengambil sub kategori berdasarkan kategori yang dipilih
4. Dropdown sub kategori diisi dengan data yang sesuai
5. User memilih sub kategori
6. Form disubmit dengan `id_sub_kategori_download`

### Database Query
```sql
SELECT download.*, 
       sub_kategori_download.nama_sub_kategori_download, 
       kategori_download.nama_kategori_download
FROM download
JOIN sub_kategori_download ON sub_kategori_download.id_sub_kategori_download = download.id_sub_kategori_download
JOIN kategori_download ON kategori_download.id_kategori_download = sub_kategori_download.id_kategori_download
```

## File yang Dimodifikasi

### Controllers
- `app/Controllers/Download.php`

### Models
- `app/Models/DownloadModel.php`

### Views
- `app/Views/backend/download/create.php`
- `app/Views/backend/download/edit.php`
- `app/Views/backend/download/index.php`

### Routes
- `app/Config/Routes.php`

### Database
- `update_download_table.sql` (script untuk migrasi)

## Setup Database

### 1. Backup Database
```sql
CREATE TABLE download_backup AS SELECT * FROM download;
```

### 2. Jalankan Script Migrasi
```sql
-- Jalankan file update_download_table.sql
```

### 3. Verifikasi Data
```sql
SELECT d.*, sk.nama_sub_kategori_download, kd.nama_kategori_download
FROM download d
JOIN sub_kategori_download sk ON sk.id_sub_kategori_download = d.id_sub_kategori_download
JOIN kategori_download kd ON kd.id_kategori_download = sk.id_kategori_download;
```

## Testing

### 1. Test Create Download
- Buka halaman create download
- Pilih kategori dari dropdown pertama
- Verifikasi sub kategori muncul di dropdown kedua
- Isi form dan submit
- Verifikasi data tersimpan dengan benar

### 2. Test Edit Download
- Buka halaman edit download
- Verifikasi kategori dan sub kategori terisi dengan benar
- Ubah kategori dan verifikasi sub kategori berubah
- Submit form dan verifikasi data terupdate

### 3. Test Index Download
- Buka halaman index download
- Verifikasi kolom kategori dan sub kategori ditampilkan
- Verifikasi data ditampilkan dengan benar

## Troubleshooting

### 1. Sub Kategori Tidak Muncul
- Periksa apakah ada data di tabel `sub_kategori_download`
- Periksa console browser untuk error JavaScript
- Periksa network tab untuk error AJAX

### 2. Error Database
- Pastikan foreign key constraint sudah benar
- Periksa apakah semua tabel terkait sudah ada
- Verifikasi data mapping sudah benar

### 3. JavaScript Error
- Periksa console browser
- Pastikan jQuery dan library lain sudah dimuat
- Periksa URL AJAX request

## Notes
- Pastikan backup database sebelum menjalankan script migrasi
- Test di environment development terlebih dahulu
- Verifikasi semua fitur berfungsi setelah migrasi 