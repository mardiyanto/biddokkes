# Fitur Otomatis CRUD Berita - Dokumentasi

## Deskripsi
Fitur otomatis pada CRUD Berita memungkinkan sistem untuk mengisi beberapa field secara otomatis, mengurangi kesalahan input dan mempercepat proses pembuatan berita.

## Fitur Otomatis yang Ditambahkan

### 1. ✅ Slug Otomatis
- **Deskripsi**: Slug akan diisi otomatis berdasarkan judul berita
- **Cara Kerja**: 
  - Saat user mengetik judul, slug akan di-generate secara real-time
  - Menggunakan JavaScript untuk preview di frontend
  - Menggunakan PHP untuk generate final slug di backend
- **Format Slug**:
  - Convert ke lowercase
  - Replace karakter khusus dengan dash
  - Replace spasi dengan dash
  - Remove dash di awal dan akhir
  - Jika slug kosong, gunakan 'berita'
  - Jika slug sudah ada, tambahkan timestamp

### 2. ✅ Penulis Otomatis
- **Deskripsi**: Field penulis akan diisi otomatis dari nama user yang login
- **Cara Kerja**:
  - Mengambil nama user dari session (`session()->get('nama')`)
  - Diisi otomatis saat form dibuka
  - User masih bisa mengubah jika diperlukan

### 3. ✅ ID Berita Otomatis
- **Deskripsi**: ID berita akan di-generate otomatis oleh database
- **Cara Kerja**:
  - Menggunakan auto-increment di database
  - Tidak perlu input manual

## File yang Dimodifikasi

### 1. Controller
**File**: `app/Controllers/Berita.php`

#### Perubahan pada method `create()`:
```php
$data = [
    'title' => 'Tambah Berita',
    'kategori' => $this->kategoriModel->findAll(),
    'penulis' => session()->get('nama') // Ambil nama dari session
];
```

#### Perubahan pada method `store()`:
```php
// Generate slug dari judul
$slug = $this->generateSlug($judul);

$data = [
    'id_kategori' => $id_kategori,
    'judul' => $judul,
    'slug' => $slug, // Tambahkan slug
    'isi' => $isi,
    'gambar' => $gambar,
    'penulis' => $penulis,
    'tanggal_terbit' => $tanggal_terbit
];
```

#### Perubahan pada method `edit()`:
```php
$data = [
    'title' => 'Edit Berita',
    'berita' => $berita,
    'kategori' => $this->kategoriModel->findAll(),
    'penulis' => session()->get('nama') // Ambil nama dari session
];
```

#### Perubahan pada method `update()`:
```php
// Generate slug dari judul jika berubah
$slug = $berita['slug'];
if ($judul != $berita['judul']) {
    $slug = $this->generateSlug($judul);
}

$data = [
    'id_kategori' => $id_kategori,
    'judul' => $judul,
    'slug' => $slug, // Update slug jika berubah
    'isi' => $isi,
    'penulis' => $penulis,
    'tanggal_terbit' => $tanggal_terbit
];
```

#### Method baru `generateSlug()`:
```php
private function generateSlug($judul)
{
    // Convert ke lowercase
    $slug = strtolower($judul);
    
    // Replace karakter khusus dengan dash
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    
    // Replace spasi dengan dash
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    
    // Remove dash di awal dan akhir
    $slug = trim($slug, '-');
    
    // Jika slug kosong, gunakan 'berita'
    if (empty($slug)) {
        $slug = 'berita';
    }
    
    // Cek apakah slug sudah ada, jika ya tambahkan timestamp
    $existingSlug = $this->beritaModel->where('slug', $slug)->first();
    if ($existingSlug) {
        $slug = $slug . '-' . time();
    }
    
    return $slug;
}
```

#### Method baru `generateSlugAjax()`:
```php
public function generateSlugAjax()
{
    $judul = $this->request->getPost('judul');
    $slug = $this->generateSlug($judul);
    
    return $this->response->setJSON(['slug' => $slug]);
}
```

### 2. Views

#### File: `app/Views/backend/berita/create.php`

**Perubahan pada form**:
```html
<!-- Field Slug -->
<div class="form-group">
    <label>Slug <span class="text-danger">*</span></label>
    <input type="text" name="slug" id="slug" class="form-control" value="<?= old('slug') ?>" required maxlength="255" placeholder="Slug akan diisi otomatis" readonly>
    <small class="form-text text-muted">Slug akan diisi otomatis berdasarkan judul berita</small>
</div>

<!-- Field Penulis -->
<div class="form-group">
    <label>Penulis <span class="text-danger">*</span></label>
    <input type="text" name="penulis" id="penulis" class="form-control" value="<?= old('penulis', $penulis) ?>" required maxlength="100" placeholder="Masukkan nama penulis">
    <small class="form-text text-muted">Penulis diisi otomatis dari nama login Anda</small>
</div>
```

**JavaScript untuk generate slug otomatis**:
```javascript
// Generate slug otomatis saat judul diketik
$('#judul').on('input', function() {
    var judul = $(this).val();
    if (judul) {
        generateSlug(judul);
    } else {
        $('#slug').val('');
    }
});

// Function untuk generate slug
function generateSlug(judul) {
    // Convert ke lowercase
    var slug = judul.toLowerCase();
    
    // Replace karakter khusus dengan dash
    slug = slug.replace(/[^a-z0-9\s-]/g, '');
    
    // Replace spasi dengan dash
    slug = slug.replace(/[\s-]+/g, '-');
    
    // Remove dash di awal dan akhir
    slug = slug.replace(/^-+|-+$/g, '');
    
    // Jika slug kosong, gunakan 'berita'
    if (!slug) {
        slug = 'berita';
    }
    
    $('#slug').val(slug);
}
```

#### File: `app/Views/backend/berita/edit.php`

**Perubahan serupa dengan create.php**:
- Field slug dengan readonly
- Field penulis dengan nilai default dari session
- JavaScript untuk generate slug otomatis

### 3. Routes

**File**: `app/Config/Routes.php`

**Route baru ditambahkan**:
```php
$routes->post('berita/generate-slug', 'Berita::generateSlugAjax');
```

## Cara Kerja

### 1. Saat Membuat Berita Baru
1. User membuka form create
2. Field penulis otomatis terisi dengan nama user yang login
3. User mengetik judul berita
4. JavaScript otomatis generate slug dan mengisi field slug
5. User mengisi field lainnya
6. Saat submit, backend akan generate slug final dan simpan ke database

### 2. Saat Mengedit Berita
1. User membuka form edit
2. Field penulis otomatis terisi dengan nama user yang login
3. Field slug menampilkan slug yang sudah ada
4. Jika user mengubah judul, slug akan di-generate ulang
5. Saat submit, backend akan update slug jika judul berubah

## Validasi

### 1. Slug Validation
- Slug wajib diisi
- Maksimal 255 karakter
- Format: lowercase, dash sebagai separator
- Tidak boleh kosong

### 2. Penulis Validation
- Penulis wajib diisi
- Maksimal 100 karakter
- Diisi otomatis dari session

### 3. Form Validation
- Semua field wajib diisi
- Validasi dilakukan di frontend dan backend
- SweetAlert2 untuk notifikasi error

## Keuntungan

### 1. User Experience
- ✅ Mengurangi kesalahan input
- ✅ Mempercepat proses pembuatan berita
- ✅ Interface yang lebih user-friendly
- ✅ Preview slug secara real-time

### 2. SEO Friendly
- ✅ Slug yang konsisten dan SEO-friendly
- ✅ Tidak ada duplikasi slug
- ✅ Format URL yang bersih

### 3. Data Consistency
- ✅ Penulis selalu terisi dengan nama user yang login
- ✅ Slug selalu sesuai dengan judul
- ✅ Tidak ada data kosong

## Troubleshooting

### 1. Slug Tidak Terisi Otomatis
- Pastikan JavaScript berfungsi
- Cek console browser untuk error
- Pastikan field judul memiliki ID yang benar

### 2. Penulis Tidak Terisi Otomatis
- Pastikan user sudah login
- Cek session 'nama' tersedia
- Pastikan field penulis memiliki value yang benar

### 3. Slug Duplikat
- Sistem otomatis menambahkan timestamp jika slug duplikat
- Cek database untuk slug yang sudah ada

## Browser Support
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Dependencies
- CodeIgniter 4
- jQuery
- SweetAlert2
- Bootstrap 4/5

## Version History
- v1.0.0: Initial release dengan fitur otomatis
- v1.1.0: Tambah validasi dan error handling
- v1.2.0: Perbaikan generate slug dengan timestamp 