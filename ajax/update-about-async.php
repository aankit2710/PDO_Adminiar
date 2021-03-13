<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$about_heading1 = sanitize_input($_POST['about_heading1']);
$about_content1 = sanitize_input($_POST['about_content1']);
$about_heading2 = sanitize_input($_POST['about_heading2']);
$about_content2 = sanitize_input($_POST['about_content2']);
$about_heading3 = sanitize_input($_POST['about_heading3']);
$about_content3 = sanitize_input($_POST['about_content3']);

$errors=array();
if ($about_heading1 == '') { $errors['about_heading1'] = "About Heading 1 is Required!"; }
if ($about_content1 == '') { $errors['about_content1'] = "About Content 1 is Required!"; }
// if ($about_heading2 == '') { $errors['about_heading2'] = "About Heading 2 is Required!"; }
// if ($about_content2 == '') { $errors['about_content2'] = "About Content 2 is Required!"; }
// if ($about_heading3 == '') { $errors['about_heading3'] = "About Heading 3 is Required!"; }
// if ($about_content3 == '') { $errors['about_content3'] = "About Content 3 is Required!"; }
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
  		$stmt = $db_con->prepare("SELECT * FROM about_details WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		if($count == 1)
		{

	    	$sql = "UPDATE about_details SET about_heading1 = :about_heading1, about_content1 = :about_content1, about_heading2 = :about_heading2, about_content2 = :about_content2, about_heading3 = :about_heading3, about_content3 = :about_content3, ip = :ip, modified_date = now() WHERE user_id = :user_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':about_heading1', $about_heading1, PDO::PARAM_STR);
	    	$stmt->bindParam(':about_content1', $about_content1, PDO::PARAM_STR);
	    	$stmt->bindParam(':about_heading2', $about_heading2, PDO::PARAM_STR);
	    	$stmt->bindParam(':about_content2', $about_content2, PDO::PARAM_STR);
	    	$stmt->bindParam(':about_heading3', $about_heading3, PDO::PARAM_STR);
	    	$stmt->bindParam(':about_content3', $about_content3, PDO::PARAM_STR);
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
	    	$sql = "INSERT INTO about_details (user_id, about_heading1, about_content1, about_heading2, about_content2,about_heading3, about_content3,ip,created_date) VALUES (:user_id, :about_heading1, :about_content1, :about_heading2, :about_content2, :about_heading3, :about_content3, :ip, now())";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindValue(':about_heading1', $about_heading1, PDO::PARAM_STR);
	    	$stmt->bindValue(':about_content1', $about_content1, PDO::PARAM_STR);
	    	$stmt->bindValue(':about_heading2', $about_heading2, PDO::PARAM_STR);
	    	$stmt->bindValue(':about_content2', $about_content2, PDO::PARAM_STR);
	    	$stmt->bindValue(':about_heading3', $about_heading3, PDO::PARAM_STR);
	    	$stmt->bindValue(':about_content3', $about_content3, PDO::PARAM_STR);
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