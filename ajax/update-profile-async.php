<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$username = sanitize_input($_POST['username']);
$name = sanitize_input($_POST['name']);
$about_content1 = sanitize_input($_POST['aboutcontent1']);
$company_name = sanitize_input($_POST['company_name']);
$website = sanitize_input($_POST['website']);
$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/profile/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
//$errors=array('username','name','about_content1','company_name','website');
if ($username == '') { $errors['username'] = "Username is Required!"; }
if (!checkEmail($username)) { $errors['username'] = "Please Enter a Valid Email!"; }
if ($name == '') { $errors['name'] = "Name is Required!"; }
if (!checkInput($name)) { $errors['name'] = "Only letters allowed!"; }
//if ($about_content1 == '') { $errors['aboutcontent1'] = "About Me is Required!"; }
if ($company_name == '') { $errors['company_name'] = "Company Name is Required!"; }
if (!checkInput($company_name)) { $errors['company_name'] = "Only letters allowed!"; }
if ($website == '') { $errors['website'] = "Website is Required!"; }
if (!valid_url($website)) { $errors['website'] = "Please Enter a Valid Website!"; }

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
  		$stmt = $db_con->prepare("SELECT * FROM profile_details WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		extract($row);

		if($count == 1)
		{
			if($imgfile)
      	    {
          	    //unlink($target_dir.$row['profile_pic']);
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
               $imgnewfile = $row['profile_pic']; // old image from database
            }

	    	$sql = "UPDATE profile_details SET profile_name = :profile_name, about_me = :about_me, company_name = :company_name, website_name = :website_name, profile_pic = :profile_pic, ip = :ip, modified_date = now() WHERE user_id = :user_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':profile_name', $name, PDO::PARAM_STR);
	    	$stmt->bindParam(':about_me', $about_content1, PDO::PARAM_STR);
	    	$stmt->bindParam(':company_name', $company_name, PDO::PARAM_STR);
	    	$stmt->bindParam(':website_name', $website, PDO::PARAM_STR);
	    	$stmt->bindParam(':profile_pic', $imgnewfile, PDO::PARAM_STR);
	    	$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
	    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
	    	$updated = $stmt->execute();

	    	if($updated)
	    	{

		    	$sql = "UPDATE user_login SET username = :username WHERE user_id = :user_id";
		    	$stmt = $db_con->prepare($sql);
		    	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
		    	$stmt->execute();

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
	        if(!check_image($imgfile))
            {
                $errors['profile_pic'] = "Invalid format. Only jpg / jpeg/ png /gif format allowed!";
            }
            
			$imgnewfile = rename_image($imgfile);
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$target_dir.$imgnewfile);

	    	$sql = "INSERT INTO profile_details (user_id, profile_name, about_me, company_name, website_name,profile_pic,ip,created_date) VALUES (:user_id, :profile_name, :about_me, :company_name, :website_name, :profile_pic, :ip, now())";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindValue(':profile_name', $name, PDO::PARAM_STR);
	    	$stmt->bindValue(':about_me', $about_content1, PDO::PARAM_STR);
	    	$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
	    	$stmt->bindValue(':website_name', $website, PDO::PARAM_STR);
	    	$stmt->bindValue(':profile_pic', $imgnewfile, PDO::PARAM_STR);
	    	$stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
	    	$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);    
	    	$inserted = $stmt->execute();

	    	if($inserted)
	    	{
	    		$sql = "UPDATE user_login SET username = :username WHERE user_id = :user_id";
		    	$stmt = $db_con->prepare($sql);
		    	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
		    	$stmt->execute();

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