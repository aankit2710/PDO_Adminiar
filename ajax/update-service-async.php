<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$service_id = sanitize_input($_POST['service_id']);
$service_name = sanitize_input($_POST['service_name']);
$category_name = sanitize_input($_POST['category_name']);
$program_name = sanitize_input($_POST['program_name']);
$description = sanitize_input($_POST['description']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/our_services/';

$errors=array();
if ($service_name == '') { $errors['service_name'] = "Service Name is Required!"; }
if ($category_name == '') { $errors['category_name'] = "Category Name is Required!"; }
if ($program_name == '') { $errors['$program_name'] = "Program Name is Required!"; }
if ($description == '') { $errors['description'] = "Description is Required!"; }

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
    
    $stmt_edit = $db_con->prepare('SELECT service_image FROM services WHERE user_id = :user_id AND service_id = :service_id');
    $stmt_edit->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt_edit->bindParam(':service_id', $service_id, PDO::PARAM_INT);
    $stmt_edit->execute();
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  
	$ip = getClientIP();
  	try
  	{
  	    if($imgfile)
  	    {
      	    unlink($target_dir.$edit_row['service_image']);
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
           $imgnewfile = $edit_row['service_image']; // old image from database
        }
  	    
	    $sql = "UPDATE services SET service_name = :service_name, category_name = :category_name, program_name = :program_name, content = :content, service_image = :service_image, ip = :ip, modified_date = now() WHERE user_id = :user_id AND service_id = :service_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':service_name', $service_name, PDO::PARAM_STR);
	    $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
	    $stmt->bindParam(':program_name', $program_name, PDO::PARAM_STR);
	    $stmt->bindParam(':content', $description, PDO::PARAM_STR);
	    $stmt->bindParam(':service_image', $imgnewfile, PDO::PARAM_STR);
	    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
	    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	    $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
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