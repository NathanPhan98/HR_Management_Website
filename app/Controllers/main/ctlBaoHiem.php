<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelBaoHiem;
class ctlBaoHiem extends BaseController
{
    public function listBaoHiem()
    {
    	$bh_model= new ModelBaoHiem();
    	$bh=$bh_model->findAll();
    	$data['title']="List Account";
    	$data['bh']=$bh;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/baoHiem",$data);
        return view('Views/index',$data);
    }

}
