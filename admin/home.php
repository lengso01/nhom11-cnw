<?php require_once "base/header.php"; ?>
<?php require_once "class/admin.php"; ?>
<?php if (!isset($_SESSION['email'])) {
	 header('Location: index.php');
}
?>
<?php require_once "base/menu-main.php"; ?>

<div class="container">
	<div class="row">
<!-- RH: this is bootstrap 5 tabbed panel -->
<div class="col-md-9 m-auto">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item" role="presentation">
	    <a class="nav-link active border-0 font-weight-bold" id="home-user" data-bs-toggle="tab" href="#user" role="user" aria-controls="user" aria-selected="true">Quản lý người dùng</a>
	  </li>
	  <li class="nav-item" role="presentation">
	    <a class="nav-link border-0 font-weight-bold" id="post-tab" data-bs-toggle="tab" href="#post" role="tab" aria-controls="post" aria-selected="false">Bài viết</a>
	  </li>
	  <li class="nav-item" role="presentation">
	    <a class="nav-link border-0 font-weight-bold" id="messenger-tab" data-bs-toggle="tab" href="#messenger" role="tab" aria-controls="messenger" aria-selected="false">Tin nhắn</a>
	  </li>
	    <li class="nav-item" role="presentation">
	    <a class="nav-link border-0 font-weight-bold" id="sche-tab" data-bs-toggle="tab" href="#sche" role="tab" aria-controls="sche" aria-selected="false">Lịch hẹn</a>
	  </li>
	</ul>
	<div class="card-body bg-white">
		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
		  	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#userlogs">
			  Logs
			</button>
		  	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">id</th>
			      <th scope="col">Họ và tên</th>
			      <th scope="col">Ngày sinh</th>
			      <th scope="col">Địa chỉ</th>
			      <th scope="col">Email</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php $sql = "SELECT * FROM usertable" ;
					$query = mysqli_query($con,$sql);
					$num_rows = mysqli_num_rows($query);
					$i = 1;
					if ($num_rows>0) {
						while ($result = mysqli_fetch_assoc($query)) { ?>
					    <tr>	
					      <th scope="row"><?=$i++?></th>
					      <td><?=$result['name']?></td>
					      <td><?=$result['birthday']?></td>
					      <td><?=$result['address']?></td>
					      <td><?=$result['email']?></td>
					      <td>
					      	<a class="btn btn-primary border-0" data-bs-toggle="modal" data-bs-target="#edit<?=$result['u_id'] ?>">
							  <i class="fas fa-lock-open"></i>
							</a>
							<a href="#del<?=$result['u_id'] ?>" data-bs-toggle="modal" data-bs-target="#del<?=$result['u_id'] ?>" class="btn btn-danger border-0"><i class="far fa-trash-alt"></i></a>
							<?php require_once "modal/modifyUser.php" ?>
					      </td>
					    </tr>

					<?php	}
					}
		        ?>
	
			  </tbody>
			</table>
		  </div>
		  <div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post-tab">
		  	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col" style="width:5%">id</th>
			      <th scope="col" style="width:15%">Tác giả</th>
			      <th scope="col" style="width:40%">Nội dung</th>
			      <th scope="col" style="width:25%">Ngày viết</th>
			      <th scope="col" style="width:15%">Trạng thái</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		$sql = "SELECT * FROM post" ;
					$query = mysqli_query($con,$sql);
					$num_rows = mysqli_num_rows($query);
					$i = 1;
					if ($num_rows>0) {
						while ($result = mysqli_fetch_assoc($query)) { ?>
					    <tr>	
					      <th scope="row"><?=$i++?></th>
					      <td>

					      	<?php
					      	$u_id = $result['u_id']; 
					      	$sql2 = "SELECT * FROM usertable Where u_id = '$u_id'";
					      	$query2 = mysqli_query($con,$sql2);
							$num_rows2 = mysqli_num_rows($query2);
							if ($num_rows2>0){
								$result2 = mysqli_fetch_assoc($query2);
								if ($result2) {
									echo $result2['name']; 
								}
							}
					      	?>					      	

					      </td>
					      <td><?=$result['post_content']?></td>
					      <td><?=$result['post_date']?></td>
					      <td><?php
					      	if($result['status'] == 0){
					      		echo "Công khai";
					      		}elseif ($result['status'] == 1) {
					      			echo "Bạn bè";
					      		}else{
					      			echo "Một mình tôi";
					      		}
					      		?>
					      	
					      </td>
					    </tr>

					<?php	}
					}
		        ?>
	
			  </tbody>
			</table>
		  </div>
		  <div class="tab-pane fade" id="messenger" role="tabpanel" aria-labelledby="messenger-tab">
		  	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">id</th>
			      <th scope="col">Từ id</th>
			      <th scope="col">Đến id</th>
			      <th scope="col">Nội dung</th>
			      <th scope="col">Thời gian</th>
			      <th scope="col">Trạng thái</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php $sql = "SELECT * FROM chatting" ;
					$query = mysqli_query($con,$sql);
					$num_rows = mysqli_num_rows($query);
					$i = 1;
					if ($num_rows>0) {
						while ($result = mysqli_fetch_assoc($query)) { ?>
					    <tr>	
					      <th scope="row"><?=$i++?></th>
					      <td><?=$result['to_user_id']?></td>
					      <td><?=$result['from_user_id']?></td>
					      <td><?=$result['chat_message']?></td>
					      <td><?=$result['timestamp']?></td>
					      <td>
					      	<?php 
					      		if($result['status'] == 0){
					      		echo "Công khai";
					      		}elseif ($result['status'] == 1) {
					      			echo "Bạn bè";
					      		}else{
					      			echo "Một mình tôi";
					      		}
					      		?>
					      	?>
					      	

					      </td>

					    </tr>

					<?php	}
					}
		        ?>
	
			  </tbody>
			</table>
		  </div>
		  <div class="tab-pane fade" id="sche" role="tabpanel" aria-labelledby="sche-tab">
		  	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Người dùng</th>
			      <th scope="col">Nội dung lịch</th>
			      <th scope="col">Đặt ngày</th>
			      <th scope="col">Trạng thái</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php $sql = "SELECT * FROM schedule" ;
					$query = mysqli_query($con,$sql);
					$num_rows = mysqli_num_rows($query);
					$i = 1;
					if ($num_rows>0) {
						while ($result = mysqli_fetch_assoc($query)) { ?>
					    <tr>	
					      <th scope="row"><?=$i++?></th>
					      <td><?=$result['u_id']?></td>
					      <td><?=$result['sche_content']?></td>
					      <td><?=$result['sche_date']?></td>
					      <td>
					      	<?php 
					      		if($result['status'] == 0){
					      		echo "Quan trọng";
					      		}else{
					      			echo "Bình thường";
					      		}
					      		?>
					    
					      	
					      </td>
					    </tr>

					<?php	}
					}
		        ?>
	
			  </tbody>
			</table>
		  </div>

		</div>
	</div>
</div>
</div>
</div>
	<!-- Modal -->
	<div class="modal fade" id="userlogs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content border-0">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Logs người dùng</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <table class="table border-top-0">
	        	<thead >
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Người dùng</th>
				      <th scope="col">Hoạt động gần đây</th>
				      <th scope="col">Trạng thái</th>

				    </tr>
				  </thead>
			  <tbody>
			  	<?php $sql = "SELECT * FROM login_details" ;
					$query = mysqli_query($con,$sql);
					$num_rows = mysqli_num_rows($query);
					$i = 1;
					if ($num_rows>0) {
						while ($result = mysqli_fetch_assoc($query)) { ?>
					    <tr>	
					      <th scope="row"><?=$i++?></th>
					      <td><?=$result['user_id']?></td>
					      <td><?=$result['last_activity']?></td>
					      <td><?=$result['is_type']?></td>
					    </tr>

					<?php	}
					}
		        ?>
	
			  </tbody>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Xác nhận</button>
	      </div>
	    </div>
	  </div>
	</div>
<?php require_once "base/footer.php"; ?>


