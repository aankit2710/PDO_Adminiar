<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$postId = sanitize_input($_POST['postId']);
$post_title = sanitize_input($_POST['post_title']);
$post_description = sanitize_input($_POST['post_description']);
$post_content = sanitize_input($_POST['post_content']);

$imgfile=$_FILES["profile_pic"]["name"];

$target_dir = '../../uploads/blogs/';

$errors=array();
if ($post_title == '') { $errors['post_title'] = "Post Title is Required!"; }
if ($post_description == '') { $errors['post_description'] = "Post Description is Required!"; }
if ($post_content == '') { $errors['post_content'] = "Post Content is Required!"; }
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
    $stmt_edit = $db_con->prepare('SELECT postImage FROM blog_posts WHERE userId = :user_id AND postId = :postId');
    $stmt_edit->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt_edit->bindParam(':postId', $postId, PDO::PARAM_INT);
    $stmt_edit->execute();
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
    
	$ip = getClientIP();
  	try
  	{
  	    if($imgfile)
  	    {
      	    unlink($target_dir.$edit_row['postImage']);
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
           $imgnewfile = $edit_row['postImage']; // old image from database
        }
        
	    $sql = "UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont, postImage = :postImage, ip = :ip, postModified = now() WHERE userId = :user_id AND postId = :postId";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':postTitle', $post_title, PDO::PARAM_STR);
        $stmt->bindParam(':postDesc', $post_description, PDO::PARAM_STR);
        $stmt->bindParam(':postCont', $post_content, PDO::PARAM_STR);
	    $stmt->bindParam(':postImage', $imgnewfile, PDO::PARAM_STR);
        $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);   
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT); 
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