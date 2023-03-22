<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanLuong extends Model
{
    protected $table      = 'bangluong';
    protected $primaryKey = 'iMaLuong';
    protected $allowedFields = ['iMaNhanVien', 'dThangNam', 'fPCCV', 'fNangNhocDocHai', 'fNhaO', 'fXangXe', 'fTongPhuCap', 'fThuongDoanhThu',
     'fLuongCoBan', 'iNgayCongChuan', 'fNgayCong', 'fNghiCoPhep', 'fNghiKhongPhep', 'fLuongNgayCong', 'fTangCa1_5', 'fTangCa2_0',
      'fLuongTangCa', 'fBHXH', 'fBHYT', 'fBHTN', 'fTongTienBaoHiem', 'fThucLanh', 'vGhiChu'];


    public function getMakedSalary($pb,$month,$year){
        return $this->db->table($this->table)
        ->join('nhanvien','nhanvien.iMaNhanVien = bangluong.iMaNhanVien')
        ->join('phancong','phancong.iMaNhanVien = bangluong.iMaNhanVien')
        ->where('phancong.iMaPhongBan',$pb)
        ->where('phancong.iTrangThai',1)
        ->where('dThangNam >=', $year.'-'.$month.'-1')
        ->where('dThangNam <=', $year.'-'.$month.'-31')
        ->get()->getResult('array');
    }

}
