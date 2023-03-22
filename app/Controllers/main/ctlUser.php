<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelPhanCong;
use CodeIgniter\HTTP\Request;

class ctlUser extends BaseController
{
    public function listAccount()
    {
    	$acc_model= new ModelUser();
    	$accounts=$acc_model->getListAccount();
		// echo "<pre>";
		// var_dump($accounts['iMaNhanVien']);
		// echo "</pre>";
		// exit;
		$arr=[];
		foreach($accounts as $acc){
			$arr[]=$acc['iMaNhanVien'];
		}

		$Assignment_model= new ModelPhanCong();
		$NVCoPC = $Assignment_model->NVDuDKTaoTK($arr);
		$data['NVCoPC']=$NVCoPC;
		// echo "<pre>";
		// var_dump($accounts);
		// echo "</pre>";
		// echo "<hr>";
		// echo "<pre>";
		// var_dump($NVCoPC['iMaNhanVien']);
		// echo "</pre>";
//exit;
		
    	$data['title']="List Account";
    	$data['accounts']=$accounts;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/account",$data);
        return view('Views/index',$data);
    }


	public function addAccount()
    {
		$uname=$this->request->getPost('vUsername');
		$pwd=$this->request->getPost('vPassword');
		$idNV=$this->request->getPost('iMaNhanVien');
		$quyen=$this->request->getPost('VQuyen');
		$status=$this->request->getPost('iStatus');
		$Assignment_model= new ModelPhanCong();
		$existIdNV = $Assignment_model->where('iMaNhanVien',$idNV)->findAll();
		$acc_model= new ModelUser();
		if($status&&$pwd&&$quyen&&$uname&&$idNV){
			$data=[
				'vUsername'=>$uname,
				'vPassword'=>$pwd,
				'iMaNhanVien'=>$idNV,
				'VQuyen'=>$quyen,
				'iStatus'=>$status
			];
			if($existIdNV){
				$rs =$acc_model->insert($data);
				if(!$rs){
					return '<script>alert("Thêm thất bại");
					window.location ="'.base_url().'/account"</script>';
				}
			}else{
				return "Nhân viên này chưa được phân công công việc";
			}
		}
        return '<script>window.location ="'.base_url().'/account"</script>';
    }

	public function delete($id){
		$acc_model= new ModelUser();
		$acc_model->delete($id);
		return '<script>window.location ="'.base_url().'/account"</script>';
	}
}
