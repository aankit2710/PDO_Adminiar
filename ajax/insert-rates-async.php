<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$service = sanitize_input($_POST['service']);
$title = sanitize_input($_POST['title']);
$price = sanitize_input($_POST['price']);
$duration = sanitize_input($_POST['duration']);

$errors=array();
if ($service == '') { $errors['service'] = "Service is Required!"; }
if ($title == '') { $errors['title'] = "Title is Required!"; }
if ($price == '') { $errors['price'] = "Price is Required!"; }
//if ($duration == '') { $errors['duration'] = "Type is Required!"; }

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
	    $sql = "INSERT INTO rates (user_id, service_id, title, rate, duration, ip, created_date) 
	    VALUES (:user_id, :service_id, :title, :rate, :duration, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':service_id', $service, PDO::PARAM_STR);
	    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
	    $stmt->bindValue(':rate', $price, PDO::PARAM_STR);
	    $stmt->bindValue(':duration', $duration, PDO::PARAM_STR);
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