<?php 
  $ktquyen = checkRoles();
  //var_dump($ktquyen);exit;
  if(!$ktquyen){
    echo '<script>window.location ="http://localhost:8080/HR_Management_Website/public/forbidden"</script>';
    //redirect('forbidden');//->to('http://localhost:8080/HR_Management_Website/public/forbidden');
  } 
?>
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
    </li>
  </ul>
  <?php 
     $session = session();
     $role = $session->get('role'); 
     //var_dump($role);
    //  var_dump($session->get('vUsername'));
      ?>
  <ul class="navbar-nav align-items-center right-nav-link">

    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php $session = session(); echo $session->get('vUsername'); ?></h6>
            
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <a data-bs-toggle="modal" data-bs-target="#xemThongTinTK"><li class="dropdown-item"><i class="icon-wallet mr-2"></i> Đổi mật khẩu</li></a> 
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="http://localhost:8080/HR_Management_Website/public/logout">Đăng Xuất</a></li>
      </ul>
    </li>
  </ul>
  </nav>
</header>

<div class="modal fade" id="xemThongTinTK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: grey;">
    <form action="public/doiMatKhau" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">

            Tài khoản: <span><?php $session = session(); echo $session->get('vUsername'); ?></span>
            <hr>
            <div class="form-group">
                <label for="input-7">Mật khẩu củ</label>
                <input type="password" class="form-control form-control-rounded" name="oldPassword" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="input-8">Mật khẩu mới</label>
                <input type="password" class="form-control form-control-rounded" name="newPassword"  placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control form-control-rounded" name="reNewPassword"  placeholder="Enter password">
            </div>
            
            <input type="hidden"  name="iID" value="<?php $session = session(); echo $session->get('iID'); ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        </div>
      </form>
    </div>
  </div>
</div>