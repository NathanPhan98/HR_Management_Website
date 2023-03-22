<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBaoHiem extends Model
{
    protected $table      = 'baohiem';
    protected $primaryKey = 'iMaQuaTrinh';
    protected $allowedFields = ['iMaNhanVien', 'fBHXH', 'fBHYT', 'fBHTN', 'fTongTien', 'iThang', 'iNam'];

    public function listQuaTrinhBHByPBID($var,$month,$year){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phancong','phancong.iMaNhanVien = baohiem.iMaNhanVien')
        ->join('nhanvien','nhanvien.iMaNhanVien = baohiem.iMaNhanVien')
        ->where('phancong.iMaPhongBan',$var)
        ->where('phancong.iTrangThai',1)
        ->where('baohiem.iThang',$month)
        ->where('baohiem.iNam',$year)
        ->get()->getResult('array');
    }

    public function listQuaTrinhBH($month){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phancong','phancong.iMaNhanVien = baohiem.iMaNhanVien')
        ->join('nhanvien','nhanvien.iMaNhanVien = baohiem.iMaNhanVien')
        //->where('phancong.iMaPhongBan',$var)
        ->where('baohiem.iThang',$month)
        ->get()->getResult('array');
    }
}