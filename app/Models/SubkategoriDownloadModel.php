<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkategoriDownloadModel extends Model
{
    protected $table            = 'sub_kategori_download';
    protected $primaryKey       = 'id_sub_kategori_download';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kategori_download', 'nama_sub_kategori_download'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [
        'id_kategori_download' => 'required|integer',
        'nama_sub_kategori_download' => 'required|min_length[3]|max_length[100]'
    ];
    protected $validationMessages   = [
        'id_kategori_download' => [
            'required' => 'Kategori download harus dipilih',
            'integer' => 'ID kategori download harus berupa angka'
        ],
        'nama_sub_kategori_download' => [
            'required' => 'Nama sub kategori download harus diisi',
            'min_length' => 'Nama sub kategori download minimal 3 karakter',
            'max_length' => 'Nama sub kategori download maksimal 100 karakter'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Get all sub categories with parent category name
     */
    public function getAllWithKategori()
    {
        return $this->select('sub_kategori_download.*, kategori_download.nama_kategori_download')
                    ->join('kategori_download', 'kategori_download.id_kategori_download = sub_kategori_download.id_kategori_download')
                    ->orderBy('kategori_download.nama_kategori_download', 'ASC')
                    ->orderBy('sub_kategori_download.nama_sub_kategori_download', 'ASC')
                    ->findAll();
    }

    /**
     * Get sub categories by parent category ID
     */
    public function getByKategoriId($id_kategori_download)
    {
        return $this->where('id_kategori_download', $id_kategori_download)
                    ->orderBy('nama_sub_kategori_download', 'ASC')
                    ->findAll();
    }

    /**
     * Get sub category by ID with parent category name
     */
    public function getByIdWithKategori($id)
    {
        return $this->select('sub_kategori_download.*, kategori_download.nama_kategori_download')
                    ->join('kategori_download', 'kategori_download.id_kategori_download = sub_kategori_download.id_kategori_download')
                    ->where('sub_kategori_download.id_sub_kategori_download', $id)
                    ->first();
    }

    /**
     * Check if sub category name exists in the same parent category
     */
    public function isNameExists($nama, $id_kategori_download, $exclude_id = null)
    {
        $builder = $this->where('nama_sub_kategori_download', $nama)
                        ->where('id_kategori_download', $id_kategori_download);
        
        if ($exclude_id) {
            $builder->where('id_sub_kategori_download !=', $exclude_id);
        }
        
        return $builder->countAllResults() > 0;
    }

    /**
     * Get sub categories for dropdown
     */
    public function getForDropdown($id_kategori_download = null)
    {
        $builder = $this->select('id_sub_kategori_download, nama_sub_kategori_download')
                        ->orderBy('nama_sub_kategori_download', 'ASC');
        
        if ($id_kategori_download) {
            $builder->where('id_kategori_download', $id_kategori_download);
        }
        
        $results = $builder->findAll();
        $dropdown = [];
        
        foreach ($results as $row) {
            $dropdown[$row['id_sub_kategori_download']] = $row['nama_sub_kategori_download'];
        }
        
        return $dropdown;
    }

    /**
     * Get sub categories grouped by parent category
     */
    public function getGroupedByKategori()
    {
        $results = $this->getAllWithKategori();
        $grouped = [];
        
        foreach ($results as $row) {
            $kategori_name = $row['nama_kategori_download'];
            if (!isset($grouped[$kategori_name])) {
                $grouped[$kategori_name] = [];
            }
            $grouped[$kategori_name][] = $row;
        }
        
        return $grouped;
    }

    /**
     * Get sub categories with parent category name and download count
     */
    public function getSubKategoriWithCount()
    {
        return $this->select('sub_kategori_download.*, kategori_download.nama_kategori_download, COUNT(download.id_download) as jumlah_download')
                    ->join('kategori_download', 'kategori_download.id_kategori_download = sub_kategori_download.id_kategori_download')
                    ->join('download', 'download.id_sub_kategori_download = sub_kategori_download.id_sub_kategori_download', 'left')
                    ->groupBy('sub_kategori_download.id_sub_kategori_download')
                    ->orderBy('kategori_download.nama_kategori_download', 'ASC')
                    ->orderBy('sub_kategori_download.nama_sub_kategori_download', 'ASC')
                    ->findAll();
    }
}
