<?php 
//echo date('n'),"-",date('Y'); ?>
<div class="content">
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã quá trình</th>
        <th>Mã nhân viên</th> 
        <th>Tháng</th>
        <th>Năm</th>
        <th>Bảo hiểm xã hội</th> 
        <th>Bảo hiểm y tế</th>
        <th>Bảo hiểm thất nghiệp</th>
        <th>Tổng tiền</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $stt = 1;
        foreach($bh as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['iMaQuaTrinh']?></td>
            <td><?php echo $row['iMaNhanVien']?></td>
            <td><?php echo $row['iThang']?></td>
            <td><?php echo $row['iNam']?></td>
            <td><?php echo $row['fBHXH']?></td>
            <td><?php echo $row['fBHYT']?></td>
            <td><?php echo $row['fBHTN']?></td>
            <td><?php echo $row['fTongTien']?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
