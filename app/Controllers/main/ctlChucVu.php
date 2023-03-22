<?php

namespace App\Controllers\main;
use App\Controllers\BaseController;
use App\Models\ModelChucVu;
class ctlChucVu extends BaseController
{
    public function listChucVu()
    {
    	$cv_model= new ModelChucVu();
    	$cv=$cv_model->findAll();
    	$data['title']="List Account";
    	$data['cv']=$cv;
        $data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/chucVu",$data);
        return view('Views/index',$data);
    }

}
