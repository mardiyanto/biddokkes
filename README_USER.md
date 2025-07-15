# CRUD User - Biddokkes

## Deskripsi
Sistem CRUD (Create, Read, Update, Delete) untuk mengelola user/pengguna di aplikasi Biddokkes. Sistem ini menyediakan manajemen user yang aman dengan fitur role-based access control, password management, dan profile management.

## Fitur Utama

### 1. Manajemen User (Admin)
- ✅ **Create**: Tambah user baru dengan validasi lengkap
- ✅ **Read**: Lihat daftar semua user dengan DataTables
- ✅ **Update**: Edit user dengan password optional
- ✅ **Delete**: Hapus user dengan konfirmasi SweetAlert2
- ✅ **Role Management**: Assign role admin atau user
- ✅ **Username Validation**: Username harus unik
- ✅ **Password Security**: Password hashing dan strength checker
- ✅ **Progress Bar**: Indikator progress saat menyimpan data

### 2. Profile Management (User)
- ✅ **View Profile**: Lihat informasi profil sendiri
- ✅ **Edit Profile**: Edit username dan nama
- ✅ **Change Password**: Ubah password dengan validasi
- ✅ **Session Update**: Update session setelah edit profil

### 3. Security Features
- ✅ **Password Hashing**: Menggunakan password_hash() dengan bcrypt
- ✅ **Password Strength**: Real-time password strength checker
- ✅ **Username Uniqueness**: Validasi username unik
- ✅ **Role-based Access**: Hanya admin yang bisa manage user
- ✅ **Self-protection**: User tidak bisa edit/hapus dirinya sendiri
- ✅ **Admin Protection**: Tidak bisa hapus admin terakhir

## Struktur Database

### Tabel: `users`
```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## File yang Dibuat/Dimodifikasi

### Controllers
- `app/Controllers/User.php` - Controller utama untuk CRUD user

### Models
- `app/Models/UserModel.php` - Model untuk operasi database user

### Views (Backend)
- `app/Views/backend/user/index.php` - Daftar user dengan DataTables
- `app/Views/backend/user/create.php` - Form tambah user dengan password strength
- `app/Views/backend/user/edit.php` - Form edit user dengan password optional
- `app/Views/backend/user/profile.php` - View dan edit profil sendiri
- `app/Views/backend/user/change_password.php` - Form ubah password

### Routes
- `app/Config/Routes.php` - Route untuk CRUD user dan profile

### Database
- `users.sql` - Struktur database dan sample data

## Cara Penggunaan

### 1. Setup Database
```sql
-- Import file users.sql ke database
source users.sql;
```

### 2. Login Default
```
Username: admin
Password: 123456
```

### 3. Akses Admin Panel
```
URL: /user
Login sebagai admin terlebih dahulu
```

### 4. Tambah User Baru
1. Klik tombol "Tambah User"
2. Isi form dengan data yang diperlukan:
   - **Username**: Username unik (max 50 karakter)
   - **Nama Lengkap**: Nama lengkap user (max 100 karakter)
   - **Role**: Admin atau User
   - **Password**: Minimal 6 karakter
   - **Konfirmasi Password**: Harus sama dengan password
3. Klik "Simpan"

### 5. Edit User
1. Klik tombol edit (ikon pensil) pada user yang ingin diedit
2. Modifikasi data yang diperlukan
3. Password bersifat opsional (kosongkan jika tidak ingin ganti)
4. Klik "Update"

### 6. Hapus User
1. Klik tombol hapus (ikon tempat sampah) pada user yang ingin dihapus
2. Konfirmasi penghapusan di SweetAlert2
3. User akan dihapus (kecuali admin terakhir)

### 7. Edit Profil Sendiri
1. Klik tombol "Profil Saya" pada user yang sedang login
2. Edit username dan nama
3. Klik "Update Profil"

### 8. Ubah Password Sendiri
1. Klik tombol "Ubah Password" atau akses `/user/change-password`
2. Masukkan password lama
3. Masukkan password baru dan konfirmasi
4. Klik "Ubah Password"

## Fitur Khusus

### 1. Password Strength Checker
- Real-time password strength indicator
- Progress bar dengan warna (merah/kuning/hijau)
- Feedback untuk meningkatkan kekuatan password
- Validasi karakter (huruf besar, kecil, angka, simbol)

### 2. Password Visibility Toggle
- Tombol show/hide password
- Icon yang berubah (eye/eye-slash)
- Tersedia untuk semua field password

### 3. Username Validation
- Username harus unik
- Validasi real-time
- Error handling untuk username duplikat

### 4. Self-Protection
- User tidak bisa edit/hapus dirinya sendiri
- Admin tidak bisa hapus admin terakhir
- Validasi role dan permission

### 5. Profile Management
- View profil dengan informasi lengkap
- Edit profil (username dan nama)
- Update session setelah edit profil
- Link ke change password

### 6. Progress Bar
- Indikator progress saat submit form
- Animasi progress bar yang smooth
- Disable button selama proses

## Sample Data

File `users.sql` berisi sample data:
- **admin** - Administrator (role: admin)
- **user1** - User Satu (role: user)
- **user2** - User Dua (role: user)
- **operator** - Operator Sistem (role: user)

Password default untuk semua user: **123456**

## Spesifikasi Teknis

### Password Security
- **Hashing**: Menggunakan `password_hash()` dengan PASSWORD_DEFAULT
- **Verification**: Menggunakan `password_verify()`
- **Strength**: Minimal 6 karakter, dengan strength checker
- **Confirmation**: Password harus dikonfirmasi

### Role System
- **Admin**: Akses penuh ke semua fitur
- **User**: Akses terbatas (tidak bisa manage user lain)

### Database Fields
- `id` - Primary key
- `username` - Username unik (max 50 chars)
- `password` - Password hashed (max 255 chars)
- `nama` - Nama lengkap (max 100 chars)
- `role` - Role user (admin/user)
- `last_login` - Timestamp login terakhir
- `created_at` - Timestamp pembuatan
- `updated_at` - Timestamp update

## Dependencies

### CSS/JS Libraries
- Bootstrap 5.1.3
- Font Awesome 6.0.0
- DataTables 1.10.21
- SweetAlert2 11.x
- jQuery (untuk form validation)

### PHP Libraries
- CodeIgniter 4
- Password hashing functions
- Session management
- CSRF protection

## Keamanan

### Validasi Input
- Validasi required fields
- Sanitasi input untuk mencegah XSS
- Username uniqueness validation
- Password strength validation

### Akses Control
- Session-based authentication
- Role-based authorization (admin only)
- CSRF token protection
- Self-protection mechanisms

### Password Security
- Password hashing dengan bcrypt
- Password strength requirements
- Password confirmation
- Password history (future enhancement)

## Troubleshooting

### 1. Login Gagal
- Pastikan username dan password benar
- Cek apakah user ada di database
- Pastikan password sudah di-hash

### 2. Username Sudah Digunakan
- Pilih username yang berbeda
- Cek apakah username sudah ada di database

### 3. Password Tidak Cocok
- Pastikan password dan konfirmasi sama
- Cek apakah ada spasi di awal/akhir

### 4. Tidak Bisa Edit User Sendiri
- Gunakan menu "Profil Saya" untuk edit profil
- Gunakan menu "Ubah Password" untuk ganti password

### 5. Tidak Bisa Hapus Admin Terakhir
- Buat admin baru terlebih dahulu
- Pastikan ada minimal 1 admin di sistem

## Integrasi Frontend

### Cara Menampilkan User Info
```php
// Di controller atau view
$userModel = new \App\Models\UserModel();
$users = $userModel->findAll();

// Di view
foreach ($users as $user) {
    echo '<div class="user-info">';
    echo '<h3>' . $user['nama'] . '</h3>';
    echo '<p>Username: ' . $user['username'] . '</p>';
    echo '<p>Role: ' . ucfirst($user['role']) . '</p>';
    echo '</div>';
}
```

## Pengembangan Selanjutnya

### Fitur yang Bisa Ditambahkan
1. **User Groups**: Group-based permissions
2. **User Roles**: More granular role system
3. **User Permissions**: Permission-based access control
4. **User Audit Log**: Detailed user activity logging
5. **User Import/Export**: Bulk user management
6. **User Activation**: Email verification for new users
7. **Password Reset**: Forgot password functionality
8. **Two-Factor Authentication**: 2FA for enhanced security

### Optimasi
1. **API Endpoints**: REST API untuk user management
2. **Advanced Caching**: Redis/Memcached for session
3. **Rate Limiting**: Prevent brute force attacks
4. **Account Lockout**: Lock account after failed attempts
5. **Password History**: Prevent password reuse
6. **Session Management**: Multiple session handling

## Support

Untuk bantuan teknis atau pertanyaan, silakan hubungi:
- Email: support@biddokkes.go.id
- Phone: (021) 1234-5000
- Website: www.biddokkes.go.id

---

**Dibuat oleh:** Tim Development Biddokkes  
**Versi:** 1.0  
**Tanggal:** 2024  
**License:** MIT 