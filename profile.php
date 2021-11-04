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
    /*style heard and footer*/
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
        <ul class="nav justify-content-center" >
        <li class="nav-item" >
            <a class="nav-link active" href="profile.php" >Blog</a>
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
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">           
                            <div class="d-flex align-items-start">
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <div class="w-100 ms-3">
                                    <h4 class="my-0"><?php echo $fetch_info['name'] ?></h4>
                                    <p class="text-muted">@<?php echo $fetch_info['id'] ?></p> 
                                </div>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <h4 class="font-13 text-uppercase">About Me :</h4>
                                <p class="text-muted font-13 mb-3">
                                  $bio
                                </p>
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">$full name</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong ><span class="ms-2">$phone</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="ms-2">$gender</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Birthday:</strong> <span class="ms-2">$birthdate</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Location :</strong> <span class="ms-2">$address</span></p>
                            </div>                                    
                       
                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="social-list-item text-center border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                </li>
                                <hr>
                
                                <a href="edit-profile.php">Edit information</a> 
                                <br>
                                <a href="new-password.php">Change password</a>  
                            </ul> 
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
                                    <textarea rows="3" class="form-control" placeholder="What's your mood like today? "></textarea>
                                </span>
                                <form>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Select image,video</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                </form>
                                <div class="comment-area-btn">
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end comment box -->
                        </div>    
                        <div class="listpost">
                            <!-- Story Box-->     
                            <div class="card-post">                  
                                <div class="border border-light p-2 mb-3">
                                    <div class="d-flex align-items-start">
                                        <img class="me-2 avatar-sm rounded-circle" src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="Generic placeholder image">
                                        <div class="w-100">
                                            <h5 class=""><?php echo $fetch_info['name'] ?>
                                            <small class="text-muted">$datetime</small>
                                            </h5>
                                            <div class="">
                                                $post_write
                                            </div>
                                            <div class="">
                                                $post_img/post_video
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mm-1">
                                    <a href="" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (50)</a>
                                    <a href="" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                </div>
                            </div>
                            <hr>
                            <!-- Story Box-->
                            <div class="card-post">    
                                <div class="border border-light p-2 mb-3">
                                    <div class="d-flex align-items-start">
                                        <img class="me-2 avatar-sm rounded-circle" src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="Generic placeholder image">
                                        <div class="w-100">
                                            <h5 class=""><?php echo $fetch_info['name'] ?>
                                            <small class="text-muted">$datetime</small>
                                            </h5>
                                            <div class="">
                                                Stay hungry, stay foolish.
                                            </div>
                                            <div class="">
                                                <img width="400" height="243" src="https://s3-ap-southeast-1.amazonaws.com/images.spiderum.com/sp-images/0d2fec00d70a11e9ac106b8ce1e02c47.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <a href="" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (100)</a>
                                    <a href="" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                </div>
                            </div>
                            <hr>                                
                            <!-- Story Box-->
                            <div class="card-post">    
                                <div class="border border-light p-2 mb-3">
                                    <div class="d-flex align-items-start">
                                        <img class="me-2 avatar-sm rounded-circle" src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="Generic placeholder image">
                                        <div class="w-100">
                                            <h5 class=""><?php echo $fetch_info['name'] ?>
                                            <small class="text-muted">$datetime</small>
                                            </h5>
                                            <div class="">
                                                The flowers are so beautiful
                                            </div>
                                            <div class="" >
                                                <img width="400" height="243" src="https://i.pinimg.com/474x/60/05/1a/60051a3f37340fbfeb268f4bac04527d.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <a href="" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (100)</a>
                                    <a href="" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                </div>
                            </div>
                            <!-- Story Box-->
                            <div class="card-post"> 
                                <div class="border border-light p-2 mb-3">
                                    <div class="d-flex align-items-start">
                                        <img class="me-2 avatar-sm rounded-circle" src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png" alt="Generic placeholder image">
                                        <div class="w-100">
                                            <h5 class=""><?php echo $fetch_info['name'] ?>
                                            <small class="text-muted">$datetime</small>
                                            </h5>
                                            <div class="">
                                                Great
                                                <br>
                                                https://www.youtube.com/embed/_tNU6dpjIyM
                                            </div>
                                            <div class="">
                                                <iframe width="400" height="243" src="https://www.youtube.com/embed/_tNU6dpjIyM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-1">
                                    <a href="" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (50)</a>
                                    <a href="" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                </div>
                            </div>
                            <hr>
                                <div class="text-center">
                                    <a href="" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                                </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div><!-- end row-->           
    </main>
    <footer>
        <p>©Infinity 2021 , Inc.</p>
    </footer>
</body>
</html>