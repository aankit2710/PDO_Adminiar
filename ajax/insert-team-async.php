<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$name = sanitize_input($_POST['name']);
$email = sanitize_input($_POST['email']);
$phone = sanitize_input($_POST['phone']);
$designation = sanitize_input($_POST['designation']);
$description = sanitize_input($_POST['description']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/team/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
if ($name == '') { $errors['name'] = "Name is Required!"; }
// if ($email == '') { $errors['email'] = "Email is Required!"; }
// if ($phone == '') { $errors['phone'] = "Phone is Required!"; }
if ($designation == '') { $errors['designation'] = "Designation is Required!"; }

if($imgfile!='')
{
if(!check_image($imgfile))
{
$errors['profile_pic'] = "Invalid format. Only jpg / jpeg/ png /gif format allowed!";
}
}
else
{
$errors['profile_pic'] = "Profile Pic is Required!";
}

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
  	    
	    $sql = "INSERT INTO our_team (user_id, member_name, member_email, member_phone, member_designation, member_pic, description, ip, created_date) 
	    VALUES (:user_id, :member_name, :member_email, :member_phone, :member_designation, :member_pic, :description, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':member_name', $name, PDO::PARAM_STR);
	    $stmt->bindValue(':member_email', $email, PDO::PARAM_STR);
	    $stmt->bindValue(':member_phone', $phone, PDO::PARAM_STR);
	    $stmt->bindValue(':member_designation', $designation, PDO::PARAM_STR);
	    $stmt->bindValue(':member_pic', $imgnewfile, PDO::PARAM_STR);
	    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
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