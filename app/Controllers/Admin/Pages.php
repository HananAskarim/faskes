<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Pages extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Dashboard',
            'jml_kategori' => $this->adminModel->jml_kategori(),
            'jml_faskes' => $this->adminModel->jml_faskes(),
            'jml_admin' => $this->adminModel->jml_admin()
        ];
        echo view('admin/dashboard/index', $data);
    }
}
