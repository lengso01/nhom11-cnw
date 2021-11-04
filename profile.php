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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    a:hover{
        text-decoration: none;
        color: #007ee5;
    }
    header div{
        display: flex;
        gap: 10px;
    }
    header div a,p{
        color: #fff;
        font-weight: 500;
    }

    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    footer {
        /* position: fixed; */
        left: 0;
        bottom: 0;
        width: 100%;
        background-color:#6665ee;
        color: white;
        text-align: center;
    }  
/* style main */
.card {
    box-shadow: 0 0 2px 0 rgb(0 0 0 / 10%);
    margin-bottom: 24px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid #ecf2f5;
    border-radius: .25rem;
}
.avatar-lg {
    height: 4.5rem;
    width: 4.5rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #ecf2f5;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.avatar-sm {
    height: 2.25rem;
    width: 2.25rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.me-2 {
    margin-right: .75rem!important;
}
.avatar-md {
    height: 3.5rem;
    width: 3.5rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.bg-transparent {
    --bs-bg-opacity: 1;
    background-color: transparent!important;
}
.post-user-comment-box {
    background-color: #f2f8fb;
    margin: 0 -.75rem;
    padding: 1rem;
    margin-top: 20px;
}
.simplebar-wrapper {
    overflow: hidden;
    width: inherit;
    height: inherit;
    max-width: inherit;
    max-height: inherit;
}
.simplebar-height-auto-observer-wrapper {
    box-sizing: inherit!important;
    height: 100%;
    width: 100%;
    max-width: 1px;
    position: relative;
    float: left;
    max-height: 1px;
    overflow: hidden;
    z-index: -1;
    padding: 0;
    margin: 0;
    pointer-events: none;
    flex-grow: inherit;
    flex-shrink: 0;
    flex-basis: 0;
}
.font-13 {
    font-size: 13px!important;
}
.btn-soft-info {
    color: #45bbe0;
    background-color: rgba(69,187,224,.18);
    border-color: rgba(69,187,224,.12);
}
.social-list-item {
    height: 2rem;
    width: 2rem;
    line-height: calc(2rem - 2px);
    display: block;
    border: 2px solid #adb5bd;
    border-radius: 50%;
    color: #adb5bd;
}
.comment-area-box .comment-area-btn {
    background-color: #f2f8fb;
    padding: 10px;
    border: 1px solid #dee2e6;
    border-top: none;
    border-radius: 0 0 .2rem .2rem;
}
    </style>
</head>
<body>
    <header> 
        <nav class="navbar">
        <a class="navbar-brand" href="#">∞Infinity</a>
        <div>
            <p>Hello,<?php echo $fetch_info['name'] ?> |</p>
            <a href="logout-user.php">Logout</a>
        </div>
    </nav>
    <ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="profile.php">Blog</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="chat.php">Chat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="appointment.php">Appointment</a>
    </li>
    <li class="nav-item ">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search on Infinity" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </li>
    </ul>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <!-- <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Block</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <div class="w-100 ms-3">
                                    <h4 class="my-0">Geneva McKnight</h4>
                                    <p class="text-muted">@webdesigner</p>
                                    <button type="button" class="btn btn-soft-primary btn-xs waves-effect mb-2 waves-light">Follow</button>
                                    <button type="button" class="btn btn-soft-success btn-xs waves-effect mb-2 waves-light">Message</button>
                                </div>
                            </div>

                            <div class="mt-3">
                                <h4 class="font-13 text-uppercase">About Me :</h4>
                                <p class="text-muted font-13 mb-3">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                                </p>
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva D. McKnight</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123 1234</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">user@email.domain</span></p>
                            
                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                            </div>                                    

                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item text-center border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item text-center border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item text-center border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item text-center border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                </li>
                            </ul> 
                            <a href="edit-profile.php">Edit</a>  
                        </div>                                 
                    </div> 
                </div>
                    <!-- end card -->        
                <div class="col-xl-7">
                    <div class="card">
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
                                    <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="Generic placeholder image">
                                    <div class="w-100">
                                        <h5 class="">Thelma Fridley <small class="text-muted"> 1 hour ago</small></h5>
                                        <div class="">
                                            Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                            purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                            sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                            porta. Mauris massa.
                                            <br>
                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                

                                <div class="post-user-comment-box">
                                    <div class="d-flex align-items-start">
                                        <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image">
                                        <div class="w-100">
                                            <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                            Nice work, makes me think of The Money Pit.

                                            <br>
                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                            <div class="d-flex align-items-start mt-3">
                                                <a class="pe-2" href="#">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                                </a>
                                                <div class="w-100">
                                                    <h5 class="mt-0">Kathleen Thomas <small class="text-muted">5 hours ago</small></h5>
                                                    i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-2">
                                        <a class="pe-2" href="#">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" alt="Generic placeholder image" height="31">
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
                                    <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image">
                                    <div class="w-100">
                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                        <p class="text-muted"><small>about 2 minuts ago</small></p>
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
                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                        <p class="text-muted"><small>15 hours ago</small></p>
                                    </div>
                                </div>
                                <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                                <iframe src="https://player.vimeo.com/video/87993762" height="300" class="img-fluid border-0"></iframe>
                            </div>

                            <div class="text-center">
                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                            </div>
                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div>
    </main>
    <footer>
        <p>©Infinity 2021 , Inc.</p>
    </footer>
</body>
</html>