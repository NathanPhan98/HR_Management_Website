<?php 


//echo date('n'),"-",date('Y'); ?>
<a style="margin:10px 0px 25px 0px" class="btn btn-light btn-round px-5" href="public/doanhThu/addDoanhThu">Lập bảng doanh thu</a>
<h6>Bảng lương của phòng kinh doanh vào tháng <?=$month?> năm <?=$year?>.</h6>
<div class="content">
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã doanh thu</th>
        <th>Mã nhân viên</th> 
        <th>Số tiền</th>
        <th>Tháng</th>
        <th>Năm</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $stt = 1;
        foreach($doanhThu as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['iMaDoanhThu']?></td>
            <td><?php echo $row['iMaNhanVien']?></td>
            <td><?php echo $row['fSoTien']?></td>
            <td><?php echo $row['iThang']?></td>
            <td><?php echo $row['iNam']?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
