<?php

namespace App\Controllers\Admin;

use App\Models\Iklan_model;

class Iklan extends BaseController
{
    // index
    public function index()
    {
        checklogin();
        $m_iklan             = new Iklan_model();
        $pesan_iklan         = $m_iklan->listing();
        $total               = $m_iklan->total();

        $data = [
            'title' => 'Data File Pesan Iklan : ' . $total['total'],
            'pesan_iklan'   => $pesan_iklan,
            'content'    => 'admin/iklan/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        checklogin();
        $m_iklan             = new Iklan_model();
        $pesan_iklan         = $m_iklan->listing();
        $total               = $m_iklan->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_klien' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,application/pdf,application/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (!empty($_FILES['gambar']['name'])) {
                // Image upload 1
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                // masuk database

                $data = [
                    'id_user'             => $this->session->get('id_user'),
                    'nama_klien'          => $this->request->getPost('nama_klien'),
                    'nama_pemesan'        => $this->request->getPost('nama_pemesan'),
                    'alamat'              => $this->request->getPost('alamat'),
                    'telepon'             => $this->request->getPost('telepon'),
                    'status'              => $this->request->getPost('status'),
                    'email'               => $this->request->getPost('email'),
                    'jenis_siaran'        => $this->request->getPost('jenis_siaran'),
                    'waktu_siaran'        => $this->request->getPost('waktu_siaran'),
                    'biaya_airtime'       => $this->request->getPost('biaya_airtime'),
                    'total_biaya'         => $this->request->getPost('total_biaya'),
                    'keahlian'            => $this->request->getPost('keahlian'),
                    'gambar'              => $namabaru,
                    'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
                ];
                // return print_r($data);
                $m_iklan->tambah($data);


                return redirect()->to(base_url('admin/iklan'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_user'      => $this->session->get('id_user'),
                'nama_klien'            => $this->request->getPost('nama_klien'),
                'nama_pemesan'          => $this->request->getPost('nama_pemesan'),
                'alamat'                => $this->request->getPost('alamat'),
                'telepon'               => $this->request->getPost('telepon'),
                'status'              => $this->request->getPost('status'),
                'email'                 => $this->request->getPost('email'),
                'jenis_siaran'          => $this->request->getPost('jenis_siaran'),
                'waktu_siaran'          => $this->request->getPost('waktu_siaran'),
                'biaya_airtime'         => $this->request->getPost('biaya_airtime'),
                'total_biaya'           => $this->request->getPost('total_biaya'),
                'keahlian'              => $this->request->getPost('keahlian'),
                'gambar'                => $namabaru,
                'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
            ];
            $m_iklan->tambah($data);

            return redirect()->to(base_url('admin/iklan'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'        => 'Tambah Pesan Iklan',
            'pesan_iklan'       => $pesan_iklan,
            'content'           => 'admin/iklan/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_pesan)
    {
        checklogin();
        $m_iklan             = new Iklan_model();
        $pesan_iklan         = $m_iklan->detail($id_pesan);

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_klien' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,application/pdf,document/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (!empty($_FILES['gambar']['name'])) {
                // Image upload 1
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                // masuk database
                $data = [
                    'id_pesan'            => $id_pesan,
                    'nama_klien'          => $this->request->getPost('nama_klien'),
                    'nama_pemesan'        => $this->request->getPost('nama_pemesan'),
                    'alamat'              => $this->request->getPost('alamat'),
                    'telepon'             => $this->request->getPost('telepon'),
                    'status'              => $this->request->getPost('status'),
                    'email'               => $this->request->getPost('email'),
                    'jenis_siaran'        => $this->request->getPost('jenis_siaran'),
                    'waktu_siaran'        => $this->request->getPost('waktu_siaran'),
                    'biaya_airtime'       => $this->request->getPost('biaya_airtime'),
                    'total_biaya'         => $this->request->getPost('total_biaya'),
                    'keahlian'            => $this->request->getPost('keahlian'),
                    'gambar'              => $namabaru,
                    'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
                ];
                $m_iklan->edit($data);

                return redirect()->to(base_url('admin/iklan'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_pesan'                => $id_pesan,
                'nama_klien'          => $this->request->getPost('nama_klien'),
                'nama_pemesan'        => $this->request->getPost('nama_pemesan'),
                'alamat'              => $this->request->getPost('alamat'),
                'telepon'             => $this->request->getPost('telepon'),
                'status'              => $this->request->getPost('status'),
                'email'               => $this->request->getPost('email'),
                'jenis_siaran'        => $this->request->getPost('jenis_siaran'),
                'waktu_siaran'        => $this->request->getPost('waktu_siaran'),
                'biaya_airtime'       => $this->request->getPost('biaya_airtime'),
                'total_biaya'         => $this->request->getPost('total_biaya'),
                'keahlian'            => $this->request->getPost('keahlian'),
                //'gambar'              => $namabaru,
                'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
            ];
            $m_iklan->edit($data);

            return redirect()->to(base_url('admin/iklan'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'        => 'Edit Data Peserta: ' . $pesan_iklan['nama_klien'],
            'pesan_iklan'       => $pesan_iklan,
            'content'           => 'admin/iklan/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // unduh
    public function unduh($id_pesan)
    {
        checklogin();
        $m_iklan             = new Iklan_model();
        $pesan_iklan         = $m_iklan->listing();
        $total               = $m_iklan->total();
        $pesan_iklan         = $m_iklan->detail($id_pesan);

        return $this->response->download('../assets/upload/file/' . $pesan_iklan['gambar'], null);
    }


    // Delete
    public function delete($id_pesan)
    {
        checklogin();
        $m_iklan = new Iklan_model();
        $data       = ['id_pesan' => $id_pesan];
        $m_iklan->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/iklan'));
    }

    function toPDF($id_pesan)
    {
        $m_iklan = new Iklan_model();
        $tabel = $m_iklan->findAll();
        foreach ($tabel as $key => $value) {
            if ($value['id_pesan'] == $id_pesan) {
                $dataReport[] = array(
                    'id_pesan' => $id_pesan,
                    'nama_klien' => $value['nama_klien'],
                    'nama_pemesan' => $value['nama_pemesan'],
                    'jenis_siaran' => $value['jenis_siaran'],
                    'tanggal_lahir' => $value['tanggal_lahir'],
                    'waktu_siaran' => $value['waktu_siaran'],
                    'email' => $value['email'],
                    'telepon' => $value['telepon'],
                    'alamat' => $value['alamat'],
                    'biaya_airtime' => $value['biaya_airtime'],
                    'total_biaya' => $value['total_biaya'],
                    'keahlian' => $value['keahlian'],
                    'gambar' => $value['gambar'],
                    'status' => $value['status'],
                );
            }
        }
        // return print_r($dataReport);

        $data =
            view('admin/iklan/index', [
                'title' => 'Daftar Hasil Pembelian',
                'pesan_iklan' => $dataReport,
            ]);


        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->Image(base_url('assets/images/logo.png'), 90, 10, 30);
        $pdf->Ln(25);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 7, 'Media Order', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $teks = 'Bersama ini Media Order Kerjasama RRI Bogor dengan ' . $value['nama_klien'] . ' dengan ketentuan sebagai berikut :';
        $pdf->Multicell(0, 10, $teks);
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 7, 'Klien                    : ' . $value['nama_klien'], 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 7, 'Jenis Siaran             : ' . $value['jenis_siaran'], 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 7, 'Tanggal Siar             : ' . $value['tanggal_lahir'], 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 7, 'Waktu Siaran             : ' . $value['waktu_siaran'], 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 7, 'Programa                 : ' . $value['email'], 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 7, 'Biaya Airtime            : ' . $value['biaya_airtime'], 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->Cell(0, 7, 'Total Biaya              : Rp.' . $value['total_biaya'], 0, 1, 'L');
        $pdf->Ln(5);
        $pdf->Cell(0, 7, 'Terbilang                : ' . $value['Terbilang'], 0, 1, 'L');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 9);
        $teks = 'Catatan :';
        $pdf->Multicell(0, 10, $teks);
        $pdf->Ln(2);
        $teks = '1. Tanggal jatuh tempo pembayaran 35 hari setelah penyiaran.';
        $pdf->Multicell(0, 10, $teks);
        $pdf->Ln(1);
        $teks = '2. Jika pembayaran dilakukan melewati masa jatuh tempo maka akan dikenakan denda sebesar 2% setiap bulannya';
        $pdf->Multicell(0, 10, $teks);
        $pdf->Ln(1);

        $pdf->Cell(10, 7, '', 0, 1);

        // foreach ($dataReport as $key => $val) {
        //     $pdf->Cell(0, 7, $val['nama_peserta'], 0, 1, 'C');
        //     $pdf->Cell(10, 6, $i, 1, 0, 'C');
        //     $pdf->Cell(90, 6, $val['id_download'], 0, 1, 'C');
        //     $i++;
        // }

        $pdfname = date('Y-m-d-H.i.s') . ' - Data Pesan Iklan.pdf';
        $pdfpath = ROOTPATH . 'assets/pdf/tilawah/';
        $filePDF = $pdf->Output("F", $pdfpath . $pdfname);
        $pdf->Output("I", date('Y-m-d-H.i.s') . ' - Data Pesan Iklan.pdf');
        $attachment = chunk_split(base64_encode($filePDF));

        // echo $filePDF;

        $email = \Config\Services::email();

        $email->setCC("fourceikbal09@gmail.com");
        $email->setFrom("fourceikbal09@gmail.com");

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');
        $email->attach($pdfpath . $pdfname);

        if (!$email->send()) {
            print_r('gagal');
            print_r($email->printDebugger());
        } else {
            print_r('berhasil');
        }
        return redirect()->to(base_url('admin/iklan'));
    }
}
