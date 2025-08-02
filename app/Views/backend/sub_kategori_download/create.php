<?= $this->include('backend/headeradmin') ?>
<div class="main-content">
  <?= $this->include('backend/menuatasadmin') ?>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body"></div>
    </div>
  </div>
  <div class="container-fluid mt--7">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">Tambah Sub Kategori Download</h3>
          </div>
          <div class="card-body">
            <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> <?= session()->getFlashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Error!</strong>
                <ul class="mb-0">
                  <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>

            <form action="<?= base_url('subkategoridownload/store') ?>" method="POST">
              <?= csrf_field() ?>
              
              <div class="form-group">
                <label for="id_kategori_download" class="form-control-label">Kategori Induk <span class="text-danger">*</span></label>
                <select class="form-control" id="id_kategori_download" name="id_kategori_download" required>
                  <option value="">Pilih Kategori</option>
                  <?php foreach ($kategoris as $kategori): ?>
                    <option value="<?= $kategori['id_kategori_download'] ?>" <?= (old('id_kategori_download') == $kategori['id_kategori_download']) ? 'selected' : '' ?>>
                      <?= esc($kategori['nama_kategori_download']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <small class="form-text text-muted">Pilih kategori download yang akan menjadi induk dari sub kategori ini</small>
              </div>

              <div class="form-group">
                <label for="nama_sub_kategori_download" class="form-control-label">Nama Sub Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_sub_kategori_download" name="nama_sub_kategori_download" 
                       value="<?= old('nama_sub_kategori_download') ?>" 
                       placeholder="Masukkan nama sub kategori download" 
                       minlength="3" maxlength="100" required>
                <small class="form-text text-muted">Nama sub kategori minimal 3 karakter dan maksimal 100 karakter</small>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Simpan
                </button>
                <a href="<?= base_url('subkategoridownload') ?>" class="btn btn-secondary">
                  <i class="fas fa-times"></i> Batal
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?= $this->include('backend/footeradmin') ?>
  </div>
</div>
<?= $this->include('backend/jsadmin') ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Auto-focus on nama field
  document.getElementById('nama_sub_kategori_download').focus();
  
  // Form validation
  const form = document.querySelector('form');
  form.addEventListener('submit', function(e) {
    const kategoriSelect = document.getElementById('id_kategori_download');
    const namaInput = document.getElementById('nama_sub_kategori_download');
    
    if (!kategoriSelect.value) {
      e.preventDefault();
      alert('Silakan pilih kategori induk');
      kategoriSelect.focus();
      return false;
    }
    
    if (!namaInput.value.trim()) {
      e.preventDefault();
      alert('Silakan isi nama sub kategori');
      namaInput.focus();
      return false;
    }
    
    if (namaInput.value.trim().length < 3) {
      e.preventDefault();
      alert('Nama sub kategori minimal 3 karakter');
      namaInput.focus();
      return false;
    }
  });
});
</script> 