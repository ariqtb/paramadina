<?php

namespace App\Controllers\Admin;

use App\Models\Artikel_model;
use App\Models\Guru_model;
use App\Models\Galeri_model;
use App\Models\Program_model;
use App\Models\Pendaftar_model;
use App\Models\Testimoni_model;

class Dasbor extends BaseController
{
    public function __construct()
    {
        // helper('uri');
        $this->db = \Config\Database::connect();
        $this->m_artikel = new Artikel_model();
        $this->m_guru = new Guru_model();
        $this->m_galeri = new Galeri_model();
        $this->m_program = new Program_model();
        $this->m_pendaftar = new Pendaftar_model();
        $this->m_testimoni = new Testimoni_model();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'artikel' => $this->m_artikel->get()->getNumRows(),
            'guru' => $this->m_guru->get()->getNumRows(),
            'galeri' => $this->m_galeri->get()->getNumRows(),
            'program' => $this->m_program->get()->getNumRows(),
            'pendaftar' => $this->m_pendaftar->get()->getNumRows(),
            'testimoni' => $this->m_testimoni->get()->getNumRows(),
            'content'    => 'admin/dasbor/index',
        ];
        // return print_r($data['pendaftar']);
        // return print_r($session->get()['akses_level']);
        echo view('admin/layout/wrapper', $data);
    }
}
