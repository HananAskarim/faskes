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

    function getAll()
    {
        $builder = $this->db->table('tbl_faskes');
        $builder->join('kategori', 'kategori.id_kategori = tbl_faskes.id_kategori');
        $query = $builder->get();
        return $query->getResult();
    }
}