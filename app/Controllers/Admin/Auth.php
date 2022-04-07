<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Login',
        ];
        return view('auth/login', $data);
    }

    public function process()
    {
        // $post = $this->request->getPost();
        // $query = $this->users->db->table('user_admin')->getwhere(['username' => $post['username']]);
        // $user = $query->getRow();
        // if ($user) {
        //     if (password_verify($post['password'], $user->password)) {
        //         $params = ['id_user' => $user->id_user];
        //         session()->set($params);

        //         return redirect()->to(site_url('home'));
        //     } else {
        //         return redirect()->back()->with('error', 'Password tidak sesuai !!');
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'Username tidak ditemukan !!');
        // }

        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where(['username' => $username])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'nama' => $dataUser->nama,
                    'info' => '<div class="alert alert-success alert-dismissible">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Selamat Datang <b>' . $dataUser->nama . '</b> di Halaman Dashboard Aplikasi
		                  </div>',
                    'logged_in' => true
                ]);

                return redirect()->to('admin/pages');
            } else {
                session()->setFlashdata('error', 'Username atau Password Salah !!');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah !!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/auth');
    }
}
