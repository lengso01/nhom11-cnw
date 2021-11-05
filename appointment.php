<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<?php require_once "base/header.php";
        require_once "base/menu-main.php";

 ?>
<main>
<div class="container">
    <div class="row">
        <div class="card p-0">
            <div class="card-body">
                <div class="row">
                <div class="col-xl-6">
                    <h4 class="header-title mb-3"><i class="far fa-sticky-note"></i> Tạo lời nhắc</h4>
                    <div class="addapp" style="background: white;">
                        <form action="controllerSche.php?id=<?=$fetch_info['u_id']?>" method="POST">
                        <div class="mb-3">
                            <label for="sche_content">Nội dung:</label>
                            <textarea type="text" class="form-control" name="sche_content" id="sche_content" placeholder="Nội dung..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputAddresss">Địa điểm:</label>
                            <input type="text" class="form-control" id="inputAddress" name="sche_address" placeholder="Địa chỉ">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                            <div class="form-group col-md-6">
                            <label for="inputDate">Ngày</label>
                            <input type="date" class="form-control" name="sche_date" id="inputDate" placeholder="">
                            </div>
                            <div class="form-group col-md-2">Thời gian:</div>
                            <div class="form-group col-md-2">
                            <label for="inputTimestart">Bắt đầu</label>
                            <input type="time" class="form-control" id="inputTimestart" name="sche_time_start">
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputTimeend">Kết thúc</label>
                            <input type="time" class="form-control" name="sche_time_end" id="inputTimesEnd" >

                            </div>
                            </div>
                        </div>
                     <div class="status mb-3">
                                <select class="form-select" aria-label="Default select example" id="status" name="status">
                                  <option value="0" selected>Quan trọng</option>
                                  <option value="1">Bình thường</option>
                                </select>
                              </div>
                        <div class="mb-3">
                            <button type="botton" class="btn btn-primary" name="confirm">Xác nhận</button>
                        </div>
                        </form>
                                                
                    </div> <!-- end card-->
                </div>  
                <div class="col-xl-6">
                        <h4 class="header-title mb-3">Lịch hẹn</h4>
                        <div class="list-group">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                 <?php $queryP = "
                                    SELECT * FROM schedule ORDER BY id DESC
                                 ";
                                 $statement = $connect->prepare($queryP);
                                 $statement->execute();
                                 $resultP = $statement->fetchAll();
                                 if ($resultP) {
                                    foreach($resultP as $row)
                                     { ?>
                                <div class="w-100">
                                    <h5 class="mb-1 mt-0"><?=$row['sche_content']?></h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><?=$row['sche_address']?></li>
                                        <li class="list-inline-item"><?=$row['sche_date']?></li>
                                    </ul>
                                </div>
                            <?php } } ?>
                            </div>
                    
                    </div>
                </div>
                </div>
            </div>
    </div>
</div>
    </div>
</div> <!-- end col-->
</div>  
    </main>
<?php require_once "base/footer.php"; ?>
