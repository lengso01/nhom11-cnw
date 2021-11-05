<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false)
{
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql)
    {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified")
        {
            if ($code != 0)
            {
                header('Location: reset-code.php');
            }
        }
        else
        {
            header('Location: user-otp.php');
        }
    }
}
else
{
    header('Location: login-user.php');
}

if (!isset($_GET['user_id']) && $_GET['user_id'] == NULL)
{
    echo "<script>window.locaion='account.php'</script>";
}
else
{
    $id = $_GET['user_id'];
}
?>

<?php require_once "base/header.php"; ?>
<?php require_once "base/menu-main.php"; ?>

<main>
<div class="container">
    <div class="col-md-6 m-auto">
        <div class="card-boy m-auto">
          <form action="" method="POST">
            <div class="mb-3 row align-items-center">
              <div class="col-sm-3">
              <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="" class="rounded-circle shadow-sm" style="width:72px; height: 72px;">
              </div>
              <div class="col-sm-9">
                <div class="mt-2"><b><?php echo $fetch_info['name'] ?></b></div>
                <input class="form-control" type="hidden" value="<?php echo $fetch_info['u_id'] ?>" name="id"/>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="name" class="col-sm-3 col-form-label">Họ và tên</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" aria-describedby="nameVal" name="name" placeholder="<?php echo $fetch_info['name'] ?>" required>
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
                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="<?php echo $fetch_info['birthday'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="job" class="col-sm-3 col-form-label">Nghề nghiệp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="job" aria-describedby="nameVal" name="job" placeholder="<?php echo $fetch_info['job'] ?>" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="phone" aria-describedby="nameVal" name="phone" placeholder="<?php echo $fetch_info['phone'] ?>" required>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-3">
              <button type="submit" name="update" class="btn btn-primary">Xác nhận</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
</main>
<?php require_once "base/footer.php"; ?>
