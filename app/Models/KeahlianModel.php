<?php

namespace App\Models;

use CodeIgniter\Model;

class KeahlianModel extends Model
{
    protected $table            = 'keahlian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'biodata_id',
        'kategori',
        'nama_skill',
        'tingkat_kemampuan',
        'urutan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    // Validation
    protected $validationRules      = [
        'biodata_id'        => 'required|integer',
        'nama_skill'        => 'required|min_length[2]|max_length[100]',
        'tingkat_kemampuan' => 'permit_empty|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /**
     * Get keahlian by biodata_id dengan urutan
     */
    public function getKeahlianByBiodata($biodataId = 1)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    /**
     * Get keahlian grouped by kategori
     */
    public function getKeahlianByKategori($biodataId = 1)
    {
        $keahlian = $this->where('biodata_id', $biodataId)
                         ->orderBy('kategori', 'ASC')
                         ->orderBy('urutan', 'ASC')
                         ->findAll();

        // Group by kategori
        $grouped = [];
        foreach ($keahlian as $skill) {
            $kategori = $skill['kategori'] ?: 'Lainnya';
            if (!isset($grouped[$kategori])) {
                $grouped[$kategori] = [];
            }
            $grouped[$kategori][] = $skill;
        }

        return $grouped;
    }
}
