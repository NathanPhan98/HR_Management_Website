<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDoanhThu extends Model
{
    protected $table      = 'doanhthu';
    protected $primaryKey = 'iMaDoanhThu';
    protected $allowedFields = ['iMaNhanVien', 'fSoTien','iThang','iNam'];
    
}