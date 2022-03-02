<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'user_admin';
    protected $primaryKey = 'id_user';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'username', 'nama', 'password'];
}
