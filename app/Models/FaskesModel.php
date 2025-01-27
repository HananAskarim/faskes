<?php

namespace App\Models;

use CodeIgniter\Model;

class FaskesModel extends Model
{
    protected $table      = 'tbl_faskes';
    protected $primaryKey = 'id_faskes';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kategori', 'nama_faskes', 'alamat', 'telp', 'layanan', 'latitude', 'longitude', 'foto'];

    // mengambil data dengan 2 tabel
    function getAll()
    {
        $builder = $this->db->table('tbl_faskes');
        $builder->join('kategori', 'kategori.id_kategori = tbl_faskes.id_kategori');
        $query = $builder->get();
        return $query->getResult();
    }

    //detail kategori
    public function detailKategori($id_kategori)
    {
        $builder =  $this->db->table('kategori');
        $builder->where('id_kategori', $id_kategori);
        $query = $builder->get();
        return $query->getResult();
    }

    //detail faskes
    public function detailfaskes($id_faskes)
    {
        $builder =  $this->db->table('tbl_faskes');
        $builder->join('kategori', 'kategori.id_kategori = tbl_faskes.id_kategori')->where('id_faskes', $id_faskes);
        $query = $builder->get();
        return $query->getResult();
    }

    //kategorisasi
    function faskesKategori($id_kategori)
    {
        $builder = $this->db->table('tbl_faskes');
        $builder->join('kategori', 'kategori.id_kategori = tbl_faskes.id_kategori')->where('tbl_faskes.id_kategori', $id_kategori);
        $query = $builder->get();
        return $query->getResult();
    }

    //tabel pencarian di web
    public function search($keyword)
    {
        return $this->table('tbl_faskes')->like('nama_faskes', $keyword)->orlike('alamat', $keyword);
    }
}
