<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
require("../../mail_data/class.phpmailer.php");
$mail = new PHPMailer();

if(is_ajax_request())
{
$id = $_POST['id'];
$status_new = $_POST['status'];
    
$stmt = $db_con->prepare("SELECT * FROM students WHERE student_id=:student_id");  
$stmt->bindParam(':student_id', $id, PDO::PARAM_INT);   
$stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetchAll();
foreach ($row as $key => $data)
{
$first_name = $data['first_name'];
$last_name = $data['last_name'];
$email = $data['email_address'];
$text_password = $data['text_password'];
}

$mail->IsSMTP();
$mail->Host = "localhost";
$mail->SMTPAuth = false;
$mail->SMTPSecure = "false";
$mail->Port = 25;
$mail->Username = "enquiry@nibbanah.com";
$mail->Password = "lc)fYqqE7w8*";
$mail->From = "enquiry@nibbanah.com";
$mail->FromName = "United Health Institue";
$mail->AddAddress($email);
//$mail->addCC("lannyhutchison@gmail.com");
//$mail->addBCC("websitesinquiry@gmail.com");
//$mail->AddReplyTo("mail@mail.com");
$mail->IsHTML(true);
$mail->Subject = "United Health Institue";

$message_approve = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Welcome to United Health Institue!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Hi "'.$prefix.' '.$first_name.' '.$last_name.'"</h2>
Congratulations! Your profile has now been Unblocked.
<br />
<br />
Please reach out to us if you have any questions or need additional assistance. <br />
The United Health Institue Team
</td>
</tr>
</table>
</div>
</body>
</html>';

$message_decline = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Welcome to United Health Institue!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Hi "'.$prefix.' '.$first_name.' '.$last_name.'"</h2>
Sorry! Your profile has now been Blocked.
<br />
<br />
Please reach out to us if you have any questions or need additional assistance. <br />
The United Health Institue Team
</td>
</tr>
</table>
</div>
</body>
</html>';

  try
  {
    $sql = "UPDATE students SET status = :status WHERE student_id = :student_id";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':status', $status_new, PDO::PARAM_STR);
    $stmt->bindParam(':student_id', $id, PDO::PARAM_INT);
    $updated = $stmt->execute();
    if($updated)
    {
        if($status_new == 0)
        {
            $mail->MsgHTML($message_decline);
            if(!$mail->Send())
            {
                $status = 'error';
                $msg = 'Problem Sending Mail!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
        }
        else
        {
            $mail->MsgHTML($message_approve);
            if(!$mail->Send())
            {
                $status = 'error';
                $msg = 'Problem Sending Mail!';
                exit(json_encode(array('status'=>$status,'msg'=>$msg)));
            }
        }
        
        $status = 'success';
        $msg = 'Status Updated Successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
    else
    {
      $status = 'error';
        $msg = 'Status Not Updated!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}
else
{
  show_404();
}
?>