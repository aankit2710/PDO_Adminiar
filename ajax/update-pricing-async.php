<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$pricing_id = sanitize_input($_POST['pricing_id']);
$program = sanitize_input($_POST['program']);
$category = sanitize_input($_POST['category']);
$prog = sanitize_input($_POST['prog']);
$price = sanitize_input($_POST['price']);
$description = sanitize_input($_POST['description']);
$time_period = sanitize_input($_POST['time_period']);

$errors=array();
if ($program == '') { $errors['program'] = "Select a Program!"; }
if ($category == '') { $errors['category'] = "Select a Category!"; }
if ($prog == '') { $errors['prog'] = "Select a Program!"; }
if ($price == '') { $errors['price'] = "Price is Required!"; }
if ($description == '') { $errors['description'] = "Description is Required!"; }
if ($time_period == '') { $errors['time_period'] = "Description is Required!"; }

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
	    $sql = "UPDATE pricing SET service_id = :service_id, content = :content, category = :category, prog = :prog, price = :price, ip = :ip, time_period = :time_period, modified_date = now() WHERE user_id = :user_id AND pricing_id = :pricing_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':service_id', $program, PDO::PARAM_STR);
	    $stmt->bindParam(':content', $description, PDO::PARAM_STR);
	    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
	    $stmt->bindValue(':prog', $prog, PDO::PARAM_STR);
	    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
	    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
	    $stmt->bindValue(':time_period', $time_period, PDO::PARAM_STR);
	    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	    $stmt->bindParam(':pricing_id', $pricing_id, PDO::PARAM_INT);
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