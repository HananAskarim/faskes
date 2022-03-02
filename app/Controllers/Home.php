<?php

namespace App\Controllers;

use App\Models\FaskesModel;

class Home extends BaseController
{
    protected $faskesModel;

    public function __construct()
    {
        $this->faskesModel = new FaskesModel();
    }

    public function index()
    {
        $faskes = $this->faskesModel->getAll();
        $data = [
            'title' => 'Halaman Home',
            'faskes' => $faskes
        ];
        return view('web/pages/home', $data);
    }

    public function faskes()
    {
        $data = [
            'title' => 'Halaman faskes'
        ];
        return view('web/pages/faskes', $data);
    }
}
