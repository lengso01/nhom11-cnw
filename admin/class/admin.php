<?php 
session_start();

require "config/db.php";
$email = "";
$name = "";
$errors = array();

 if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'" ;
			$query = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				$errors['email'] = "Có vẻ như sai !!";
			}else{
				$_SESSION['email'] = $email;
                header('Location: home.php');
            }
        }else{
            $errors['email'] = "Có vẻ như bạn chưa phải là thành viên! Nhấp vào liên kết dưới cùng để đăng ký.";
        }


