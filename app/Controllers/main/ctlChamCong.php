<?php
namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelChamCong;
use App\Models\ModelNhanVien;
class ctlChamCong extends BaseController
{
    public function listNVPB()
    {
		$session = session();
		$month = date('n');
		$year = date('Y');
		$day =date('d');
		$time = "$year-$month-$day";
		$currentDate = date('Y-m-d',strtotime($time));
		$data['currentDate'] = $currentDate;
		$NV_model= new ModelNhanVien();
		$Model_ChamCong = new ModelChamCong();
    	$employees=$NV_model->listNVByPBID($session->get('iMaPhongBan'));
    	$data['title']="List nhân viên theo từng phòng ban";
		if($Model_ChamCong->listChamCongByPBID($session->get('iMaPhongBan'),$month,$year)){
			$data['flag']="Không có dữ liệu danh sách nhân viên để chấm công <br> Tháng này bạn đã thực hiện chấm công rồi";
			$data['employees']=[];
		}else{
			$data['flag']="";
			$data['employees']=$employees;
		}
		$data['ngayCongChuan'] = $this->getNgayCongChuan($month);
		$data['tenPhongBan']=$employees[0]['vTenPhongBan'];
		$data['month']=$month;	
		$data['year']=$year;	
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/chamCong",$data);
        return view('Views/index',$data);
    }

	public function listChamCongNVPB()
    {
		$month = date('n');
		$year = date('Y');
		$session = session();
		$Model_ChamCong = new ModelChamCong();
    	$employeesByPBID = $Model_ChamCong->listChamCongByPBID($session->get('iMaPhongBan'),$month,$year);
		$dsChamCong =  $Model_ChamCong->findAll();
    	$data['employeesByPBID']=$employeesByPBID;
		$data['title']="List nhân viên theo từng phòng ban";
		$data['month']=$month;	
		$data['year']=$year;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/updateChamCong",$data);
        return view('Views/index',$data);
    }

	public function act_lapBangChamCong()
    {
		$idNV = $this->request->getPost('iMaNhanVien'); // tra ve 1 mang cac ma nhan vien 
		$soNgayLam = $this->request->getPost('iSoNgayLam');
		$soGioTangCa15 = $this->request->getPost('fSoGioTangCa1_5');
		$soGioTangCa20 = $this->request->getPost('fSoGioTangCa2_0');
		$thangNam = $this->request->getPost('dThangNam');
		$soNgayNghiKhongPhep = $this->request->getPost('fSoNgayNghiKhongPhep');
		$soNgayNghi = $this->request->getPost('fSoNgayNghi');
		for($i = 0;$i< count($idNV);$i++){
			$tongNgayNghi = $soNgayNghiKhongPhep[$i]+$soNgayNghi[$i];
			if($tongNgayNghi>$this->getNgayCongChuan(date('n'))){
				return '<script>alert("Tổng của Ngày nghĩ có phép và Ngày nghĩ không phép không được lớn hơn ngày công chuẩn. Vui lòng nhập lại.");
				window.location ="'.base_url().'/chamCong"</script>';
			}
			$data[]=[
				'iMaNhanVien' => $idNV[$i],
				'iSoNgayLam' => $soNgayLam[$i],
				'fSoGioTangCa1_5' => $soGioTangCa15[$i],
				'fSoGioTangCa2_0' => $soGioTangCa20[$i],
				'dThangNam' => $thangNam[$i],
				'fSoNgayNghiKhongPhep' => $soNgayNghiKhongPhep[$i],
				'fSoNgayNghi' => $soNgayNghi[$i]
			];
		}
		$Model_ChamCong = new ModelChamCong();
		$Model_ChamCong->insertBatch($data); 
		return '<script>window.location ="'.base_url().'/chamCong/DSChamCong"</script>';
    }

	public function act_capNhatBangChamCong()
    {
		$idNV = $this->request->getPost('iMaNhanVien'); 
		$soNgayLam = $this->request->getPost('iSoNgayLam');
		$soGioTangCa15 = $this->request->getPost('fSoGioTangCa1_5');
		$soGioTangCa20 = $this->request->getPost('fSoGioTangCa2_0');
		$thangNam = $this->request->getPost('dThangNam');
		$soNgayNghiKhongPhep = $this->request->getPost('fSoNgayNghiKhongPhep');
		$soNgayNghi = $this->request->getPost('fSoNgayNghi');
		for($i = 0;$i< count($idNV);$i++){
			$data[]=[
				'iMaNhanVien' => $idNV[$i],
				'iSoNgayLam' => $soNgayLam[$i],
				'fSoGioTangCa1_5' => $soGioTangCa15[$i],
				'fSoGioTangCa2_0' => $soGioTangCa20[$i],
				'dThangNam' => $thangNam[$i],
				'fSoNgayNghiKhongPhep' => $soNgayNghiKhongPhep[$i],
				'fSoNgayNghi' => $soNgayNghi[$i]
			];
		}
		$Model_ChamCong = new ModelChamCong();
		$Model_ChamCong->updateBatch($data,'iMaNhanVien');
		return '<script>window.location ="'.base_url().'/chamCong/DSChamCong"</script>';
    }

	function getNgayCongChuan($month){
		if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
			return $kq = 27;
		}else if($month==2){
			return $kq = 24;
		}else{
			return $kq = 26;
		}
	}
}
