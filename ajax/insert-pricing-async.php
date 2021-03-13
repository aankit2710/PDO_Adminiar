<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$category = sanitize_input($_POST['category']);
$price = sanitize_input($_POST['price']);
$prog = sanitize_input($_POST['program']);
$description = sanitize_input($_POST['description']);
$time_period = sanitize_input($_POST['time_period']);

$errors=array();

if ($category == '') { $errors['category'] = "Select a Category!"; }
if ($prog == '') { $errors['program'] = "Select a Program!"; }
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
	    $sql = "INSERT INTO  pricing (user_id, service_id, category, price, content , ip, created_date, time_period) VALUES (:user_id, :service_id, :category, :price, :content, :ip, now(), :time_period)";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':service_id', $prog, PDO::PARAM_INT);
	    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
	    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
	    $stmt->bindValue(':content', $description, PDO::PARAM_STR);
	    $stmt->bindValue(':time_period', $time_period, PDO::PARAM_STR);
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