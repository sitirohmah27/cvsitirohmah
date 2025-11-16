<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table            = 'pengalaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'biodata_id',
        'jenis',
        'nama_perusahaan',
        'posisi',
        'tahun_mulai',
        'tahun_selesai',
        'masih_aktif',
        'deskripsi',
        'urutan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    // Validation
    protected $validationRules      = [
        'biodata_id'      => 'required|integer',
        'jenis'           => 'required|in_list[Organisasi,Magang,Pekerjaan,Proyek]',
        'nama_perusahaan' => 'required|min_length[3]|max_length[150]',
        'posisi'          => 'required|min_length[3]|max_length[100]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /**
     * Get pengalaman by biodata_id dengan urutan
     */
    public function getPengalamanByBiodata($biodataId = 1)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    /**
     * Get pengalaman by jenis
     */
    public function getPengalamanByJenis($biodataId = 1, $jenis = null)
    {
        $builder = $this->where('biodata_id', $biodataId);
        
        if ($jenis) {
            $builder->where('jenis', $jenis);
        }
        
        return $builder->orderBy('urutan', 'ASC')->findAll();
    }
}
