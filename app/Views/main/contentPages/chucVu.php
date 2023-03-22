<?php 
//echo date('n'),"-",date('Y'); ?>
<div class="content">
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã chức vụ</th>
        <th>Tên chức vụ</th> 
        <th>Phụ cấp chức vụ</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $stt = 1;
        foreach($cv as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['iMaChucVu']?></td>
            <td><?php echo $row['vTenChucVu']?></td>
            <td><?php echo $row['fPCCV']?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
