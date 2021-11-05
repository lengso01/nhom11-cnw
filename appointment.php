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
                        <form>
                        <div class="mb-3">
                            <label for="inputMain">Tiêu đề:</label>
                            <input type="text" class="form-control" id="inputMain" placeholder="Import content...">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddresss">Địa điểm:</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Address...">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                            <div class="form-group col-md-5">
                            <label for="inputDate">Ngày</label>
                            <input type="date" class="form-control" id="inputDate" placeholder="">
                            </div>
                            <div class="form-group col-md-2">Thời gian:</div>
                            <div class="form-group col-md-2">
                            <label for="inputTimestart">Bắt đầu</label>
                            <input type="time" class="form-control" id="inputTimestart">
                            </div>
                            <div class="form-group col-md-1">
                            <label for="">To</label>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputTimeend">Kết thúc</label>
                        </div>
                            </div>
                        </div>
                        <div class="botton col-md-7">
                            <button type="botton" class="btn btn-primary">Xác nhận</button>
                        </div>
                        </form>
                                                
                    </div> <!-- end card-->
                </div>  
                <div class="col-xl-6">
                        <h4 class="header-title mb-3"><i class="mdi mdi-book ms-1"></i>Lịch hẹn</h4>
                        <div class="list-group" style="background: white;">
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-primary"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Ví dụ 1</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>16/08/2020</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>7H<span class="px-1">To</span>12H</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-pink"></i>
                                </div>
                               <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Ví dụ 2</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>16/08/2020</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>7H<span class="px-1">To</span>12H</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-success"></i>
                                </div>
                                 <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Ví dụ 3</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>16/08/2020</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>7H<span class="px-1">To</span>12H</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-warning"></i>
                                </div>
                                 <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Ví dụ 4</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>16/08/2020</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>7H<span class="px-1">To</span>12H</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-dark"></i>
                                </div>
                                 <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Ví dụ 5</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>16/08/2020</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>7H<span class="px-1">To</span>12H</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
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
