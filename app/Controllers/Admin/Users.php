<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        helper('form');
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $users = $this->usersModel->findAll();
        $data = [
            'title' => 'Halaman Admin',
            'users' => $users
        ];
        return view('admin/users/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data admin'
        ];
        return view('admin/users/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|max_length[45]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Makskimal 45 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[45]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Maksimal 45 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->usersModel->insert([
            'username'  => $this->request->getVar('username'),
            'nama'      => $this->request->getVar('nama'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ]);

        session()->setFlashdata('message', 'Tambah Data Admin Berhasil');
        return redirect()->to('/admin/users');
    }

    public function edit($id)
    {
        $dataUsers = $this->usersModel->find($id);
        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Admin tidak ditemukan !');
        }
        $data = [
            'title' => 'Admin',
            'users' => $dataUsers
        ];
        return view('admin/users/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|max_length[45]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Makskimal 45 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[45]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_lenght' => '{field} Maksimal harus 45 karakter'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama')
        ];

        if (!empty($this->request->getVar('password'))) {
            $data = [
                'password' => password_hash($this->request->getVar('pasword'), PASSWORD_BCRYPT)
            ];
        }

        $this->usersModel->update($id, $data);
        session()->setFlashdata('message', 'Update Data Berhasil');
        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $dataUsers = $this->usersModel->find($id);
        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Admin tidak ditemukan !');
        }
        $this->usersModel->delete($id);
        session()->setFlashdata('message', 'Hapus Data Berhasil dilakukan');
        return redirect()->to('/admin/users');
    }
}
