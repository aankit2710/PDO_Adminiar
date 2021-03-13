<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
//get images id and generate ids array
$idArray = explode(",",$_POST['ids']);
//update images order
$count = 1;
$ip = getClientIP();
foreach ($idArray as $id)
{
    $sql = "UPDATE slider_images SET img_order = :img_order, ip = :ip, modified = now() WHERE user_id = :user_id AND slider_id = :id";
	$stmt = $db_con->prepare($sql);
	$stmt->bindParam(':img_order', $count, PDO::PARAM_STR);
	$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);  
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
	$updated = $stmt->execute();	
    $count ++;
}
echo '1';
?>