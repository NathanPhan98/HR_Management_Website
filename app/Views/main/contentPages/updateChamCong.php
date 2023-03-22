<h4>Bảng chấm công tháng <?=$month?> năm <?=$year?></h4> 
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
        <th>Số ngày nghĩ</th>
      </tr>
    </thead>
    <tbody>
      <form action="public/chamCong/act_capNhatBangChamCong" method="post">
      <?php
      $stt = 1;
        foreach($employeesByPBID as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['vTenNhanVien']?></td>
            <td><input class="form-control" type="text" name="iSoNgayLam[]" value="<?php echo $row['iSoNgayLam']?>"></td>
            <td><input class="form-control" type="text" name="fSoGioTangCa1_5[]" value="<?php echo $row['fSoGioTangCa1_5']?>"></td>
            <td><input class="form-control" type="text" name="fSoGioTangCa2_0[]" value="<?php echo $row['fSoGioTangCa2_0']?>"></td>
            <td><input class="form-control" type="date" name="dThangNam[]" value="<?php echo $row['dThangNam']?>"></td>
            <td><input class="form-control" type="text" name="fSoNgayNghiKhongPhep[]" value="<?php echo $row['fSoNgayNghiKhongPhep']?>"></td>
            <td><input class="form-control" type="text" name="fSoNgayNghi[]" value="<?php echo $row['fSoNgayNghi']?>"></td>
          </tr>
          <input type="hidden" name="iMaNhanVien[]" value="<?php echo $row['iMaNhanVien']?>">
          <?php
        }
      ?>
          <div class="form-group">
            <button type="submit" class="btn btn-light btn-round px-5">Lưu</button>
            
          </div>
      </form>
    </tbody>
  </table>
</div>
