<div class="content">
<div class="form-group">
          <button type="submit" class="btn btn-light btn-round px-5" data-bs-toggle="modal" data-bs-target="#addAccount">Thêm Tài Khoản Mới</button>
      </div>
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Quyền</th>
        <th>ID Nhân Viên</th>
        <th>Trạng thái</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($accounts as $row) {?>
          <tr>
            <td><?php echo $row['iID']?></td>
            <td><?php echo $row['vUsername']?></td>
            <td><?php echo $row['vPassword']?></td>
            <td><?php echo $row['VQuyen']?></td>
            <td><?php echo $row['iMaNhanVien']?></td>
            <td><?php echo $row['iStatus']?></td>
            <td><a class="btn btn-light btn-round px-5" href="<?php base_url() ?>public/account/delete/<?php echo $row['iID'] ?>">Delete</a></td>
              </tr>
              <?php
            }
          ?>
      
    </tbody>
  </table>
  
</div>

<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: grey;">
    <form action="public/account/addnewaccount" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Phân Công Mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">
            <div class="form-group">
                <label for="input-7">Nhập tài khoản: </label>
                <input type="text" class="form-control form-control-rounded" name="vUsername" placeholder="Nhập tài khoản">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập mật khẩu: </label>
                <input type="text" class="form-control form-control-rounded" name="vPassword" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập quyền: </label>
                <input type="text" class="form-control form-control-rounded" name="VQuyen"  placeholder="Nhập quyền">
            </div>
            <div class="form-group">
                <label for="input-8">Nhập mã nhân viên: </label>
                <select class="form-control form-control-rounded" name="iMaNhanVien">
                  <?php foreach($NVCoPC as $row){ ?>
                  <option value="<?php echo $row['iMaNhanVien'] ?>"><?php echo $row['iMaNhanVien'] ?></option>
                  <?php } ?>
                </select>
                <!-- <input type="text" class="form-control form-control-rounded" name="iMaNhanVien" placeholder="Nhập mã nhân viên"> -->
            </div>
            <div class="form-group">
                <label for="input-8">Nhập trạng thái:</label>
                <input type="text" class="form-control form-control-rounded" name="iStatus"  value="1">
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