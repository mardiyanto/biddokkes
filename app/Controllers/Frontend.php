<?php

namespace App\Controllers;

class Frontend extends BaseController
{
    public function index()
    {
        try {
            $slideModel = new \App\Models\SlideModel();
            $halamanModel = new \App\Models\HalamanModel();
            $galeriModel = new \App\Models\GaleriModel();
            $beritaModel = new \App\Models\BeritaModel();
            $profilModel = new \App\Models\ProfilModel();
            
            // Ambil slide aktif saja
            $slides = $slideModel->getActiveSlides() ?: [];
            
            // Debug: Log slides data
            log_message('info', 'Active slides data: ' . json_encode($slides));
            
            // Ambil halaman profil
            $profil = $halamanModel->getHalamanBySlug('profil');
            
            // Ambil data profil website
            $profilWebsite = $profilModel->getProfil();
            
            // Ambil galeri terbaru (6 item)
            $galeri = $galeriModel->getLatest(6) ?: [];
            
            // Ambil berita terbaru (3 item)
            $berita_terbaru = $beritaModel->getLatest(3) ?: [];
            
            return view('frontend/home', [
                'slides' => $slides,
                'profil' => $profil,
                'profilWebsite' => $profilWebsite,
                'galeri' => $galeri,
                'berita_terbaru' => $berita_terbaru
            ]);
        } catch (\Exception $e) {
            // Log error
            log_message('error', 'Frontend index error: ' . $e->getMessage());
            
            // Return view with empty data
            return view('frontend/home', [
                'slides' => [],
                'profil' => null,
                'profilWebsite' => null,
                'galeri' => [],
                'berita_terbaru' => []
            ]);
        }
    }
    
    public function galeri()
    {
        try {
            $galeriModel = new \App\Models\GaleriModel();
            $profilModel = new \App\Models\ProfilModel();
            
            $search = $this->request->getGet('search');
            $sort = $this->request->getGet('sort') ?: 'latest';
            
            $galeri = $galeriModel->getAllWithSearch($search, $sort) ?: [];
            $profilWebsite = $profilModel->getProfil();
            
            return view('frontend/galeri', [
                'galeri' => $galeri,
                'search' => $search,
                'sort' => $sort,
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Frontend galeri error: ' . $e->getMessage());
            
            return view('frontend/galeri', [
                'galeri' => [],
                'search' => '',
                'sort' => 'latest',
                'profilWebsite' => null
            ]);
        }
    }
    
    public function berita()
    {
        try {
            $beritaModel = new \App\Models\BeritaModel();
            $kategoriModel = new \App\Models\KategoriModel();
            $profilModel = new \App\Models\ProfilModel();
            
            $search = $this->request->getGet('search');
            $kategori = $this->request->getGet('kategori');
            $page = $this->request->getGet('page') ?: 1;
            
            $berita = $beritaModel->getAllWithSearch($search, $kategori, $page) ?: [];
            $kategoris = $kategoriModel->findAll() ?: [];
            $profilWebsite = $profilModel->getProfil();
            
            return view('frontend/berita', [
                'berita' => $berita,
                'kategoris' => $kategoris,
                'search' => $search,
                'kategori' => $kategori,
                'page' => $page,
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Frontend berita error: ' . $e->getMessage());
            
            return view('frontend/berita', [
                'berita' => [],
                'kategoris' => [],
                'search' => '',
                'kategori' => '',
                'page' => 1,
                'profilWebsite' => null
            ]);
        }
    }
    
    public function beritaDetail($slug)
    {
        try {
            $beritaModel = new \App\Models\BeritaModel();
            $profilModel = new \App\Models\ProfilModel();
            
            $berita = $beritaModel->getBeritaBySlug($slug);
            
            if (!$berita) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
            }
            
            // Ambil berita terkait
            $berita_terkait = $beritaModel->getRelatedBerita($berita['id_berita'], $berita['id_kategori'], 3) ?: [];
            $profilWebsite = $profilModel->getProfil();
            
            return view('frontend/berita_detail', [
                'berita' => $berita,
                'berita_terkait' => $berita_terkait,
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\CodeIgniter\Exceptions\PageNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            log_message('error', 'Frontend berita detail error: ' . $e->getMessage());
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }
    }
    
    public function halaman($slug)
    {
        try {
            $halamanModel = new \App\Models\HalamanModel();
            $profilModel = new \App\Models\ProfilModel();
            
            $halaman = $halamanModel->getHalamanBySlug($slug);
            
            if (!$halaman) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan');
            }
            
            $profilWebsite = $profilModel->getProfil();
            
            return view('frontend/halaman', [
                'halaman' => $halaman,
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\CodeIgniter\Exceptions\PageNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            log_message('error', 'Frontend halaman error: ' . $e->getMessage());
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan');
        }
    }
    
    public function download()
    {
        try {
            $downloadModel = new \App\Models\DownloadModel();
            $kategoriDownloadModel = new \App\Models\KategoriDownloadModel();
            $profilModel = new \App\Models\ProfilModel();
            
            $search = $this->request->getGet('search');
            $kategori = $this->request->getGet('kategori');
            $page = $this->request->getGet('page') ?: 1;
            
            // Validasi input
            $search = trim($search ?? '');
            $kategori = trim($kategori ?? '');
            $page = max(1, intval($page));
            
            $downloads = $downloadModel->getAllWithSearch($search, $kategori, $page) ?: [];
            $kategoris = $kategoriDownloadModel->findAll() ?: [];
            $profilWebsite = $profilModel->getProfil();
            
            // Debug: Log kategori data
            log_message('info', 'Kategori data: ' . json_encode($kategoris));
            
            // Validasi data downloads
            foreach ($downloads as &$download) {
                $download['judul'] = $download['judul'] ?? 'File Download';
                $download['deskripsi'] = $download['deskripsi'] ?? '';
                $download['file'] = $download['file'] ?? '';
                $download['download_count'] = intval($download['download_count'] ?? 0);
                $download['created_at'] = $download['created_at'] ?? date('Y-m-d H:i:s');
                $download['nama_kategori'] = $download['nama_kategori'] ?? 'Umum';
            }
            
            return view('frontend/download', [
                'downloads' => $downloads,
                'kategoris' => $kategoris,
                'search' => $search,
                'kategori' => $kategori,
                'page' => $page,
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Frontend download error: ' . $e->getMessage());
            
            return view('frontend/download', [
                'downloads' => [],
                'kategoris' => [],
                'search' => '',
                'kategori' => '',
                'page' => 1,
                'profilWebsite' => null
            ]);
        }
    }
    
    public function downloadFile($id)
    {
        try {
            $downloadModel = new \App\Models\DownloadModel();
            
            // Validasi ID
            $id = intval($id);
            if ($id <= 0) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID file tidak valid');
            }
            
            $download = $downloadModel->find($id);
            
            if (!$download) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan');
            }
            
            // Gunakan nama_file sesuai dengan Download.php
            $file_path = FCPATH . 'uploads/download/' . ($download['nama_file'] ?? $download['file']);
            
            if (!file_exists($file_path)) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan di server');
            }
            
            // Update hit counter sesuai dengan Download.php
            $downloadModel->update($id, [
                'hits' => ($download['hits'] ?? 0) + 1,
                'download_count' => ($download['download_count'] ?? 0) + 1
            ]);
            
            // Generate safe filename
            $safe_filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $download['judul']);
            $extension = pathinfo($download['nama_file'] ?? $download['file'], PATHINFO_EXTENSION);
            $download_filename = $safe_filename . '.' . $extension;
            
            return $this->response->download($file_path, $download_filename);
        } catch (\CodeIgniter\Exceptions\PageNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            log_message('error', 'Frontend download file error: ' . $e->getMessage());
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak dapat diunduh');
        }
    }
    
    public function contact()
    {
        try {
            $profilModel = new \App\Models\ProfilModel();
            $profilWebsite = $profilModel->getProfil();
            
            return view('frontend/contact', [
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Frontend contact error: ' . $e->getMessage());
            
            return view('frontend/contact', [
                'profilWebsite' => null
            ]);
        }
    }
    
    public function search()
    {
        try {
            $keyword = $this->request->getGet('q');
            
            if (!$keyword || trim($keyword) === '') {
                return redirect()->to('/');
            }
            
            $keyword = trim($keyword);
            
            $beritaModel = new \App\Models\BeritaModel();
            $halamanModel = new \App\Models\HalamanModel();
            $downloadModel = new \App\Models\DownloadModel();
            $profilModel = new \App\Models\ProfilModel();
            
            $berita_results = $beritaModel->search($keyword, 5) ?: [];
            $halaman_results = $halamanModel->search($keyword, 5) ?: [];
            $download_results = $downloadModel->search($keyword, 5) ?: [];
            $profilWebsite = $profilModel->getProfil();
            
            return view('frontend/search', [
                'keyword' => $keyword,
                'berita_results' => $berita_results,
                'halaman_results' => $halaman_results,
                'download_results' => $download_results,
                'profilWebsite' => $profilWebsite
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Frontend search error: ' . $e->getMessage());
            
            return view('frontend/search', [
                'keyword' => $keyword ?? '',
                'berita_results' => [],
                'halaman_results' => [],
                'download_results' => [],
                'profilWebsite' => null
            ]);
        }
    }
} 