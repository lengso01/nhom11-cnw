<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<?php require_once "base/header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5 m-auto">
                <div class="card">
                    <div class="card-header">Nhập OTP</div>
                    <div class="card-body">
                        <form action="user-otp.php" method="POST" autocomplete="off" id="otp">
                            <h2 class="text-center">Code Verification</h2>
                            <?php 
                            if(isset($_SESSION['info'])){
                                ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if(count($errors) > 0){
                                ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach($errors as $showerror){
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control button btn btn-primary" type="submit" name="check" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php require_once "base/footer.php"; ?>
