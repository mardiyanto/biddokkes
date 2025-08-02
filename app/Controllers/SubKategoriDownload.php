<?php

namespace App\Controllers;

use App\Models\SubkategoriDownloadModel;
use App\Models\KategoriDownloadModel;

class SubKategoriDownload extends BaseController
{
    protected $subKategoriModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->subKategoriModel = new SubkategoriDownloadModel();
        $this->kategoriModel = new KategoriDownloadModel();
    }

    public function index()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $data = [
            'title' => 'Sub Kategori Download',
            'sub_kategoris' => $this->subKategoriModel->getSubKategoriWithCount(),
            'kategoris' => $this->kategoriModel->findAll()
        ];

        return view('backend/sub_kategori_download/index', $data);
    }

    public function create()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $data = [
            'title' => 'Tambah Sub Kategori Download',
            'kategoris' => $this->kategoriModel->findAll()
        ];

        return view('backend/sub_kategori_download/create', $data);
    }

    public function store()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Validate input
        $rules = [
            'id_kategori_download' => 'required|integer',
            'nama_sub_kategori_download' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id_kategori_download = $this->request->getPost('id_kategori_download');
        $nama_sub_kategori_download_array = $this->request->getPost('nama_sub_kategori_download');

        // Validate that nama_sub_kategori_download is an array
        if (!is_array($nama_sub_kategori_download_array)) {
            return redirect()->back()->withInput()->with('error', 'Data sub kategori tidak valid');
        }

        // Filter out empty values and validate each
        $valid_sub_kategoris = [];
        $errors = [];

        foreach ($nama_sub_kategori_download_array as $index => $nama_sub_kategori_download) {
            $nama_sub_kategori_download = trim($nama_sub_kategori_download);
            
            // Skip empty values
            if (empty($nama_sub_kategori_download)) {
                continue;
            }

            // Validate length
            if (strlen($nama_sub_kategori_download) < 3) {
                $errors[] = "Sub kategori #" . ($index + 1) . " minimal 3 karakter";
                continue;
            }

            if (strlen($nama_sub_kategori_download) > 100) {
                $errors[] = "Sub kategori #" . ($index + 1) . " maksimal 100 karakter";
                continue;
            }

            // Check if name already exists in the same category
            if ($this->subKategoriModel->isNameExists($nama_sub_kategori_download, $id_kategori_download)) {
                $errors[] = "Sub kategori '" . $nama_sub_kategori_download . "' sudah ada dalam kategori yang dipilih";
                continue;
            }

            $valid_sub_kategoris[] = $nama_sub_kategori_download;
        }

        // If there are validation errors, return them
        if (!empty($errors)) {
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // If no valid sub kategoris, return error
        if (empty($valid_sub_kategoris)) {
            return redirect()->back()->withInput()->with('error', 'Silakan isi minimal satu nama sub kategori');
        }

        // Insert all valid sub kategoris
        $success_count = 0;
        $error_count = 0;

        foreach ($valid_sub_kategoris as $nama_sub_kategori_download) {
            $data = [
                'id_kategori_download' => $id_kategori_download,
                'nama_sub_kategori_download' => $nama_sub_kategori_download
            ];

            try {
                $this->subKategoriModel->insert($data);
                $success_count++;
            } catch (\Exception $e) {
                log_message('error', 'Error creating sub kategori download: ' . $e->getMessage());
                $error_count++;
            }
        }

        // Prepare success/error message
        if ($success_count > 0 && $error_count == 0) {
            $message = $success_count . ' sub kategori download berhasil ditambahkan';
            return redirect()->to('/subkategoridownload')->with('success', $message);
        } elseif ($success_count > 0 && $error_count > 0) {
            $message = $success_count . ' sub kategori berhasil ditambahkan, ' . $error_count . ' gagal';
            return redirect()->to('/subkategoridownload')->with('warning', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan sub kategori download');
        }
    }

    public function edit($id = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (!$id) {
            return redirect()->to('/subkategoridownload')->with('error', 'ID sub kategori tidak valid');
        }

        $sub_kategori = $this->subKategoriModel->getByIdWithKategori($id);
        if (!$sub_kategori) {
            return redirect()->to('/subkategoridownload')->with('error', 'Sub kategori tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Sub Kategori Download',
            'sub_kategori' => $sub_kategori,
            'kategoris' => $this->kategoriModel->findAll()
        ];

        return view('backend/sub_kategori_download/edit', $data);
    }

    public function update($id = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (!$id) {
            return redirect()->to('/subkategoridownload')->with('error', 'ID sub kategori tidak valid');
        }

        // Validate input
        $rules = [
            'id_kategori_download' => 'required|integer',
            'nama_sub_kategori_download' => 'required|min_length[3]|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id_kategori_download = $this->request->getPost('id_kategori_download');
        $nama_sub_kategori_download = $this->request->getPost('nama_sub_kategori_download');

        // Check if name already exists in the same category (excluding current record)
        if ($this->subKategoriModel->isNameExists($nama_sub_kategori_download, $id_kategori_download, $id)) {
            return redirect()->back()->withInput()->with('error', 'Nama sub kategori sudah ada dalam kategori yang dipilih');
        }

        $data = [
            'id_kategori_download' => $id_kategori_download,
            'nama_sub_kategori_download' => $nama_sub_kategori_download
        ];

        try {
            $this->subKategoriModel->update($id, $data);
            return redirect()->to('/subkategoridownload')->with('success', 'Sub kategori download berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', 'Error updating sub kategori download: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui sub kategori download');
        }
    }

    public function delete($id = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (!$id) {
            return redirect()->to('/subkategoridownload')->with('error', 'ID sub kategori tidak valid');
        }

        try {
            // Cek apakah sub kategori masih digunakan di tabel download
            $downloadModel = new \App\Models\DownloadModel();
            $download_count = $downloadModel->where('id_sub_kategori_download', $id)->countAllResults();
            
            if ($download_count > 0) {
                return redirect()->to('/subkategoridownload')->with('error', 'Sub kategori tidak dapat dihapus karena masih digunakan oleh ' . $download_count . ' file download');
            }

            $this->subKategoriModel->delete($id);
            return redirect()->to('/subkategoridownload')->with('success', 'Sub kategori download berhasil dihapus');
        } catch (\Exception $e) {
            log_message('error', 'Error deleting sub kategori download: ' . $e->getMessage());
            return redirect()->to('/subkategoridownload')->with('error', 'Terjadi kesalahan saat menghapus sub kategori download');
        }
    }

    /**
     * Get sub categories by parent category ID (AJAX)
     */
    public function getByKategoriId()
    {
        $id_kategori_download = $this->request->getPost('id_kategori_download');
        
        if (!$id_kategori_download) {
            return $this->response->setJSON(['success' => false, 'message' => 'ID kategori tidak valid']);
        }

        $sub_kategoris = $this->subKategoriModel->getByKategoriId($id_kategori_download);
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $sub_kategoris
        ]);
    }

    /**
     * Get sub categories for dropdown (AJAX)
     */
    public function getForDropdown()
    {
        $id_kategori_download = $this->request->getPost('id_kategori_download');
        
        $dropdown = $this->subKategoriModel->getForDropdown($id_kategori_download);
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $dropdown
        ]);
    }
} 