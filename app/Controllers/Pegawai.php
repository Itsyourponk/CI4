<?php

namespace App\Controllers;
use App\Models\ModelPegawai;
use PhpParser\Node\Expr\FuncCall;

class Pegawai extends BaseController
{
    protected ModelPegawai $model;
    public function __construct()
    {
        $this->model = new \App\Models\ModelPegawai();
    }
    public function hapus($id)
    {
        $this->model->delete($id);
        return redirect()->to(site_url('/'))->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {   
        return json_encode($this->model->find($id));
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

        $dataSimpan = [            
  
                'id'     => $this->request->getPost('id'),
                'nama'   => $this->request->getPost('nama'),
                'email'  => $this->request->getPost('email'),
                'bidang' => $this->request->getPost('bidang'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            $this->model->save($dataSimpan);
            $hasil['sukses'] = "Berhasil memasukan data";
            $hasil['error']  = false;
        } else {
            $hasil['sukses'] = false;
            $hasil['error']  = $validasi->listErrors();
        }

        return json_encode($hasil);
    }
    public function index(): string
{
    $jumlahBaris = 4;
    $katakunci = $this->request->getGet('katakunci');
    if($katakunci){
        $pencarian = $this->model->cari($katakunci);
    } else {
        $pencarian = $this->model;
    }
    $halamanSekarang = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $data['dataPegawai'] = $pencarian->orderBy('id', 'desc')->paginate($jumlahBaris, 'default');
    $data['pager'] = $this->model->pager;
    $data['nomor'] = ($jumlahBaris * ($halamanSekarang - 1));
    $data['katakunci'] = $katakunci ?? '';
    
    return view('pegawai_view', $data);
}
}