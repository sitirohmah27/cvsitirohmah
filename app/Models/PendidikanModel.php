<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'biodata_id',
        'institusi',
        'jenjang',
        'jurusan',
        'tahun_mulai',
        'tahun_selesai',
        'ipk',
        'deskripsi',
        'urutan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    // Validation
    protected $validationRules      = [
        'biodata_id' => 'required|integer',
        'institusi'  => 'required|min_length[3]|max_length[150]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /**
     * Get pendidikan by biodata_id dengan urutan
     */
    public function getPendidikanByBiodata($biodataId = 1)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
