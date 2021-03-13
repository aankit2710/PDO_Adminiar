<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
  $id = $_POST['id'];
  $old_status = $_POST['status'];
  if($old_status == 0)
  {
    $status_1 = 1;
  }
  else
  {    
    $status_1 = 0;
  }
  try
  {
    $sql = "UPDATE blog_posts SET postStatus = :status WHERE userId = :user_id AND postId = :post_id";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':status', $status_1, PDO::PARAM_STR);
    $stmt->bindParam(':post_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $updated = $stmt->execute();
    if($updated)
    {
      $status = 'success';
        $msg = 'Status Updated Successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
    else
    {
      $status = 'error';
        $msg = 'Status Not Updated!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}
else
{
  show_404();
}
?>