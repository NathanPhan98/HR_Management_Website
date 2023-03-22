
<div class="content" style="overflow-x:scroll;">
<!-- <a class="btn btn-light btn-round px-5" href="public/bangLuong/tinhToanLuong">Lập bảng lương</a> -->

  <table class="table">
    
  <thead>
      <tr>
        <th>Stt</th>
        <th></th> 
        <th>P Cấp</th> 
        <th></th> 
        <th></th> 
        <th></th>
        <th></th> 
        <th></th> 
        <th>L NC</th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th>L TC</th> 
        <th></th> 
        <th></th> 
        <th>Bảo Hiểm</th> 
        <th></th> 
        <th></th> 
        <th></th> 
      </tr>
    </thead>
    <thead>
      <tr>
        <th>Stt</th>
        <th>Nhân viên</th> 
        <th>Ngày tháng Năm</th>
        <th>Phụ cấp chức vụ</th> 
        <th>Nặng nhọc đọc hại</th> 
        <th>Phụ cấp Nhà ở</th> 
        <th>Phụ cấp Xăng xe</th>
        <th>Tổng Phụ cấp</th> 
        <th>Thưởng doanh thu</th> 
        <th>Lương cơ bản</th> 
        <th>Ngày công chuẩn</th> 
        <th>Ngày Công</th> 
        <th>Nghỉ Có phép</th> 
        <th>Nghỉ Không phép</th> 
        <th>Lương Ngày công</th> 
        <th>Số giờ Tăng ca 1.5</th> 
        <th>Số giờ Tăng ca 2.0</th> 
        <th>Lương tăng ca</th> 
        <th>Bảo hiểm Xã Hội</th> 
        <th>Bảo hiểm Y Tế</th> 
        <th>Bảo hiểm Thất Nghiệp</th> 
        <th>Tổng Bảo hiểm</th> 
        <th>===Thực Lãnh===</th> 
      </tr>
    </thead>
    <tbody>
      <form action="public/bangluong/act_lapBanLuongChoPhongBan" method="post">
      <?php
      $stt = 1;
        foreach($dtNVNhanCanTinhLuong as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><input readonly class="form-control" type="text" name="iMaNhanVien[]" value="<?php echo $row['iMaNhanVien']?>"></td>
            <td><input readonly class="form-control" type="text" name="dThangNam[]" value="<?php echo $row['dThangNam']?>"></td>
            <td><input readonly class="form-control" type="text" name="fPCCV[]" value="<?php echo $row['fPCCV']?>"></td>
            <td><input readonly class="form-control" type="text" name="fNangNhocDocHai[]" value="<?php echo $row['fNangNhocDocHai']?>"></td>
            <td><input readonly class="form-control" type="text" name="fNhaO[]" value="<?php echo $row['fNhaO']?>"></td>
            <td><input readonly class="form-control" type="text" name="fXangXe[]" value="<?php echo $row['fXangXe']?>"></td>
            <td><input readonly class="form-control" type="text" name="fTongPhuCap[]" value="<?php echo $row['fTongPhuCap']?>"></td>
            <td><input readonly class="form-control" type="text" name="fThuongDoanhThu[]" value="<?php echo $row['fThuongDoanhThu']?>"></td>
            <td><input readonly class="form-control" type="text" name="fLuongCoBan[]" value="<?php echo $row['fLuongCoBan']?>"></td>
            <td><input readonly class="form-control" type="text" name="iNgayCongChuan[]" value="<?php echo $row['iNgayCongChuan']?>"></td>
            <td><input readonly class="form-control" type="text" name="fNgayCong[]" value="<?php echo $row['fNgayCong']?>"></td>
            <td><input readonly class="form-control" type="text" name="fNghiCoPhep[]" value="<?php echo $row['fNghiCoPhep']?>"></td>
            <td><input readonly class="form-control" type="text" name="fNghiKhongPhep[]" value="<?php echo $row['fNghiKhongPhep']?>"></td>
            <td><input readonly class="form-control" type="text" name="fLuongNgayCong[]" value="<?php echo $row['fLuongNgayCong']?>"></td>
            <td><input readonly class="form-control" type="text" name="fTangCa1_5[]" value="<?php echo $row['fTangCa1_5']?>"></td>
            <td><input readonly class="form-control" type="text" name="fTangCa2_0[]" value="<?php echo $row['fTangCa2_0']?>"></td>
            <td><input readonly class="form-control" type="text" name="fLuongTangCa[]" value="<?php echo $row['fLuongTangCa']?>"></td>
            <td><input readonly class="form-control" type="text" name="fBHXH[]" value="<?php echo $row['fBHXH']?>"></td>
            <td><input readonly class="form-control" type="text" name="fBHYT[]" value="<?php echo $row['fBHYT']?>"></td>
            <td><input readonly class="form-control" type="text" name="fBHTN[]" value="<?php echo $row['fBHTN']?>"></td>
            <td><input readonly class="form-control" type="text" name="fTongTienBaoHiem[]" value="<?php echo $row['fTongTienBaoHiem']?>"></td>
            <td><input readonly class="form-control" type="text" name="fThucLanh[]" value="<?php echo $row['fThucLanh']?>"></td>
          </tr>
          <input type="hidden" name="iMaPhongBan" value="<?=$phongban ?>">
          <?php
        } 
        // $thisMonth = date('n');
        // $thisYear = date('n');
        ?>
          <div class="form-group">
            <a class="btn btn-light btn-round px-5" href="public/bangLuong">Trở về</a> 
            <?php 
              if(checkActive($phongban,$month,$year)==3){ ?>
            <button type="submit" class="btn btn-light btn-round px-5">Lập bản lương cho phòng <?=$phongban ?> </button>
            <?php } ?>
            
          </div>
          <h6>Bảng lương của phòng ban số <?=$phongban?> vào tháng <?=$month?> năm <?=$year?>.</h6>
      </form>
    </tbody>
  </table>
</div>
<br>
<?php if(isset($flag)){ ?>
<h6 style="text-align: center;margin-top:20px"><?=$flag?></h6>
<?php } ?>


<!-- Modal -->
<div class="modal fade" id="xemBangLuong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: grey;">
    <form action="public/bangLuong" method="get">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">
            <div class="form-group">
                <label for="input-7">Nhập tháng</label>
                <input type="text" class="form-control form-control-rounded" name="month" placeholder="Enter month">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập năm</label>
                <input type="text" class="form-control form-control-rounded" name="year" value="<?=$year?>" placeholder="Enter Year">
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