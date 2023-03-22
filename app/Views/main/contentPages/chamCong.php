<h4>Bảng chấm công của phòng <?=$tenPhongBan ?> tháng <?=$month?> năm <?=$year?></h4> 
<?php //echo date('n'),"-",date('Y'); ?>
<div class="content">
  <table class="table">
    <thead>
      <tr>
        <th>Stt</th>
        <th>Nhân Viên</th> 
        <th>Số ngày làm</th>
        <th>Số giờ tăng ca 1.5</th>
        <th>Số giờ tăng ca 2.0</th>
        <th>Tháng năm(y-m-d)</th>
        <th>Số ngày nghĩ không phép</th>
        <th>Số ngày nghĩ có phép</th>
      </tr>
    </thead>
    <tbody>
      <form action="public/chamCong/act_lapBangChamCong" method="post">
      <?php
      $stt = 1;
        foreach($employees as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['vTenNhanVien']?></td>
            <td><input class="form-control" type="number" min="0" max="<?=$ngayCongChuan?>" name="iSoNgayLam[]" value="<?=$ngayCongChuan?>"></td>
            <td><input class="form-control" type="number" min="0" name="fSoGioTangCa1_5[]" value="0" ></td>
            <td><input class="form-control" type="number" min="0" name="fSoGioTangCa2_0[]" value="0"></td>
            <td><input class="form-control" readonly type="text" name="dThangNam[]" value="<?=$currentDate ?>"></td>
            <td><input class="form-control" type="number" min="0" max="<?=$ngayCongChuan?>" name="fSoNgayNghiKhongPhep[]" value="0"></td>
            <td><input class="form-control" type="number" min="0" max="<?=$ngayCongChuan?>" name="fSoNgayNghi[]" value="0" ></td>
            <input class="form-control" type="hidden" name="iMaNhanVien[]" value="<?php echo $row['iMaNhanVien']?>">
          </tr>
          <?php
        }
      ?>
          
          <div class="form-group">
          <?php if($employees){ ?>
            <button type="submit" class="btn btn-light btn-round px-5">Xác nhận</button>
          <?php } ?>
          </div>
      </form>
    </tbody>
    
  </table>
  <h4 style="text-align: center;margin-top:20%;color:orange;"><?=$flag ?></h4>
</div>

<!-- echo "<td><button href='".base_url()."/admin/user/add/".$user['user_id']."'><img src='".base_url()."/assets/admin/img/edit.png' width='20' title='Edit'></button> -->