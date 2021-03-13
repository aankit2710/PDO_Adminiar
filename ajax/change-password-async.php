<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$old_pass = sanitize_input($_POST['old_pass']);
$new_pass = sanitize_input($_POST['new_pass']);

$errors=array();
if ($old_pass == '') { $errors['old_pass'] = "Password is Required!"; }
if ($new_pass == '') { $errors['new_pass'] = "Password is Required!"; }

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
      	    $stmt = $db_con->prepare("SELECT * FROM user_login WHERE user_id=:user_id");  
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            extract($row);
            
            // if($old_pass !='')
            // {
            //     if($old_pass = md5($row['password'])) { $errors['old_pass'] = "Old Password is Not Correct!"; }
            // }
            
  	        $password = md5($new_pass);
  		    $sql = "UPDATE user_login SET password = :password WHERE user_id = :user_id";
            $stmt = $db_con->prepare($sql);
		    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
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