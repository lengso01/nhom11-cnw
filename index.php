<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Infinity - Group 11</title>
    <link rel="stylesheet" type="text/css" href="css/loginsigup.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
    <script src="js/index.js"></script>
        <link href='image/favicon.ico' rel='icon' type='image/x-icon'/>

    <body>
    <main>
      <div class="container">
        <div class="rounded"></div>
        <div class="welcome text-entrar">
          <h2>Xin chào!</h2>
          <h4>Nhấp vào đây nếu bạn chưa đăng kí tài khoản và là một phần của hệ thống mới này.</h4>
          <button name="toggleView">Đăng kí</button>
        </div>
        <form class="entrar" action="" method="POST">
          <h1>Xin chào..</h1>
          <h3>Đăng nhập tại đây</h3>

          <div class="container-input">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Địa chỉ email" required value="<?php echo $email ?>">
          </div>
          <div class="container-input">
            <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Mật khẩu" required>
          </div>
          <?php
                    if(count($errors) > 0){
                        ?>
                        <div style="margin-bottom:10px;color:red;text-align:center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
          <input class="button-submit" type="submit" name="login" value="Đăng nhập">
          <h4>Hoặc đăng nhập thông qua</h4>
          <div class="social-media">
            <div class="social-icon"><i class="fab fa-facebook-f"></i>
            </div>
            <div class="social-icon"><i class="fab fa-google-plus-g"></i>
            </div>
            <div class="social-icon"><i class="fab fa-twitter"></i>
            </div>
            <div class="social-icon"><i class="fab fa-whatsapp"></i>
            </div>
          </div>
        </form>
        
        <form class="cadastrar" method="POST" action="index.php">
          <h1>Đăng kí</h1>
          <h3>Nhập thông tin</h3>
           <?php
if (count($errors) == 1)
{
?>
                <div class="alert alert-danger text-center">
                    <?php
    foreach ($errors as $showerror)
    {
        echo $showerror;
    }
?>
                </div>
                <?php
}
elseif (count($errors) > 1)
{
?>
                <div class="alert alert-danger">
                    <?php
    foreach ($errors as $showerror)
    {
?>
                        <li><?php echo $showerror; ?></li>
                        <?php
    }
?>
                </div>
                <?php
}
?>
          <div class="container-input">
            <i class="fas fa-user"></i>
                            <input  type="text" name="name" placeholder="Tên đầy đủ" required value="<?php echo $name ?>">
          </div>
          <div class="container-input">
            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" placeholder="Địa chỉ email" required value="<?php echo $email ?>">
          </div>
          <div class="container-input">
            <i class="fas fa-lock"></i>
                            <input  type="password" name="password" placeholder="Mật khẩu" required>
          </div>
          <div class="container-input">
            <i class="fas fa-lock"></i>
                            <input type="password" name="cpassword" placeholder="Xác nhận mật khẩu" required>
          </div>
                            <input class="button-submit" type="submit" name="signup" value="Đăng kí">
          <h4>Đăng kí thông qua</h4>
          <div class="social-media">
            <div class="social-icon"><i class="fab fa-facebook-f"></i>
            </div>
            <div class="social-icon"><i class="fab fa-google-plus-g"></i>
            </div>
            <div class="social-icon"><i class="fab fa-twitter"></i>
            </div>
            <div class="social-icon"><i class="fab fa-whatsapp"></i>
            </div>
          </div>
        </form>
      </div>
    </main> 
<script type="text/javascript">
  
 $(document).ready(function(e)
{
  $('button[name="toggleView"]').click(function(e) {
     let text = $(this).text();
     text == 'Đăng kí' ? $(this).text('Đăng nhập') : $(this).text('Đăng kí');
     
     $('.container').toggleClass('cadastro');
  });
}); 
</script>

</body>
</html>
