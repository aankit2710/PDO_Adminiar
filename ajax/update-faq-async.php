<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$faq_id = sanitize_input($_POST['faq_id']);
$heading = sanitize_input($_POST['heading']);
$content = sanitize_input($_POST['content']);

$errors=array();
if ($heading == '') { $errors['heading'] = "Heading is Required!"; }
if ($content == '') { $errors['content'] = "Content is Required!"; }
if (count($errors) > 0)
{
foreach ($errors as $field_name => $message)
{    
$data['#er'.$field_name] = $message;
}
$status = 'error';
$msg = 'Invalid request!';
exit(json_encode(array('status'=>$status,'msg'=>$msg, 'data'=>$data)));
}
else
{
	$ip = getClientIP();
  	try
  	{
	    $sql = "UPDATE faqs SET heading = :heading, content = :content, ip = :ip, modified_date = now() WHERE user_id = :user_id AND faq_id = :faq_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':heading', $heading, PDO::PARAM_STR);
	    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
	    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
	    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $stmt->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);   
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
  	catch(PDOException $e){
    	echo $e->getMessage();
  	}
}
}
else
{
	show_404();
}
?>