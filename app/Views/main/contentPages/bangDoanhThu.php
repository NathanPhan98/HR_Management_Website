<?php echo "Tháng đang chọn thử : "; 
echo $month; 
//echo date('n'),"-",date('Y'); ?>
<div class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Stt</th>
        <th>Mã nhân viên</th> 
        <th>Tên nhân Viên</th> 
        <th>Số tiền</th>
        <th>Tháng</th>
        <th>Năm</th>
      </tr>
    </thead>
    <tbody>
      <form action="public/doanhThu/act_addDoanhThu" method="post">
      <?php
          $stt = 1;
            foreach($employeesKD as $row) {?>
              <tr>
                <td><?php echo $stt++?></td>
                <td><input readonly class="form-control" type="text" name="iMaNhanVien[]" value="<?php echo $row['iMaNhanVien']?>"></td>
                <td><?php echo $row['vTenNhanVien']?></td>
                <td><input  class="form-control" type="number" min="0" name="fSoTien[]" value="0"></td>
                <td><input readonly class="form-control" type="text" name="iThang[]" value="<?=$month ?>"></td>
                <td><input readonly class="form-control" type="text" name="iNam[]" value="<?=$year ?>"></td>
              </tr>
              <?php
            }
          ?>
          <div class="form-group">
          <?php ?>
            <button type="submit" class="btn btn-light btn-round px-5">Xác nhận</button>
          <?php ?>
          </div>
      </form>
    </tbody>
    
  </table>
  <h4 style="text-align: center;margin-top:20%;color:orange;"><?=$flag ?></h4>
</div>

<!-- echo "<td><button href='".base_url()."/admin/user/add/".$user['user_id']."'><img src='".base_url()."/assets/admin/img/edit.png' width='20' title='Edit'></button> -->