<div style="padding-bottom:1% ;">
<a href="public/nhanVien/add" class="btn btn-light btn-round px-5" >+Thêm mới</a> 
<a href="public/nhanVien/print" class="btn btn-primary" >Print</a>
</div>

<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>STT</th>
      <th>Mã nhân viên</th>
      <th>Tên nhân viên</th>
      <th>Ngày sinh</th>
      <th>Giới tính</th>
      <th>Mã bảo hiểm</th>
      <th>Trình độ học vấn</th>
      <th>Xem chi tiết</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt =1;
      foreach($employees as $row) {?>
        <tr>
          <td><?php echo $stt++ ?></td>
          <td><?php echo $row['iMaNhanVien']?></td>
          <td><?php echo $row['vTenNhanVien']?></td>
          <td><?php echo $row['dNgaySinh']?></td>
          <td><?php echo $row['vGioiTinh']?></td>
          <td><?php echo $row['iMaBaoHiem']?></td>
          <td><?php echo $row['vTrinhDoHocVan']?></td>
          <td><a href="public/nhanVien/chitietnhanvien?id=<?php echo $row['iMaNhanVien']?>" class="btn btn-primary" >Xem Chi Tiết</a></td>
          <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detail<?php echo $row['iMaNhanVien'] ?>'>Edit</button></td>

          <div class="modal fade" id="detail<?php echo $row['iMaNhanVien'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" >
              <div class="modal-content" style="background-color:#444444;">
                <div class="modal-body" style="color:black">
                  <div class="card">
                      <div class="card-body">
                      <div class="card-title">Nhân viên có mã số: <?php echo $row['iMaNhanVien'] ?></div>
                      <hr>
                        <form action="public/nhanVien/act_update" method="post">
                          <div style="display:flex">
                        <div class="col-lg-6"> 
                      <div class="form-group">
                        <label for="input-7">Tên nhân viên</label>
                        <input type="text" class="form-control form-control-rounded" name="vTenNhanVien" value="<?php echo $row['vTenNhanVien'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-8">Ngày sinh</label>
                        <input type="date" class="form-control form-control-rounded" name="dNgaySinh" value="<?php echo $row['dNgaySinh'] ?>">
                      </div>
                      <div class="form-group">
                          <label for="input-9">Giới tính</label>
                          <input type="text" class="form-control form-control-rounded" name="vGioiTinh" value="<?php echo $row['vGioiTinh'] ?>">
                        </div>
                      <div class="form-group">
                        <label for="input-8">Căn cước công dân</label>
                        <input type="text" class="form-control form-control-rounded" name="iCCCD" value="<?php echo $row['iCCCD'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-8">Ngày cấp</label>
                        <input type="date" class="form-control form-control-rounded" name="dNgayCap" value="<?php echo $row['dNgayCap'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-8">Nơi cấp</label>
                        <input type="text" class="form-control form-control-rounded" name="vNoiCap" value="<?php echo $row['vNoiCap'] ?>">
                      </div>
                      </div>
                      <!-- sss -->
                      <div class="col-lg-6"> 
                      <div class="form-group">
                        <label for="input-10">Số điện thoại</label>
                        <input type="text" class="form-control form-control-rounded" name="iSoDienThoai" value="<?php echo $row['iSoDienThoai'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-6">Mã bảo hiểm</label>
                        <input type="text" class="form-control form-control-rounded" name="iMaBaoHiem" value="<?php echo $row['iMaBaoHiem'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-9">Tình trạng hôn nhân</label>
                        <input type="text" class="form-control form-control-rounded" name="vTinhTrangHonNhan" value="<?php echo $row['vTinhTrangHonNhan'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-10">Trình độ học vấn</label>
                        <input type="text" class="form-control form-control-rounded" name="vTrinhDoHocVan" value="<?php echo $row['vTrinhDoHocVan'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-8">Trình độ chuyên môn</label>
                        <input type="text" class="form-control form-control-rounded" name="vTrinhDoChuyenMon" value="<?php echo $row['vTrinhDoChuyenMon'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="input-8">Ghi chú</label>
                        <input type="text" class="form-control form-control-rounded" name="vGhiChu" value="<?php echo $row['vGhiChu'] ?>">
                      </div>
                      <input type="hidden" name="iMaNhanVien" value="<?php echo $row['iMaNhanVien'] ?>">
                      </div>
                      </div>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
            </tr>
            <?php
          }
        ?>
    
  </tbody>
</table>

<!-- echo "<td><button href='".base_url()."/admin/user/add/".$user['user_id']."'><img src='".base_url()."/assets/admin/img/edit.png' width='20' title='Edit'></button> -->