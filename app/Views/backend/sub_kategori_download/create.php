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
                <label class="form-control-label">Nama Sub Kategori <span class="text-danger">*</span></label>
                <div id="sub-kategori-container">
                  <div class="input-group mb-2">
                    <input type="text" class="form-control sub-kategori-input" name="nama_sub_kategori_download[]" 
                           placeholder="Masukkan nama sub kategori download" 
                           minlength="3" maxlength="100" required>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-success btn-add-sub-kategori" title="Tambah Sub Kategori">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <small class="form-text text-muted">Nama sub kategori minimal 3 karakter dan maksimal 100 karakter. Klik tombol + untuk menambah sub kategori</small>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Simpan Semua
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

<style>
.input-group {
    transition: all 0.3s ease;
}

.input-group:hover {
    transform: translateX(2px);
}

.btn-add-sub-kategori {
    border-radius: 0 4px 4px 0;
}

.btn-remove-sub-kategori {
    border-radius: 0 4px 4px 0;
}

.sub-kategori-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.input-group-append .btn {
    border-left: 0;
}

.input-group-append .btn:hover {
    transform: scale(1.05);
}

#sub-kategori-container {
    max-height: 300px;
    overflow-y: auto;
    padding-right: 5px;
}

#sub-kategori-container::-webkit-scrollbar {
    width: 6px;
}

#sub-kategori-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

#sub-kategori-container::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

#sub-kategori-container::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.alert-warning {
    background-color: #fff3cd;
    border-color: #ffeaa7;
    color: #856404;
}

.alert-warning .fas {
    color: #f39c12;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Auto-focus on first nama field
  document.querySelector('.sub-kategori-input').focus();
  
  // Add sub kategori button functionality
  document.querySelector('.btn-add-sub-kategori').addEventListener('click', function() {
    addSubKategoriInput();
  });
  
  // Form validation
  const form = document.querySelector('form');
  form.addEventListener('submit', function(e) {
    const kategoriSelect = document.getElementById('id_kategori_download');
    const subKategoriInputs = document.querySelectorAll('.sub-kategori-input');
    
    if (!kategoriSelect.value) {
      e.preventDefault();
      Swal.fire({
        icon: 'error',
        title: 'Kategori Belum Dipilih',
        text: 'Silakan pilih kategori induk terlebih dahulu'
      });
      kategoriSelect.focus();
      return false;
    }
    
    // Check if at least one sub kategori is filled
    let hasValidInput = false;
    let filledInputs = [];
    
    subKategoriInputs.forEach((input, index) => {
      if (input.value.trim().length >= 3) {
        hasValidInput = true;
        filledInputs.push({
          index: index + 1,
          value: input.value.trim()
        });
      }
    });
    
    if (!hasValidInput) {
      e.preventDefault();
      Swal.fire({
        icon: 'error',
        title: 'Sub Kategori Kosong',
        text: 'Silakan isi minimal satu nama sub kategori'
      });
      document.querySelector('.sub-kategori-input').focus();
      return false;
    }
    
    // Validate each input
    let validationErrors = [];
    subKategoriInputs.forEach((input, index) => {
      const value = input.value.trim();
      if (value && value.length < 3) {
        validationErrors.push(`Sub kategori #${index + 1} minimal 3 karakter`);
      }
      if (value && value.length > 100) {
        validationErrors.push(`Sub kategori #${index + 1} maksimal 100 karakter`);
      }
    });
    
    if (validationErrors.length > 0) {
      e.preventDefault();
      Swal.fire({
        icon: 'error',
        title: 'Validasi Error',
        html: validationErrors.join('<br>')
      });
      return false;
    }
    
    // Show confirmation dialog
    e.preventDefault();
    Swal.fire({
      title: 'Konfirmasi Simpan',
      html: `Akan menyimpan <strong>${filledInputs.length}</strong> sub kategori:<br><br>` +
             filledInputs.map(item => `• ${item.value}`).join('<br>'),
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Simpan!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });
  
  // Function to add new sub kategori input
  function addSubKategoriInput() {
    const container = document.getElementById('sub-kategori-container');
    const inputCount = container.children.length;
    
    // Limit to maximum 10 inputs
    if (inputCount >= 10) {
      Swal.fire({
        icon: 'warning',
        title: 'Batas Maksimal',
        text: 'Maksimal 10 sub kategori dapat ditambahkan sekaligus'
      });
      return;
    }
    
    const newInputGroup = document.createElement('div');
    newInputGroup.className = 'input-group mb-2';
    newInputGroup.innerHTML = `
      <input type="text" class="form-control sub-kategori-input" name="nama_sub_kategori_download[]" 
             placeholder="Masukkan nama sub kategori download" 
             minlength="3" maxlength="100">
      <div class="input-group-append">
        <button type="button" class="btn btn-danger btn-remove-sub-kategori" title="Hapus Sub Kategori">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    `;
    
    container.appendChild(newInputGroup);
    
    // Add event listener to remove button
    newInputGroup.querySelector('.btn-remove-sub-kategori').addEventListener('click', function() {
      Swal.fire({
        title: 'Hapus Sub Kategori?',
        text: 'Sub kategori ini akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          container.removeChild(newInputGroup);
        }
      });
    });
    
    // Focus on new input
    newInputGroup.querySelector('.sub-kategori-input').focus();
    
    // Show success message
    Swal.fire({
      icon: 'success',
      title: 'Sub Kategori Ditambahkan',
      text: `Sub kategori #${inputCount + 1} telah ditambahkan`,
      timer: 1500,
      showConfirmButton: false
    });
  }
  
  // Add event listener to initial remove button (if exists)
  const initialRemoveBtn = document.querySelector('.btn-remove-sub-kategori');
  if (initialRemoveBtn) {
    initialRemoveBtn.addEventListener('click', function() {
      const inputGroup = this.closest('.input-group');
      const container = document.getElementById('sub-kategori-container');
      
      if (container.children.length > 1) {
        Swal.fire({
          title: 'Hapus Sub Kategori?',
          text: 'Sub kategori ini akan dihapus',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            container.removeChild(inputGroup);
          }
        });
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Tidak Dapat Dihapus',
          text: 'Minimal harus ada satu sub kategori'
        });
      }
    });
  }
  
  // Add keyboard shortcuts
  document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + Enter to submit form
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
      e.preventDefault();
      form.dispatchEvent(new Event('submit'));
    }
    
    // Tab to add new input when on last input
    if (e.key === 'Tab' && !e.shiftKey) {
      const inputs = document.querySelectorAll('.sub-kategori-input');
      const lastInput = inputs[inputs.length - 1];
      
      if (document.activeElement === lastInput && lastInput.value.trim()) {
        e.preventDefault();
        addSubKategoriInput();
      }
    }
  });
});
</script> 