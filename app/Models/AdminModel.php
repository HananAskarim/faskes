<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function jml_kategori()
    {
        return $this->db->table('kategori')->countAll();
    }

    public function jml_faskes()
    {
        return $this->db->table('tbl_faskes')->countAll();
    }

    public function jml_admin()
    {
        return $this->db->table('user_admin')->countAll();
    }
}
