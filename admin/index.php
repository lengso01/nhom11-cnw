<?php require_once "base/header.php"; ?>
<?php require_once "class/admin.php"; ?>
<main>
	
	<div class="container">
		<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 col-lg-6">
<div class="wrap m-auto my-5">
<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
<div class="text w-100">
<h2>∞Infinity</h2>
<p>Xin chào, Admin</p>
</div>
</div>
<div class="login-wrap p-4 p-lg-5 bg-white">
<div class="w-100">
<h3 class="mb-4">Đăng nhập quản trị,</h3>
      <?php
                    if(count($errors) > 0){
                        ?>
                        <div style="margin-bottom:10px;color:red">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
</div>

<form action="" class="signin-form" method="POST">
<div class="form-group mb-3">
<label class="label" for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Địa chỉ email" required value="">
</div>
<div class="form-group mb-3">
<label class="label" for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
</div>
<div class="form-group">
	<input class="button-submit form-control btn btn-primary submit px-3 border-0" type="submit" name="login" value="Đăng nhập">
</div>
<div class="form-group d-md-flex">
<div class="w-50">
<a href="#">Forgot Password ?</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
	</div>

</main>


<?php require_once "base/footer.php"; ?>
