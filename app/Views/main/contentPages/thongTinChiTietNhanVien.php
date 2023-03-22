<div class="tab-pane active" id="profile">
                    <h5 class="mb-3">Thông tin nhân viên</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p style="font-size: large;">
                                <Span>Tên nhân viên: </Span>  <?php echo $employees['vTenNhanVien'] ?> <br> <hr>
                                <Span>Ngày sinh: </Span><?php echo $employees['dNgaySinh'] ?><br>
                                <Span>Giới tínhtính: </Span><?php echo $employees['vGioiTinh'] ?><br>
                                <Span>Số điện thoại: </Span><?php echo $employees['iSoDienThoai'] ?><br>
                                <Span>CCCD: </Span><?php echo $employees['iCCCD'] ?><br>
                                <Span>Ngày cấp: </Span><?php echo $employees['dNgayCap'] ?><br>
                                <Span>Nơi cấp: </Span><?php echo $employees['vNoiCap'] ?><br>
                                <Span>Mã bảo hiểm: </Span><?php echo $employees['iMaBaoHiem'] ?><br>
                                <Span>Tình trạng hôn nhân: </Span><?php echo $employees['vTinhTrangHonNhan'] ?><br>
                                <Span>Trình độ học vấn: </Span><?php echo $employees['vTrinhDoHocVan'] ?><br>
                                <Span>Trình độ chuyên môn: </Span><?php echo $employees['vTrinhDoChuyenMon'] ?> <br><hr>
                            </p>
                           
                        </div>
                        
                        <div class="col-md-6">
                        <h5>Quá trình điều chỉnh lương </h5>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Mã đổi lương</th>
                                <th>Mã nhân viên</th> 
                                <th>Tên nhân viên</th> 
                                <th>Lương cơ bản</th>
                                <th>Ngày hiệu lực</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                              $stt = 1;
                                foreach($lcbNV as $row) {?>
                                  <tr style="background-color: <?php if($row['iTrangThai']==1) echo "green" ?>;">
                                    <td><?php echo $stt++?></td>
                                    <td><?php echo $row['iMaDoiLuong']?></td>
                                    <td><?php echo $row['iMaNhanVien']?></td>
                                    <td><?php echo $row['vTenNhanVien']?></td>
                                    <td><?php echo $row['fSoTienLuong']?></td>
                                    <td><?php echo $row['dNgayHieuLuc']?></td>
                                    <td><?php echo $row['iTrangThai']?></td>
                                  </tr>
                                  <?php
                                }
                            ?>
                            </tbody>
                        </table>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span>Quá trình công tác của nhân viên</h5>
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
                                    foreach($pcNV as $row) {?>
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
                    </div>
                    <!--/row-->
                </div>