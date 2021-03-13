<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
  $id = $_POST['id'];
  $txt = $_POST['txt'];
  $caption = $_POST['caption'];
  if($txt == "caption")
  {

    try
    {
      $sql = "UPDATE slider_images SET caption = :caption, modified = now() WHERE user_id = :user_id AND slider_id = :slider_id";
      $stmt = $db_con->prepare($sql);
      $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
      $stmt->bindParam(':slider_id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $updated = $stmt->execute();
      if($updated)
      {
        $status = 'success';
        $msg = 'Updated Successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
      else
      {
        $status = 'error';
        $msg = 'Not Updated!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  elseif($txt == "ext_txt")
  {

    try
    {
      $sql = "UPDATE slider_images SET ext_txt = :caption, modified = now() WHERE user_id = :user_id AND slider_id = :slider_id";
      $stmt = $db_con->prepare($sql);
      $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
      $stmt->bindParam(':slider_id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $updated = $stmt->execute();
      if($updated)
      {
        $status = 'success';
        $msg = 'Updated Successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
      else
      {
        $status = 'error';
        $msg = 'Not Updated!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  elseif($txt == "ext_txt_line")
  {

    try
    {
      $sql = "UPDATE slider_images SET ext_txt_line = :caption, modified = now() WHERE user_id = :user_id AND slider_id = :slider_id";
      $stmt = $db_con->prepare($sql);
      $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
      $stmt->bindParam(':slider_id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $updated = $stmt->execute();
      if($updated)
      {
        $status = 'success';
        $msg = 'Updated Successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
      else
      {
        $status = 'error';
        $msg = 'Not Updated!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
}
else
{
  show_404();
}
?>