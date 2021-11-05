<?php
	require_once "config/db.php";

	if(isset($_POST['update'])){
	if (!isset($_GET['id'])) {
		header('location: home.php');
	}else{

		$id=$_GET['id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $sex = mysqli_real_escape_string($con, $_POST['sex']);
        $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
        $job = mysqli_real_escape_string($con, $_POST['job']);
                $address = mysqli_real_escape_string($con, $_POST['address']);

        $phone = mysqli_real_escape_string($con, $_POST['phone']);

        $query = "UPDATE `usertable` SET
        name = '$name',
        sex = '$sex',
        birthday = '$birthday',
        job = '$job',
                address = '$address',

        phone = '$phone' 
        WHERE u_id = '$id'";

        $result = mysqli_query($con, $query);
        if($result){
			header('location: home.php');
            }
            else
            {
                echo "<script>alert('Lỗi')</script>";;
            }

		}

	}
	if (!isset($_GET['delid'])) {
		header('location: home.php');
	}else{
		$delid=$_GET['delid'];
		$qdel = "DELETE FROM `usertable` WHERE u_id = '$delid'";
		$result = mysqli_query($con, $qdel);
		header('location: home.php');
	}



?>