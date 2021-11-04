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
    <title><?php echo $fetch_info['name'] ?> | Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <style>
    /* style header and footer */
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
    .addapp form{
        padding-top: 10px;
        padding-left: 10px;
        padding-bottom: 20px;
    }
    .col-xl-6 .list-group{
        padding-top: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
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
    <ul class="nav justify-content-center" style="background-color:#5cc6ee ">
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
                <h4 class="header-title mb-3"><i class="mdi mdi-book-plus ms-1"></i>Make an appointment</h4>
                    <div class="addapp" style="background: white;">
                        <form>
                        <div class="form-group col-md-10">
                            <label for="inputMain">Main tilte:</label>
                            <input type="text" class="form-control" id="inputMain" placeholder="Import content...">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="inputAddresss">Location:</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Address...">
                        </div>
                        <div class="form-row col-md-10">
                            <div class="form-group col-md-5">
                            <label for="inputDate">Date</label>
                            <input type="date" class="form-control" id="inputDate" placeholder="">
                            </div>
                            <div class="form-group col-md-2">Time:</div>
                            <div class="form-group col-md-2">
                            <label for="inputTimestart">Start</label>
                            <input type="time" class="form-control" id="inputTimestart">
                            </div>
                            <div class="form-group col-md-1">
                            <label for="">To</label>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputTimeend">End</label>
                            <input type="time" class="form-control" id="inputEndtime">
                            </div>
                        </div>
                        <div class="botton col-md-7">
                            <button type="botton" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                                                
                    </div> <!-- end card-->
                </div>  
                <div class="col-xl-6">
                        <h4 class="header-title mb-3"><i class="mdi mdi-book ms-1"></i>Appointments schedule</h4>
                        <div class="list-group" style="background: white;">
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-primary"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">$main_title</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>$date</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>$time_start<span class="px-1">To</span>$time_end</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-pink"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Landing Pages Planning</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>10 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>02:00pm <span class="px-1">To</span> 4:00pm</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-success"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Meet Our Clients</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>11 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>08:00am <span class="px-1">To</span> 11:20am</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-warning"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Project Discussion</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>11 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>12:00am <span class="px-1">To</span> 03:00am</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-dark"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Businees Meeting</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>12 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>08:30am <span class="px-1">To</span> 10:00am</li>
                                    </ul>
                                </div>
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