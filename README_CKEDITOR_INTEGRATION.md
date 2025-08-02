# Integrasi CKEditor untuk Form Berita

## Overview
Sistem berita telah diperbaiki dengan menambahkan CKEditor untuk field "Isi Berita" pada form create dan edit. CKEditor memberikan rich text editing capabilities dengan toolbar yang lengkap dan fitur upload gambar.

## Perubahan yang Dilakukan

### 1. Form Create (`create.php`)

#### **CKEditor Integration**
- **Rich Text Editor**: Mengganti textarea biasa dengan CKEditor
- **Toolbar Configuration**: Toolbar yang disesuaikan untuk kebutuhan berita
- **Image Upload**: Fitur upload gambar langsung dari editor
- **Height Setting**: Tinggi editor 300px untuk kenyamanan editing

#### **JavaScript Enhancement**
- **CKEditor Initialization**: Inisialisasi CKEditor dengan konfigurasi khusus
- **Form Validation**: Validasi menggunakan `CKEDITOR.instances.isi.getData()`
- **File Upload**: Konfigurasi upload URL untuk gambar

### 2. Form Edit (`edit.php`)

#### **CKEditor Integration**
- **Same Configuration**: Menggunakan konfigurasi yang sama dengan create
- **Content Loading**: CKEditor otomatis memuat konten yang sudah ada
- **Validation Update**: Validasi form menggunakan data CKEditor

### 3. Controller (`Berita.php`)

#### **Method `upload_image()`**
- **File Validation**: Validasi tipe file (JPG, PNG, GIF)
- **Size Validation**: Maksimal 2MB per file
- **Security Check**: Validasi login dan role admin
- **File Storage**: Upload ke folder `public/uploads/berita/`
- **JSON Response**: Response format yang sesuai dengan CKEditor

### 4. Routes (`Routes.php`)

#### **New Route**
- **Upload Route**: `POST berita/upload_image` untuk handle upload gambar

## Konfigurasi CKEditor

### 1. Toolbar Configuration
```javascript
CKEDITOR.replace('isi', {
    height: 300,
    removePlugins: 'elementspath,resize',
    removeButtons: 'Save,Form,Radio,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,About',
    toolbarGroups: [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] }
    ],
    removeDialogTabs: 'image:advanced;link:advanced',
    filebrowserUploadUrl: '<?= base_url('berita/upload_image') ?>',
    filebrowserImageUploadUrl: '<?= base_url('berita/upload_image') ?>'
});
```

### 2. Upload Configuration
- **Upload URL**: `berita/upload_image`
- **File Types**: JPG, PNG, GIF
- **Max Size**: 2MB
- **Storage Path**: `public/uploads/berita/`

## Fitur Baru

### 1. Rich Text Editing
- **Bold, Italic, Underline**: Format teks dasar
- **Lists**: Bullet dan numbered lists
- **Alignment**: Left, center, right alignment
- **Links**: Insert dan edit hyperlinks
- **Images**: Upload dan insert gambar
- **Colors**: Text dan background colors
- **Styles**: Predefined text styles

### 2. Image Management
- **Upload**: Upload gambar langsung dari editor
- **Resize**: Resize gambar dalam editor
- **Alignment**: Align gambar left, center, right
- **Alt Text**: Alt text untuk accessibility

### 3. Enhanced User Experience
- **WYSIWYG**: What You See Is What You Get editing
- **Real-time Preview**: Preview format secara real-time
- **Keyboard Shortcuts**: Shortcut untuk common actions
- **Undo/Redo**: Undo dan redo changes

## File yang Dimodifikasi

### Views
- `app/Views/backend/berita/create.php`
- `app/Views/backend/berita/edit.php`

### Controllers
- `app/Controllers/Berita.php`

### Routes
- `app/Config/Routes.php`

## Testing

### 1. Test CKEditor Loading
- Buka halaman create/edit berita
- Verifikasi CKEditor muncul menggantikan textarea
- Test toolbar buttons berfungsi

### 2. Test Text Formatting
- Test bold, italic, underline
- Test lists (bullet dan numbered)
- Test alignment (left, center, right)
- Test colors dan styles

### 3. Test Image Upload
- Klik tombol image di toolbar
- Upload gambar dari komputer
- Verifikasi gambar muncul di editor
- Test resize dan alignment gambar

### 4. Test Form Submission
- Isi konten dengan formatting
- Submit form
- Verifikasi konten tersimpan dengan format HTML
- Test edit berita yang sudah ada

### 5. Test Validation
- Test submit dengan konten kosong
- Test upload file yang tidak valid
- Test upload file terlalu besar

## Troubleshooting

### 1. CKEditor Tidak Muncul
- Periksa path CKEditor sudah benar
- Verifikasi file `ckeditor.js` ada di `public/ckeditor/`
- Cek console browser untuk error JavaScript

### 2. Upload Gambar Gagal
- Periksa folder `public/uploads/berita/` sudah ada
- Verifikasi permission folder (777)
- Cek log error untuk detail masalah

### 3. Format Tidak Tersimpan
- Periksa method `store()` dan `update()` di controller
- Verifikasi field `isi` tersimpan dengan HTML
- Cek database untuk memastikan data tersimpan

### 4. Validation Error
- Periksa form validation menggunakan CKEditor data
- Verifikasi `CKEDITOR.instances.isi.getData()` berfungsi
- Test dengan konten kosong dan berisi

## Security Considerations

### 1. File Upload Security
- **Type Validation**: Hanya JPG, PNG, GIF yang diizinkan
- **Size Limit**: Maksimal 2MB per file
- **Authentication**: Hanya admin yang bisa upload
- **Random Names**: File disimpan dengan nama random

### 2. XSS Prevention
- **HTML Sanitization**: CKEditor memiliki built-in sanitization
- **Content Validation**: Validasi konten sebelum disimpan
- **Output Escaping**: Gunakan `esc()` untuk output HTML

### 3. Access Control
- **Login Check**: Semua upload memerlukan login
- **Role Check**: Hanya admin yang bisa upload
- **CSRF Protection**: Form menggunakan CSRF token

## Notes
- CKEditor memberikan rich text editing yang powerful
- Upload gambar langsung dari editor meningkatkan UX
- Konfigurasi toolbar disesuaikan untuk kebutuhan berita
- Security measures diterapkan untuk mencegah abuse
- Backup data sebelum testing di production 