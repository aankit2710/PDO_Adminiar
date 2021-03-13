<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$facebook = sanitize_input($_POST['facebook']);
$twitter = sanitize_input($_POST['twitter']);
$pinterest = sanitize_input($_POST['pinterest']);
$linkedin = sanitize_input($_POST['linkedin']);
$instagram = sanitize_input($_POST['instagram']);

$errors=array();
if ($facebook == '') { $errors['facebook'] = "Facebook is Required!"; }
if ($twitter == '') { $errors['twitter'] = "Twitter is Required!"; }
if ($pinterest == '') { $errors['pinterest'] = "Pinterest is Required!"; }
if ($linkedin == '') { $errors['linkedin'] = "Linkedin is Required!"; }
if ($instagram == '') { $errors['instagram'] = "Instagram is Required!"; }
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
  		$stmt = $db_con->prepare("SELECT * FROM social_links WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		if($count == 1)
		{

	    	$sql = "UPDATE social_links SET facebook = :facebook, twitter = :twitter, pinterest = :pinterest, linkedin = :linkedin, instagram = :instagram, ip = :ip, modified_date = now() WHERE user_id = :user_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR);
	    	$stmt->bindParam(':twitter', $twitter, PDO::PARAM_STR);
	    	$stmt->bindParam(':pinterest', $pinterest, PDO::PARAM_STR);
	    	$stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
	    	$stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR);
	    	$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
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
	    else
	    {
	    	$sql = "INSERT INTO social_links (user_id, facebook, twitter, pinterest, linkedin, instagram, ip, created_date) VALUES (:user_id, :facebook, :twitter, :pinterest, :linkedin, :instagram, :ip, now())";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindValue(':facebook', $facebook, PDO::PARAM_STR);
	    	$stmt->bindValue(':twitter', $twitter, PDO::PARAM_STR);
	    	$stmt->bindValue(':pinterest', $pinterest, PDO::PARAM_STR);
	    	$stmt->bindValue(':linkedin', $linkedin, PDO::PARAM_STR);
	    	$stmt->bindValue(':instagram', $instagram, PDO::PARAM_STR);
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