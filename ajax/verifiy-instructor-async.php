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
    
$stmt = $db_con->prepare("SELECT * FROM instructors WHERE instructor_id=:instructor_id");  
$stmt->bindParam(':instructor_id', $id, PDO::PARAM_INT);   
$stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetchAll();
foreach ($row as $key => $data)
{
$prefix = $data['prefix'];
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
Congratulations! Your profile has now been approved and we’re so excited to welcome you to the United Health Institue family.<br/> 
You’ll be the first ones to find out about our latest programs and be able to place your courses on your dashboard at your convenience with the credentials below:<br />
<br />
Your email address: "'.$email.'" <br />
Your password: "'.$text_password.'" <br />
<br />
<br />
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">This Email is to inform you that if you are working with UHI then the payout is 70% from total amount of per program.</h2>
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
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Hello "'.$prefix.' '.$first_name.' '.$last_name.'"</h2>
Thank you for your interest in United Health Institue. Unfortunately, your profile has been rejected due to our internal policies. We apologize for any inconvenience this might have caused. Please try again with accurate information.
Not sure why your profile got rejected?<br/>
We’re here to answer any questions you might have regarding your request. Please e-mail us on info@unitedhealthagency.com and we’ll guide you through the process.
</td>
</tr>
</table>
</div>
</body>
</html>';

  try
  {
    $sql = "UPDATE instructors SET is_verified = :status WHERE instructor_id = :instructor_id";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':status', $status_new, PDO::PARAM_STR);
    $stmt->bindParam(':instructor_id', $id, PDO::PARAM_INT);
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