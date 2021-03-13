<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$page_name = sanitize_input($_POST['service_name']);
$description = sanitize_input($_POST['description']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/pages/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
if ($page_name == '') { $errors['service_name'] = "Page Name is Required!"; }
if ($description == '') { $errors['description'] = "Description is Required!"; }

if($imgFile!='')
{
if(!check_image($imgfile))
{
$errors['profile_pic'] = "Invalid format. Only jpg / jpeg/ png /gif format allowed!";
}
}
// else
// {
// $errors['profile_pic'] = "Profile Pic is Required!";
// }

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
  	    $imgnewfile = rename_image($imgfile);
  	    move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$target_dir.$imgnewfile);
  	    
	    $sql = "INSERT INTO pages (user_id, page_name, content, page_image, ip, created_date) 
	    VALUES (:user_id, :page_name, :content, :page_image, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':page_name', $page_name, PDO::PARAM_STR);
	    $stmt->bindValue(':content', $description, PDO::PARAM_STR);
	    $stmt->bindValue(':page_image', $imgnewfile, PDO::PARAM_STR);
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