<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$post_title = sanitize_input($_POST['post_title']);
$post_description = sanitize_input($_POST['post_description']);
$post_content = sanitize_input($_POST['post_content']);

$imgfile=$_FILES["profile_pic"]["name"];
$target_dir = '../../uploads/blogs/';
if (!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$errors=array();
if ($post_title == '') { $errors['post_title'] = "Post Title is Required!"; }
if ($post_description == '') { $errors['post_description'] = "Post Description is Required!"; }
if ($post_content == '') { $errors['post_content'] = "Post Content is Required!"; }

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
  	    
	    $sql = "INSERT INTO blog_posts (userId, postTitle, postDesc, postCont, postDate, postImage, ip) VALUES (:userId, :postTitle, :postDesc, :postCont, now(), :postImage, :ip)";
	    $stmt = $db_con->prepare($sql);
        $stmt->bindValue(':postTitle', $post_title, PDO::PARAM_STR);
	    $stmt->bindValue(':postDesc', $post_description, PDO::PARAM_STR);
	    $stmt->bindValue(':postCont', $post_content, PDO::PARAM_STR);
	    $stmt->bindValue(':postImage', $imgnewfile, PDO::PARAM_STR);
	    $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
	    $stmt->bindValue(':userId', $user_id, PDO::PARAM_INT);    
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