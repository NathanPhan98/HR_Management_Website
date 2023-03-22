<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelChamCong;
use App\Models\ModelNhanVien;
use App\Models\ModelBanLuong;
use App\Models\ModelLuongCoBan;
use App\Models\ModelBaoHiem;
use App\Models\ModelPhanCong;
use App\Models\ModelDoanhThu;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ctlBangLuong extends BaseController
{
	public function listBangLuongNVPB() 
    {
		$dsNV_model= new ModelBanLuong();
		$year = date('Y');
		$month = date('n');

		if($this->request->getGet('month')&&$this->request->getGet('year')){
			$month = $this->request->getGet('month');
			$year = $this->request->getGet('year');
		}
    	$dsNV=$dsNV_model
		->where('dThangNam >=', $year.'-'.$month.'-1')
		->where('dThangNam <=', $year.'-'.$month.'-31')->findAll(); 
		
		$phanCong_Model= new ModelPhanCong();
		$dsPhongBan = $phanCong_Model->getListPBancoPhanCong();
		$data['dsPhongBan'] = $dsPhongBan;

		// echo "<pre>";
		// var_dump($dsPhongBan);
		// echo "</pre>";
		// exit;

		$data['month']=$month;	
		$data['year']=$year;	//date("m",strtotime($dsNV[0]['dThangNam']));
    	$data['title']="Danh sach luong nhan vien";
    	$data['dsNV']=$dsNV;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/bangLuong",$data);
        return view('Views/index',$data);
    }
	
	// get list by ID Phong Ban
	public function listNVPB($id) // tạo thẻ a để truyền id phòng ban, => chia được danh sách phòng ban để nv tính cho dễ 
    {
		$dsNV_model= new ModelNhanVien(); 
    	$dsNV=$dsNV_model->listNVByPBID($id);  
		return $dsNV;
    }

	public function listLCBnvPB($id){
		$dsLCB_model= new ModelLuongCoBan();
    	$dsLCB=$dsLCB_model->listLuongCBByPBID($id); 
		return $dsLCB;
	}

	public function listPCCVbyPCongPB($id){ 
		$dsPccvByPC_model= new ModelPhanCong();
    	$dsPCCV=$dsPccvByPC_model->getPCCVByPCId($id);  
		return $dsPCCV; // lay pccv bang ma nhan vien
	}

	public function listPCbyPCongPB($id){ 
		$dsPcByPC_model= new ModelPhanCong();
    	$dsPC=$dsPcByPC_model->getPCByPCId($id); 
		return $dsPC;  
	}

	public function listChamCongPB($id,$month,$year){
		$Model_ChamCong = new ModelChamCong();

    	$employeesByPBID=$Model_ChamCong->listChamCongByPBID($id,$month,$year);
		return $employeesByPBID;
	}
	

	public function lapBangLuongNVPB() // lập bản lương cho các nhân viên của từng phòng ban
    {
		$currentMonth = date('n');
		$currentYear = date('Y');
		$time = strtotime($currentYear.'-'.$currentMonth.'-4');

		if($this->request->getGet('phongban')){
			$phongBan = $this->request->getGet('phongban');
		}

		$dsnv = $this->listNVPB($phongBan);
		$dslcb = $this->listLCBnvPB($phongBan);
		$dspccv = $this->listPCCVbyPCongPB($phongBan);
		$dspc = $this->listPCbyPCongPB($phongBan);
		$dsChamCong = $this->listChamCongPB($phongBan,$currentMonth,$currentYear);
		if($dsChamCong==null){
			$data['dtNVNhanCanTinhLuong']=[];
			$data['title']="Lap ban luong nhan vien";
			$data['phongban']=$this->request->getGet('phongban');
			$data['flag'] = "Chưa có danh sách chấm công của phòng ".$phongBan."<br> Bạn có thể liên hệ phòng ban này thực hiện chấm công để bạn có thể tính lương cho phòng ban này";
			$data['sidebar']=view("Views/main/layout/sidebar");
			$data['month']=$currentMonth;	
			$data['year']=$currentYear;	
			$data['header']=view("Views/main/layout/header");
			$data['content']=view("Views/main/contentPages/tinhLuong",$data);
			return view('Views/index',$data);
		}

		for($i = 0;$i< count($dsChamCong);$i++){
			$phuCap = $dspc[$i]['fNangNhocDocHai'] + $dspc[$i]['fNhaO'] + $dspc[$i]['fXangXe'];
			$ngayCoDiLam = $dsChamCong[$i]['iSoNgayLam']-$dsChamCong[$i]['fSoNgayNghi']-$dsChamCong[$i]['fSoNgayNghiKhongPhep'];

			$lcb = $dslcb[$i]['fSoTienLuong']/$dsChamCong[$i]['iSoNgayLam']*$ngayCoDiLam; // doanh thu neu co
			$dataLCB[]=[
			 	'iMaNhanVien' => $dsnv[$i]['iMaNhanVien'],
				'fBHXH' => $lcb*0.08,
				'fBHYT' => $lcb*0.015,
				'fBHTN' => $lcb*0.01,
				'fTongTien' => ($lcb*0.08)+($lcb*0.015)+($lcb*0.01),
				'iThang' => $currentMonth,
				'iNam' => $currentYear
			];
		}
		$dsBH_model= new ModelBaoHiem();
		$existDSBH = $dsBH_model->listQuaTrinhBHByPBID($phongBan,$currentMonth,$currentYear);
		if(!$existDSBH){
			$rs = $dsBH_model->insertBatch($dataLCB);
			if($rs==null){
				echo "chua dong duoc bao hiem";
				var_dump($rs);exit;
			}
		}
		$dsbh=$dsBH_model->listQuaTrinhBHByPBID($phongBan,$currentMonth,$currentYear); 
		//tinh doanh thu
		if($phongBan==5){
			$dsDoanhThu_model= new ModelDoanhThu();
			$doanhthu = $dsDoanhThu_model->where('iThang',$currentMonth)->where('iNam',$currentYear)->findAll();
		}
		for($i = 0;$i< count($dsChamCong);$i++){
			
			$lcb = $dslcb[$i]['fSoTienLuong'];
			
			$thuongDT = 0; 
			if(isset($doanhthu)){
				for($j = 0;$j< count($doanhthu);$j++){
					if($phongBan==5&&$doanhthu[$j]['iMaNhanVien']==$dsChamCong[$i]['iMaNhanVien']){
						$thuongDT = $doanhthu[$j]['fSoTien']*0.005; // 0.5% trên doanh thu của của nhân viên kinh doanh 
					}
				}
			}
			if($phongBan==5&&$dsChamCong[$i]['iMaChucVu']==2){
				foreach($doanhthu as $dt){
					$thuongDT+= $dt['fSoTien'];
				}
				$thuongDT*=0.005; //0.5% doanh số của toàn bộ phòng kinh doanh trong 1 tháng
			}
			$luongTrenNgay = $lcb / $dsChamCong[$i]['iSoNgayLam'];
			// echo $luongTrenNgay;
			// echo "<br>";
			$tongPhuCap = $dspc[$i]['fNangNhocDocHai'] + $dspc[$i]['fNhaO'] + $dspc[$i]['fXangXe']+$dspccv[$i]['fPCCV']*$lcb;
			$luongNgayCong = round(($luongTrenNgay*$dsChamCong[$i]['iSoNgayLam'])-($luongTrenNgay*$dsChamCong[$i]['fSoNgayNghi'])-(($luongTrenNgay*$dsChamCong[$i]['fSoNgayNghiKhongPhep'])*2));
			$luongTangCa = round((($luongTrenNgay)/8)*(($dsChamCong[$i]['fSoGioTangCa1_5'])*1.5)+(($luongTrenNgay)/8)*(($dsChamCong[$i]['fSoGioTangCa2_0'])*2));
			$tongTienBaoHiem = $dsbh[$i]['fBHXH']+$dsbh[$i]['fBHYT']+$dsbh[$i]['fBHTN'];
			$data[]=[
			 	'iMaNhanVien' => $dsnv[$i]['iMaNhanVien'],
				'dThangNam' => date('Y-m-d',$time),
				'fPCCV' => $dspccv[$i]['fPCCV']*$lcb,
				'fNangNhocDocHai' => $dspc[$i]['fNangNhocDocHai'],
				'fNhaO' => $dspc[$i]['fNhaO'],
				'fXangXe' => $dspc[$i]['fXangXe'],
				'fTongPhuCap' => $tongPhuCap,
				'fThuongDoanhThu' => $thuongDT,
				'fLuongCoBan' => $lcb,
				'iNgayCongChuan' => $dsChamCong[$i]['iSoNgayLam'],
				'fNgayCong' => $dsChamCong[$i]['iSoNgayLam']-$dsChamCong[$i]['fSoNgayNghi']-$dsChamCong[$i]['fSoNgayNghiKhongPhep'],
				'fNghiCoPhep' => $dsChamCong[$i]['fSoNgayNghi'],
				'fNghiKhongPhep' => $dsChamCong[$i]['fSoNgayNghiKhongPhep'],
				'fLuongNgayCong' => $luongNgayCong,
				'fTangCa1_5' => $dsChamCong[$i]['fSoGioTangCa1_5'],
				'fTangCa2_0' => $dsChamCong[$i]['fSoGioTangCa2_0'],
				'fLuongTangCa' => $luongTangCa,
				'fBHXH' => $dsbh[$i]['fBHXH'],
				'fBHYT' => $dsbh[$i]['fBHYT'],
				'fBHTN' => $dsbh[$i]['fBHTN'],
				'fTongTienBaoHiem' => $tongTienBaoHiem,
				'fThucLanh' => $tongPhuCap + $thuongDT + $luongNgayCong + $luongTangCa - $tongTienBaoHiem
			];
		}
		//exit;
    	$data['dtNVNhanCanTinhLuong']=$data;
		$data['title']="Lap ban luong nhan vien";
		$data['phongban']=$this->request->getGet('phongban');
        $data['sidebar']=view("Views/main/layout/sidebar");
		$data['month']=$currentMonth;	
		$data['year']=$currentYear;	
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/tinhLuong",$data);
        return view('Views/index',$data);
    }
	
	public function act_lapBanLuongChoPhongBan()
    {

		$currentMonth = date('n');
		$currentYear = date('Y');
		
		$phongBan = $this->request->getPost('iMaPhongBan');
		//exit;
		if($this->issetCurrentSalary($phongBan,$currentMonth,$currentYear)){
			return '<script>window.location ="'.base_url().'/bangLuong/lapbanluong?phongban='.$phongBan.'";
			alert("tháng này đã lập bản lương rồi.");
			</script>';
		}
		
		$time = strtotime($currentYear.'-'.$currentMonth.'-1');

		$idNV = $this->request->getPost('iMaNhanVien'); // tra ve 1 mang cac ma nhan vien 
		$fPCCV = $this->request->getPost('fPCCV');
		$fNangNhocDocHai = $this->request->getPost('fNangNhocDocHai');
		$fNhaO = $this->request->getPost('fNhaO');
		$fXangXe = $this->request->getPost('fXangXe');
		$fTongPhuCap = $this->request->getPost('fTongPhuCap');
		$fThuongDoanhThu = $this->request->getPost('fThuongDoanhThu');
		$fLuongCoBan = $this->request->getPost('fLuongCoBan');
		$iNgayCongChuan = $this->request->getPost('iNgayCongChuan');
		$fNgayCong = $this->request->getPost('fNgayCong');
		$fNghiCoPhep = $this->request->getPost('fNghiCoPhep');
		$fNghiKhongPhep = $this->request->getPost('fNghiKhongPhep');
		$fLuongNgayCong = $this->request->getPost('fLuongNgayCong');
		$fTangCa1_5 = $this->request->getPost('fTangCa1_5');
		$fTangCa2_0 = $this->request->getPost('fTangCa2_0');
		$fLuongTangCa = $this->request->getPost('fLuongTangCa');
		$fBHXH = $this->request->getPost('fBHXH');
		$fBHYT = $this->request->getPost('fBHYT');
		$fBHTN = $this->request->getPost('fBHTN');
		$fTongTienBaoHiem = $this->request->getPost('fTongTienBaoHiem');
		$fThucLanh = $this->request->getPost('fThucLanh');
		
		for($i = 0;$i< count($idNV);$i++){
			$data[]=[
				'iMaNhanVien' => $idNV[$i],
				'dThangNam' => date('Y-m-d',$time),
				'fPCCV' => $fPCCV[$i],
				'fNangNhocDocHai' => $fNangNhocDocHai[$i],
				'fNhaO' => $fNhaO[$i],
				'fXangXe' => $fXangXe[$i],
				'fTongPhuCap' => $fTongPhuCap[$i],
				'fThuongDoanhThu' => $fThuongDoanhThu[$i],
				'fLuongCoBan' => $fLuongCoBan[$i],
				'iNgayCongChuan' => $iNgayCongChuan[$i],
				'fNgayCong' => $fNgayCong[$i],
				'fNghiCoPhep' => $fNghiCoPhep[$i],
				'fNghiKhongPhep' => $fNghiKhongPhep[$i],
				'fLuongNgayCong' => $fLuongNgayCong[$i],
				'fTangCa1_5' => $fTangCa1_5[$i],
				'fTangCa2_0' => $fTangCa2_0[$i],
				'fLuongTangCa' => $fLuongTangCa[$i],
				'fBHXH' => $fBHXH[$i],
				'fBHYT' => $fBHYT[$i],
				'fBHTN' => $fBHTN[$i],
				'fTongTienBaoHiem' => $fTongTienBaoHiem[$i],
				'fThucLanh' => $fThucLanh[$i]
			];
		}
		
		$BangLuongNV_model= new ModelBanLuong();
		// 	// insert hang loat
		$BangLuongNV_model->insertBatch($data); 
	
		return '<script>window.location ="'.base_url().'/bangLuong"</script>';
    }

	public function issetCurrentSalary($pb,$month,$year) 
    {
		$bl_model= new ModelBanLuong();
    	$dsl=$bl_model->getMakedSalary($pb,$month,$year); 

		if(count($dsl)>0){
			return true;
		}
		return false;
    }

	public function print(){

		$bl_model= new ModelBanLuong();
    	$bangLuong=$bl_model->findAll();

		$file_name = 'banLuongTatCaNhanVien.xlsx';

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('B2', 'BẢNG TÍNH TIỀN LƯƠNG');

		$sheet->setCellValue('A4', 'Mã lương');
		$sheet->setCellValue('B4', 'Mã nhân viên');
		$sheet->setCellValue('C4', 'Tháng năm');
		$sheet->setCellValue('D4', 'Phụ cấp chức vụ');
		$sheet->setCellValue('E4', 'Nặng nhọc đọc hại');
		$sheet->setCellValue('F4', 'Nhà ở');
		$sheet->setCellValue('G4', 'Xăng xe');
		$sheet->setCellValue('H4', 'Tổng phụ cấp');
		$sheet->setCellValue('I4', 'Thưởng doanh thu');
		$sheet->setCellValue('J4', 'Lương cơ bản');
		$sheet->setCellValue('K4', 'Ngày công chuẩn');
		$sheet->setCellValue('L4', 'Ngày công');
		$sheet->setCellValue('M4', 'Nghỉ có phép');
		$sheet->setCellValue('N4', 'Nghỉ không phép');
		$sheet->setCellValue('O4', 'Lương ngày công');
		$sheet->setCellValue('P4', 'Số giờ tăng ca 1.5');
		$sheet->setCellValue('Q4', 'Số giờ tăng ca 2.0');
		$sheet->setCellValue('R4', 'Lương tăng ca');
		$sheet->setCellValue('S4', 'Bảo hiểm xã hội');
		$sheet->setCellValue('T4', 'Bảo hiểm y tế');
		$sheet->setCellValue('U4', 'Bảo hiểm thất nghiệp');
		$sheet->setCellValue('V4', 'Tổng tiền bảo hiểm');
		$sheet->setCellValue('W4', 'Thực Lãnh');
		$sheet->setCellValue('X4', 'Ghi chú');

		$count = 5;

		foreach($bangLuong as $row)
		{
			$sheet->setCellValue('A' . $count, $row['iMaLuong']);
			$sheet->setCellValue('B' . $count, $row['iMaNhanVien']);
			$sheet->setCellValue('C' . $count, $row['dThangNam']);
			$sheet->setCellValue('D' . $count, $row['fPCCV']);
			$sheet->setCellValue('E' . $count, $row['fNangNhocDocHai']);
			$sheet->setCellValue('F' . $count, $row['fNhaO']);
			$sheet->setCellValue('G' . $count, $row['fXangXe']);
			$sheet->setCellValue('H' . $count, $row['fTongPhuCap']);
			$sheet->setCellValue('I' . $count, $row['fThuongDoanhThu']);
			$sheet->setCellValue('J' . $count, $row['fLuongCoBan']);
			$sheet->setCellValue('K' . $count, $row['iNgayCongChuan']);
			$sheet->setCellValue('L' . $count, $row['fNgayCong']);
			$sheet->setCellValue('M' . $count, $row['fNghiCoPhep']);
			$sheet->setCellValue('N' . $count, $row['fNghiKhongPhep']);
			$sheet->setCellValue('O' . $count, $row['fLuongNgayCong']);
			$sheet->setCellValue('P' . $count, $row['fTangCa1_5']);
			$sheet->setCellValue('Q' . $count, $row['fTangCa2_0']);
			$sheet->setCellValue('R' . $count, $row['fLuongTangCa']);
			$sheet->setCellValue('S' . $count, $row['fBHXH']);
			$sheet->setCellValue('T' . $count, $row['fBHYT']);
			$sheet->setCellValue('U' . $count, $row['fBHTN']);
			$sheet->setCellValue('V' . $count, $row['fTongTienBaoHiem']);
			$sheet->setCellValue('W' . $count, $row['fThucLanh']);
			$count++;
		}

		$writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");

		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

		header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($file_name));

		flush();

		readfile($file_name);

		exit;
	}











}
