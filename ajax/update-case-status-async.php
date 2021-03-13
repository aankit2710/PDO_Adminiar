<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
  $id = $_POST['id'];
  $status = $_POST['status'];
  try
  {
    $sql = "UPDATE leads SET status = :status WHERE user_id = :user_id AND lead_id = :lead_id";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':lead_id', $id, PDO::PARAM_INT);
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