<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table = 'halaman';
    protected $primaryKey = 'id_halaman';
    protected $allowedFields = ['judul', 'slug', 'konten', 'gambar', 'penulis', 'tanggal_publish'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getHalamanBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function getPublishedHalaman()
    {
        return $this->where('tanggal_publish <=', date('Y-m-d'))
                    ->orderBy('tanggal_publish', 'DESC')
                    ->findAll();
    }

    public function isSlugExists($slug, $excludeId = null)
    {
        $query = $this->where('slug', $slug);
        if ($excludeId) {
            $query->where('id_halaman !=', $excludeId);
        }
        return $query->first() !== null;
    }
    
    public function search($keyword, $limit = 5)
    {
        return $this->groupStart()
                    ->like('judul', $keyword)
                    ->orLike('konten', $keyword)
                    ->groupEnd()
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
} 