<?php 
session_start();
require "connection.php";

	if(isset($_POST['confirm'])){
	if (!isset($_GET['id'])) {
		header('location: home.php');
	}else{

		$id=$_GET['id'];
        $sche_content = mysqli_real_escape_string($con, $_POST['sche_content']);
        $sche_address = mysqli_real_escape_string($con, $_POST['sche_address']);
        $sche_date = mysqli_real_escape_string($con, $_POST['sche_date']);
        $sche_time_start = mysqli_real_escape_string($con, $_POST['sche_time_start']);
        $sche_time_end = mysqli_real_escape_string($con, $_POST['sche_time_end']);
        $status = mysqli_real_escape_string($con, $_POST['status']);


        $insert_data = "INSERT INTO schedule (u_id, sche_content, sche_address, sche_date,sche_time_start,sche_time_end, status)
                            values('$id', '$sche_content', '$sche_address', '$sche_date','$sche_time_start','$sche_time_end' ,'$status')";

        $result = mysqli_query($con, $insert_data);
        if($result){
			header('location: appointment.php');
            }
            else
            {
                echo "<script>alert('Lỗi')</script>";;
            }

		}

	}

?>