<?php

namespace App\Controllers;

use App\Models\HalamanModel;

class Halaman extends BaseController
{
    protected $halamanModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanModel();
    }

    public function index()
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'title' => 'Kelola Halaman',
            'halaman' => $this->halamanModel->findAll()
        ];

        return view('backend/halaman/index', $data);
    }

    public function create()
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'title' => 'Tambah Halaman'
        ];

        return view('backend/halaman/create', $data);
    }

    public function store()
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $judul = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');
        $penulis = $this->request->getPost('penulis');
        $tanggal_publish = $this->request->getPost('tanggal_publish');
        
        // Generate slug dari judul
        $slug = url_title($judul, '-', TRUE);
        
        // Cek apakah slug sudah ada
        if ($this->halamanModel->isSlugExists($slug)) {
            $slug = $slug . '-' . time();
        }
        
        // Upload gambar
        $gambar = '';
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Buat folder jika belum ada
            $uploadPath = ROOTPATH . 'public/uploads/halaman/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $gambar = $newName;
        }

        $data = [
            'judul' => $judul,
            'slug' => $slug,
            'konten' => $konten,
            'gambar' => $gambar,
            'penulis' => $penulis,
            'tanggal_publish' => $tanggal_publish
        ];

        if ($this->halamanModel->insert($data)) {
            session()->setFlashdata('success', 'Halaman berhasil ditambahkan!');
            return redirect()->to('/halaman');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan halaman!');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id = null)
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $halaman = $this->halamanModel->find($id);
        if (!$halaman) {
            return redirect()->to('/halaman')->with('error', 'Halaman tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Halaman',
            'halaman' => $halaman
        ];

        return view('backend/halaman/edit', $data);
    }

    public function update($id = null)
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $halaman = $this->halamanModel->find($id);
        if (!$halaman) {
            return redirect()->to('/halaman')->with('error', 'Halaman tidak ditemukan!');
        }

        $judul = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');
        $penulis = $this->request->getPost('penulis');
        $tanggal_publish = $this->request->getPost('tanggal_publish');
        
        // Debug: Log data yang diterima
        log_message('debug', 'Update Halaman - ID: ' . $id);
        log_message('debug', 'Judul: ' . $judul);
        log_message('debug', 'Konten length: ' . strlen($konten));
        log_message('debug', 'Penulis: ' . $penulis);
        log_message('debug', 'Tanggal: ' . $tanggal_publish);
        
        // Validasi data
        if (empty($judul) || empty($konten) || empty($penulis) || empty($tanggal_publish)) {
            session()->setFlashdata('error', 'Semua field yang bertanda * harus diisi!');
            return redirect()->back()->withInput();
        }
        
        // Generate slug dari judul jika judul berubah
        $slug = $halaman['slug'];
        if ($judul !== $halaman['judul']) {
            $slug = url_title($judul, '-', TRUE);
            // Cek apakah slug sudah ada (kecuali untuk halaman ini sendiri)
            if ($this->halamanModel->isSlugExists($slug, $id)) {
                $slug = $slug . '-' . time();
            }
        }
        
        // Validasi slug manual
        if (empty($slug)) {
            session()->setFlashdata('error', 'Slug tidak boleh kosong!');
            return redirect()->back()->withInput();
        }
        
        // Cek duplikasi slug (kecuali untuk halaman ini sendiri)
        if ($this->halamanModel->isSlugExists($slug, $id)) {
            session()->setFlashdata('error', 'Slug sudah digunakan!');
            return redirect()->back()->withInput();
        }
        
        $data = [
            'judul' => $judul,
            'slug' => $slug,
            'konten' => $konten,
            'penulis' => $penulis,
            'tanggal_publish' => $tanggal_publish
        ];

        // Upload gambar baru jika ada
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Buat folder jika belum ada
            $uploadPath = ROOTPATH . 'public/uploads/halaman/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            // Hapus gambar lama
            if ($halaman['gambar'] && file_exists($uploadPath . $halaman['gambar'])) {
                unlink($uploadPath . $halaman['gambar']);
            }
            
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $data['gambar'] = $newName;
        }

        try {
            $result = $this->halamanModel->update($id, $data);
            log_message('debug', 'Update result: ' . ($result ? 'success' : 'failed'));
            
            if ($result) {
                session()->setFlashdata('success', 'Halaman berhasil diupdate!');
                return redirect()->to('/halaman');
            } else {
                // Get validation errors
                $errors = $this->halamanModel->errors();
                log_message('error', 'Validation errors: ' . json_encode($errors));
                session()->setFlashdata('error', 'Gagal mengupdate halaman! ' . implode(', ', $errors));
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception in update: ' . $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function delete($id = null)
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $halaman = $this->halamanModel->find($id);
        if ($halaman) {
            // Hapus gambar
            $uploadPath = ROOTPATH . 'public/uploads/halaman/';
            if ($halaman['gambar'] && file_exists($uploadPath . $halaman['gambar'])) {
                unlink($uploadPath . $halaman['gambar']);
            }
        }

        if ($this->halamanModel->delete($id)) {
            session()->setFlashdata('success', 'Halaman berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus halaman!');
        }

        return redirect()->to('/halaman');
    }

    // Method untuk frontend
    public function show($slug = null)
    {
        $halaman = $this->halamanModel->getBySlug($slug);
        
        if (!$halaman) {
            return redirect()->to('/')->with('error', 'Halaman tidak ditemukan.');
        }

        $data = [
            'title' => $halaman['judul'],
            'halaman' => $halaman
        ];

        return view('frontend/halaman/show', $data);
    }

    public function upload_image()
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return $this->response->setJSON(['error' => 'Unauthorized']);
        }

        $file = $this->request->getFile('upload');
        
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['error' => 'No file uploaded']);
        }

        // Validasi tipe file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
            return $this->response->setJSON(['error' => 'Invalid file type. Only JPG, PNG, and GIF are allowed.']);
        }

        // Validasi ukuran file (max 2MB)
        if ($file->getSize() > 2 * 1024 * 1024) {
            return $this->response->setJSON(['error' => 'File size too large. Maximum 2MB allowed.']);
        }

        // Buat folder jika belum ada
        $uploadPath = ROOTPATH . 'public/uploads/halaman/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Generate nama file yang unik
        $newName = $file->getRandomName();
        
        // Pindahkan file
        if ($file->move($uploadPath, $newName)) {
            $url = base_url('uploads/halaman/' . $newName);
            return $this->response->setJSON([
                'url' => $url,
                'uploaded' => 1,
                'fileName' => $newName
            ]);
        } else {
            return $this->response->setJSON(['error' => 'Failed to upload file']);
        }
    }
} 