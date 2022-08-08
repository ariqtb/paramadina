<?php

namespace App\Controllers\Admin;

use App\Models\Pendaftar_model;

class Pendaftar extends BaseController
{
    public function __construct()
    {
        helper('uri', 'download');

        $this->db = \Config\Database::connect();
        $this->m_pendaftar = new Pendaftar_model();
    }

    public function index()
    {
        $total = $this->m_pendaftar->get()->getNumRows();
        $data = [
            'title' => 'Registrant Data (' . $total . ')',
            'pendaftar' => $this->m_pendaftar->findAll(),
            'content'    => 'admin/pendaftar/index',
        ];

        echo view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {

        if ($this->request->getMethod() === 'post') {
            $validationRule = [
                'nama_pelajar' => 'required',
                'tanggal_lahir' => 'required',
                'umur' => 'required',
                'tingkat_kelas' => 'required',
                'program' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'pekerjaan_ayah' => 'required',
                'pekerjaan_ibu' => 'required',
                'alamat_ayah' => 'required',
                'alamat_ibu' => 'required',
                'nomor_ayah' => 'required',
                'nomor_ibu' => 'required',
                'email_ayah' => 'required',
                'email_ibu' => 'required',
                'akte_kelahiran' => [
                    'label' => 'Birth Certificate',
                    'rules' => 'uploaded[akte_kelahiran]'
                        . '|mime_in[akte_kelahiran,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[akte_kelahiran,pdf,jpg,jpeg,png]'
                        . '|max_size[akte_kelahiran,4000]'

                ],
                'ktp' => [
                    'label' => "Parent's Identity Card",
                    'rules' => 'uploaded[ktp]'
                        . '|mime_in[ktp,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[ktp,pdf,jpg,jpeg,png]'
                        . '|max_size[ktp,4000]'

                ],
                'kk' => [
                    'label' => 'Family Card',
                    'rules' => 'uploaded[kk]'
                        . '|mime_in[kk,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[kk,pdf,jpg,jpeg,png]'
                        . '|max_size[kk,4000]'

                ],
                'pasfoto' => [
                    'label' => 'Passport Photo',
                    'rules' => 'uploaded[pasfoto]'
                        . '|mime_in[pasfoto,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[pasfoto,jpg,jpeg,png]'
                        . '|max_size[pasfoto,4000]'

                ],
                'rapot' => [
                    'label' => "Student's Report Card",
                    'rules' => 'uploaded[rapot]'
                        . '|mime_in[rapot,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[rapot,pdf,jpg,jpeg,png]'
                        . '|max_size[rapot,4000]'

                ],
            ];
            //Validation Check
            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return redirect()->back()->withInput();
            } else {
                //Create files array
                $file = [
                    $this->request->getFile('akte_kelahiran'),
                    $this->request->getFile('ktp'),
                    $this->request->getFile('kk'),
                    $this->request->getFile('pasfoto'),
                    $this->request->getFile('rapot'),
                ];
                //Create pathfile
                $path = [
                    'akte_kelahiran', 'ktp', 'kartu_keluarga', 'foto', 'rapot'
                ];

                //Save files array into different path
                $i = 0;
                for ($i; $i < count($file); $i++) {
                    $raw_file = $file[$i];
                    $newname_file[] = mt_rand(10000, 99999) . '_' . str_replace(' ', '-', $raw_file->getName());
                    $raw_file->move(WRITEPATH . "../assets/upload/registrant/$path[$i]/", $newname_file[$i]);
                }

                // Create thumb for passport photo
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/registrant/foto/' . $newname_file[3])
                    ->fit(300, 400, 'center')
                    ->save(WRITEPATH . '../assets/upload/registrant/foto/thumbs/' . $newname_file[3]);

                // return print_r($newname_file);

                $data = [
                    'nama_pelajar' => $this->request->getPost('nama_pelajar'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'umur' => $this->request->getPost('umur'),
                    'tingkat_kelas' => $this->request->getPost('tingkat_kelas'),
                    'program' => $this->request->getPost('program'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                    'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
                    'alamat_ayah' => $this->request->getPost('alamat_ayah'),
                    'alamat_ibu' => $this->request->getPost('alamat_ibu'),
                    'nomor_ayah' => $this->request->getPost('nomor_ayah'),
                    'nomor_ibu' => $this->request->getPost('nomor_ibu'),
                    'email_ayah' => $this->request->getPost('email_ayah'),
                    'email_ibu' => $this->request->getPost('email_ibu'),
                    'akte_kelahiran' => $newname_file[0],
                    'ktp' => $newname_file[1],
                    'kartu_keluarga' => $newname_file[2],
                    'foto' => $newname_file[3],
                    'rapot' => $newname_file[4],
                ];

                // return print_r($data);
                $this->m_pendaftar->tambah($data);

                return redirect()->to(base_url('admin/Pendaftar'))->with('sukses', 'Data Berhasil di Simpan');
            }
        }

        $data = [
            'title' => 'Add Registrant',
            'pendaftar' => $this->m_pendaftar->findAll(),
            'content'    => 'admin/pendaftar/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    public function edit($id)
    {
        $pendaftar = $this->m_pendaftar->getByID($id);
        // return print_r($pendaftar);

        // return print_r($this->m_pendaftar->getByID($id));
        if ($this->request->getMethod() === 'post') {
            $validationRule = [
                'nama_pelajar' => 'required',
                'tanggal_lahir' => 'required',
                'umur' => 'required',
                'tingkat_kelas' => 'required',
                'program' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'pekerjaan_ayah' => 'required',
                'pekerjaan_ibu' => 'required',
                'alamat_ayah' => 'required',
                'alamat_ibu' => 'required',
                'nomor_ayah' => 'required',
                'nomor_ibu' => 'required',
                'email_ayah' => 'required',
                'email_ibu' => 'required',
                'akte_kelahiran' => [
                    'label' => 'Birth Certificate',
                    'rules' => 'mime_in[akte_kelahiran,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[akte_kelahiran,pdf,jpg,jpeg,png]'
                        . '|max_size[akte_kelahiran,4000]'

                ],
                'ktp' => [
                    'label' => "Parent's Identity Card",
                    'rules' => 'mime_in[ktp,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[ktp,pdf,jpg,jpeg,png]'
                        . '|max_size[ktp,4000]'

                ],
                'kk' => [
                    'label' => 'Family Card',
                    'rules' => 'mime_in[kk,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[kk,pdf,jpg,jpeg,png]'
                        . '|max_size[kk,4000]'

                ],
                'pasfoto' => [
                    'label' => 'Passport Photo',
                    'rules' => 'mime_in[pasfoto,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[pasfoto,jpg,jpeg,png]'
                        . '|max_size[pasfoto,4000]'

                ],
                'rapot' => [
                    'label' => "Student's Report Card",
                    'rules' => 'mime_in[rapot,application/pdf,image/jpg,image/jpeg,image/png]'
                        . '|ext_in[rapot,pdf,jpg,jpeg,png]'
                        . '|max_size[rapot,4000]'

                ],
            ];
            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return redirect()->back()->withInput();
            } else {
                $data = [];
                //Create files array
                $file = [
                    $this->request->getFile('akte_kelahiran'),
                    $this->request->getFile('ktp'),
                    $this->request->getFile('kk'),
                    $this->request->getFile('pasfoto'),
                    $this->request->getFile('rapot'),
                ];
                //Eachile update check
                $j = 0;
                $count_files = 0;
                foreach ($file as $eachfile) {
                    if (empty($eachfile->getName())) {
                        continue;
                    } else {
                        $file_exist[] = $j;
                        $count_files++;
                    }
                    $j++;
                }

                // return print_r($file_exist);
                if (!empty($file_exist)) {
                    //Create pathfile
                    $path = [
                        'akte_kelahiran', 'ktp', 'kartu_keluarga', 'foto', 'rapot'
                    ];
                    //Save files array into different path
                    $i = 0;
                    for ($i; $i < $count_files; $i++) {
                        $raw_file = $file[$file_exist[$i]];
                        $newname_file[] = mt_rand(1000, 9999) . '_' . str_replace(' ', '-', $raw_file->getName());
                        $raw_file->move(WRITEPATH . "../assets/upload/registrant/" . $path[$file_exist[$i]] . "/", $newname_file[$i]);
                        $data += [
                            $path[$file_exist[$i]] => $newname_file[$i],
                        ];

                    }
                    // $data += ['id_pendaftar' => $id,];
                    // $this->m_pendaftar->edit($data);
                    // return print_r($data);
                    // return print_r('akte_kelahiran');4470_hulk

                    //Check if photo was uploaded
                    if (in_array(3, $file_exist)) {
                        // Create thumb for passport photo
                        $thumbs_arr = array_search(3, $file_exist);
                        $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../assets/upload/registrant/foto/' . $newname_file[$thumbs_arr])
                        ->fit(300, 400, 'center')
                        ->save(WRITEPATH . '../assets/upload/registrant/foto/thumbs/' . $newname_file[$thumbs_arr]);
                        unlink(WRITEPATH . "../assets/upload/registrant/foto/" . $pendaftar[$path[$file_exist[$thumbs_arr]]]);
                        unlink(WRITEPATH . "../assets/upload/registrant/foto/thumbs/" . $pendaftar[$path[$file_exist[$thumbs_arr]]]);
                        // return print_r($pendaftar[$path[$file_exist[$thumbs_arr]]]);
                    }
                }
                // $this->m_pendaftar->edit($data);
                // return print_r($newname_file);

                $data += [
                    'id_pendaftar' => $id,
                    'nama_pelajar' => $this->request->getPost('nama_pelajar'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'umur' => $this->request->getPost('umur'),
                    'tingkat_kelas' => $this->request->getPost('tingkat_kelas'),
                    'program' => $this->request->getPost('program'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                    'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
                    'alamat_ayah' => $this->request->getPost('alamat_ayah'),
                    'alamat_ibu' => $this->request->getPost('alamat_ibu'),
                    'nomor_ayah' => $this->request->getPost('nomor_ayah'),
                    'nomor_ibu' => $this->request->getPost('nomor_ibu'),
                    'email_ayah' => $this->request->getPost('email_ayah'),
                    'email_ibu' => $this->request->getPost('email_ibu'),
                ];
                // return print_r($data);
                $this->m_pendaftar->edit($data);

                return redirect()->to(base_url('admin/Pendaftar'))->with('sukses', 'Data Berhasil di Simpan');
            }
        }

        $data = [
            'title' => 'Edit Registrant',
            'pendaftar' => $this->m_pendaftar->getByID($id),
            'content'    => 'admin/pendaftar/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id)
    {
        $data     = ['id_pendaftar' => $id];
        $this->m_pendaftar->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/Pendaftar'));
    }

    public function download($filename, $filetype)
    {
        $path = WRITEPATH . "../assets/upload/registrant/$filetype/$filename";

        return $this->response->download($path, NULL);
        // ->setFileName($filetype . "_" . $ownername . "." . pathinfo($path, PATHINFO_EXTENSION));
    }
}
