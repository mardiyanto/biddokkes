# Sistem Login User untuk Download

## Overview
Sistem login user telah diimplementasikan untuk mengamankan akses ke file download. User harus login terlebih dahulu sebelum dapat mengunduh file.

## Fitur yang Diimplementasikan

### 1. Kontroler UserLogin
- **File**: `app/Controllers/UserLogin.php`
- **Fungsi**: Menangani login/logout user frontend
- **Method**:
  - `index()`: Menampilkan form login
  - `doLogin()`: Memproses login
  - `logout()`: Logout user
  - `checkLogin()`: Cek status login

### 2. View Login User
- **File**: `app/Views/frontend/user_login.php`
- **Fitur**:
  - Form login yang menarik dengan gradient design
  - Toggle password visibility
  - Validasi form
  - Auto-hide alerts
  - Responsive design

### 3. Modifikasi Frontend Controller
- **File**: `app/Controllers/Frontend.php`
- **Method yang dimodifikasi**:
  - `downloadFile()`: Tambah pengecekan login
  - `previewPdf()`: Tambah pengecekan login
  - `forceDownload()`: Tambah pengecekan login

### 4. Modifikasi View Download
- **File**: `app/Views/frontend/download.php`
- **Fitur baru**:
  - Alert status login di bagian atas
  - Tombol download yang berbeda untuk user login/belum login
  - SweetAlert2 untuk notifikasi login

### 5. Routes
- **File**: `app/Config/Routes.php`
- **Routes baru**:
  ```php
  $routes->get('userlogin', 'UserLogin::index');
  $routes->post('userlogin/doLogin', 'UserLogin::doLogin');
  $routes->get('userlogin/logout', 'UserLogin::logout');
  ```

## Cara Kerja

### 1. User Belum Login
- Ketika user mengakses halaman download, akan muncul alert warning
- Tombol download akan menampilkan "Login untuk Download"
- Jika user klik download, akan muncul SweetAlert2 dengan opsi login
- User akan diarahkan ke halaman login

### 2. User Sudah Login
- Alert hijau menampilkan nama user yang login
- Tombol download berfungsi normal
- User dapat mengunduh file tanpa hambatan

### 3. Proses Login
- User mengisi form username dan password
- Sistem memverifikasi dengan database
- Jika berhasil, session disimpan dan user diarahkan ke halaman sebelumnya
- Jika gagal, pesan error ditampilkan

## Database

### Tabel Users
```sql
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `nama` varchar(100) NOT NULL,
    `role` enum('admin','user') NOT NULL DEFAULT 'user',
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Setup dan Testing

### 1. Jalankan Script Add User
```bash
cd Biddokkes
php add_user_default.php
```

### 2. User Default yang Dibuat
- **Admin**: username: `admin`, password: `admin123`
- **User**: username: `user`, password: `user123`

### 3. Testing
1. Akses halaman download: `http://localhost:8080/frontdownload`
2. Coba download file tanpa login (akan diarahkan ke login)
3. Login dengan user default
4. Coba download file lagi (seharusnya berhasil)

## Session Management

### Session Keys untuk User
- `user_id`: ID user
- `username`: Username user
- `nama`: Nama lengkap user
- `role`: Role user (admin/user)
- `user_logged_in`: Status login (true/false)

### Redirect After Login
- Sistem menyimpan URL yang ingin diakses sebelum login
- Setelah login berhasil, user diarahkan kembali ke URL tersebut

## Keamanan

### 1. Password Hashing
- Password di-hash menggunakan `password_hash()` dengan `PASSWORD_DEFAULT`
- Verifikasi menggunakan `password_verify()`

### 2. Session Security
- Session menggunakan CodeIgniter's built-in session handler
- Session data disimpan dengan aman

### 3. Input Validation
- Validasi username dan password tidak boleh kosong
- Sanitasi input untuk mencegah SQL injection

## Troubleshooting

### 1. Login Gagal
- Pastikan database terhubung dengan benar
- Cek apakah user ada di database
- Pastikan password di-hash dengan benar

### 2. Session Tidak Bertahan
- Cek konfigurasi session di `app/Config/App.php`
- Pastikan folder `writable/session/` dapat ditulis

### 3. Redirect Tidak Berfungsi
- Cek apakah session `redirect_after_login` tersimpan dengan benar
- Pastikan URL redirect valid

## Customization

### 1. Mengubah Design Login
- Edit file `app/Views/frontend/user_login.php`
- Modifikasi CSS untuk mengubah tampilan

### 2. Menambah Validasi
- Edit method `doLogin()` di `UserLogin.php`
- Tambahkan validasi sesuai kebutuhan

### 3. Menambah Role
- Edit enum `role` di database
- Modifikasi logika role di kontroler

## Dependencies

### CSS/JS Libraries
- Bootstrap 5.3.0
- Font Awesome 6.4.0
- SweetAlert2 11.x

### PHP Extensions
- mysqli
- session
- password_hash (built-in)

## Notes
- Sistem ini terpisah dari login admin backend
- Session user frontend berbeda dengan session admin
- User dapat logout dari halaman download
- Redirect setelah login mengingat halaman yang ingin diakses 