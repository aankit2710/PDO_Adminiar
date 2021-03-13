<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(1)
{
$service_name = sanitize_input($_POST['service_name']);
$category_name = sanitize_input($_POST['category_name']);
$program_name = sanitize_input($_POST['program_name']);
$description = sanitize_input($_POST['description']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/our_services/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
if ($service_name == '') { $errors['service_name'] = "Service Name is Required!"; }
if ($category_name == '') { $errors['category_name'] = "Category Name is Required!"; }
if ($program_name == '') { $errors['$program_name'] = "Program Name is Required!"; }
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
  	    
	    $sql = "INSERT INTO services (user_id, category_name, program_name, service_name, content, service_image, ip, created_date) 
	    VALUES (:user_id, :category_name, :program_name, :service_name, :content, :service_image, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':category_name', $category_name, PDO::PARAM_STR);
	    $stmt->bindValue(':program_name', $program_name, PDO::PARAM_STR);
	    $stmt->bindValue(':service_name', $service_name, PDO::PARAM_STR);
	    $stmt->bindValue(':content', $description, PDO::PARAM_STR);
	    $stmt->bindValue(':service_image', $imgnewfile, PDO::PARAM_STR);
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

if(!(is_ajax_request())){
    header("Location: ../../instructor/add_service.php");
}
}
else
{
	show_404();
}
?>