<?php 
//echo date('n'),"-",date('Y'); ?>
<div class="content">
<div class="form-group">
          <button type="submit" class="btn btn-light btn-round px-5" data-bs-toggle="modal" data-bs-target="#addPhongBan">Thêm Phòng Ban Mới</button>
      </div>
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã phòng ban</th>
        <th>Tên phòng ban</th> 
        <th>Địa chỉ</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $stt = 1;
        foreach($pb as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['iMaPhongBan']?></td>
            <td><?php echo $row['vTenPhongBan']?></td>
            <td><?php echo $row['vDiaChi']?></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>


<div class="modal fade" id="addPhongBan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: grey;">
    <form action="public/phongBan/addnewphongban" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Phòng Ban Mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">
            <div class="form-group">
                <label for="input-7">Nhập Tên Phòng Ban: </label>
                <input type="text" class="form-control form-control-rounded" name="vTenPhongBan" placeholder="Nhập Tên Phòng Ban">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập Tên Phòng Ban:</label>
                <input type="text" class="form-control form-control-rounded" name="vDiaChi" placeholder="Nhập Tên Phòng Ban">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Accept</button>
        </div>
      </form>
    </div>
  </div>
</div>