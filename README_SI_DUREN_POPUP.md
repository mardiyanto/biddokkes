# Fitur Popup SI-DUREN

## Deskripsi
Popup selamat datang SI-DUREN adalah fitur yang menampilkan informasi tentang sistem SI-DUREN (Sistem Informasi Produk Perencanaan Biddokkes Polda Lampung) setelah user berhasil login.

## Fitur Utama

### 1. Popup Otomatis
- Popup muncul secara otomatis setelah user login berhasil
- Delay 1 detik sebelum popup ditampilkan
- Popup menutup otomatis setelah 15 detik

### 2. Konten Popup
- Judul: "Selamat Datang di SI-DUREN"
- Subtitle: "Sistem Informasi Produk Perencanaan Biddokkes Polda Lampung"
- Deskripsi lengkap tentang SI-DUREN
- Tagline: "Akses Mudah. Terarah. Akuntabel. – Itulah SI-DUREN."

### 3. Styling
- Modal dengan gradient background
- Animasi smooth saat muncul dan menghilang
- Responsive design untuk mobile dan desktop
- Button "Mengerti" untuk menutup popup manual

### 4. Session Management
- Popup hanya muncul sekali per session login
- Menggunakan session flag `show_welcome_modal`
- Flag dihapus setelah popup ditampilkan

## Implementasi

### 1. Controller (UserLogin.php)
```php
// Set session flag saat login berhasil
$session->set([
    'user_id' => $user['id'],
    'username' => $user['username'],
    'role' => $user['role'],
    'nama' => $user['nama'],
    'logged_in' => true,
    'show_welcome_modal' => true // Flag untuk popup
]);

// Method untuk clear flag
public function clearWelcomeFlag()
{
    if (session()->get('logged_in')) {
        session()->remove('show_welcome_modal');
        return $this->response->setJSON(['success' => true]);
    }
    return $this->response->setJSON(['success' => false]);
}
```

### 2. View (download.php)
```html
<!-- SI-DUREN Welcome Modal -->
<div class="modal fade" id="siDurenWelcomeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal content -->
        </div>
    </div>
</div>
```

### 3. JavaScript
```javascript
// Check if user should see welcome message (new login)
const shouldShowWelcome = <?= session()->get('show_welcome_modal') ? 'true' : 'false' ?>;

if (shouldShowWelcome) {
    setTimeout(() => {
        siDurenModal.show();
        
        // Auto close after 15 seconds
        setTimeout(() => {
            siDurenModal.hide();
        }, 15000);
        
        // Clear the flag after showing
        fetch('<?= base_url('userlogin/clear-welcome-flag') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        });
    }, 1000);
}
```

### 4. CSS Styling
```css
#siDurenWelcomeModal .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

#siDurenWelcomeModal .modal-header {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}
```

## Routes
```php
$routes->post('userlogin/clear-welcome-flag', 'UserLogin::clearWelcomeFlag');
```

## Cara Kerja

1. **Login Berhasil**: User berhasil login melalui `UserLogin::doLogin()`
2. **Set Flag**: Session flag `show_welcome_modal` diset ke `true`
3. **Redirect**: User diarahkan ke halaman download
4. **Check Flag**: JavaScript mengecek flag `show_welcome_modal`
5. **Show Popup**: Jika flag `true`, popup ditampilkan setelah 1 detik
6. **Auto Close**: Popup menutup otomatis setelah 15 detik
7. **Clear Flag**: AJAX request dikirim untuk menghapus flag
8. **Manual Close**: User bisa menutup popup dengan tombol "Mengerti"

## Keuntungan

1. **User Experience**: Memberikan informasi yang jelas tentang SI-DUREN
2. **Satu Kali**: Popup hanya muncul sekali per session login
3. **Tidak Mengganggu**: Auto-close dan bisa ditutup manual
4. **Responsive**: Tampilan yang baik di semua device
5. **Informative**: Memberikan pemahaman yang jelas tentang sistem

## Maintenance

- Popup content bisa diubah di file `download.php`
- Styling bisa dimodifikasi di bagian CSS
- Timing bisa diubah di JavaScript (delay dan auto-close)
- Session management bisa dimodifikasi di controller 