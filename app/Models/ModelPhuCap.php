<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPhuCap extends Model
{
    protected $table      = 'phucap';
    protected $primaryKey = 'iMaPhuCap';
    protected $allowedFields = ['fNangNhocDocHai', 'fNhaO', 'fXangXe','vGhiChu'];
}