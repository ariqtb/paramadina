<?php

namespace App\Controllers\Admin;

use App\Models\Program_model;

class Program extends BaseController
{
    public function __construct()
    {
        helper('uri');

        $this->db = \Config\Database::connect();
        $this->m_program = new Program_model();
    }

    public function index()
    {
        $total = $this->m_program->get()->getNumRows();
        $data = [
            'title' => 'Program Data (' . $total . ')',
            'program' => $this->m_program->findAll(),
            'content'    => 'admin/program/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
                'deskripsi' => 'required',
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
                    'gambar' => $namabaru,
                ];
                // return print_r($data);
                $this->m_program->tambah($data);

                return redirect()->to(base_url('admin/program'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $this->m_program->tambah($data);

            return redirect()->to(base_url('admin/program'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data =
            [
                'title'      => 'Add Program',
                'content'         => 'admin/program/tambah',
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
                    'id_program'          => $id,
                    'nama' => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'gambar' => $namabaru,
                ];
                $this->m_program->edit($data);

                return redirect()->to(base_url('admin/program'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_program'          => $id,
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $this->m_program->edit($data);

            return redirect()->to(base_url('admin/program'))->with('sukses', 'Data Berhasil di Simpan');
        }

        // return print_r($this->m_program->getByID($id));
        $data = [
            'title'           => 'Edit Program: ', //. $galeri['judul_galeri'],
            'program'          => $this->m_program->getByID($id),
            'content'         => 'admin/program/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id)
    {
        $data     = ['id_program' => $id];
        $this->m_program->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/program'));
    }
}
