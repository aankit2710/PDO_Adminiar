<?php
session_start();
$user_id = trim($_SESSION['user_id']);
$is_admin = trim($_SESSION['is_admin']);
if(empty($user_id))
{
	header("location:index.php");
}

require_once('db_config.php');
try
{
    $stmt = $db_con->prepare("SELECT * FROM profile_details WHERE user_id=:user_id");  
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    
    foreach($row as $data)
    {
        $admin_name = $data['profile_name'];
        $admin_pic = $data['profile_pic'];
        $about_me = $data['about_me'];
        $company_name = $data['company_name'];
        $website_name = $data['website_name'];
    }
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>