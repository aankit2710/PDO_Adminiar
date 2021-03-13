<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$c_name = sanitize_input($_POST['c_name']);
$heading = sanitize_input($_POST['heading']);
$c_review = sanitize_input($_POST['c_review']);
$score = sanitize_input($_POST['score']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/reviews/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
if ($c_name == '') { $errors['c_name'] = "Customer Name is Required!"; }
if ($heading == '') { $errors['heading'] = "Heading is Required!"; }
if ($c_review == '') { $errors['c_review'] = "Review is Required!"; }
//if ($score == '') { $errors['score'] = "Rating is Required!"; }

if($imgfile!='')
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
  	    
	    $sql = "INSERT INTO reviews_detail (user_id, c_name, heading, c_review, rating, ip, created_date, review_image) VALUES (:user_id, :c_name, :heading, :c_review, :rating, :ip, now(), :review_image)";
	    $stmt = $db_con->prepare($sql);
      $stmt->bindValue(':c_name', $c_name, PDO::PARAM_STR);
	    $stmt->bindValue(':heading', $heading, PDO::PARAM_STR);
	    $stmt->bindValue(':c_review', $c_review, PDO::PARAM_STR);
      $stmt->bindValue(':rating', $score, PDO::PARAM_INT);
	    $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
	    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);  
	    $stmt->bindValue(':review_image', $imgnewfile, PDO::PARAM_STR);  
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