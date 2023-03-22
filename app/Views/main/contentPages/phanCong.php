<div class="content">
      <div class="form-group">
          <button type="submit" class="btn btn-light btn-round px-5" data-bs-toggle="modal" data-bs-target="#themPhanCong">Thêm Phân Công Mới</button>
      </div>
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID Phân công</th>
        <th>ID Nhân Viên</th>
        <th>Ngày Phân Công</th>
        <th>Mã Chức Vụ</th>
        <th>Mã Phòng Ban</th>
        <th>Trạng thái</th>
        <th>Mã phụ cấp</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($Assignments as $row) {?>
          <tr style="background-color: <?php if($row['iTrangThai']==1) echo "#32CD32;color:black" ?>;">
            <td><?php echo $row['iMaPhanCong']?></td>
            <td><?php echo $row['iMaNhanVien']?></td>
            <td><?php echo $row['dNgayPhanCong']?></td>
            <td><?php echo $row['iMaChucVu']?></td>
            <td><?php echo $row['iMaPhongBan']?></td>
            <td><?php echo $row['iTrangThai']?></td>
            <td><?php echo $row['iMaPhuCap']?></td>
          </tr>
          <?php
        }
      ?>
      
    </tbody>
  </table>
  
</div>

<!-- Modal -->
<div class="modal fade" id="themPhanCong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: grey;">
    <form action="public/phanCong/createAssignment" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Phân Công Mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">
            <div class="form-group">
                <label for="input-7">Nhập mã nhân viên: </label>
                <input type="text" class="form-control form-control-rounded" name="iMaNhanVien" placeholder="Nhập mã nhân viên">
            </div>
            <div class="form-group">
                <label for="input-8">Ngày phân công: </label>
                <input type="text" class="form-control form-control-rounded" name="dNgayPhanCong" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập mã chức vụ:</label>
                
                <select name="iMaChucVu" class="form-control form-control-rounded">
                  <option class="form-control form-control-rounded" value="3">Nhân viên</option>
                  <option class="form-control form-control-rounded" value="1">Giám đốc</option>
                  <option class="form-control form-control-rounded" value="2">Trưởng phòng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="input-8">Nhập mã phòng ban: </label>
                <input type="text" class="form-control form-control-rounded" name="iMaPhongBan"  placeholder="Nhập mã phòng ban">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập mã phục cấp: </label>
                <input type="text" class="form-control form-control-rounded" name="iMaPhuCap" placeholder="Nhập mã phục cấp">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập ghi chú( Không bắt buộc):</label>
                <input type="text" class="form-control form-control-rounded" name="vGhiChu"  placeholder="Nhập ghi chú">
            </div>
            <input type="hidden"  name="iTrangThai" value="1">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Accept</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
$date1 = "2021-10-05";
$date2 = "2021-11-06";
$timestamp1 = strtotime($date1);
$timestamp2 = strtotime($date2);
$difference = $timestamp2 - $timestamp1;
$rs = $difference/86400;
echo "The time difference is $rs day";
?>