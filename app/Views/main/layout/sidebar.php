<?php include 'function.php'; ?>
<div id="wrapper">
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="http://localhost:8080/HR_Management_Website/public/dashboard">
       <img src="public/assets/images/eagle_logo.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">HR Management</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      
      <li>
        <a href="public/dashboard">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="sidebar-header">NGHIỆP VỤ</li>
      <?php if(checkRoles('nhanVien')) { ?>
      <li>
        <a href="public/nhanVien">
          <i class="zmdi zmdi-accounts-outline"></i> <span>Danh Sách Nhân Viên</span>
        </a>
      </li>
      <?php } ?>
      
      <?php if(checkRoles('phuCap')) { ?>
      <li>
        <a href="public/phuCap">
          <i class="zmdi zmdi-card-giftcard"></i> <span>Phụ Cấp</span>
        </a>
      </li>
      <?php } ?>

      <?php if(checkRoles('chamCong')) { ?>
      <li>
        <a href="public/chamCong">
          <i class="zmdi zmdi-accounts-list"></i> <span>Chấm Công</span>
        </a>
      </li>
      <?php } ?>  

      <?php if(checkRoles('DSChamCong')) { ?>
      <li>
        <a href="public/chamCong/DSChamCong">
          <i class="zmdi zmdi-accounts-list"></i> <span>Danh Sách Chấm Công</span>
        </a>
      </li>
      <?php } ?>  

      <?php if(checkRoles('phanCong')) { ?>
      <li>
        <a href="public/phanCong">
          <i class="zmdi zmdi-account-box-mail"></i> <span>Phân Công Công Việc</span>
        </a>
      </li>
      <?php } ?>

      <?php if(checkRoles('baoHiem')) { ?>
      <li>
        <a href="public/baoHiem">
          <i class="zmdi zmdi-balance"></i> <span>Phúc Lợi Bảo Hiểm</span>
        </a>
      </li>
      <?php } ?>

      <?php if(checkRoles('chucVu')) { ?>
      <li>
        <a href="public/chucVu">
          <i class="zmdi zmdi-accounts-list-alt"></i> <span>Chức Vụ</span>
        </a>
      </li>
      <?php } ?>

      <?php if(checkRoles('phongBan')) { ?>
      <li>
        <a href="public/phongBan">
          <i class="zmdi zmdi-account-box-o"></i> <span>Phòng Ban</span>
        </a>
      </li>
      <?php } ?>

      <?php if(checkRoles('luongCoBan')) { ?>
      <li>
        <a href="public/luongCoBan">
          <i>$</i> <span>Lương Cơ Bản</span>
        </a>
      </li>
      <?php } ?>

      <?php if(checkRoles('bangLuong')) { ?>
      <li>
        <a href="public/bangLuong">
          <i class="zmdi zmdi-card"></i> <span>Bản Lương</span>
        </a>
      </li>
      <?php } ?>


      <?php if(checkRoles('doanhThu')) { ?>
      <li>
        <a href="public/doanhThu">
          <i class="zmdi zmdi-card-membership"></i> <span>Quản Lý Doanh Thu</span>
        </a>
      </li>
      <?php } ?>


      <?php if(checkRoles('account')) { ?>
      <li>
        <a href="public/account">
          <i class="zmdi zmdi-slideshare"></i> <span>Quản Lý Tài Khoản</span>
        </a>
      </li>
      <?php } ?>

      


      <li class="sidebar-header">LABELS</li>

    </ul>
   
</div>