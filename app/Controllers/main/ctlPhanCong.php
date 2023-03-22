<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelPhanCong;
use App\Models\ModelLuongCoBan;
class ctlPhanCong extends BaseController
{
    public function listAssignment()
    {
    	$Assignment_model= new ModelPhanCong();
    	$Assignments=$Assignment_model->findAll();
    	$data['title']="List Assignment";
    	$data['Assignments']=$Assignments;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/phanCong",$data);
        return view('Views/index',$data);
    }

	public function createAssignment(){
		$iMaNhanVien = $this->request->getPost('iMaNhanVien');
		$dNgayPhanCong = $this->request->getPost('dNgayPhanCong');
		$iMaChucVu = $this->request->getPost('iMaChucVu');
		$iMaPhongBan = $this->request->getPost('iMaPhongBan');
		$iMaPhuCap = $this->request->getPost('iMaPhuCap');
		$vGhiChu = $this->request->getPost('vGhiChu');
		$iTrangThai = $this->request->getPost('iTrangThai');

		$Assignment_model= new ModelPhanCong();
		$existIdNV = $Assignment_model->where('iMaNhanVien',$iMaNhanVien)->findAll();
		//var_dump($existIdNV);exit;

		$lcb_model= new ModelLuongCoBan();

		$lcb = $lcb_model->where('iMaNhanVien',$iMaNhanVien)->findAll();
		//var_dump($lcb);exit;
		
		$data = [
			'iMaNhanVien' => $iMaNhanVien,
			'dNgayPhanCong' => $dNgayPhanCong,
			'iMaChucVu' => $iMaChucVu,
			'iMaPhongBan' => $iMaPhongBan,
			'iMaPhuCap' => $iMaPhuCap,
			'vGhiChu' => $vGhiChu,
			'iTrangThai' => $iTrangThai
		];

		if($existIdNV){
			for($i = 0;$i< count($existIdNV);$i++){
				$dataTemp[] = [ 
					'iMaNhanVien' => $iMaNhanVien,
					'iTrangThai' => 2
				];
			}
		}

		if($iMaChucVu == "1"){
			$fSoTienLuong = 60000000;
		}else if($iMaChucVu == "2"){
			$fSoTienLuong = 35000000;
		}else if($iMaChucVu == "3" && $iMaPhongBan == "5"){ // 5 là phòng kinh doanhdoanh
			$fSoTienLuong = 5000000;
		}else{
			$fSoTienLuong = 8000000;
		}

		$dataLCB = [
			'iMaNhanVien' => $iMaNhanVien,
			'fSoTienLuong' => $fSoTienLuong,
			'dNgayHieuLuc' => $dNgayPhanCong,
			'iTrangThai' => 1
		];

		if($lcb){
			for($i = 0;$i< count($lcb);$i++){
				$lcbTemp[] = [ 
					'iMaNhanVien' => $iMaNhanVien,
					'iTrangThai' => 2
				];
			}
		}
		// echo "<pre>";
		// var_dump($lcb);
		// echo "</pre>";
		// exit;
		if($existIdNV){
			$Assignment_model->updateBatch($dataTemp , 'iMaNhanVien');
		}
		
		$Assignment_model->insert($data);

		if($lcb){
			$lcb_model->updateBatch($lcbTemp , 'iMaNhanVien');
		}

		$lcb_model->insert($dataLCB);
		//var_dump($data);exit;
		return '<script>window.location ="'.base_url().'/phanCong"</script>';
	}



}
