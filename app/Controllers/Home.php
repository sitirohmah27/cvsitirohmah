<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\KeahlianModel;
use App\Models\PortofolioModel;

class Home extends BaseController
{
    protected $biodataModel;
    protected $pendidikanModel;
    protected $pengalamanModel;
    protected $keahlianModel;
    protected $portofolioModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pengalamanModel = new PengalamanModel();
        $this->keahlianModel = new KeahlianModel();
        $this->portofolioModel = new PortofolioModel();
    }

    /**
     * Halaman Utama - CV/Home
     */
    public function index()
    {
        $biodataId = 1; // ID biodata utama
        
        $data = [
            'title'      => 'Home - CV',
            'biodata'    => $this->biodataModel->find($biodataId),
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata($biodataId),
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata($biodataId),
            'keahlian'   => $this->keahlianModel->getKeahlianByKategori($biodataId),
            'portofolio' => $this->portofolioModel->getPortofolioByBiodata($biodataId),
        ];

        return view('home', $data);
    }

    /**
     * Halaman Pendidikan
     */
    public function pendidikan()
    {
        $biodataId = 1;
        
        $data = [
            'title'      => 'Riwayat Pendidikan',
            'biodata'    => $this->biodataModel->find($biodataId),
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata($biodataId),
        ];

        return view('pendidikan', $data);
    }

    /**
     * Halaman Pengalaman
     */
    public function pengalaman()
    {
        $biodataId = 1;
        
        $data = [
            'title'      => 'Pengalaman',
            'biodata'    => $this->biodataModel->find($biodataId),
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata($biodataId),
        ];

        return view('pengalaman', $data);
    }

    /**
     * Halaman Keahlian
     */
    public function keahlian()
    {
        $biodataId = 1;
        
        $data = [
            'title'    => 'Keahlian & Skills',
            'biodata'  => $this->biodataModel->find($biodataId),
            'keahlian' => $this->keahlianModel->getKeahlianByKategori($biodataId),
        ];

        return view('keahlian', $data);
    }

    /**
     * Halaman Portofolio
     */
    public function portofolio()
    {
        $biodataId = 1;
        
        $data = [
            'title'      => 'Portofolio & Karya',
            'biodata'    => $this->biodataModel->find($biodataId),
            'portofolio' => $this->portofolioModel->getPortofolioByBiodata($biodataId),
        ];

        return view('portofolio', $data);
    }
}
