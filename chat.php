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
        position: fixed;
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
         <div class="col-xl-6">
            <div class="card">
                    <div class="card-body">
                        <h4 class="header-title ">Inbox</h4>
                            <div class="inbox-widget" data-simplebar="init" style="max-height: 350px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Tomaslau</h5>
                                        <p class="mb-0 font-13">I've finished it! See you so...</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center py-1" id="tooltips-container1">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Stillnotdavid</h5>
                                        <p class="mb-0 font-13">This theme is awesome!</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container1" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center py-1" id="tooltips-container2">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Shahedk</h5>
                                        <p class="mb-0 font-13">Hey! there I'm available...</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container2" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center py-1" id="tooltips-container3">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Kurafire</h5>
                                        <p class="mb-0 font-13">Nice to meet you</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center py-1" id="tooltips-container4">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Adhamdannaway</h5>
                                        <p class="mb-0 font-13">This theme is awesome!</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container4" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center py-1" id="tooltips-container5">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Tomaslau</h5>
                                        <p class="mb-0 font-13">I've finished it! See you so...</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container5" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center py-1" id="tooltips-container6">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Shahedk</h5>
                                        <p class="mb-0 font-13">Hey! there I'm available...</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container6" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                                <div class="d-flex align-items-center pt-1" id="tooltips-container7">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-3">
                                        <h5 class="mb-1">Stillnotdavid</h5>
                                        <p class="mb-0 font-13">This theme is awesome!</p>
                                    </div>
                                    <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container7" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-reply"></i> </a>
                                </div>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 532px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 230px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div> <!-- end inbox-widget -->
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
    <footer>
        <p>©Infinity 2021 , Inc.</p>
    </footer>
</body>
</html>