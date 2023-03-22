<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPhongBan extends Model
{
    protected $table      = 'phongban';
    protected $primaryKey = 'iMaPhongBan';
    protected $allowedFields = ['vTenPhongBan', 'vDiaChi'];
}