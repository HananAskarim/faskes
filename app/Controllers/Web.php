<?php

namespace App\Controllers;

use App\Models\FaskesModel;
use App\Models\KategoriModel;

class Web extends BaseController
{
    protected $faskesModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->faskesModel = new FaskesModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->kategoriModel->findAll();
        $faskes = $this->faskesModel->getAll();
        $data = [
            'title' => 'Halaman Home',
            'faskes' => $faskes,
            'kategori' => $kategori,
            'getsegment1' => $this->request->uri->getSegment(1, '')
        ];
        return view('web/pages/home', $data);
    }

    public function about()
    {
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Halaman about',
            'kategori' => $kategori,
            'getsegment1' => $this->request->uri->getSegment(2)
        ];
        return view('web/pages/about', $data);
    }

    public function kategori($id_kategori)
    {
        $faskategori = $this->faskesModel->faskesKategori($id_kategori);
        $faskes = $this->faskesModel->getAll();
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Halaman Kategori',
            'faskes' => $faskes,
            'faskategori' => $faskategori,
            'kategori' => $kategori,
            'getsegment1' => $this->request->uri->getSegment(2)
        ];
        return view('web/pages/kategori', $data);
    }
}
