<?php

namespace App\Controllers\User;

use App\Models\Galeri_model;
use App\Models\Guru_model;
use App\Models\Testimoni_model;
use App\Models\Konfigurasi_model;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->m_galeri = new Galeri_model();
        $this->m_guru = new Guru_model();
        $this->m_testimoni = new Testimoni_model();
        $this->m_konfigurasi = new Konfigurasi_model();
    }
    // index
    public function index()
    {
        $data = [
            'title'   => 'Article Data ',
            'galeri'  => $this->m_galeri->findAll(),
            'guru'  => $this->m_guru->findAll(),
            'testimoni'  => $this->m_testimoni->findAll(),
            'konfigurasi'  => $this->m_konfigurasi->findAll(),
            'content' => 'user/header',
        ];
        // return print_r('oke');
        echo view('user/layout/wrapper', $data);
    }

}
