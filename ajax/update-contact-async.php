<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{

$phone = sanitize_input($_POST['phone']);
$extra_phone = sanitize_input($_POST['extra_phone']);
$email = sanitize_input($_POST['email']);
$extra_email = sanitize_input($_POST['extra_email']);
$address = sanitize_input($_POST['address']);
$lattitude = sanitize_input($_POST['lattitude']);
$longitude = sanitize_input($_POST['longitude']);
$content = sanitize_input($_POST['content']);
$fax = sanitize_input($_POST['fax']);

$errors=array();
if ($phone == '') { $errors['phone'] = "Phone Number is Required!"; }
if ($email == '') { $errors['email'] = "Email Address is Required!"; }
if ($address == '') { $errors['address'] = "Address is Required!"; }
if ($lattitude == '') { $errors['lattitude'] = "Lattitude is Required!"; }
if ($longitude == '') { $errors['longitude'] = "Longitude is Required!"; }
if ($content == '') { $errors['content'] = "Content is Required!"; }
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
  		$stmt = $db_con->prepare("SELECT * FROM contact_details WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		if($count == 1)
		{

	    	$sql = "UPDATE contact_details SET fax = :fax, phone_number = :phone_number, extra_phone_number = :extra_phone_number, email_address = :email_address, extra_email_address = :extra_email_address, address = :address, lattitude = :lattitude, longitude = :longitude, content = :content, ip = :ip, modified_date = now() WHERE user_id = :user_id";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindParam(':phone_number', $phone, PDO::PARAM_STR);
	    	$stmt->bindParam(':extra_phone_number', $extra_phone, PDO::PARAM_STR);
	    	$stmt->bindParam(':email_address', $email, PDO::PARAM_STR);
	    	$stmt->bindParam(':extra_email_address', $extra_email, PDO::PARAM_STR);
	    	$stmt->bindParam(':address', $address, PDO::PARAM_STR);
	    	$stmt->bindParam(':lattitude', $lattitude, PDO::PARAM_STR);
	    	$stmt->bindParam(':longitude', $longitude, PDO::PARAM_STR);
	    	$stmt->bindParam(':content', $content, PDO::PARAM_STR);
	    	$stmt->bindParam(':fax', $fax, PDO::PARAM_STR);
	    	$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
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
	    else
	    {
	    	$sql = "INSERT INTO contact_details (user_id, fax, phone_number, extra_phone_number, email_address, extra_email_address, address, lattitude, longitude, content, ip, created_date) VALUES (:user_id, :fax, :phone_number, :extra_phone_number, :email_address, :extra_email_address, :address, :lattitude, :longitude, :content, :ip, now())";
	    	$stmt = $db_con->prepare($sql);
	    	$stmt->bindValue(':phone_number', $phone, PDO::PARAM_STR);
	    	$stmt->bindValue(':extra_phone_number', $extra_phone, PDO::PARAM_STR);
	    	$stmt->bindValue(':email_address', $email, PDO::PARAM_STR);
	    	$stmt->bindValue(':extra_email_address', $extra_email, PDO::PARAM_STR);
	    	$stmt->bindValue(':address', $address, PDO::PARAM_STR);
	    	$stmt->bindValue(':lattitude', $lattitude, PDO::PARAM_STR);
	    	$stmt->bindValue(':longitude', $longitude, PDO::PARAM_STR);
	    	$stmt->bindValue(':content', $content, PDO::PARAM_STR);
	    	$stmt->bindValue(':fax', $fax, PDO::PARAM_STR);
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