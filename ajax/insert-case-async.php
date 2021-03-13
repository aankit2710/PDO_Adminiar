<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$name = sanitize_input($_POST['name']);
$email = sanitize_input($_POST['email']);
$phone = sanitize_input($_POST['phone']);
$address = sanitize_input($_POST['address']);
$state = sanitize_input($_POST['state']);
$city = sanitize_input($_POST['city']);
$zipcode = sanitize_input($_POST['zipcode']);
$service = sanitize_input($_POST['service']);
$case_number = sanitize_input($_POST['case_number']);
$company_name = sanitize_input($_POST['company_name']);
$notes = sanitize_input($_POST['notes']);

$errors=array();
if ($name == '') { $errors['name'] = "Name is Required!"; }
if ($email == '') { $errors['email'] = "Email is Required!"; }
if ($phone == '') { $errors['phone'] = "Phone is Required!"; }
if ($address == '') { $errors['address'] = "Address is Required!"; }
if ($state == '') { $errors['state'] = "State is Required!"; }
if ($city == '') { $errors['city'] = "City is Required!"; }
if ($zipcode == '') { $errors['zipcode'] = "Zipcode is Required!"; }
if ($service == '') { $errors['service'] = "Service is Required!"; }
if ($case_number == '') { $errors['case_number'] = "Case Number is Required!"; }
if ($company_name == '') { $errors['company_name'] = "Company Name is Required!"; }
if ($notes == '') { $errors['notes'] = "Notes is Required!"; }

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
	    $sql = "INSERT INTO leads (user_id, name, email, phone, address, state, city, zipcode, service_id, case_number, company_name, notes, ip, created_date) 
	    VALUES (:user_id, :name, :email, :phone, :address, :state, :city, :zipcode, :service_id, :case_number, :company_name, :notes, :ip, now())";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
	    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
	    $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
	    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
	    $stmt->bindValue(':state', $state, PDO::PARAM_STR);
	    $stmt->bindValue(':city', $city, PDO::PARAM_STR);
	    $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
	    $stmt->bindValue(':service_id', $service, PDO::PARAM_STR);
	    $stmt->bindValue(':case_number', $case_number, PDO::PARAM_STR);
	    $stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
	    $stmt->bindValue(':notes', $notes, PDO::PARAM_STR);
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