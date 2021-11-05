<?php 
session_start();
require "connection.php";

	if(isset($_POST['post'])){
	if (!isset($_GET['id'])) {
		header('location: home.php');
	}else{

		$id=$_GET['id'];
        $post_title = mysqli_real_escape_string($con, $_POST['post_title']);
        $date = mysqli_real_escape_string($con, $_POST['date']);
        $post_content = mysqli_real_escape_string($con, $_POST['post_content']);
        $status = mysqli_real_escape_string($con, $_POST['status']);


        $insert_data = "INSERT INTO post (u_id, post_title, post_date, post_content, status)
                            values('$id', '$post_title', '$date', '$post_content', '$status')";

        $result = mysqli_query($con, $insert_data);
        if($result){
			header('location: home.php');
            }
            else
            {
                echo "<script>alert('Lỗi')</script>";;
            }

		}

	}

?>