<?php
require_once "controllerUserData.php";
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
    header('Location: index.php');
}?>
<?php require_once "base/header.php"; ?>
<?php require_once "base/menu-main.php"; ?>



<main>
<div class="container">
    <div class="col-md-6 m-auto">
        <div class="card-body search-result bg-white">

        <?php if (isset($_REQUEST['s'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['s']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                 $query = "
                    SELECT * FROM usertable WHERE name LIKE '%$search%'
                 ";
                 $statement = $connect->prepare($query);
                 $statement->execute();
                 $result = $statement->fetchAll();?>
                 <h6>Kết quả với từ khóa "<?=$search?>"</h6>
                 <?php
                 if ($result) {
                    foreach($result as $row)
                     { ?>
                            <div class="d-flex align-items-center mt-3 mb-3">
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <div class="ml-3">
                                    <h6 class="my-0"><?= $row['name']?> (<?=$fetch_info['address']?>)</h6>

                                    <p class="text-muted mb-0">
                                        <a href="#">Yêu cầu kết bạn</a>                                             
                                        </p> 
                                </div>
                            </div>
                       
                    <?php }
                 }else{
                    echo "Lỗi";
                 }
                 
                
            } 
            
        }
        ?>   
    </div>
    </div>
</div>
</main>
<?php require_once "base/footer.php"; ?>
