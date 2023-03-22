<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelNhanVien;
use App\Models\ModelLuongCoBan;
use App\Models\ModelPhanCong;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ctlNhanVien extends BaseController
{
    public function listUser()
    {
    	$NV_model= new ModelNhanVien();
    	$employees=$NV_model->findAll();
    	$data['title']="List Employee";
    	$data['employees']=$employees;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/employee",$data);
        return view('Views/index',$data);
    }

	public function userDetail()
    {
		$var = $_GET['id'];
    	$NV_model= new ModelNhanVien();
    	$employees=$NV_model->where('iMaNhanVien',$var)->first();
    	$data['employees']=$employees;

		$LCB_model= new ModelLuongCoBan();
		$lcbNV = $LCB_model->getLCBByNV($var);
		$data['lcbNV']=$lcbNV;
		
		$PC_model= new ModelPhanCong();
		$pcNV = $PC_model->getPhanCongByNV($var);
		$data['pcNV']=$pcNV;
		//var_dump($employees);exit;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/thongTinChiTietNhanVien",$data);
        return view('Views/index',$data);
    }

	public function add()
    {
    	$data['title']="Thêm nhân viên";
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/addEmployeePage",$data);
        return view('Views/index',$data);
    }

	public function add_act()
    {
		$data=[
			'vTenNhanVien'=>$this->request->getPost('vTenNhanVien'),
			'dNgaySinh'=>$this->request->getPost('dNgaySinh'),
			'vGioiTinh'=>$this->request->getPost('vGioiTinh'),
			'iSoDienThoai'=>$this->request->getPost('iSoDienThoai'),
			'iCCCD'=>$this->request->getPost('iCCCD'),
			'dNgayCap'=>$this->request->getPost('dNgayCap'),
			'vNoiCap'=>$this->request->getPost('vNoiCap'),
			'iMaBaoHiem'=>$this->request->getPost('iMaBaoHiem'),
			'vTinhTrangHonNhan'=>$this->request->getPost('vTinhTrangHonNhan'),
			'vTrinhDoHocVan'=>$this->request->getPost('vTrinhDoHocVan'),
			'vTrinhDoChuyenMon'=>$this->request->getPost('vTrinhDoChuyenMon'),
			'vGhiChu'=>$this->request->getPost('vGhiChu')
		];

		$NV_model = new ModelNhanVien();
		$NV_model->insert($data);
		return '<script>window.location ="http://localhost:8080/HR_Management_Website/public/nhanVien"</script>';
    }

	public function update_act()
    {
		$data=[
			'vTenNhanVien'=>$this->request->getPost('vTenNhanVien'),
			'dNgaySinh'=>$this->request->getPost('dNgaySinh'),
			'vGioiTinh'=>$this->request->getPost('vGioiTinh'),
			'iSoDienThoai'=>$this->request->getPost('iSoDienThoai'),
			'iCCCD'=>$this->request->getPost('iCCCD'),
			'dNgayCap'=>$this->request->getPost('dNgayCap'),
			'vNoiCap'=>$this->request->getPost('vNoiCap'),
			'iMaBaoHiem'=>$this->request->getPost('iMaBaoHiem'),
			'vTinhTrangHonNhan'=>$this->request->getPost('vTinhTrangHonNhan'),
			'vTrinhDoHocVan'=>$this->request->getPost('vTrinhDoHocVan'),
			'vTrinhDoChuyenMon'=>$this->request->getPost('vTrinhDoChuyenMon'),
			'vGhiChu'=>$this->request->getPost('vGhiChu')
		];

		$NV_model = new ModelNhanVien();
		$NV_model->update($this->request->getPost('iMaNhanVien'),$data);

		return '<script>window.location ="http://localhost:8080/HR_Management_Website/public/nhanVien"</script>';
    }

	public function print(){

		$NV_model= new ModelNhanVien();
    	$employees=$NV_model->findAll();

		$file_name = 'danhsachnhanvien.xlsx';

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('B2', 'DANH SÁCH NHÂN VIÊN CÔNG TY AUTO-TAN');

		$sheet->setCellValue('A4', 'Tên nhân viên');
		$sheet->setCellValue('B4', 'Ngày sinh');
		$sheet->setCellValue('C4', 'Giới tính.');
		$sheet->setCellValue('D4', 'Số điện thoại');
		$sheet->setCellValue('E4', 'Căng cước công dân');
		$sheet->setCellValue('F4', 'Ngày cấp');
		$sheet->setCellValue('G4', 'Nơi cấp');
		$sheet->setCellValue('H4', 'Mã bảo hiểm');
		$sheet->setCellValue('I4', 'Tình trạng hôn nhân');
		$sheet->setCellValue('J4', 'Trình độ học vấn');
		$sheet->setCellValue('K4', 'Trình độ chuyên môn');
		$sheet->setCellValue('LL4', 'Ghi chú');
		$count = 5;

		foreach($employees as $row)
		{
			$sheet->setCellValue('A' . $count, $row['vTenNhanVien']);
			$sheet->setCellValue('B' . $count, $row['dNgaySinh']);
			$sheet->setCellValue('C' . $count, $row['vGioiTinh']);
			$sheet->setCellValue('D' . $count, $row['iSoDienThoai']);
			$sheet->setCellValue('E' . $count, $row['iCCCD']);
			$sheet->setCellValue('F' . $count, $row['dNgayCap']);
			$sheet->setCellValue('G' . $count, $row['vNoiCap']);
			$sheet->setCellValue('H' . $count, $row['iMaBaoHiem']);
			$sheet->setCellValue('I' . $count, $row['vTinhTrangHonNhan']);
			$sheet->setCellValue('J' . $count, $row['vTrinhDoHocVan']);
			$sheet->setCellValue('K' . $count, $row['vTrinhDoChuyenMon']);
			$sheet->setCellValue('L' . $count, $row['vGhiChu']);
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
