<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLuongCoBan extends Model
{
    protected $table      = 'luongcoban';
    protected $primaryKey = 'iMaDoiLuong';
    protected $allowedFields = ['iMaNhanVien', 'fSoTienLuong', 'dNgayHieuLuc', 'iTrangThai'];

    public function listLuongCBByPBID($var){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phancong','phancong.iMaNhanVien = luongcoban.iMaNhanVien')
        ->join('nhanvien','nhanvien.iMaNhanVien = luongcoban.iMaNhanVien')
        ->where('phancong.iMaPhongBan',$var)
        ->where('phancong.iTrangThai',1)
        ->where('luongcoban.iTrangThai',1)
        ->get()->getResult('array');
    }

    public function listLuongCB(){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phancong','phancong.iMaNhanVien = luongcoban.iMaNhanVien')
        ->join('nhanvien','nhanvien.iMaNhanVien = luongcoban.iMaNhanVien')
        //->where('phancong.iMaPhongBan',$var)
        ->where('luongcoban.iTrangThai',1)
        ->get()->getResult('array');
    }

    public function getListLCB($stt){
        if($stt==1){
            return $this->db->table($this->table)
            ->join('nhanvien','nhanvien.iMaNhanVien = luongcoban.iMaNhanVien')
            ->where('iTrangThai',1)
            ->get()->getResult('array');
        }else{
            return $this->db->table($this->table)
            ->join('nhanvien','nhanvien.iMaNhanVien = luongcoban.iMaNhanVien')
            ->get()->getResult('array');
        }
    }

    public function getLCBByNV($id){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('nhanvien','nhanvien.iMaNhanVien = luongcoban.iMaNhanVien')
        ->where('luongcoban.iMaNhanVien',$id)
        ->get()->getResult('array');
    }
}