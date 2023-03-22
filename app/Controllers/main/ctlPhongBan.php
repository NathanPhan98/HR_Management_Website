<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelPhongBan;
class ctlPhongBan extends BaseController
{
    public function listPhongBan()
    {
    	$pb_model= new ModelPhongBan();
    	$pb=$pb_model->findAll();
    	$data['title']="List Account";
    	$data['pb']=$pb;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/phongBan",$data);
        return view('Views/index',$data);
    }

	public function addPhongBan(){
		$vTenPhongBan=$this->request->getPost('vTenPhongBan');
		$vDiaChi=$this->request->getPost('vDiaChi');
		$pb_model= new ModelPhongBan();
		$data=[
			'vTenPhongBan'=>$vTenPhongBan,
			'vDiaChi'=>$vDiaChi
		];
		$pb_model->insert($data);
		return '<script>window.location ="'.base_url().'/phongBan"</script>';
	}

}
