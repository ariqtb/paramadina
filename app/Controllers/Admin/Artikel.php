<?php

namespace App\Controllers\Admin;

use App\Models\Artikel_model;

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->m_artikel = new Artikel_model();
    }
    // index
    public function index()
    {
        $total = $this->m_artikel->get()->getNumRows();
        $data = [
            'title'   => 'Article Data (' . $total . ')',
            'artikel'  => $this->m_artikel->findAll(),
            'content' => 'admin/artikel/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }
    // Tambah
    public function tambah()
    {
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,10096]',
                ],
            ]
        )) {
            if (!empty($_FILES['gambar']['name'])) {
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
                    'judul'     => $this->request->getPost('judul'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'gambar'    => $namabaru,
                ];
                // return print_r($data);
                $this->m_artikel->tambah($data);
                return redirect()->to(base_url('admin/artikel'))->with('sukses', 'Data Berhasil di Simpan');
            }
        }
        return redirect()->to(base_url('admin/artikel'))->with('gagal', 'Data Gagal di Simpan');
    }

    // edit
    public function edit($id)
    {
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,10096]',
                ],
            ]
        )) {
            if (!empty($_FILES['gambar']['name'])) {
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
                    'id_artikel'=> $id,
                    'judul'     => $this->request->getPost('judul'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'gambar'    => $namabaru,
                ];
                // return print_r($data);
                $this->m_artikel->edit($data);

                return redirect()->to(base_url('admin/artikel'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_artikel'=> $id,
                'judul'     => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            // return print_r($data);
            $this->m_artikel->edit($data);

            return redirect()->to(base_url('admin/artikel'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'           => 'Edit Article: ', //. $galeri['judul_galeri'],
            'artikel'          => $this->m_artikel->getByID($id),
            'content'         => 'admin/artikel/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id)
    {
        $data     = ['id_artikel' => $id];
        $this->m_artikel->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/Artikel'));
    }
}
