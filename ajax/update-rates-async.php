<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$rate_id = sanitize_input($_POST['rate_id']);
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
	    $sql = "UPDATE rates SET service_id = :service_id, title = :title, rate = :rate, duration =:duration, ip = :ip, modified_date = now() WHERE user_id = :user_id AND rate_id = :rate_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':service_id', $service, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':rate', $price, PDO::PARAM_STR);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
        $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);   
        $stmt->bindParam(':rate_id', $rate_id, PDO::PARAM_INT); 
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