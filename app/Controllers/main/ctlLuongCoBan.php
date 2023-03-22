<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelLuongCoBan;
class ctlLuongCoBan extends BaseController
{
    public function luongCoBan()
    {
    	$lcb_model= new ModelLuongCoBan();
		$trangThai= 0;
		if($this->request->getGet('status')==1){
			$trangThai = $this->request->getGet('status');
		}
    	$lcb=$lcb_model->getListLCB($trangThai);
    	$data['title']="List Account";
    	$data['lcb']=$lcb;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/luongCoBan",$data);
        return view('Views/index',$data);
    }

}
