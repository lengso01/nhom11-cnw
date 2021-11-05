<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false)
{
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql)
    {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified")
        {
            if ($code != 0)
            {
                header('Location: reset-code.php');
            }
        }
        else
        {
            header('Location: user-otp.php');
        }
    }
}
else
{
    header('Location: index.php');
}
?>
<?php require_once "base/header.php";
        require_once "base/menu-main.php";

 ?>

<main>
<div class="container">
    <div class="row">
         <div class="col-xl-6">
            <div class="card messenger">
                    <div class="card-body">
                            <div class="card-title h5 mb-3">Hộp thư</div>
                            <div id="user_details"></div>
                            <div id="user_model_details"></div>

                        </div>
                    </div> <!-- end card-->
            </div>
            <div class="col-xl-6">
                <div class="card group-messenger">
                    <div class="card-body">
                    <div class="card-title h5 mb-3">Nhóm chat</div>
                    <div class="list-group">
                        <div id="group_chat_dialog" title="Group Chat Window">
                         <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

                         </div>
                         <div class="form-group">
                          <textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>
                         </div>
                         <div class="form-group" align="right">
                          <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
                         </div>
                        </div>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Herbert Stewart<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                                    <p class="mb-0 font-13 text-muted">Co Founder</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Terry Mouser</h5>
                                    <p class="mb-0 font-13 text-muted">Web Designer</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Adam Barney</h5>
                                    <p class="mb-0 font-13 text-muted">PHP Developer</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">Michal Chang</h5>
                                    <p class="mb-0 font-13 text-muted">UI/UX Designer</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    </main>
<script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:200px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" class="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 });



 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });

 $(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });
 
});  
</script>
<?php require_once "base/footer.php"; ?>
