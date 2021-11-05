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
                <div class="col-xl-5">
                    <div class="card profile mb-3">
                        <div class="card-body">           
                            <div class="d-flex align-items-center">
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <div class="ml-3">
                                    <h5 class="my-0"><?php echo $fetch_info['name'] ?></h5>
                                    <p class="text-muted mb-0">
                                        <a href="edit-profile.php?user_id=<?php echo $fetch_info['id'] ?>">Chỉnh sửa thông tin</a>                                             
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
                                
                                    <p class="text-muted mb-2"><strong>Giới tính :</strong ><span class="ms-2"><?php echo $fetch_info['sex'] ?></span></p>
                                
                                    <p class="text-muted mb-2"><strong>Ngày sinh :</strong> <span class="ms-2"><?php echo $fetch_info['birthday'] ?></span></p>
                                
                                    <p class="text-muted mb-2"><strong>Nghề nghiệp:</strong> <span class="ms-2"><?php echo $fetch_info['job'] ?></span></p>

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
                    <div class="card friend">
                        <div class="card-header">
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
                                                <a href="edit-profile.php?user_id=<?php echo $fetch_info['id'] ?>">Yêu cầu kết bạn</a>                                             
                                                </p> 
                                        </div>
                                    </div>
                                           <div class="d-flex align-items-center mb-3">
                                        <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        <div class="ml-3">
                                            <h6 class="my-0"><?php echo $fetch_info['name'] ?> (4 bạn chung)</h6>
                                            <p class="text-muted mb-0">
                                                <a href="edit-profile.php?user_id=<?php echo $fetch_info['id'] ?>">Yêu cầu kết bạn</a>                                             
                                                </p> 
                                        </div>
                                    </div>
                                           <div class="d-flex align-items-center mt-3 mb-3">
                                        <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        <div class="ml-3">
                                            <h6 class="my-0"><?php echo $fetch_info['name'] ?> (4 bạn chung)</h6>
                                            <p class="text-muted mb-0">
                                                <a href="edit-profile.php?user_id=<?php echo $fetch_info['id'] ?>">Yêu cầu kết bạn</a>                                             
                                                </p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end card -->        
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title h4">Cảm nghĩ của bạn</div>
                        </div>
                        <div class="card-body">
                            <!-- comment box -->
                            <form action="#" class="comment-area-box mb-3">
                                <span class="input-icon">
                                    <textarea rows="3" class="form-control" placeholder="Write something..."></textarea>
                                </span>
                                <div class="comment-area-btn">
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-user"></i></a>
                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-map-marker-alt"></i></a>
                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-camera"></i></a>
                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-smile"></i></a>
                                    </div>
                                </div>
                            </form>
                            <!-- end comment box -->

                            <!-- Story Box-->
                            <div class="border border-light p-2 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="me-2 avatar-sm rounded-circle" src="image/default2.png" alt="Generic placeholder image">
                                    <div class="w-100">
                                        <h6 class="">Nguyễn Thùy Linh <small class="text-muted"> 1 giờ trước</small></h6>
                                        <div class="">
                                            Bài viết bổ ích quá
                                            <br>
                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                

                                <div class="post-user-comment-box">
                                    <div class="d-flex align-items-start">
                                        <img class="me-2 avatar-sm rounded-circle" src="image/default1.png" alt="Generic placeholder image">
                                        <div class="w-100">
                                            <h6 class="mt-0">Trần Văn A <small class="text-muted">3 giờ trước</small></h6>
                                            Bài viết lại bổ ích quá

                                            <br>
                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                            <div class="d-flex align-items-start mt-3">
                                                <a class="pe-2" href="#">
                                                    <img src="image/default2.png" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                                </a>
                                                <div class="w-100">
                                                    <h6 class="mt-0">Vũ Đức Bo <small class="text-muted">5 giờ trước</small></h6>
                                                    Bạn nên sũy nghĩ lại ?
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-2">
                                        <a class="pe-2" href="#">
                                            <img src="image/default.png" class="rounded-circle" alt="Generic placeholder image" height="31">
                                        </a>
                                        <div class="w-100">
                                            <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                </div>
                            </div>

                            <!-- Story Box-->
                            <div class="border border-light p-2 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="me-2 avatar-sm rounded-circle" src="image/default3.png" alt="Generic placeholder image">
                                    <div class="w-100">
                                        <h5 class="m-0">Tomlinson</h5>
                                        <p class="text-muted"><small>about 2 phút trước</small></p>
                                    </div>
                                </div>
                                <p>Story based around the idea of time lapse, animation to post soon!</p>

                                <img src="https://via.placeholder.com/800x540/FF7F50/000000" alt="post-img" class="rounded me-1" height="60">
                                <img src="https://via.placeholder.com/800x540/FF7F50/000000" alt="post-img" class="rounded me-1" height="60">
                                <img src="https://via.placeholder.com/800x540/FF7F50/000000" alt="post-img" class="rounded" height="60">

                                <div class="mt-2">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                </div>
                            </div>

                            <!-- Story Box-->
                            <div class="border border-light p-2 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Generic placeholder image">
                                    <div class="w-100">
                                        <h6 class="m-0">Jeremy</h6>
                                        <p class="text-muted"><small>15 giờ trước</small></p>
                                    </div>
                                </div>
                                <p>Awesome!!!!</p>

                                <iframe src="https://player.vimeo.com/video/87993762" height="300" class="img-fluid border-0"></iframe>
                            </div>

                            <div class="text-center">
                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Tải thêm nhận xét </a>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            <!-- end row-->
            </div>
        </div>
    </main>
<?php require_once "base/footer.php"; ?>
