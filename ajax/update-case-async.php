<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
if(is_ajax_request())
{
$lead_id = sanitize_input($_POST['lead_id']);
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
	    $sql = "UPDATE leads SET name = :name, email = :email, phone = :phone, address = :address, state = :state, city = :city,
	    zipcode = :zipcode, service_id = :service_id, case_number = :case_number, company_name = :company_name,
	    notes = :notes, ip = :ip, modified_date = now() WHERE user_id = :user_id AND lead_id = :lead_id";
	    $stmt = $db_con->prepare($sql);
	    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
	    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
	    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
	    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
	    $stmt->bindParam(':city', $city, PDO::PARAM_STR);
	    $stmt->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
	    $stmt->bindParam(':service_id', $service, PDO::PARAM_STR);
	    $stmt->bindParam(':case_number', $case_number, PDO::PARAM_STR);
	    $stmt->bindParam(':company_name', $company_name, PDO::PARAM_STR);
	    $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
	    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);   
	    $stmt->bindParam(':lead_id', $user_id, PDO::PARAM_INT); 
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