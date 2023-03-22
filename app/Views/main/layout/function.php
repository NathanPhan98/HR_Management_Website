<?php
use App\Models\ModelBanLuong;
use App\Models\ModelChamCong;

function checkRoles($url = false){
    $session = session();
    
    $url  = $url != false ? $url : $_SERVER['REQUEST_URI'];
    
    $role = $session->get('role'); // lay quyen tu session cua nguoi dung
    //var_dump($role);exit;
    $role = implode("|", $role);
    preg_match('/'.$role.'/',$url,$matches);
    return !empty($matches);
}

function checkActive($pb,$month, $year) 
{
    $bl_model= new ModelBanLuong();
    $Model_ChamCong = new ModelChamCong();

    $employeesByPBID=$Model_ChamCong->listChamCongByPBID($pb,$month,$year);
    $dsl=$bl_model->getMakedSalary($pb,$month,$year); 

    // var_dump($employeesByPBID);
    // echo "dayne".count($dsl);exit;
    if(count($dsl)>0){
        return 1; //disable
    }else if($employeesByPBID==null){
        return 2;//disable
    }
    return 3; //show
}
