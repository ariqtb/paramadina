<?php

namespace App\Controllers\Admin;

use App\Models\Galeri_model;

class Galeri extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->m_galeri = new Galeri_model();
    }
    // index
    public function index()
    {
        $total = $this->m_galeri->get()->getNumRows();
        $data = [
            'title'   => 'Gallery Data (' . $total . ')',
            'galeri'  => $this->m_galeri->findAll(),
            'content' => 'admin/galeri/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }
    // Tambah
    public function tambah()
    {

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'deskripsi' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,10096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/image/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/image/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/image/thumbs/' . $namabaru);
                // masuk database
                $data = [
                    'deskripsi'=>$this->request->getPost('deskripsi'),
                    'gambar'=>$namabaru,
                ];
                $this->m_galeri->tambah($data);

                return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'deskripsi'=>$this->request->getPost('deskripsi'),
            ];
            $this->m_galeri->tambah($data);

            return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = ['title'      => 'Add Gallery',
            'content'         => 'admin/galeri/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id)
    {
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'deskripsi' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,10096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/image/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/image/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/image/thumbs/' . $namabaru);
                // masuk database
                $data = [
                    'id_galeri'          => $id,
                    'deskripsi'=>$this->request->getPost('deskripsi'),
                    'gambar'=>$namabaru,
                ];
                $this->m_galeri->edit($data);

                return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_galeri'          => $id,
                'deskripsi'=>$this->request->getPost('deskripsi'),
            ];
            $this->m_galeri->edit($data);

            return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'           => 'Edit Gallery: ', //. $galeri['judul_galeri'],
            'galeri'          => $this->m_galeri->getByID($id),
            'content'         => 'admin/galeri/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id_galeri)
    {
        $data     = ['id_galeri' => $id_galeri];
        $this->m_galeri->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/galeri'));
    }
}
