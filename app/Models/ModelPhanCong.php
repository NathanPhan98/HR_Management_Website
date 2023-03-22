<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPhanCong extends Model
{
    protected $table      = 'phancong';
    protected $primaryKey = 'iMaPhanCong';
    protected $allowedFields = ['iMaNhanVien', 'dNgayPhanCong', 'iMaChucVu', 'iMaPhongBan', 'iMaPhuCap', 'iTrangThai', 'vGhiChu'];

    public function getPCCVByPCId($var){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('chucvu','chucvu.iMaChucVu = phancong.iMaChucVu')
        ->where('phancong.iTrangThai',1)
        ->where('phancong.iMaPhongBan',$var)->get()->getResult('array');
    }

    public function getPCByPCId($var){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phucap','phucap.iMaPhuCap = phancong.iMaPhuCap')
        ->where('phancong.iTrangThai',1)
        ->where('phancong.iMaPhongBan',$var)->get()->getResult('array');
    }

    public function NVDuDKTaoTK($arr){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->whereNotIn('iMaNhanVien', $arr)
        ->where('phancong.iTrangThai',1)
        ->get()->getResult('array');
    }

    public function getListPBancoPhanCong(){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phongban','phongban.iMaPhongBan = phancong.iMaPhongBan')
        ->where('phancong.iTrangThai',1)
        ->groupBy('phancong.iMaPhongBan')
        ->get()->getResult('array');
    }

    public function getPhanCongByNV($id){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('nhanvien','nhanvien.iMaNhanVien = phancong.iMaNhanVien')
        ->where('phancong.iMaNhanVien',$id)
        ->get()->getResult('array');
    }

    // public function getPCCV(){ 
    //     return $this->db->table($this->table)
    //     ->join('chucvu','chucvu.iMaChucVu = phancong.iMaChucVu')
    //     ->get()->getResult('array');
    // }

    // public function getPC(){ 
    //     return $this->db->table($this->table)
    //     ->join('phucap','phucap.iMaPhuCap = phancong.iMaPhuCap')
    //     ->get()->getResult('array');
    // }
}