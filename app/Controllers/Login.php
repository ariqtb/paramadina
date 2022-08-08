<?php

namespace App\Controllers;

use App\Models\User_Model;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');

        $this->db = \Config\Database::connect();

        $this->m_user = new User_Model();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        echo view('login', $data);
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));
        $dataUser = $this->m_user->where([
            'username' => $username,
        ])->first();
        $hash = password_hash($dataUser['password'], PASSWORD_DEFAULT);
        if ($dataUser) {
            if (password_verify($password, $hash)) {
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'username' => $dataUser['username'],
                    'nama' => $dataUser['nama'],
                    'akses_level' => $dataUser['akses_level'],
                    'logged_in' => TRUE
                ]);
                if ($dataUser['akses_level'] != 'Admin') {
                    return redirect()->to(base_url('Admin/Dasbor'))->with('sukses', 'Selamat datang ' . $dataUser['nama'] . ' !');
                }
            }
        }
        session()->setFlashdata('error', 'Username & Password Salah');
        return redirect()->back();
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('Admin/Login');
    }
}
