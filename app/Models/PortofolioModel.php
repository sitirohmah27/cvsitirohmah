<?php

namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table            = 'portofolio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'biodata_id',
        'judul',
        'deskripsi',
        'teknologi',
        'link_demo',
        'link_github',
        'gambar',
        'tahun',
        'urutan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    // Validation
    protected $validationRules      = [
        'biodata_id' => 'required|integer',
        'judul'      => 'required|min_length[3]|max_length[150]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /**
     * Get portofolio by biodata_id dengan urutan
     */
    public function getPortofolioByBiodata($biodataId = 1)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
