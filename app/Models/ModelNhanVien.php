<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNhanVien extends Model
{
    protected $table      = 'nhanvien';
    protected $primaryKey = 'iMaNhanVien';
    protected $allowedFields = ['vTenNhanVien', 'dNgaySinh', 'vGioiTinh', 'iSoDienThoai', 'iCCCD', 'dNgayCap', 'vNoiCap',
                                 'iMaBaoHiem', 'vTinhTrangHonNhan', 'vTrinhDoHocVan', 
                                 'vTrinhDoChuyenMon', 'vGhiChu'];

    public function listNVByPBID($var){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phancong','phancong.iMaNhanVien = nhanvien.iMaNhanVien')//right
        ->join('phongban','phongban.iMaPhongBan = phancong.iMaPhongBan')
        ->where('phancong.iMaPhongBan',$var)
        ->where('phancong.iTrangThai',1)
        ->get()->getResult('array');
    }

    public function listGetTTBanLuongByPBID($var){
        return $this->db->table($this->table)
        ->join('bangchamcong','bangchamcong.iMaNhanVien = nhanvien.iMaNhanVien')
        ->join('phancong','phancong.iMaNhanVien = bangchamcong.iMaNhanVien')
        ->where('phancong.iMaPhongBan',$var)->get()->getResult('array');
    }

    public function listGetTTBanLuong(){
        return $this->db->table($this->table)
        ->join('bangchamcong','bangchamcong.iMaNhanVien = nhanvien.iMaNhanVien')
        ->join('phancong','phancong.iMaNhanVien = bangchamcong.iMaNhanVien')
        ->get()->getResult('array');
    }

    public function listNVPhongKD($var){  // lay ra nhung nhan vien co phan cong theo phong ban
        return $this->db->table($this->table)
        ->join('phancong','phancong.iMaNhanVien = nhanvien.iMaNhanVien','right')
        ->where('phancong.iMaPhongBan',$var)
        ->where('phancong.iMaChucVu', 3)
        ->where('phancong.iTrangThai',1)
        ->get()->getResult('array');
    }
}