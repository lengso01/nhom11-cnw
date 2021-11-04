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

  if(!isset($_GET['user_id']) && $_GET['user_id'] == NULL){
    echo "<script>window.locaion='account.php'</script>";
  } else{
    $id = $_GET['user_id'];
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
        <a class="nav-link active" href="profile.php">Blog</a>
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
    <div class="col-md-6 m-auto">
        <div class="card-boy m-auto">
          <form action="" method="POST">
            <div class="mb-3 row align-items-center">
              <div class="col-sm-2">
              <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="" class="rounded-circle shadow-sm" style="width:72px; height: 72px;">
              </div>
              <div class="col-sm-10">
                <div class="mt-2"><b><?php echo $fetch_info['name'] ?></b></div>
                <input class="form-control" type="hidden" value="<?php echo $fetch_info['id'] ?>" name="id"/>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label">Họ và tên</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" aria-describedby="nameVal" name="name" placeholder="<?php echo $fetch_info['name'] ?>">
                <div id="nameVal" class="form-text">
                  Get a name you use often to make your account easier to find. It can be your full name, nickname, or business name.<br/>
                  You can only change your name twice within 14 days.
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="sex" class="col-sm-2 col-form-label">Giới tính</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="sex" aria-describedby="nameVal" name="sex" placeholder="<?php echo $fetch_info['sex'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="birthday" class="col-sm-2 col-form-label">Ngày sinh</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="birthday" aria-describedby="nameVal" name="birthday" placeholder="<?php echo $fetch_info['birthday'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="job" class="col-sm-2 col-form-label">Nghề nghiệp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="job" aria-describedby="nameVal" name="job" placeholder="<?php echo $fetch_info['job'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" aria-describedby="nameVal" name="phone" placeholder="<?php echo $fetch_info['phone'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-3">
              <button type="submit" name="update" class="btn btn-danger">Update</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
</main>
<?php require_once "base/footer.php"; ?>

