<?php
require_once('../includes/config/auth_session.php');
require_once('../includes/config/functions.php');
require_once('../includes/config/db_config.php');
$ip = getClientIP();
if(!empty($_FILES['files'])){
    $n=0;
    $s=0;
    $prepareNames   =   array();
    foreach($_FILES['files']['name'] as $val)
    {
        $infoExt        =   getimagesize($_FILES['files']['tmp_name'][$n]);
        $s++;
        $filesName      =   str_replace(" ","",trim($_FILES['files']['name'][$n]));
        $files          =   explode(".",$filesName);
        $File_Ext       =   substr($_FILES['files']['name'][$n], strrpos($_FILES['files']['name'][$n],'.'));
         
        if($infoExt['mime'] == 'image/gif' || $infoExt['mime'] == 'image/jpeg' || $infoExt['mime'] == 'image/png')
        {
            $srcPath = '../../uploads/slider_images/';
            if (!file_exists($srcPath))
            {
            mkdir($srcPath, 0777, true);
            }

            $fileName   =   $s.rand(0,999).time().$File_Ext;
            $path   =   trim($srcPath.$fileName);
            if(move_uploaded_file($_FILES['files']['tmp_name'][$n], $path))
            {
                $prepareNames[] .=  $fileName; //need to be fixed.
                $Sflag      =   1; // success
            }
            else
            {
                $Sflag  = 2; // file not move to the destination
            }
        }
        else
        {
            $Sflag  = 3; //extention not valid
        }
        $n++;
    }
    if($Sflag==1)
    {
 
        if(!empty($prepareNames))
        {
            $count  =   1;
            foreach($prepareNames as $name)
            {
                $sql = "INSERT INTO slider_images (user_id, img_name, img_order,ip,created) VALUES (:user_id, :img_name, :img_order, :ip, now())";
                $stmt = $db_con->prepare($sql);
                $stmt->bindValue(':img_name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':img_order', $count++, PDO::PARAM_STR);
                $stmt->bindValue(':ip', $ip, PDO::PARAM_STR);  
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);    
                $inserted = $stmt->execute();
            }
        }

        $status = 'success';
        $msg = 'Images uploaded successfully!';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
    else if($Sflag==2)
    {
        $status = 'error';
        $msg = 'File not move to the destination.';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
    else if($Sflag==3)
    {
        $status = 'error';
        $msg = 'File extention not good. Try with .PNG, .JPEG, .GIF, .JPG';
        exit(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
}
?>