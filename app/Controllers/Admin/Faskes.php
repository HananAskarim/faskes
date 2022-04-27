<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\FaskesModel;
use App\Models\KategoriModel;

class Faskes extends BaseController
{
    protected $faskesModel;
    protected $kategoriModel;

    public function __construct()
    {
        helper('form');
        $this->faskesModel = new FaskesModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $faskes = $this->faskesModel->getAll();
        $data = [
            'title' => 'Halaman Data Faskes',
            'faskes' => $faskes
        ];
        return view('admin/faskes/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Faskes',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/faskes/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_faskes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'mime_in' => 'File extention berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran file maksimal 2 MB',
                    'is_image' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $gambarFaskes = $this->request->getFile('foto');
        // apakah tidak ada gambar yang di upload
        if ($gambarFaskes->getError() == 4) {
            $fileName = 'default.png';
        } else {
            $fileName = $gambarFaskes->getRandomName();
            $gambarFaskes->move('assets/uploads/faskes', $fileName);
        }

        $this->faskesModel->insert([
            'id_kategori'   => $this->request->getVar('id_kategori'),
            'nama_faskes'   => $this->request->getVar('nama_faskes'),
            'alamat'        => $this->request->getVar('alamat'),
            'telp'          => $this->request->getVar('telp'),
            'layanan'       => $this->request->getVar('layanan'),
            'latitude'      => $this->request->getVar('latitude'),
            'longitude'     => $this->request->getVar('longitude'),
            'foto'          => $fileName
        ]);
        session()->setFlashdata('message', 'Tambah data faskes berhasil');
        return redirect()->to('/admin/faskes');
    }

    public function edit($id)
    {
        $dataFaskes = $this->faskesModel->find($id);
        if (empty($dataFaskes)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Faskes Tidak ditemukan !');
        }
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'faskes' => $dataFaskes,
            'kategori' => $kategori,
            'title' => 'Edit Faskes'
        ];
        return view('admin/faskes/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_faskes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $oldData = $this->faskesModel->find($id);
        $data = [
            'nama_faskes' => $this->request->getVar('nama_faskes'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'alamat' => $this->request->getVar('alamat'),
            'kelas' => $this->request->getVar('kelas'),
            'telp' => $this->request->getVar('telp'),
            'layanan' => $this->request->getVar('layanan'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude')
        ];

        $gambarFaskes = $this->request->getFile('foto');
        if (!empty($gambarFaskes->getName())) {
            if (!$this->validate([
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto,2048]',
                    'errors' => [
                        'mime_in' => 'Extention Harus Berupa JPG, JPEG, PNG, GIF',
                        'max_size' => 'Besar File maksimal 2 MB'
                    ]
                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back();
            }
            $fileName = $gambarFaskes->getRandomName();
            $data = [
                'foto' => $fileName
            ];
            unlink("assets/uploads/faskes/$oldData->foto");
            $gambarFaskes->move('assets/uploads/faskes/', $fileName);
        }

        $this->faskesModel->update($id, $data);
        session()->setFlashdata('message', 'Update Data Faskes Sukses');
        return redirect()->to('/admin/faskes');
    }

    public function delete($id)
    {
        $dataFaskes = $this->faskesModel->find($id);
        if (empty($dataFaskes)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Faskes Tidak Ditemukan !');
        }

        if ($dataFaskes->foto != 'default.png') {
            // hapus foto
            unlink('assets/uploads/faskes/' . $dataFaskes->foto);
        }

        $this->faskesModel->delete($id);
        session()->setFlashdata('message', 'Delete Data Faskes Berhasil');
        return redirect()->to('/admin/faskes');
    }
}
