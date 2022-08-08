<?php

namespace App\Controllers\Admin;

use App\Models\Testimoni_model;

class Testimoni extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->m_testimoni = new Testimoni_model();
    }
    // index
    public function index()
    {
        $total = $this->m_testimoni->get()->getNumRows();
        $data = [
            'title'   => 'Testimonial Data (' . $total . ')',
            'testimoni'  => $this->m_testimoni->findAll(),
            'content' => 'admin/testimoni/index',
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
                'testimoni' => 'required',
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
                    'testimoni' => $this->request->getPost('testimoni'),
                    'gambar' => $namabaru,
                ];
                // return print_r($data);
                $this->m_testimoni->tambah($data);

                return redirect()->to(base_url('admin/testimoni'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'testimoni' => $this->request->getPost('testimoni'),
            ];
            return print_r($data);
            $this->m_testimoni->tambah($data);

            return redirect()->to(base_url('admin/testimoni'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'      => 'Add Testimonial',
            'content'    => 'admin/testimoni/tambah',
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
                'testimoni' => 'required',
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
                    'id_testimoni'          => $id,
                    'nama' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'testimoni' => $this->request->getPost('testimoni'),
                    'gambar' => $namabaru,
                ];
                $this->m_testimoni->edit($data);

                return redirect()->to(base_url('admin/testimoni'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_testimoni'=> $id,
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'testimoni' => $this->request->getPost('testimoni'),
            ];
            // return print_r($data);
            $this->m_testimoni->edit($data);

            return redirect()->to(base_url('admin/testimoni'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'           => 'Edit Testimonial: ', //. $galeri['judul_galeri'],
            'testimoni'          => $this->m_testimoni->getByID($id),
            'content'         => 'admin/testimoni/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id)
    {
        $data     = ['id_testimoni' => $id];
        $this->m_testimoni->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/testimoni'));
    }
}
