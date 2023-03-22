<?php 
//echo date('n'),"-",date('Y'); ?>
<div class="content">
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã phụ cấp</th>
        <th>Nặng nhọc độc hại</th> 
        <th>Phụ cấp nhà ở</th> 
        <th>phụ cấp xăng xe</th>
        <th>Ghi Chú</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $stt = 1;
        foreach($pc as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['iMaPhuCap']?></td>
            <td><?php echo $row['fNangNhocDocHai']?></td>
            <td><?php echo $row['fNhaO']?></td>
            <td><?php echo $row['fXangXe']?></td>
            <td><?php echo $row['vGhiChu']?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
