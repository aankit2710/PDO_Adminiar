<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$review_id = sanitize_input($_POST['review_id']);
$c_name = sanitize_input($_POST['c_name']);
$heading = sanitize_input($_POST['heading']);
$c_review = sanitize_input($_POST['c_review']);
$score = sanitize_input($_POST['score']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/reviews/';

$errors=array();
if ($c_name == '') { $errors['c_name'] = "Customer Name is Required!"; }
if ($heading == '') { $errors['heading'] = "Heading is Required!"; }
if ($c_review == '') { $errors['c_review'] = "Review is Required!"; }
//if ($score == '') { $errors['score'] = "Rating is Required!"; }
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
    $stmt_edit = $db_con->prepare('SELECT review_image FROM reviews_detail WHERE user_id = :user_id AND review_id = :review_id');
    $stmt_edit->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt_edit->bindParam(':review_id', $review_id, PDO::PARAM_INT);
    $stmt_edit->execute();
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
    
	$ip = getClientIP();
  	try
  	{
  	    if($imgfile)
  	    {
      	    unlink($target_dir.$edit_row['review_image']);
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
           $imgnewfile = $edit_row['review_image']; // old image from database
        }
        
	    $sql = "UPDATE reviews_detail SET c_name = :c_name, heading = :heading, c_review = :c_review, rating =:rating, ip = :ip, modified_date = now(), review_image = :review_image WHERE user_id = :user_id AND review_id = :review_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':c_name', $c_name, PDO::PARAM_STR);
      $stmt->bindParam(':heading', $heading, PDO::PARAM_STR);
      $stmt->bindParam(':c_review', $c_review, PDO::PARAM_STR);
      $stmt->bindParam(':rating', $score, PDO::PARAM_INT);
      $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);   
      $stmt->bindParam(':review_id', $review_id, PDO::PARAM_INT); 
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
	    $stmt->bindParam(':review_image', $imgnewfile, PDO::PARAM_STR);  
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