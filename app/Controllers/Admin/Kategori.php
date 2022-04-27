<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        helper('form');
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'title'     => 'Halaman Kategori',
            'kategori'  => $kategori,
        ];
        echo view('admin/kategori/kategori', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Kategori'
        ];

        return view('admin/kategori/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'marker' => [
                'rules' => 'uploaded[marker]|mime_in[marker,image/jpg,image/jpeg,image/gif,image/png]|max_size[marker,2048]',
                'errors' => [
                    'uploaded' => 'Harus ada file yang diupload',
                    'mime_in' => 'File extention harus berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran file makskimal 2 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $gambarMarker = $this->request->getFile('marker');
        $fileName = $gambarMarker->getRandomName();
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'marker' => $fileName
        ]);
        $gambarMarker->move('assets/uploads/marker', $fileName);
        session()->setFlashdata('message', 'Tambah data kategori berhasil');
        return redirect()->to('/admin/kategori');
    }

    public function edit($id)
    {
        $dataKategori = $this->kategoriModel->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kategori Tidak Ditemukan');
        }
        $data = [
            'title' => 'Kategori',
            'kategori' => $dataKategori
        ];
        return view('admin/kategori/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $oldData = $this->kategoriModel->find($id);
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];

        $gambarMarker = $this->request->getFile('marker');
        if (!empty($gambarMarker->getName())) {
            if (!$this->validate([
                'marker' => [
                    'rules' => 'mime_in[marker,image/jpg,image/jpeg,image/gif,image/png]|max_size[marker,2048]',
                    'errors' => [
                        'mime_in' => 'Extension harus berupa JPG, JPEG, GIF, PNG',
                        'max_size' => 'Besar file maksimal 2 MB'
                    ]
                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back();
            }
            $fileName = $gambarMarker->getRandomName();
            $data = [
                'marker' => $fileName
            ];
            unlink("assets/uploads/marker/$oldData->marker");
            $gambarMarker->move('assets/uploads/marker/', $fileName);
        }

        $this->kategoriModel->update($id, $data);
        session()->setFlashdata('message', 'Update Data Kategori Sukses');
        return redirect()->to('/admin/kategori');
    }

    public function delete($id)
    {
        $dataKategori = $this->kategoriModel->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kategori tidak ditemukan !');
        }

        //hapus marker
        unlink("assets/uploads/marker/$dataKategori->marker");

        $this->kategoriModel->delete($id);
        session()->setFlashdata('message', 'Delete data kategori berhasil');
        return redirect()->to('/admin/kategori');
    }
}
