<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$service_id = sanitize_input($_POST['service_id']);
$service_name = sanitize_input($_POST['service_name']);
$description = sanitize_input($_POST['description']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/pages/';

$errors=array();
if ($service_name == '') { $errors['service_name'] = "Page Name is Required!"; }
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
    
    $stmt_edit = $db_con->prepare('SELECT page_image FROM pages WHERE user_id = :user_id AND page_id = :page_id');
    $stmt_edit->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt_edit->bindParam(':page_id', $service_id, PDO::PARAM_INT);
    $stmt_edit->execute();
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  
	$ip = getClientIP();
  	try
  	{
  	    if($imgfile)
  	    {
      	    unlink($target_dir.$edit_row['page_image']);
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
           $imgnewfile = $edit_row['page_image']; // old image from database
        }
  	    
	    $sql = "UPDATE pages SET page_name = :page_name, content = :content, page_image = :page_image, ip = :ip, modified_date = now() WHERE user_id = :user_id AND page_id = :page_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':page_name', $service_name, PDO::PARAM_STR);
	    $stmt->bindParam(':content', $description, PDO::PARAM_STR);
	    $stmt->bindParam(':page_image', $imgnewfile, PDO::PARAM_STR);
	    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
	    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	    $stmt->bindParam(':page_id', $service_id, PDO::PARAM_INT);
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