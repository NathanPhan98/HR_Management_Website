<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelChucVu extends Model
{
    protected $table      = 'chucvu';
    protected $primaryKey = 'iMaChucVu ';
    protected $allowedFields = ['vTenChucVu', 'fPCCV'];
}