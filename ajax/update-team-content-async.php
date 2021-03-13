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
  		$stmt = $db_con->prepare("SELECT * FROM our_team_content WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		if($count == 1)
		{

	    	$sql = "UPDATE our_team_content SET heading = :heading, content = :content, ip = :ip, modified_date = now() WHERE user_id = :user_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':heading', $heading, PDO::PARAM_STR);
	    	$stmt->bindParam(':content', $content, PDO::PARAM_STR);
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
	    	$sql = "INSERT INTO our_team_content (user_id, heading, content ,ip,created_date) VALUES (:user_id, :heading, :content, :ip, now())";
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