<?php

namespace App\Controllers;

class Pegawai extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new \App\Models\ModelPegawai();
    }

    public function index()
    {
        return view('pegawai_view');
    }

    public function simpan()
    {
        $validasi = \Config\Services::validation();

        $aturan = [
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'   => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 Karakter'
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => 'Minimum karakter untuk field {field} adalah 5 Karakter',
                    'valid_email' => 'Email yang Anda masukkan tidak valid'
                ]
            ],
            'alamat' => [
                'label'  => 'Alamat',
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'   => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 Karakter'
                ]
            ],
        ];

        $validasi->setRules($aturan);

        if ($validasi->withRequest($this->request)->run()) {
            // TAMPUNG DATA DARI FORM
            $dataSimpan = [
                'nama'   => $this->request->getPost('nama'),
                'email'  => $this->request->getPost('email'),
                'bidang' => $this->request->getPost('bidang'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            
            $this->model->save($dataSimpan);

            $hasil['sukses'] = "Berhasil memasukan data";
            $hasil['error']  = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error']  = $validasi->listErrors();
        }

        return json_encode($hasil);
    }
}