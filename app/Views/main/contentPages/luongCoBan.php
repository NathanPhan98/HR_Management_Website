<div class="content">
<a style="margin-bottom: 20px;" href="public/luongCoBan?status=1" class="btn btn-light btn-round px-5">Lọc lương hiệu lực</a>
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
        foreach($lcb as $row) {?>
          <tr style="background-color: <?php if($row['iTrangThai']!=1) echo "brown" ?>;">
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
