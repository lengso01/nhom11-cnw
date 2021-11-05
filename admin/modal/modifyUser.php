<!-- Modal Cập nhật -->
<div class="modal fade" id="edit<?=$result['u_id'] ?>" tabindex="-1" aria-labelledby="modal-user" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0">
      <div class="modal-header">
        <h2 class="modal-title h6 font-weight-bold" id="modal-user">Cập nhật thông tin "<?=$result['name'] ?>"</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      		<?php 
      		$get_id = $result['u_id'];
      		$sql = "SELECT * FROM usertable WHERE u_id ='$get_id' " ;
			$query = mysqli_query($con,$sql);
			$erow=mysqli_fetch_array($query);
			?>
      		<form method="POST" action="execute.php?id=<?=$result['u_id']?>">
	            <div class="mb-3 row align-items-center">
	              <div class="col-sm-3">
	              <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="" class="rounded-circle shadow-sm" style="width:72px; height: 72px;">
	              </div>
	              <div class="col-sm-9">
	                <div class="mt-2"><b><?=$erow['name'] ?></b></div>
	              </div>
	            </div>
	            <div class="mb-3 row">
	              <label for="name" class="col-sm-3 col-form-label">Họ và tên</label>
	              <div class="col-sm-9">
	                <input type="text" class="form-control" id="name" aria-describedby="nameVal" name="name" placeholder="<?=$erow['name'] ?>" required>
	                <div id="nameVal" class="form-text">
	                  Lấy tên bạn thường sử dụng để tìm tài khoản của bạn dễ dàng hơn. Nó có thể là tên đầy đủ, biệt hiệu hoặc tên doanh nghiệp của bạn
	                </div>
	              </div>
	            </div>
	            <div class="mb-3 row">
	              <label for="sex" class="col-sm-3 col-form-label">Giới tính</label>
	              <div class="col-sm-9">
	                <select class="form-select" aria-label="Default select example" id="sex" name="sex">
	                  <option value="1" selected>Nam</option>
	                  <option value="2">Nữ</option>
	                  <option value="0">Không muốn tiết lộ</option>
	                </select>
	              </div>
	            </div>
	            <div class="mb-3 row">
	              <label for="birthday" class="col-sm-3 col-form-label">Ngày sinh</label>
	              <div class="col-sm-9">
	                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="<?=$erow['birthday'] ?>">
	              </div>
	            </div>
	            <div class="mb-3 row">
	              <label for="job" class="col-sm-3 col-form-label">Nghề nghiệp</label>
	              <div class="col-sm-9">
	                <input type="text" class="form-control" id="job" aria-describedby="nameVal" name="job" placeholder="<?=$erow['job'] ?>" required>
	              </div>
	            </div>
	            <div class="mb-3 row">
	              <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
	              <div class="col-sm-9">
	                <input type="text" class="form-control" id="address" aria-describedby="nameVal" name="address" placeholder="<?=$erow['address'] ?>" required>
	              </div>
	            </div>
	            <div class="mb-3 row">
	              <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
	              <div class="col-sm-9">
	                <input type="text" class="form-control" id="phone" aria-describedby="nameVal" name="phone" placeholder="<?=$erow['phone'] ?>" required>
	              </div>
	            </div>
		      <div class="modal-footer">
		          <button type="submit" class="btn btn-primary" name="update">Xác nhận</button>
		      </div>
  	     	</form>
  	    </div>
    </div>
  </div>
</div>

<!-- Modal Xóa -->
<div class="modal fade" id="del<?=$result['u_id'] ?>" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content border-0">
      <div class="modal-header">
        <h2 class="modal-title h6 font-weight-bold" id="modal-delete">Xóa người dùng "<?=$result['name'] ?>"</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      		<?php 
      		$get_id = $result['u_id'];
      		$sql = "SELECT * FROM usertable WHERE u_id ='$get_id' " ;
			$query = mysqli_query($con,$sql);
			$erow=mysqli_fetch_array($query);
			?>
			<h2 class="h6">Bạn có thực sự muốn xóa người dùng "<?=$erow['name']?>"" </h2>

  	    </div>
  	    <div class="modal-footer">
            <a href="execute.php?delid=<?=$result['u_id'] ?>" class="btn btn-danger">Xác nhận</a>
        </div>
    </div>
  </div>
</div>