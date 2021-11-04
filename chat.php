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
    <title><?php echo $fetch_info['name'] ?> | Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <style>
        
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    html, body {
    height: 100%;
    width: 100%;
    padding: 0;
    margin: 0;
    }
    body {
    display: flex;
    flex-direction: column;
    }   
    main {
    flex: auto;
    }

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
    header ul{
        background-color:#5cc6ee;
    }
    header div a,p{
        color: #fff;
        font-weight: 500;
    }
    header ul{
        background-color:#5cc6ee;
    }
    header ul li a{
        color: white;
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
    main {
        background: lightblue;
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
            <a class="nav-link" href="search-friend.php">Friends</a>
        </li>
    </ul>
    </header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
            <h4 class="header-title mb-3">Inbox<i class="mdi mdi-account ms-1"></i></h4>
                <div class="card">
                        <div class="card-body">
                                <div class="inbox-widget" data-simplebar="init" style="max-height: 350px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                    <div class="d-flex align-items-center pb-1" id="tooltips-container1">
                                        <img src="https://i.pinimg.com/474x/56/08/e4/5608e49edf8be6fece75ac518523f150.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                        <div class="w-100 ms-3">
                                            <h5 class="mb-1">Hawa</h5>
                                        </div>
                                        <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-message-text-outline"></i> </a>
                                    </div>
                                    <div class="d-flex align-items-center py-1" id="tooltips-container1">
                                        <img src="https://i.pinimg.com/474x/40/81/d6/4081d6ba25ae0b0523764f6c4a8894e0.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                        <div class="w-100 ms-3">
                                            <h5 class="mb-1">Mark</h5>
                                        </div>
                                        <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container1" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-message-text-outline"></i> </a>
                                    </div>
                                    <div class="d-flex align-items-center py-1" id="tooltips-container2">
                                        <img src="https://i.pinimg.com/474x/97/e7/d9/97e7d98eafd1d58149735a14b68ad4f4.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                        <div class="w-100 ms-3">
                                            <h5 class="mb-1">Emma</h5>
                                        </div>
                                        <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container2" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-message-text-outline"></i> </a>
                                    </div>
                                    <div class="d-flex align-items-center py-1" id="tooltips-container3">
                                        <img src="https://i.pinimg.com/474x/7b/c0/11/7bc01166fb303d1812b353e5b0973a49.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                        <div class="w-100 ms-3">
                                            <h5 class="mb-1">Kuma</h5>
                                        </div>
                                        <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-message-text-outline"></i> </a>
                                    </div>
                                    <div class="d-flex align-items-center py-1" id="tooltips-container4">
                                        <img src="https://i.pinimg.com/474x/94/d9/35/94d935055a035dea7d32cc10ff14874b.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                        <div class="w-100 ms-3">
                                            <h5 class="mb-1">Adame</h5>            
                                        </div>
                                        <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container4" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-message-text-outline"></i> </a>
                                    </div>
                                    <div class="d-flex align-items-center pb-1" id="tooltips-container5">
                                        <img src="https://i.pinimg.com/474x/e2/d4/9e/e2d49ee45c152e19f6c8600d7fb0ce7f.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                        <div class="w-100 ms-3">
                                            <h5 class="mb-1">Tomat2</h5>
                                        </div>
                                        <a href="javascript:(0);" class="btn btn-sm btn-soft-info font-13" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Reply"> <i class="mdi mdi-message-text-outline"></i> </a>
                                    </div>    
                                   
                                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 532px;"></div></div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar" style="height: 230px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div> <!-- end inbox-widget -->
                            </div>
                        </div> <!-- end card-->
                </div>
                <div class="col-xl-6">
                        <h4 class="header-title mb-3">Team<i class="mdi mdi-account-multiple ms-1"></i></h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUBwl-i2zQK28Y0jg6g1A8_r9fbt0PCRFVww&usqp=CAU" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-2">
                                        <h5 class="mb-1">Team Designer</h5>
                                    </div>
                                    <i class="mdi mdi-chevron-right h2"></i>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                    <img src="https://i.pinimg.com/564x/28/27/c9/2827c9941340ad408239418f260a7046.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-2">
                                        <h5 class="mb-1">PHP Developer</h5>
                                    </div>
                                    <i class="mdi mdi-chevron-right h2"></i>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                    <img src="https://i.pinimg.com/474x/3f/2f/12/3f2f126483a3b1447f783f49b384765a.jpg" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                    <div class="w-100 ms-2">
                                        <h5 class="mb-1">Relax</h5>
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