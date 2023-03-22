<h4>Danh mục các phòng ban:</h4>
  <?php 
  //if(checkActive()){ ?>
  <!-- <a class="btn btn-light btn-round px-5" href="public/bangLuong/tinhToanLuong">Lập bảng lương</a> -->
  
  <?php 
 foreach($dsPhongBan as $pb){
  if(checkActive($pb['iMaPhongBan'],$month,$year)==3)
  $stt = "border: 2px solid green;";
  else if(checkActive($pb['iMaPhongBan'],$month,$year)==2)
  $stt = "border: 2px solid brown;";
  else
  $stt = "border: 2px solid blue;";
  ?>
  <a style="margin: 5px;<?php echo $stt ?>" class="btn btn-light btn-round px-5" href="public/bangLuong/lapbanluong?phongban=<?php echo $pb['iMaPhongBan'] ?>">Bộ phận <?php echo $pb['vTenPhongBan'] ?></a>
  <?php } ?>
  <br>
  <span style=" font-style: italic;">(Ghi chú: màu xanh lá cây = sẵn sàng để tính lương; màu xanh dương = đã tính lương xong; màu đỏ = chưa thể tính lương)</span>
  <hr>
  

<div class="content" style="overflow-x:scroll;">
  <table id="example" class="display" style="width:250%">
  <!-- <thead>
      <tr>
        <th>Stt</th>
        <th></th> 
        <th></th> 
        <th>P Cấp</th> 
        <th></th> 
        <th></th> 
        <th></th>
        <th></th> 
        <th>L NC</th> 
        <th></th> 
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
        <th></th> 
      </tr>
    </thead> -->
    <thead>
      <tr>
      <th>STT</th>
        <th>Mã lương</th> 
        <th>Nhân viên</th> 
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
        <th>BH Xã Hội</th> 
        <th>BH Y Tế</th> 
        <th>BH Thất Nghiệp</th> 
        <th>Tổng Bảo hiểm</th> 
        <th>Thực Lãnh</th> 
      </tr>
    </thead>
    <tbody>
      <form action="public/chamCong/" method="post">
      <?php
      $stt = 1;
        foreach($dsNV as $row) {?>
          <tr>
            <td><?php echo $stt++?></td>
            <td><?php echo $row['iMaLuong']?></td>
            <td><?php echo $row['iMaNhanVien']?></td>
            <td><?php echo $row['fPCCV']?></td>
            <td><?php echo $row['fNangNhocDocHai']?></td>
            <td><?php echo $row['fNhaO']?></td>
            <td><?php echo $row['fXangXe']?></td>
            <td><?php echo $row['fTongPhuCap']?></td>
            <td><?php echo $row['fThuongDoanhThu']?></td>
            <td><?php echo $row['fLuongCoBan']?></td>
            <td><?php echo $row['iNgayCongChuan']?></td>
            <td><?php echo $row['fNgayCong']?></td>
            <td><?php echo $row['fNghiCoPhep']?></td>
            <td><?php echo $row['fNghiKhongPhep']?></td>
            <td><?php echo $row['fLuongNgayCong']?></td>
            <td><?php echo $row['fTangCa1_5']?></td>
            <td><?php echo $row['fTangCa2_0']?></td>
            <td><?php echo $row['fLuongTangCa']?></td>
            <td><?php echo $row['fBHXH']?></td>
            <td><?php echo $row['fBHYT']?></td>
            <td><?php echo $row['fBHTN']?></td>
            <td><?php echo $row['fTongTienBaoHiem']?></td>
            <td><?php echo $row['fThucLanh']?></td>
          </tr>
          <?php 
        }
      ?>
      </form>
      <div class="form-group">
            <button type="submit" class="btn btn-light btn-round px-5" data-bs-toggle="modal" data-bs-target="#xemBangLuong">Xem bảng lương theo tháng</button>
            <a href="public/bangLuong/print" class="btn btn-primary" >Print</a>
      </div>
     
      <h4>Bảng lương của tháng <?=$month?> năm <?=$year?></h4>
    </tbody>
  </table >
</div>


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
                <input type="text" class="form-control form-control-rounded" name="year" value="2023" placeholder="Enter Year">
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