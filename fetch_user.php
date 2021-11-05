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
    header('Location: index.php');
}
$query = "
SELECT * FROM usertable 
WHERE u_id != '".$fetch_info['u_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <th width="55%">Tên người dùng</td>
  <th width="20%">Trạng thái</td>
  <th width="25%">Hành động</td>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($fetch_info['u_id'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="text-online">Online</span>';
 }
 else
 {
  $status = '<span class="text-offline">Offline</span>';
 }
 $output .= '
 <tr>
  <td><img src="image/default.png" style="width:25px; margin-right:10px">'.$row['name'].' '.count_unseen_message($row['u_id'], $fetch_info['u_id'], $connect).' '.fetch_is_type_status($row['u_id'], $connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['u_id'].'" data-tousername="'.$row['name'].'">Trò chuyện</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>

