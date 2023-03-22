<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table      = 'taikhoan';
    protected $primaryKey = 'iID';
    protected $allowedFields = ['vUsername', 'vPassword', 'VQuyen', 'iMaNhanVien', 'iStatus'];

    public function getUserInfoByAcc($username,$password){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('nhanvien','nhanvien.iMaNhanVien = taikhoan.iMaNhanVien')
        ->join('phancong','phancong.iMaNhanVien = taikhoan.iMaNhanVien')
        ->where('phancong.iTrangThai',1)
        ->where('taikhoan.vUsername',$username)
        ->where('taikhoan.vPassword',$password)
        ->get()->getResult('array');
    }

    public function getListAccount(){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->where('VQuyen >',0)
        ->get()->getResult('array');
    }
}