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
<?php require_once "base/header.php"; ?>

<header class="mb-5"> 
        <nav class="navbar align-items-center">
        <a class="navbar-brand font-weight-bold" href="#">∞Infinity</a>
        <div class="d-flex align-items-center">
            <p class="mr-2 mb-0">Hello,<?php echo $fetch_info['name'] ?></p>
            <a href="logout-user.php">Logout</a>
        </div>
    </nav>
    <ul class="mt-3 nav justify-content-center">
            <li class="nav-item">
        <a class="nav-link active" href="home.php">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="profile.php">Blog</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="chat.php">Chatting</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="appointment.php">Appointment</a>
    </li>
    <li class="nav-item ">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search on Infinity" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </li>
    </ul>
    </header>
<main>
<div class="container">
    <div class="row">
         <div class="col-xl-6">
            <div class="card">
                    <div class="card-body">
                        <h4 class="header-title ">Inbox</h4>
                            <div id="user_details"></div>
                        </div>
                    </div> <!-- end card-->
            </div>
            <div class="col-xl-6">
                    <h4 class="header-title mb-3">Team Members <i class="mdi mdi-account-multiple ms-1"></i></h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Herbert Stewart<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                                    <p class="mb-0 font-13 text-muted">Co Founder</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Terry Mouser</h5>
                                    <p class="mb-0 font-13 text-muted">Web Designer</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Adam Barney</h5>
                                    <p class="mb-0 font-13 text-muted">PHP Developer</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Michal Chang</h5>
                                    <p class="mb-0 font-13 text-muted">UI/UX Designer</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                </div>
             </div>
         </div>
    </div>
</div>
    </main>
    <script>  
$(document).ready(function(){

 fetch_user();

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }
 
});  
</script>
<?php require_once "base/footer.php"; ?>
