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
?>
<?php require_once "base/header.php";
        require_once "base/menu-main.php";
 ?>


    <main>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card profile mb-3 border-0 shadow-none">
                        <div class="card-body">           
                            <div class="d-flex align-items-center">
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <div class="ml-3">
                                    <h5 class="my-0"><?php echo $fetch_info['name'] ?></h5>
                                    <p class="text-muted mb-0">
                                        <a href="edit-profile.php?user_id=<?php echo $fetch_info['u_id'] ?>">Chỉnh sửa thông tin</a>                                             
                                        </p> 
                                </div>
                            </div>
                            <div class="accordion mt-3" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Giới thiệu
                                  </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <p class="text-muted mb-2"><strong>Họ và tên :</strong> <span class="ms-2"><?php echo $fetch_info['name'] ?></span></p>
                                
                                    <p class="text-muted mb-2"><strong>Giới tính :</strong ><span class="ms-2">
                                        <?php
                                          if($fetch_info['sex'] == 1){
                                            echo "Nam";
                                          } elseif ($fetch_info['sex'] == 2) {
                                              echo "Nữ";
                                          }else{
                                            echo "Không muốn tiết lộ";
                                          }
                                        ?>
                                        
                                    </span></p>
                                
                                    <p class="text-muted mb-2"><strong>Ngày sinh :</strong> <span class="ms-2"><?php echo $fetch_info['birthday'] ?></span></p>
                                
                                    <p class="text-muted mb-2"><strong>Nghề nghiệp:</strong> <span class="ms-2"><?php echo $fetch_info['job'] ?></span></p>
                                    <p class="text-muted mb-2"><strong>Địa chỉ:</strong> <span class="ms-2"><?php echo $fetch_info['address'] ?></span></p>

                                    <p class="text-muted mb-2 "><strong>Phone :</strong> <span class="ms-2"><?php echo $fetch_info['phone'] ?></span></p>
                                  </div>
                                </div>
                              </div>
                            </div>                              
                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-primary text-primary"><i class="fab fa-facebook"></i></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-info text-info"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-secondary text-secondary"><i class="fab fa-github"></i></a>
                                </li>
                                <hr>
                                <a href="new-password.php">Thay đổi mật khẩu?</a>  
                            </ul> 
                        </div>
                    </div>
                    <div class="card friend border-0 shadow-none">
                        <div class="card-header border-0">
                            <div class="card-title h5">Tìm bạn bè</div>
                        </div>
                        <div class="card-body">
                                <input type="text" name="search_friend" id="search_friend" class="form-control input-sm" placeholder="Search" />
                                <div class="panel-body pre-scrollable">
                                <div id="friends_list">
                                    <div class="d-flex align-items-center mt-3 mb-3">
                                        <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        <div class="ml-3">
                                            <h6 class="my-0"><?php echo $fetch_info['name'] ?> (4 bạn chung)</h6>
                                            <p class="text-muted mb-0">
                                                <a href="edit-profile.php?user_id=<?php echo $fetch_info['u_id'] ?>">Yêu cầu kết bạn</a>                                             
                                                </p> 
                                        </div>
                                    </div>
                                           <div class="d-flex align-items-center mb-3">
                                        <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        <div class="ml-3">
                                            <h6 class="my-0"><?php echo $fetch_info['name'] ?> (4 bạn chung)</h6>
                                            <p class="text-muted mb-0">
                                                <a href="edit-profile.php?user_id=<?php echo $fetch_info['u_id'] ?>">Yêu cầu kết bạn</a>                                             
                                                </p> 
                                        </div>
                                    </div>
                                           <div class="d-flex align-items-center mt-3 mb-3">
                                        <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        <div class="ml-3">
                                            <h6 class="my-0"><?php echo $fetch_info['name'] ?> (4 bạn chung)</h6>
                                            <p class="text-muted mb-0">
                                                <a href="edit-profile.php?user_id=<?php echo $fetch_info['u_id'] ?>">Yêu cầu kết bạn</a>                                             
                                                </p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end card -->        
                <div class="col-xl-8">
                    <div class="card border-0 shadow-none">
                        <div class="card-header border-0">
                            <div class="card-title h4">Cảm nghĩ của bạn</div>
                        </div>
                        <div class="card-body">
                            <!-- comment box -->
                            <div class="mb-3 p-3 bg-light">
                                <form action="controllerPost.php?id=<?=$fetch_info['u_id']?>" method="POST" class="post-area">
                                     <div class="mb-3">
                                        <label for="postTitle" class="form-label">Tiêu đề bài viết</label>
                                        <input type="text" class="form-control" id="postTitle" name="post_title" placeholder="Tiêu đề bài viết">
                                        <input type="text" hidden class="form-control" id="postDate" name="date" value="<?=date("Y-m-d")?>">

                                      </div>
                                       <div class="status mb-3">
                                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                                      <option value="0" selected>Công khai</option>
                                      <option value="1">Bạn bè</option>
                                      <option value="2">Chỉ mình tôi</option>
                                    </select>
                                  </div>
                                    <div class="postContent">
                                        <textarea rows="3" class="form-control" placeholder="Write something..." name="post_content"></textarea>
                                    </div>

                                    <div class="post-footer p-2">
                                        <div class="float-end">
                                            <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light" name="post">Đăng ngay</button>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-user"></i></a>
                                            <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-map-marker-alt"></i></a>
                                            <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-camera"></i></a>
                                            <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-smile"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end comment box -->

                            <!-- Story Box-->
                             <div class="grid-post">
                                <?php $queryP = "
                                    SELECT * FROM post ORDER BY post_id DESC
                                 ";
                                 $statement = $connect->prepare($queryP);
                                 $statement->execute();
                                 $resultP = $statement->fetchAll();
                                 if ($resultP) {
                                    foreach($resultP as $row)
                                     { ?>
                                    <div class="grid-post_item mb-4 mb-sm-8">
                                    <div class="card item border-0 shadow-sm">
                                      <div class="card-header d-flex justify-content-between align-items-center bg-white border-0">
                                        <div class="u_left d-flex gap-3 align-items-center">
                                          <div class="user-avatar">
                                            <img src="image/default.png" width="32" class="rounded-circle shadow-sm">
                                          </div>
                                          <div class="user-profile">
                                                   <?php
                                                $u_id = $row['u_id']; 
                                                $sql2 = "SELECT * FROM usertable Where u_id = '$u_id'";
                                                $query2 = mysqli_query($con,$sql2);
                                                $num_rows2 = mysqli_num_rows($query2);
                                                if ($num_rows2>0){
                                                    $result2 = mysqli_fetch_assoc($query2);
                                                    if ($result2) {?>
                                            <div class="u_add-name text-sm-start">
                                              <span class="text-muted"><?=$result2['address'];?></span>
                                            </div>
                                            <div class="u_full-name text-sm-start">
                                         
                                                <?=$result2['name'];?>

                                            </div>
                                                 <?php
                                                    }
                                                }
                                                ?>  
                                          </div>
                                        </div>
                                        <div class="u_more">
                                          <div class="dropdown">
                                            <a class="text-dark" href="#" id="u_more" data-bs-toggle="dropdown" aria-expanded="false">
                                              <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm p-0" aria-labelledby="u_more">
                                              <li><a class="dropdown-item" href="#">Báo cáo</a></li>
                            
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-body">
                                        <div class="card-title h5"><?=$row['post_title']?></div>
                                        <p class="card-text"><?=$row['post_date']?></p>
                                        <p class="card-text"><?=$row['post_content']?></p>
                                      </div>
                                    </div>
                                  </div>

                                    <?php
                                     }

                                 }?>
                                  
                            </div>

                            <div class="text-center">
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            <!-- end row-->
            </div>
        </div>
    </main>
<?php require_once "base/footer.php"; ?>
