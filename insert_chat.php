<?php
require_once "controllerUserData.php";

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
    $data = array(
     ':to_user_id'  => $_POST['to_user_id'],
     ':from_user_id'  => $fetch_info['id'],
     ':chat_message'  => $_POST['chat_message'],
     ':status'   => '1'
    );

    $query = "
    INSERT INTO chatting 
    (to_user_id, from_user_id, chat_message, status) 
    VALUES (:to_user_id, :from_user_id, :chat_message, :status)
    ";

    $statement = $connect->prepare($query);

    if($statement->execute($data))
    {
     echo fetch_user_chat_history($fetch_info['id'], $_POST['to_user_id'], $connect);
    }

    ?>