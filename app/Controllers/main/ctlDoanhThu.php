<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelDoanhThu;
use App\Models\ModelNhanVien;
class ctlDoanhThu extends BaseController
{
    public function listDoanhThu()
    {
		$month = date('n');
		$year = date('Y');
    	$doanhThu_model= new ModelDoanhThu();
    	$doanhThu=$doanhThu_model->findAll();
    	$data['title']="List Account";
    	$data['doanhThu']=$doanhThu;
        $data['sidebar']=view("Views/main/layout/sidebar");
		$data['month'] = $month;
		$data['year'] = $year;
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/doanhThu",$data);
        return view('Views/index',$data);
    }

	public function listDoanhThuAllNV()
    {
		$month = date('n');
		$year = date('Y');

		$session = session();

		$NV_model= new ModelNhanVien();
    	$employeesKD=$NV_model->listNVPhongKD(5);
		$data['employeesKD']=$employeesKD;

		$Model_doanhthu = new ModelDoanhThu();
		if($Model_doanhthu->where('iThang',$month)->where('iNam',$year)->findAll()){
			$data['flag']="Bạn đã lập bảng doanh thu của tháng này rồi";
			$data['employeesKD']=[];
		}else{
			$data['flag']="";
			$data['employeesKD']=$employeesKD;
		}

		$data['title']="Lập bảng doanh thu của phòng kinh doanh";
		$data['month'] = $month;
		$data['year'] = $year;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/bangDoanhThu",$data);
        return view('Views/index',$data);
    }

	public function act_addDoanhThu()
    {
		$month = date('n');
		$year = date('Y');

		$iMaNhanVien = $this->request->getPost('iMaNhanVien');
		$fSoTien = $this->request->getPost('fSoTien');
		$iThang = $this->request->getPost('iThang');
		$iNam = $this->request->getPost('iNam');
		if($iMaNhanVien){
			for($i = 0;$i< count($iMaNhanVien);$i++){
				$data[]=[
					'iMaNhanVien' => $iMaNhanVien[$i],
					'fSoTien' => $fSoTien[$i],
					'iThang' => $iThang[$i],
					'iNam' => $iNam[$i]
				];
			}
		}
		
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";exit;

		$Model_doanhthu = new ModelDoanhThu();
		$isExist = $Model_doanhthu->where('iThang',$month)->where('iNam',$year)->findAll();
		if(!$isExist){
			$Model_doanhthu->insertBatch($data); 
		}
		
		return '<script>window.location ="'.base_url().'/doanhThu"</script>';
    }


}
