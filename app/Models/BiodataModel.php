<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table            = 'biodata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'email',
        'linkedin',
        'github',
        'website',
        'tentang_saya',
        'foto'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'nama_lengkap' => 'required|min_length[3]|max_length[100]',
        'email'        => 'required|valid_email|max_length[100]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /**
     * Get biodata dengan relasi
     */
    public function getBiodataWithRelations($id = 1)
    {
        return $this->find($id);
    }
}
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/sitirohmah27/cvsitirohmah.git
git push -u origin main