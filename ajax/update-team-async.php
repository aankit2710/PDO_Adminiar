<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$member_id = sanitize_input($_POST['member_id']);
$name = sanitize_input($_POST['name']);
$email = sanitize_input($_POST['email']);
$phone = sanitize_input($_POST['phone']);
$designation = sanitize_input($_POST['designation']);
$description = sanitize_input($_POST['description']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/team/';

$errors=array();
if ($name == '') { $errors['name'] = "Name is Required!"; }
// if ($email == '') { $errors['email'] = "Email is Required!"; }
// if ($phone == '') { $errors['phone'] = "Phone is Required!"; }
if ($designation == '') { $errors['designation'] = "Designation is Required!"; }

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
    
    $stmt_edit = $db_con->prepare('SELECT member_pic FROM our_team WHERE user_id = :user_id AND member_id = :member_id');
    $stmt_edit->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt_edit->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt_edit->execute();
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  
	$ip = getClientIP();
  	try
  	{
  	    if($imgfile)
  	    {
      	    unlink($target_dir.$edit_row['member_pic']);
            if(!check_image($imgfile))
            {
            $errors['profile_pic'] = "Invalid format. Only jpg / jpeg/ png /gif format allowed!";
            }
      	    $imgnewfile = rename_image($imgfile);
      	    move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$target_dir.$imgnewfile);
  	    }
  	    else
        {
           // if no image selected the old image remain as it is.
           $imgnewfile = $edit_row['member_pic']; // old image from database
        }
  	    
	    $sql = "UPDATE our_team SET member_name = :member_name, member_email = :member_email, member_phone = :member_phone, member_designation = :member_designation,
	    member_pic = :member_pic, description = :description, ip = :ip, modified_date = now() WHERE user_id = :user_id AND member_id = :member_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':member_name', $name, PDO::PARAM_STR);
	    $stmt->bindParam(':member_email', $email, PDO::PARAM_STR);
	    $stmt->bindParam(':member_phone', $phone, PDO::PARAM_STR);
	    $stmt->bindParam(':member_designation', $designation, PDO::PARAM_STR);
	    $stmt->bindParam(':member_pic', $imgnewfile, PDO::PARAM_STR);
	    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
	    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
	    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
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