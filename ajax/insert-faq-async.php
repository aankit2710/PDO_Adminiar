<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
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
	    $sql = "INSERT INTO faqs (user_id, heading, content ,ip,created_date) VALUES (:user_id, :heading, :content, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':heading', $heading, PDO::PARAM_STR);
	    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
	    $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
	    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);    
	    $inserted = $stmt->execute();
    	if($inserted)
    	{
    		$status = 'success';
			$msg = 'Inserted Successfully!';
			exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    	}
    	else
    	{
    		$status = 'error';
			$msg = 'Not Inserted!';
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