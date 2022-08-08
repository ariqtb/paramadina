<?php

namespace App\Controllers\Admin;

use App\Models\User_model;

class User extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->m_user = new User_model();
    }
    // mainpage
    public function index()
    {
        // Start validasi
        if ($this->request->getMethod() === 'post') {
            $validationRule = [
                'nama' => 'required',
                'username' => 'required|min_length[5]|is_unique[user.username]',
                'email' => 'required|is_unique[user.email]',
                'password' => 'required|min_length[6]|max_length[16]',
            ];
            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return redirect()->back()->withInput();
            } else {
                // masuk database
                $data = [
                    'nama'         => $this->request->getPost('nama'),
                    'username'     => $this->request->getPost('username'),
                    'email'        => $this->request->getPost('email'),
                    'password'     => sha1($this->request->getPost('password')),
                    'akses_level'  => $this->request->getPost('akses_level'),
                ];
                // return print_r($data);
                $this->m_user->tambah($data);

                return redirect()->to(base_url('admin/User'))->with('sukses', 'Data Berhasil di Simpan');
            }
        }
        $total = $this->m_user->get()->getNumRows();
        $data = [
            'title'      => 'Users (' . $total . ')',
            'user'       => $this->m_user->findAll(),
            'content'    => 'admin/user/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Edit Function
    public function edit($id_user)
    {
        //Intended user initiation
        $user = $this->m_user->getByID($id_user);

        // Start validation
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
                'email' => 'required|valid_email|valid_emails',
            ]
        )) {

            //Request data array initiation
            $data = [];

            //Request password data initiation
            $password = $this->request->getPost('password');

            //Checking request password data exist
            if (!empty($password)) {
                $pass_validate = ['password' => 'min_length[6]|max_length[16]'];

                //Validate password
                if (!$this->validate($pass_validate)) {
                    //Return error
                    $data = ['errors' => $this->validator->getErrors()];

                    return redirect()->back()->withInput();
                } else {
                    //Password validated, request data added
                    $data += [
                        'password' => sha1($password),
                    ];
                }
            }
            //Adding other request data
            $data += [
                'id_user'     => $id_user,
                'nama'        => $this->request->getPost('nama'),
                'email'       => $this->request->getPost('email'),
                'akses_level' => $this->request->getPost('akses_level'),
            ];

            //Updating request data
            $this->m_user->edit($data);

            //Returning result
            return redirect()->to(base_url('admin/User'))->with('sukses', 'Data Berhasil di Simpan');
        }

        //Index data
        $data = [
            'title' => 'Edit User: ' . $user['nama'],
            'user'       => $this->m_user->getByID($id_user),
            'content'    => 'admin/user/edit',
        ];

        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_user)
    {
        $data   = ['id_user' => $id_user];
        $this->m_user->delete($data);
        // masuk database
        return redirect()->to(base_url('admin/User'))->with('sukses', 'Data Berhasil di Hapus');
    }
}
