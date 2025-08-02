<?= $this->include('backend/headeradmin') ?>
<div class="main-content">
  <?= $this->include('backend/menuatasadmin') ?>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body"></div>
    </div>
  </div>
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow">
          <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Daftar Sub Kategori Download</h3>
            <?php if (session('role') === 'admin'): ?>
              <a href="<?= base_url('subkategoridownload/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Sub Kategori
              </a>
            <?php endif; ?>
          </div>
          <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> <?= session()->getFlashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            
            <div class="table-responsive">
              <table class="table table-bordered align-items-center table-flush" id="tabel-sub-kategori">
                <thead class="thead-light">
                  <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama Sub Kategori</th>
                    <th width="20%">Kategori Induk</th>
                    <th width="15%">Jumlah File</th>
                    <th width="15%">Tanggal Dibuat</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($sub_kategoris)): ?>
                    <?php $no=1; foreach ($sub_kategoris as $sub_kategori): ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td>
                        <strong><?= esc($sub_kategori['nama_sub_kategori_download']) ?></strong>
                      </td>
                      <td>
                        <span class="badge badge-info"><?= esc($sub_kategori['nama_kategori_download']) ?></span>
                      </td>
                      <td class="text-center">
                        <?php if ($sub_kategori['jumlah_download'] > 0): ?>
                          <span class="badge badge-success"><?= $sub_kategori['jumlah_download'] ?> file</span>
                        <?php else: ?>
                          <span class="badge badge-secondary">0 file</span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <?= date('d/m/Y H:i', strtotime($sub_kategori['created_at'])) ?>
                      </td>
                      <td class="text-center">
                        <?php if (session('role') === 'admin'): ?>
                          <a href="<?= base_url('subkategoridownload/edit/'.$sub_kategori['id_sub_kategori_download']) ?>" 
                             class="btn btn-sm btn-warning" title="Edit Sub Kategori">
                            <i class="fas fa-pencil-alt"></i> Edit
                          </a>
                          <?php if ($sub_kategori['jumlah_download'] == 0): ?>
                            <a href="<?= base_url('subkategoridownload/delete/'.$sub_kategori['id_sub_kategori_download']) ?>" 
                               class="btn btn-sm btn-danger btn-hapus-sub-kategori" title="Hapus Sub Kategori"
                               data-nama="<?= esc($sub_kategori['nama_sub_kategori_download']) ?>">
                              <i class="fas fa-trash"></i> Hapus
                            </a>
                          <?php else: ?>
                            <button class="btn btn-sm btn-secondary" disabled title="Tidak dapat dihapus karena masih digunakan">
                              <i class="fas fa-lock"></i> Terkunci
                            </button>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6" class="text-center py-4">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Tidak ada data sub kategori download.</p>
                        <?php if (session('role') === 'admin'): ?>
                          <a href="<?= base_url('subkategoridownload/create') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Sub Kategori Pertama
                          </a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->include('backend/footeradmin') ?>
  </div>
</div>
<?= $this->include('backend/jsadmin') ?>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="<?= base_url('argon/assets/js/plugins/datatables/dataTables.bootstrap4.min.css') ?>">
<!-- DataTables JS -->
<script src="<?= base_url('argon/assets/js/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('argon/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<script>
// Notifikasi SweetAlert2 dari flashdata
<?php if (session()->getFlashdata('success')): ?>
Swal.fire({
  icon: 'success',
  title: 'Sukses',
  text: '<?= session('success') ?>',
  timer: 2000,
  showConfirmButton: false
});
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
Swal.fire({
  icon: 'error',
  title: 'Gagal',
  text: '<?= session('error') ?>',
  timer: 2000,
  showConfirmButton: false
});
<?php endif; ?>

$(document).ready(function() {
  $('#tabel-sub-kategori').DataTable({
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json'
    },
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100],
    ordering: true,
    searching: true,
    stateSave: true,
    responsive: true,
    autoWidth: false,
    scrollX: true,
    scrollY: 300,
    scrollCollapse: true,
    paging: true,
    info: true,
    columnDefs: [
      { orderable: false, targets: [0, 5] } // Kolom No dan Aksi tidak bisa diurutkan
    ],
    language: {
      paginate: {
        previous: "<i class='fas fa-angle-left'></i>",
        next: "<i class='fas fa-angle-right'></i>"
      }
    }
  });
});

// SweetAlert2 konfirmasi hapus sub kategori
$(document).on('click', '.btn-hapus-sub-kategori', function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  var subKategoriName = $(this).data('nama');
  
  Swal.fire({
    title: 'Yakin hapus sub kategori ini?',
    html: `<strong>${subKategoriName}</strong><br><br>Data yang dihapus tidak bisa dikembalikan!`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
});
</script> 