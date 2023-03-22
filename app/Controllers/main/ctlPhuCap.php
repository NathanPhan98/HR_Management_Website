<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelPhuCap;
class ctlPhuCap extends BaseController
{
    public function listPhuCap()
    {
    	$pc_model= new ModelPhuCap();
    	$pc=$pc_model->findAll();
    	$data['title']="List Account";
    	$data['pc']=$pc;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/phuCap",$data);
        return view('Views/index',$data);
    }

}
