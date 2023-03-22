<?php

namespace App\Controllers;
use App\Models\ModelUser;
class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if($session->get('vUsername')==""){
            return redirect()->to('logout');//return view('Views/login');
        }else{
            $data=[];
            $data['sidebar']=view("Views/main/layout/sidebar");
            $data['header']=view("Views/main/layout/header");
            $data['content']=view("Views/main/contentPages/dashboard");
            return view('Views/index',$data);
        }
    }

    public function forbidden()
    {
        $data=[];
    	$data['sidebar']=view("Views/main/layout/sidebar");
    	$data['header']=view("Views/main/layout/header");
    	$data['content']=view("Views/main/contentPages/accessForbidden");
        return view('Views/index',$data);
    }


    public function login()
    {
        return view('Views/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('Views/login');
    }

    public function login_action(){
        $user_model = new ModelUser();
        $rs = $user_model->getUserInfoByAcc($this->request->getPost('username'),$this->request->getPost('password'));
        //$rs = $user_model->where('vUsername',$this->request->getPost('username'))->where('vPassword',$this->request->getPost('password'))->first();
        // echo "<pre>";
        // var_dump($rs);
        // echo "</pre>";
        // exit;
        //echo $rs[0]['vUsername'];

        if($rs[0]['iStatus']!=1){
            return "tai khoan cua ban da bi tam ngung hoat dong";
        }
        //exit;
        if($rs&&$rs[0]['iStatus']==1){
            $session = session();
            $session->set('vUsername',$rs[0]['vUsername']);
            $session->set('iID',$rs[0]['iID']);

            $session->set('iMaPhongBan',$rs[0]['iMaPhongBan']);
            $session->set('iMaChucVu',$rs[0]['iMaChucVu']);

            if($rs[0]['VQuyen']=='0'){ // Admin
                $rs['role']= array(
                    "dashboard",
                    "forbidden",

                    "nhanVien", 
                    "phuCap",
                    "chamCong",
                    "DSChamCong",
                    "phanCong",
                    "baoHiem",
                    "chucVu",
                    "phongBan",
                    "luongCoBan",
                    "bangLuong",
                    
                    "doanhThu",
                    "account"

                );
                $session->set('role',$rs['role']);
                //var_dump($session->get('role'));exit;
            }
            else if($rs[0]['VQuyen']=='1'){ // kế toán
                $rs['role']= array(
                    "dashboard",
                    "forbidden",

                    "luongCoBan",
                    "bangLuong",
                    "phuCap"
                );
                $session->set('role',$rs['role']);
                //var_dump($session->get('role'));exit;
            }else if ($rs[0]['VQuyen']=='2'){  // Nhân sự
                $rs['role']= array(
                    "dashboard",
                    "forbidden",

                    "nhanVien",
                    "phanCong",
                    "baoHiem",
                    "phuCap"
                );
                $session->set('role',$rs['role']);
            }else if ($rs[0]['VQuyen']=='3'){  // Trưởng phòng
                $rs['role']= array(
                    "dashboard",
                    "forbidden",

                    "chamCong",
                    "DSChamCong"
                );
                $session->set('role',$rs['role']);
                if($rs[0]['iMaPhongBan']==4){
                    $rs['role']= array(
                        "dashboard",
                        "forbidden",
    
                        "chamCong",
                        "DSChamCong",
                        "doanhThu"
                    );
                    $session->set('role',$rs['role']);
                }
            }
            
            //var_dump($rs['role']);exit;
            //$ktquyen = checkRole();
            
            //var_dump($ktquyen);exit;
           // if(!$ktquyen){
            echo '<script>window.location ="http://localhost:8080/HR_Management_Website/public/dashboard"</script>';
            //}
            //var_dump($rs);exit;
            
        }
        else
        echo "fail";  
    }   
    
    public function act_doiMatKhau()
    {
        $idTK = $this->request->getPost("iID");
        $oldPwd = $this->request->getPost("oldPassword");
        $newPwd = $this->request->getPost("newPassword");
        $reNewPwd = $this->request->getPost("reNewPassword");
        $user_model = new ModelUser();
        $rs = $user_model->where('iID',$idTK)->first();
        if($rs['vPassword']!=$oldPwd){
            return '<script>window.location ="http://localhost:8080/HR_Management_Website/public/dashboard";
            alert("Đổi Mật Khẩu Thất Bại: mật khẩu củ sai.");</script>';
        }else if($newPwd!=$reNewPwd){
            return '<script>window.location ="http://localhost:8080/HR_Management_Website/public/dashboard";
            alert("Đổi Mật Khẩu Thất Bại: mật khẩu mới và xác nhận lại mật khẩu mới không khốp với nhau.");</script>';
        }else{
            $user_model->set('vPassword', $newPwd)->where('iID', $idTK)->update();
            return '<script>window.location ="http://localhost:8080/HR_Management_Website/public/dashboard";
            alert("Đổi mật khẩu thành công.");</script>';
        }
    }
}
