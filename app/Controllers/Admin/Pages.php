<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Dashboard',
        ];
        echo view('admin/dashboard/index', $data);
    }
}
