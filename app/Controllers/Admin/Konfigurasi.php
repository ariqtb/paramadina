<?php

namespace App\Controllers\Admin;

use App\Models\Konfigurasi_model;

class Konfigurasi extends BaseController
{
    public function __construct()
    {
        helper('uri');

        $this->db = \Config\Database::connect();
        $this->m_konfigurasi = new Konfigurasi_model();
    }

    public function index()
    {
        //Intended configuration initiation
        $konfigurasi = $this->m_konfigurasi->findAll()[0];

        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'namaweb' => 'required',
                'judulberanda' => 'required',
                'alamat_website' => 'required',
                'deskripsi' => 'required',
                'email' => 'required',
                'telepon' => 'required',
                'alamat_kontak' => 'required',
                'google_map' => 'required',
            ]
        )) {
            // masuk database
            $data = [
                'id' => $konfigurasi['id'],
                'projek' => $this->request->getPost('namaweb'),
                'judul' => $this->request->getPost('judulberanda'),
                'alamat_website' => $this->request->getPost('alamat_website'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'email' => $this->request->getPost('email'),
                'telepon' => $this->request->getPost('telepon'),
                'alamat_kontak' => $this->request->getPost('alamat_kontak'),
                'google_map' => $this->request->getPost('google_map'),
                'facebook' => $this->request->getPost('facebook'),
                'twitter' => $this->request->getPost('twitter'),
                'instagram' => $this->request->getPost('instagram'),
                'youtube' => $this->request->getPost('youtube'),
            ];
            $this->m_konfigurasi->edit($data);

            return redirect()->to(base_url('admin/Konfigurasi'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $total = $this->m_konfigurasi->get()->getNumRows();
        $data = [
            'title' => 'Configuration',
            'konfigurasi' => $this->m_konfigurasi->findAll()[0],
            'content'    => 'admin/konfigurasi/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // logo
    public function logo()
    {
        $m_konfigurasi  = new Konfigurasi_model();
        $konfigurasi    = $m_konfigurasi->findAll()[0];
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate([
            'logo' => [
                'uploaded[logo]',
                'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[logo,4096]',
            ],
        ])) {
            // Image upload
            $avatar   = $this->request->getFile('logo');
            $namabaru = $avatar->getName();


            //path directory
            $logo_path = WRITEPATH . '../assets/upload/config/logo/';
            $thumb_path = WRITEPATH . '../assets/upload/config/logo/thumbs/';

            //Save image in directory
            $avatar->move($logo_path, $namabaru);

            // Create thumbs
            $image = \Config\Services::image()
                ->withFile($logo_path . $namabaru)
                ->fit(100, 100, 'center')
                ->save($thumb_path . $namabaru);

            //Checking old image, afterwards delete old image
            if (!empty($konfigurasi['logo']) && file_exists($logo_path . $konfigurasi['logo'])) {
                unlink($logo_path . $konfigurasi['logo']);
                unlink($thumb_path . $konfigurasi['logo']);
            }

            // masuk database
            $data = [
                'id' => $konfigurasi['id'],
                'logo' => $namabaru,
            ];
            $m_konfigurasi->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Logo telah diupdate');

            return redirect()->to(base_url('admin/konfigurasi/logo'));
        }
        // End validasi
        $data = [
            'title'  => 'Update Logo',
            'konfigurasi' => $konfigurasi,
            'content'     => 'admin/konfigurasi/logo',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // icon
    public function icon()
    {
        $m_konfigurasi  = new Konfigurasi_model();
        $konfigurasi    = $m_konfigurasi->findAll()[0];
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate([
            'icon' => [
                'uploaded[icon]',
                'mime_in[icon,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[icon,4096]',
            ],
        ])) {
           // Image upload
           $avatar   = $this->request->getFile('icon');
           $namabaru = $avatar->getName();


           //path directory
           $icon_path = WRITEPATH . '../assets/upload/config/icon/';
           $thumb_path = WRITEPATH . '../assets/upload/config/icon/thumbs/';

           //Save image in directory
           $avatar->move($icon_path, $namabaru);

           // Create thumbs
           $image = \Config\Services::image()
               ->withFile($icon_path . $namabaru)
               ->fit(100, 100, 'center')
               ->save($thumb_path . $namabaru);

           //Checking old image, afterwards delete old image
           if (!empty($konfigurasi['icon']) && file_exists($icon_path . $konfigurasi['icon'])) {
               unlink($icon_path . $konfigurasi['icon']);
               unlink($thumb_path . $konfigurasi['icon']);
           }

           // masuk database
           $data = [
               'id' => $konfigurasi['id'],
               'icon' => $namabaru,
           ];
           $m_konfigurasi->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diupdate');

            return redirect()->to(base_url('admin/Konfigurasi/Icon'));
        }
        // End validasi
        $data = [
            'title'  => 'Update Icon',
            'konfigurasi' => $konfigurasi,
            'content'     => 'admin/konfigurasi/icon',
        ];
        echo view('admin/layout/wrapper', $data);
    }
}
