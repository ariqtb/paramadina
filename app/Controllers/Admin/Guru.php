<?php

namespace App\Controllers\Admin;

use App\Models\Guru_model;

class Guru extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->m_guru = new Guru_model();
    }
    // index
    public function index()
    {
        $total = $this->m_guru->get()->getNumRows();
        $data = [
            'title'   => 'Teacher Data (' . $total . ')',
            'guru'  => $this->m_guru->findAll(),
            'content' => 'admin/guru/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
                'deskripsi' => 'required',
                'instagram' => 'required',
                'linkedin' => 'required',
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
                    'nama' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'instagram' => $this->request->getPost('instagram'),
                    'linkedin' => $this->request->getPost('linkedin'),
                    'gambar' => $namabaru,
                ];
                // return print_r($data);
                $this->m_guru->tambah($data);

                return redirect()->to(base_url('admin/guru'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'instagram' => $this->request->getPost('instagram'),
                'linkedin' => $this->request->getPost('linkedin'),
            ];
            $this->m_guru->tambah($data);

            return redirect()->to(base_url('admin/guru'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'      => 'Add Teacher',
            'content'    => 'admin/guru/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id)
    {
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
                'deskripsi' => 'required',
                'instagram' => 'required',
                'linkedin' => 'required',
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
                    'id_guru'          => $id,
                    'nama' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'instagram' => $this->request->getPost('instagram'),
                    'linkedin' => $this->request->getPost('linkedin'),
                    'gambar' => $namabaru,
                ];
                $this->m_guru->edit($data);

                return redirect()->to(base_url('admin/guru'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_guru'          => $id,
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'instagram' => $this->request->getPost('instagram'),
                'linkedin' => $this->request->getPost('linkedin'),
            ];
            $this->m_guru->edit($data);

            return redirect()->to(base_url('admin/guru'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'           => 'Edit Teacher: ', //. $galeri['judul_galeri'],
            'guru'          => $this->m_guru->getByID($id),
            'content'         => 'admin/guru/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id)
    {
        $data     = ['id_guru' => $id];
        $this->m_guru->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/guru'));
    }
}
