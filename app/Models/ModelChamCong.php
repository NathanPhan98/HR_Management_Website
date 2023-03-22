<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelChamCong extends Model
{
    protected $table      = 'bangchamcong';
    protected $primaryKey = 'iMaChamCong';
    protected $allowedFields = ['iMaNhanVien', 'iSoNgayLam', 'fSoGioTangCa1_5', 'fSoGioTangCa2_0', 'dThangNam', 'fSoNgayNghiKhongPhep', 'fSoNgayNghi', 'vLyDoNghi'];

    public function listChamCongByPBID($var,$month,$year){
        return $this->db->table($this->table)
        ->join('nhanvien','nhanvien.iMaNhanVien = bangchamcong.iMaNhanVien')
        ->join('phancong','phancong.iMaNhanVien = bangchamcong.iMaNhanVien')
        ->where('dThangNam >=', $year.'-'.$month.'-1')
        ->where('dThangNam <=', $year.'-'.$month.'-31')
        ->where('phancong.iMaPhongBan',$var)
        ->where('phancong.iTrangThai',1)
        ->get()->getResult('array');
    }
}